<div class="max-w-md mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Editar Usuário</h1>

    <form action="" method="post" class="space-y-4">
        <div>
            <label class="block text-sm font-medium">Nome</label>
            <input type="text" name="name" value="<?= htmlspecialchars($user['name']) ?>" required class="w-full border rounded px-3 py-2">
        </div>
        <div>
            <label class="block text-sm font-medium">Email</label>
            <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required class="w-full border rounded px-3 py-2">
        </div>
        <div>
            <label class="block text-sm font-medium">Senha (nova)</label>
            <input type="password" name="password" required class="w-full border rounded px-3 py-2">
        </div>
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Salvar Alterações</button>
        <a href="/php-mvc-example/index.php?controller=user&action=index" class="ml-2 text-gray-500 hover:text-gray-700">Cancelar</a>
    </form>
</div>
