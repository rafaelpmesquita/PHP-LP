<!-- CÓDIGO PROCEDURAL -->

<?php
include_once("conexao.php");              //Conectando ao banco de dados

if(isset($_POST['cadastrar'])){

    //Registro dos dados
    if(!isset($_SESSION)){
       session_start();
    }

    foreach ($_POST as $key => $value) {
       $_SESSION[$key] = $value;
    }

    //Validaçao dos dados
    if(strlen($_SESSION['nome']) == 0){         //Validando nome
        echo "Preencha o nome corretamente";
    }
    else if(substr_count($_SESSION['email'], '@') != 1 || substr_count($_SESSION['email'], '.') < 1 || substr_count($_SESSION['email'], '.') > 3){          //Validando email
        echo  "Email invalido. Preencha o email corretamente.";
    }
    else if(!mb_eregi("^[0-9]{11}$", $_SESSION['telefone'])){                             //Validando telefone no formato DDD12345678
        echo "Telefone inválido. Escreva no formato do exemplo e escreva SEM o 9.";
    }
    else if(strlen($_SESSION['senha']) < 8 || strlen($_SESSION['senha']) > 16){           //Validando senha
        echo  "Senha inválida. A senha deve ter entre 8 e 16 caracteres.";
    }
    else{

        //Inserçao dos dados no Banco de Dados
        if(!$strcon){
            die('Nao foi possível conectar ao Banco de Dados');
        }

        $sql = "INSERT INTO cliente VALUES ";
        $sql .= "('defaut', '$_SESSION[nome]', '$_SESSION[email]', '$_SESSION[telefone]', '$_SESSION[senha]', '$_SESSION[datanascimento]')";
        $confirma = mysqli_query($strcon, $sql) or die("Erro ao tentar cadastrar registro");
         
        $last_id = mysqli_insert_id($strcon);                                                    //Pegando o id do ultimo cliente inserido 
        mysqli_close($strcon);

        if($confirma){
            unset($_SESSION['nome'], $_SESSION['email'], $_SESSION['telefone'], $_SESSION['senha'], $_SESSION['datanascimento']);   //Limpando o array $_SESSION
        }else
            echo "Erro ao confirmar passagem de dados";
    }
}    

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    
    <!-- BOOTSTRAP CSS -->
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

                        <form id="login-form" class="form" action="update.php" method="POST">
                            <h3 class="text-center text-info">Cliente cadastrado com sucesso!!</h3>

                            <div class="form-group">
                            <label for='atualizar' class="text-info">Errou? Selecione para atualizar seus dados: </label>
                                <?php echo "<input type='hidden'  name='lastid' value='$last_id'>" ?>           <!-- Passando ultimo ID para pagina update -->
                                <input type="submit" name="atualizar" value="Atualizar" class="btn btn-info btn-md">
                            </div>

                            <br>
                            <a href="pre_cadastrar.php" class="btn btn-info btn-md">Realize um novo cadastro</a> <br />
                            <br>
                            <a href="consulta.php" class="btn btn-info btn-md">Realize uma consulta geral</a> <br />
                            <br>
                            <a href="index.php" class="btn btn-info btn-md">Volte para página inicial</a> <br />
                            
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






<?php
    /*                    ***Código antes do BOOTSTRAP***
    include_once("conexao.php");

    if(isset($_POST['cadastrar'])){

        //Registro dos dados
        if(!isset($_SESSION)){
            session_start();
        }

        foreach ($_POST as $key => $value) {
            $_SESSION[$key] = $value;
        }

        //Validaçao dos dados
        if(strlen($_SESSION['nome']) == 0){         //Validando nome
            echo "Preencha o nome corretamente";
        }
        else if(substr_count($_SESSION['email'], '@') != 1 || substr_count($_SESSION['email'], '.') < 1 || substr_count($_SESSION['email'], '.') > 3){          //Validando email
            echo  "Email invalido. Preencha o email corretamente.";
        }
        else if(!mb_eregi("^[0-9]{11}$", $_SESSION['telefone'])){
            echo "Telefone inválido. Escreva no formato do exemplo e escreva SEM o 9.";
        }
        else if(strlen($_SESSION['senha']) < 8 || strlen($_SESSION['senha']) > 16){
            echo  "Senha inválida. A senha deve ter entre 8 e 16 caracteres.";
        }
        else{

        //Inserçao dos dados no Banco de Dados
            if(!$strcon){
                die('Nao foi possível conectar ao Banco de Dados');
            }

            $sql = "INSERT INTO cliente VALUES ";
            $sql .= "('defaut', '$_SESSION[nome]', '$_SESSION[email]', '$_SESSION[telefone]', '$_SESSION[senha]', '$_SESSION[datanascimento]')";
            $confirma = mysqli_query($strcon, $sql) or die("Erro ao tentar cadastrar registro");
            
            $last_id = mysqli_insert_id($strcon);                                                    //Pegando o id do ultimo cliente inserido 
            mysqli_close($strcon);

            if($confirma){
                unset($_SESSION['nome'], $_SESSION['email'], $_SESSION['telefone'], $_SESSION['senha'], $_SESSION['datanascimento']);
            }else
                echo "Erro ao confirmar passagem de dados";

            echo "Cliente cadastrado com sucesso ! <br />";
            echo "<p class='espaco'></p>";

        //Formulario para envio do ID do cliente atual.    
            echo    "<form action='update.php' name='Update' method='POST'>";
            echo    "<label for='atualizar'>Errou? Selecione para atualizar seus dados: </label>";
            echo    "<input type='hidden' name='lastid' value='$last_id'>";
            echo    "<input type='submit' name='atualizar' value='Atualizar'>";
            echo    "</form>"; 

            echo "<p class='espaco'></p>";
            echo "<a href='pre_cadastrar.php' class='btn btn-info btn-md'>Realize um novo cadastro</a> <br />";
            echo "<p class='espaco'></p>";
            echo "<a href='consulta.php' class='btn btn-info btn-md'>Realize uma consulta geral</a> <br />";
            echo "<p class='espaco'></p>";
            echo "<a href='index.php' class='btn btn-info btn-md'>Volte para página inicial</a> <br />";
    }
} */
?>






<?php
    /*       ***FIZ DA PRIMEIRA VEZ DESTA FORMA, QUANDO NAO TINHA CONHECIMENTO DA VARIAVEL $_SESSION .***

    include_once("conexao.php");
    if(isset($_POST['cadastrar'])){

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $senha = $_POST['senha'];
    $datanascimento = $_POST['datanascimento'];

    if(!$strcon){
        die('Nao foi possível conectar ao Banco de Dados');
    }

    $sql = "INSERT INTO cliente VALUES ";
    $sql .= "('defaut', '$nome', '$email', '$telefone', '$senha', '$datanascimento')";
    mysqli_query($strcon, $sql) or die("Erro ao tentar cadastrar registro");
    mysqli_close($strcon);
    echo "Cliente cadastrado com sucesso <br />";

    echo "<a href='pre_cadastrar.php'>Realize um novo cadastro</a> <br />";
    echo "<a href='consulta.php'>Realize uma consulta geral</a> <br />";
    echo "<a href='index.php'>Volte para página inicial</a> <br />";
    }*/
?>
