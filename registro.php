<?php

    include 'config.php';

    error_reporting(0);

    session_start();

    if (isset($_SESSION['usuario'])) {
        header("Location: welcome.php");
    }

    if(isset($_POST['submit'])) {
        $usuario = $_POST['usuario'];
        $email = $_POST['email'];
        $senha = md5($_POST['senha']);
        $csenha = md5($_POST['csenha']);

        if($senha == $csenha){
            $sql = "SELECT * FROM usuarios WHERE email='$email' AND senha='$senha'";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0){
                echo "<script>alert('Email ja registrado')</script>";
            } else {
                $sql = "INSERT INTO usuarios(usuario, email, senha) VALUES ('$usuario', '$email', '$senha')";
                $result = mysqli_query($conn, $sql);
                if($result){
                    echo "<script>alert('Usuario registrado com sucesso!')</script>";
                    $usuario= "";
                    $email = "";
                    $_POST['$senha'] = "";
                    $_POST['$csenha'] = "";
                } else {
                    echo "<script>alert('Algo deu errado')</script>";
                }
            }
    
        } else {
            echo "<script>alert('As senhas não conferem')</script>";
        }
    }



?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Registro</title>
</head>
<body>
    <main>
        <section id="login">
            <div class="container p-5">
                <h2 class="text-center">Registro</h2>
                <form action="" method="POST" class="pt-2">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nome de usuario</label>
                    <input type="text" class="form-control" name="usuario" value="<?php echo $usuario;?>" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">E-mail</label>
                    <input type="email" class="form-control" name="email" value="<?php echo $email;?>" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Senha</label>
                    <input type="password" class="form-control" name="senha" value="<?php echo $_POST['senha'];?>" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Confirmar Senha</label>
                    <input type="password" class="form-control" name="csenha" value="<?php echo $_POST['csenha'];?>" required>
                </div>
                <div>
                    <button type="submit" name="submit" class="btn btn-primary">Registrar</button>   
                </div>
                <p class="login-register-text pt-3">Ja tem cadastro? <a href="index.php">Entre aqui</a></p>
                </form>
            </div>
        </section>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>