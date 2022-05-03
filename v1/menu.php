<?php
session_start();
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'db_contact';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {

	exit('Falha ao conectar ao MySQL: ' . mysqli_connect_error());
}

if ( !isset($_POST['username'], $_POST['password']) ) {

    echo 'Por favor preencha os campos de Nome e Senha!';
    
    ?>
        <form action="index.html" method="post">
            <button type="submit" name="voltar" class="btn btn-primary">Voltar</button>
        </form>
    <?php
    
}

if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();

	$stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password);
        $stmt->fetch();

        if ($_POST['password'] === $password) {
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $_POST['username'];
            $_SESSION['id'] = $id;
            $_SESSION['password'] = $_POST['password'];

            $sql = "SELECT username, password FROM accounts";
            $result = $con->query($sql);
                if($_POST['username'] === "administrador" or $_POST['username'] === "administrador.log") {
?>
<?php
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lobby</title>
    <link rel="stylesheet" href="temp.css">
</head>
<body>
    <header class="barra">
        <img class="img" src="Motherson_Logo-hori-Dark-Background-PNG.png"  >
        <h2 class="titulo-principal">Menu</h2>
    </header>

    <div class="form-group" style="text-align: center;">
        
        <form action="home.php" target="_blank" method="POST">
            <h2>CheckList</h2>
            <button type="submit">entrar</button>
        </form>

        <form action="registrar.php" target="_blank" method="POST">
            <h2>Registrar Usuários</h2>
            <button type="submit">entrar</button>
        </form>

        <form action="users.php" target="_blank" method="POST">
            <h2>Usuários Salvos</h2>
            <button type="submit">entrar</button>
        </form>

        <form action="relatorio.php" target="_blank" method="POST">
            <h2>Relatório</h2>
            <button type="submit">entrar</button>
        </form>
    
    </div>
</body>
</html>
<?php

}   
    else {
    ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lobby</title>
    <link rel="stylesheet" href="temp.css">
</head>
<body>
    <header class="barra">
        <img class="img" src="Motherson_Logo-hori-Dark-Background-PNG.png"  >
        <h2 class="titulo-principal">Menu</h2>
    </header>

    <div class="form-group" style="text-align: center;">
        
        <form action="home.php" target="_blank" method="POST">
            <h2>CheckList</h2>
            <?php

            ?>
            <button type="submit">entrar</button>
        </form>

        <form action="relatorio.php" target="_blank" method="POST">
            <h2>Relatório</h2>
            <?php
    
            ?>
            <button type="submit">entrar</button>
        </form>
    
    </div>
</body>
</html>
<?php
            }
        } else {
            ?>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="temp.css">
            <header class="barra">
        <img class="img" src="Motherson_Logo-hori-Dark-Background-PNG.png"  >
        <h2 class="titulo-principal">Menu</h2>
    </header> 
    <div class="form-group" style="text-align: center;">
    <?php
    echo 'Nome e/ou Senha incorretas!';
            ?>
            <br>
            <br>
            <form action="index.html" method="post">
                <button type="submit" name="voltar" class="btn btn-primary">Voltar</button>
            </form>
    </div>  
            <?php
        }
    } else {
        ?>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="temp.css">
        <header class="barra">
        <img class="img" src="Motherson_Logo-hori-Dark-Background-PNG.png"  >
        <h2 class="titulo-principal">Menu</h2>
    </header> 
    <div class="form-group" style="text-align: center;">
    <?php
    echo 'Nome e/ou Senha incorretas!';
            ?>
            <br>
            <br>
            <form action="index.html" method="post">
                <button type="submit" name="voltar" class="btn btn-primary">Voltar</button>
            </form>
    </div>  
        <?php
    }
	$stmt->close();
}
?>