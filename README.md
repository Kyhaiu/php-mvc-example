# Projeto: Cadastro de Usuário em PHP (MVC) com TailwindCSS

Este projeto demonstra um simples **cadastro de usuário** utilizando o padrão **MVC** em **PHP puro** com **TailwindCSS** para a interface. Ele inclui um roteamento simples, conexão com banco de dados MySQL e uma tela de cadastro estilizada.

## 🎯 Funcionalidades

✅ Cadastro de usuário com nome, email e senha  
✅ Senha armazenada de forma segura (hash)  
✅ Página de sucesso ao cadastrar  
✅ Estrutura limpa em **MVC**  
✅ Estilizado com **TailwindCSS**

---

## 📁 Estrutura de Diretórios

```
/meu-projeto
├── /app
│ ├── /controllers
│ │ └── UserController.php # Controlador de usuários
│ ├── /models
│ │ └── User.php # Modelo de usuários (acesso ao banco)
│ ├── /views
│ │ ├── /user
│ │ │ └── create.php # Página de cadastro
│ │ └── layout.php # Layout base
├── /public
│ ├── index.php # Ponto de entrada da aplicação
│ └── /css
│ └── tailwind.css # CSS gerado pelo Tailwind
├── /core
│ ├── Controller.php # Classe base para os controladores
│ ├── Model.php # Classe base para os modelos
│ └── Database.php # Conexão com o banco de dados
└── README.md # Este arquivo
```

---

## ⚙️ Como Rodar o Projeto

1️⃣ Clone ou baixe o repositório em seu servidor local (XAMPP, MAMP, etc.).  
2️⃣ Crie o banco de dados MySQL:


```sql
CREATE DATABASE meubanco;
USE meubanco;

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  email VARCHAR(100),
  password VARCHAR(255)
);
```

3️⃣ No arquivo /core/Database.php, ajuste as credenciais do banco:

```php
self::$instance = new PDO('mysql:host=localhost;dbname=meubanco', 'root', '');
```

4️⃣ Gere o CSS do Tailwind (opcional, se quiser atualizar):

```bash
npx tailwindcss -i ./src/input.css -o ./public/css/tailwind.css --watch
```

5️⃣ Acesse no navegador:


## 🚀 Tecnologias Utilizadas

- **PHP 8+**

- **MySQL**

- **TailwindCSS**

- **HTML e CSS básico**