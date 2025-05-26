<?php
/**
 * ----------------------------------------------------------------------------
 * Classe Model (Base para os modelos)
 * ----------------------------------------------------------------------------
 *
 * Esta classe serve como base para todos os modelos do projeto.
 * Ela inicializa a conexão com o banco de dados ao ser instanciada.
 *
 * Por que usamos:
 * - Para centralizar a conexão com o banco de dados em uma classe pai.
 * - Para que todos os modelos herdem automaticamente a conexão.
 * - Para facilitar a manutenção e evitar repetição de código.
 */

class Model
{
    /**
     * Conexão com o banco de dados.
     *
     * @var PDO
     */
    protected $db;

    /**
     * ----------------------------------------------------------------------------
     * Construtor
     * ----------------------------------------------------------------------------
     *
     * Ao criar um novo modelo, inicializa a conexão com o banco de dados usando
     * a classe Database.
     */
    public function __construct()
    {
        // Obtém a conexão única com o banco de dados
        $this->db = Database::getConnection();
    }
}
