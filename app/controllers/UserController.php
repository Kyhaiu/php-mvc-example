<?php
/**
 * ----------------------------------------------------------------------------
 * Classe UserController (Controlador de Usuários)
 * ----------------------------------------------------------------------------
 *
 * Responsável por gerenciar as ações relacionadas aos usuários, como criação
 * e listagem. Herda funcionalidades da classe base Controller.
 */

class UserController extends Controller
{
    /**
     * ----------------------------------------------------------------------------
     * Método create()
     * ----------------------------------------------------------------------------
     *
     * - Salva uma mensagem flash na sessão para feedback ao usuário.
     * - Redireciona para a listagem de usuários após o cadastro.
     */
    public function create()
    {
        // Verifica se o formulário foi enviado (POST)
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Cria uma nova instância do modelo User e salva os dados
            $user = new User();
            $user->create($_POST);

            // Inicia a sessão e define a mensagem flash
            session_start();
            $_SESSION['flash_message'] = 'Usuário cadastrado com sucesso!';

            // Redireciona para a listagem de usuários
            header('Location: /php-mvc-example/index.php?controller=user&action=index');
            exit;
        }

        // Exibe o formulário de cadastro se não for POST
        $this->render('user/create');
    }

    /**
     * ----------------------------------------------------------------------------
     * Método index()
     * ----------------------------------------------------------------------------
     *
     * Busca todos os usuários cadastrados no banco de dados e renderiza a view
     * de listagem.
     */
    public function index()
    {
        // Instancia o modelo User e obtém todos os usuários
        $userModel = new User();
        $users = $userModel->getAll() ?? [];

        // Carrega a view de listagem passando os usuários como parâmetro
        $this->render('user/index', ['users' => $users]);
    }

    /**
     * ----------------------------------------------------------------------------
     * Método edit()
     * ----------------------------------------------------------------------------
     *
     * Busca o usuário selecionado e atualiza o registro com as informações novas.
     */
    public function edit()
    {
        $userModel = new User();
        $id = $_GET['id'] ?? null;

        if (!$id) {
            echo "Usuário não encontrado!";
            return;
        }

        // Se formulário enviado (POST)
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userModel->update($id, $_POST);
            
            session_start();
            $_SESSION['flash_message'] = 'Usuário ' . $id . ' Atualizado com sucesso!';
            header('Location: /php-mvc-example/index.php?controller=user&action=index');
            
            exit;
        }

        // Busca o usuário para preencher o formulário
        $user = $userModel->findById($id);

        if (!$user) {
            echo "Usuário não encontrado!";
            return;
        }

        // Renderiza a view passando os dados do usuário
        $this->render('user/edit', ['user' => $user]);
    }

    /**
     * ----------------------------------------------------------------------------
     * Método delete()
     * ----------------------------------------------------------------------------
     *
     * Deleta o usuário selecionado
     */
    public function delete()
    {
        $id = $_GET['id'] ?? null;

        if (!$id) {
            echo "ID inválido!";
            return;
        }

        $userModel = new User();

        if ($userModel->delete($id)) {
            header('Location: /php-mvc-example/index.php?controller=user&action=index&deleted=1');
            exit;
        } else {
            echo "Erro ao excluir usuário!";
        }
    }
}
