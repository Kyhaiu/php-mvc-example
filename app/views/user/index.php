<?php 
/**
 * ----------------------------------------------------------------------------
 * View de Listagem de Usuários
 * ----------------------------------------------------------------------------
 * 
 * Exibe a tabela com todos os usuários cadastrados no sistema.
 * 
 * Exibe uma mensagem flash de sucesso, se estiver presente na sessão, com
 * um toast que desaparece automaticamente após alguns segundos.
 * 
 * Utiliza Tailwind CSS para estilização responsiva e limpa.
 */

session_start();
// Recupera a mensagem flash da sessão (se existir) e a remove para evitar reaparecer
$flash_message = $_SESSION['flash_message'] ?? null;
unset($_SESSION['flash_message']);

$users = $users ?? [];
?>

<div class="container mx-auto px-4 py-8">

    <?php if ($flash_message): ?>
        <div id="toast-success" class="fixed top-4 right-4 bg-green-500 text-white px-4 py-2 rounded shadow transition-opacity duration-300 flex items-center gap-2" role="alert" aria-live="assertive">
            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
            </svg>
            <span><?= htmlspecialchars($flash_message) ?></span>
        </div>
        <script>
            // Faz o toast desaparecer após 3 segundos com animação de fade-out
            setTimeout(function() {
                const toast = document.getElementById('toast-success');
                toast.classList.add('opacity-0');
                setTimeout(() => toast.remove(), 300);
            }, 3000);
        </script>
    <?php endif; ?>

    <?php if (!empty($_GET['deleted'])): ?>
        <div class="fixed top-4 right-4 bg-red-500 text-white px-4 py-2 rounded shadow">
            Usuário excluído com sucesso!
        </div>
        <script>
            setTimeout(function() {
                document.querySelector('.fixed').remove();
            }, 2000);
        </script>
    <?php endif; ?>

    <h1 class="text-2xl font-bold mb-4">Lista de Usuários</h1>

    <table class="min-w-full bg-white border border-gray-300">
        <thead class="bg-gray-200">
            <tr>
                <th class="py-2 px-4 border-b">ID</th>
                <th class="py-2 px-4 border-b">Nome</th>
                <th class="py-2 px-4 border-b">Email</th>
                <th class="py-2 p2-4 border-b">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($users)): ?>
                <?php foreach ($users as $user): ?>
                    <tr class="hover:bg-gray-100">
                        <td class="py-2 px-4 border-b"><?= htmlspecialchars($user['id']) ?></td>
                        <td class="py-2 px-4 border-b"><?= htmlspecialchars($user['name']) ?></td>
                        <td class="py-2 px-4 border-b"><?= htmlspecialchars($user['email']) ?></td>
                        <td class="py-2 px-4 border-b">
                            <a href="/php-mvc-example/index.php?controller=user&action=edit&id=<?= $user['id'] ?>" class="text-blue-500 hover:underline">Editar</a>
                            <a href="/php-mvc-example/index.php?controller=user&action=delete&id=<?= $user['id'] ?>" 
                              class="text-red-500 hover:underline" 
                              onclick="return confirm('Tem certeza que deseja excluir este usuário?');">Excluir</a>
                        
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3" class="py-2 px-4 text-center text-gray-500">Nenhum usuário cadastrado.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <a href="/php-mvc-example/index.php?controller=user&action=create" class="inline-block mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
        Cadastrar novo usuário
    </a>
</div>
