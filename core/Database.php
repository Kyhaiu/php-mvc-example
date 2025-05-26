<?php
/**
 * ----------------------------------------------------------------------------
 * Classe Database (Conexão com Banco de Dados)
 * ----------------------------------------------------------------------------
 *
 * Esta classe é responsável por fornecer uma instância única de conexão com o
 * banco de dados (padrão Singleton), evitando múltiplas conexões desnecessárias.
 *
 * Por que usamos:
 * - Para centralizar a lógica de conexão com o banco de dados.
 * - Para garantir que apenas uma instância de conexão (PDO) seja criada e reutilizada.
 * - Para manter o código mais limpo e fácil de manter.
 */

class Database
{
    /**
     * Instância única da conexão (Singleton).
     *
     * @var PDO|null
     */
    private static $instance = null;

    /**
     * ----------------------------------------------------------------------------
     * Método que retorna a conexão com o banco de dados
     * ----------------------------------------------------------------------------
     *
     * @return PDO A instância única de conexão com o banco de dados.
     *
     * Como funciona:
     * - Se a conexão ainda não existir ($instance for null), cria uma nova.
     * - Configura o PDO para lançar exceções em caso de erros.
     * - Retorna a conexão existente nas próximas chamadas.
     */
    public static function getConnection()
    {
        if (self::$instance === null) {
            // Cria a conexão com o banco de dados (ajuste as credenciais conforme necessário)
            self::$instance = new PDO('mysql:host=localhost;dbname=mvc_example', 'root', '');
            
            // Configura o PDO para lançar exceções em caso de erro
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        return self::$instance;
    }
}
