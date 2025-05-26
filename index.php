<?php
/**
 * Arquivo de inicialização principal do projeto.
 * Responsável por carregar as classes e executar a ação apropriada
 * de acordo com os parâmetros enviados pela URL.
 */

// Carrega as classes principais e específicas
require_once __DIR__ . '/core/Database.php';                   // Classe para conexão com o banco de dados
require_once __DIR__ . '/core/Controller.php';                 // Classe base dos controladores
require_once __DIR__ . '/core/Model.php';                      // Classe base dos modelos
require_once __DIR__ . '/app/controllers/UserController.php';  // Controlador de usuários
require_once __DIR__ . '/app/models/User.php';                 // Modelo de usuário

/**
 * Pega o controlador e a ação da URL (GET).
 * Se não forem definidos, assume o controlador "user" e a ação "index".
 */
$controller = $_GET['controller'] ?? 'user';
$action = $_GET['action'] ?? 'index';

/**
 * Constrói o nome da classe do controlador dinamicamente.
 * Ex.: Se controller=user, vira UserController.
 */
$controller = ucfirst($controller) . 'Controller';

/**
 * Verifica se a classe do controlador existe e se o método (ação) existe.
 * Se sim, cria uma instância do controlador e chama a ação.
 * Caso contrário, exibe uma mensagem de erro.
 */
if (class_exists($controller) && method_exists($controller, $action))
{
    $ctrl = new $controller(); // Cria a instância do controlador
    $ctrl->$action();          // Executa o método (ação) solicitado
}
else 
{
    // Se o controlador ou a ação não existirem, mostra a página de erro personalizada.
    require_once __DIR__ . '/public/404.php';
}