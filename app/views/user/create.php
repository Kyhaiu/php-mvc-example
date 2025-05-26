<?php
/**
 * ----------------------------------------------------------------------------
 * View de Cadastro de Usuário
 * ----------------------------------------------------------------------------
 *
 * Esta página exibe o formulário para criar um novo usuário no sistema.
 * O formulário envia os dados via POST para o mesmo endpoint que está
 * responsável por tratar o cadastro no UserController.
 *
 * Utiliza classes do Tailwind CSS para estilização simples e responsiva.
 */
?>

<div class="max-w-md mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Cadastro de Usuário</h1>

    <form action="" method="post" class="space-y-4">
        <div>
            <label class="block text-sm font-medium">Nome</label>
            <input type="text" name="name" required class="w-full border rounded px-3 py-2" />
        </div>
        <div>
            <label class="block text-sm font-medium">Email</label>
            <input type="email" name="email" required class="w-full border rounded px-3 py-2" />
        </div>
        <div>
            <label class="block text-sm font-medium">Senha</label>
            <input type="password" name="password" required class="w-full border rounded px-3 py-2" />
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Cadastrar
        </button>
    </form>
</div>
