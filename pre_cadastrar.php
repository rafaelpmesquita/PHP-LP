<!-- CÓDIGO PROCEDURAL -->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">

    <!-- Boostrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    
    <title>Cadastro de Cliente</title>
</head>
<body>
<div id="login">
        <h3 class="text-center text-white pt-5">Login form</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">

                        <form id="login-form" class="form" action="cadastrar.php" method="POST">
                            <h3 class="text-center text-info">Cadastro de Clientes</h3>
                            <div class="form-group">
                                <label for="nome" class="text-info">Nome Completo:</label><br>
                                <input type="text" name="nome" id="username" class="form-control" placeholder="Nome">
                            </div>
                            <div class="form-group">
                                <label for="email" class="text-info">E-mail:</label><br>
                                <input type="text" name="email" id="email" class="form-control" placeholder="Ex: curso@empresa.com">
                            </div>
                            <div class="form-group">
                                <label for="telefone" class="text-info">Telefone:</label><br>
                                <input type="text" name="telefone" id="telefone" class="form-control" placeholder="Ex: 03155555555">
                            </div>
                            <div class="form-group">
                                <label for="senha" class="text-info">Senha:</label><br>
                                <input type="password" name="senha" id="tel" class="form-control" placeholder="8 a 16 caracteres">
                            </div>
                            <div class="form-group">
                                <label for="datanascimento" class="text-info">Data de Nascimento</label><br>
                                <input type="date" name="datanascimento" id="datanascimento" class="form-control" >
                            </div>
                            
                            <div class="form-group">
                                <br>
                                <input type="submit" name="cadastrar" class="btn btn-info btn-md" value="Cadastrar">
                            </div>
                            <br>
                            <a href="index.php" class="btn btn-info btn-md">Voltar</a>
                        </form>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
        crossorigin="anonymous"></script>
</body>
</html>


<!--    ***FORMA COMO EU FIZ ANTES DE INSERIR O BOOTSTRAP***
         
    <body>
<h1>Formulario de Cadastro do Cliente</h1>
    <form action="cadastrar.php" name="Cadastro" method="POST">
    <label for="nome">Nome completo:</label>
    <input type="text" name="nome" placeholder="Nome">
    <p class="espaco"></p>

    <label for="email">E-mail:</label>
    <input type="text" name="email" placeholder="Ex: curso@empresa.com">
    <p class="espaco"></p>

    <label for="telefone">Telefone:</label>
    <input type="text" name="telefone" placeholder="Ex: 03155555555">
    <p class="espaco"></p>

    <label for="senha">Senha:</label>
    <input type="password" name="senha" placeholder="8 a 16 caracteres">
    <p class="espaco"></p>

    <label for="datanascimento">Data de Nascimento:</label>
    <input type="date" name="datanascimento">
    <p class="espaco"></p>

    <input type="submit" name="cadastrar" value="Cadastrar">

    </form>
    <p class="espaco"></p>
    <a href="index.php">Voltar</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
        crossorigin="anonymous"></script>
</body> -->