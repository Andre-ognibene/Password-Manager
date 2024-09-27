<!DOCTYPE html>
<html>
<head>
    <title>Gerenciador de Senhas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #ece9e6 0%, #ffffff 100%);
            font-family: 'Arial', sans-serif;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #6a1b9a;
            text-align: center;
            margin-bottom: 10px;
            font-size: 2.5em;
        }
        p.description {
            text-align: center;
            font-size: 1.2em;
            color: #555;
            margin-bottom: 30px;
        }
        .btn-primary {
            background-color: #6a1b9a;
            border-color: #6a1b9a;
            padding: 10px 20px;
            font-size: 1.1em;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #4a148c;
            border-color: #4a148c;
        }
        .senhas {
            margin-top: 20px;
            display: none;
            max-height: 200px;
            overflow-y: auto;
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #f9f9f9;
        }
        .toggle-btn {
            display: block;
            margin: 20px auto;
            text-align: center;
            color: #6a1b9a;
            font-size: 1.2em;
            cursor: pointer;
            font-weight: bold;
            transition: color 0.3s ease;
        }
        .toggle-btn:hover {
            color: #4a148c;
        }
        footer {
            text-align: center;
            margin-top: 40px;
            padding: 10px;
            font-size: 0.9em;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Gerenciador de Senhas</h1>
        <p class="description">Este programa permite que você salve de forma segura o nome de um site, seu login e senha, mantendo um registro organizado para consultas futuras. As senhas podem ser exibidas ou escondidas conforme sua necessidade.</p>
        
        <form method="post">
            <div class="mb-3">
                <label for="site" class="form-label">Site:</label>
                <input type="text" class="form-control" id="site" name="site" required>
            </div>
            <div class="mb-3">
                <label for="login" class="form-label">Login:</label>
                <input type="text" class="form-control" id="login" name="login" required>
            </div>
            <div class="mb-3">
                <label for="senha" class="form-label">Senha:</label>
                <input type="password" class="form-control" id="senha" name="senha" required>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>

        <div class="toggle-btn" onclick="toggleSenhas()">Mostrar/Esconder Senhas Salvas</div>

        <div class="senhas" id="senhasSalvas">
            <h2>Senhas Salvas:</h2>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $site = $_POST['site'];
                $login = $_POST['login'];
                $senha = $_POST['senha'];
                $data = date('d/m/Y');

                $arquivo = 'senhas.txt';
                file_put_contents($arquivo, "\nSite: $site\nLogin: $login\nSenha: $senha\nData: $data", FILE_APPEND);

                echo "<p>Dados salvos com sucesso!</p>";
            }

            $arquivo = 'senhas.txt';
            if (file_exists($arquivo)) {
                $dados = file_get_contents($arquivo);
                echo nl2br($dados);
            } else {
                echo "<p>Nenhuma senha salva ainda.</p>";
            }
            ?>
        </div>
    </div>

    <footer>
        Trabalho desenvolvido por Jonas, João Victor Pavan, André Gustavo
    </footer>

    <script>
        function toggleSenhas() {
            var senhasDiv = document.getElementById('senhasSalvas');
            if (senhasDiv.style.display === 'none' || senhasDiv.style.display === '') {
                senhasDiv.style.display = 'block';
            } else {
                senhasDiv.style.display = 'none';
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
