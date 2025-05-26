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
}
