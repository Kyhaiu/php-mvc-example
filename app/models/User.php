<?php
/**
 * ----------------------------------------------------------------------------
 * Classe User (Modelo de Usuário)
 * ----------------------------------------------------------------------------
 *
 * Responsável pela manipulação dos dados da tabela "users" no banco de dados.
 * Opera diretamente com a conexão PDO(PHP Data Object) obtida via a classe Model, sem APIs externas.
 * 
 * Utilizado para criar novos usuários e recuperar a lista de usuários do sistema.
 */

class User extends Model
{
    /**
     * ----------------------------------------------------------------------------
     * Método create()
     * ----------------------------------------------------------------------------
     *
     * Insere um novo registro na tabela "users" com os dados fornecidos.
     * Os dados são recebidos do formulário via array associativo $data.
     * A senha é armazenada de forma segura utilizando password_hash().
     *
     * @param array $data Dados do usuário (name, email, password)
     */
    public function create($data)
    {
        $stmt = $this->db->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $stmt->execute([
            $data['name'],
            $data['email'],
            password_hash($data['password'], PASSWORD_DEFAULT)
        ]);
    }

    /**
     * ----------------------------------------------------------------------------
     * Método getAll()
     * ----------------------------------------------------------------------------
     *
     * Recupera todos os usuários cadastrados no banco.
     * Retorna um array associativo com os dados dos usuários para exibição.
     *
     * @return array Lista de usuários
     */
    public function getAll()
    {
        $stmt = $this->db->prepare("SELECT * FROM users");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Atualiza os dados de um usuário pelo ID.
     * @param int $id ID do usuário
     * @param array $data Dados (name, email, password)
     */
    public function update($id, $data)
    {
        $stmt = $this->db->prepare("UPDATE users SET name = :name, email = :email, password = :password WHERE id = :id");
        return $stmt->execute([
            ':name' => $data['name'],
            ':email' => $data['email'],
            ':password' => password_hash($data['password'], PASSWORD_DEFAULT),
            ':id' => $id
        ]);
    }

    /**
     * Busca um usuário pelo ID.
     * @param int $id
     * @return array|false
     */
    public function findById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Exclui um usuário pelo ID.
     * @param int $id
     * @return bool
     */
    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM users WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }

}
