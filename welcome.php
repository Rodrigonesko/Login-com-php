<?php

session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Bem vindo</title>
</head>
<body>
    <?php echo "<h1 class='text-center p-5'>Bem vindo " . $_SESSION['usuario'] . "</h1>";?>
    <div class="text-center">
        <a  href="logout.php">Sair</a>
    </div>
   

    


</body>
</html>