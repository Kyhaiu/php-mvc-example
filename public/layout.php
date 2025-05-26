<?php
/**
 * ----------------------------------------------------------------------------
 * Layout Principal do Projeto
 * ----------------------------------------------------------------------------
 *
 * Este arquivo funciona como um "template base" para o sistema.
 * Ele define a estrutura principal (HTML, head, etc.) que é compartilhada
 * por todas as páginas, evitando duplicação de código.
 *
 * O conteúdo dinâmico de cada página (por exemplo, lista de usuários ou formulário
 * de cadastro) é renderizado na variável $content, que cada página define.
 *
 * Dessa forma, o layout fornece o cabeçalho, rodapé, estilos e o container
 * principal, e as páginas injetam apenas o conteúdo específico que muda.
 *
 * Vantagem: Separação de responsabilidades e DRY (Don't Repeat Yourself).
 */

// Garante que $content sempre exista, evitando erros se não for definido
$content = $content ?? '';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <!-- Tailwind CSS via CDN para estilização rápida e moderna -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    
    <title>Cadastro de Usuário</title>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto p-4">
        <!-- Aqui o conteúdo específico da página será injetado -->
        <?= $content ?>
    </div>
</body>
</html>
