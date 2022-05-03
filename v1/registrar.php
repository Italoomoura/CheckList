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

if ( !isset($_SESSION['name'], $_SESSION['password']) ) {
    echo 'Por favor preencha os campos de Nome e Senha!';    
    ?>
        <form action="index.html" method="post">
            <button type="submit" name="voltar" class="btn btn-primary">Voltar</button>
        </form>
    <?php    
}

if($_SESSION['name'] === "administrador") {
    ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="temp.css">
</head>
<body>
    <header class="barra">
        <img class="img" src="Motherson_Logo-hori-Dark-Background-PNG.png"  >
        <h2 class="titulo-principal">Registrar</h2>
    </header>
    <div class="form-group" style="text-align: center;">
    
    <form action="registrar_a.php" method="post">
		<h2 class="hint-text">Criar nova conta</h2>
		<div class="row">
			<div class="col"><input type="text"  name="nome" placeholder="Nome" required="required"></div>
		</div> 
        <div class="row">
			<div class="col"><input type="text" name="username" placeholder="Usuário" required="required"></div>
		</div>        	
		<div>
            <input type="text"  name="password" placeholder="Senha" required="required">
        </div>
        <br> 
		<div>
            <button type="submit" name="save" class="btn btn-primary">Registrar</button>
        </div>
    </form>
    
    </div>
</body>
</html>
<?php
}
    else {
        ?>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
            <link rel="stylesheet" href="temp.css">
            <header class="barra">
                <img class="img" src="Motherson_Logo-hori-Dark-Background-PNG.png"  >
                <h2 class="titulo-principal">Registrar</h2>
            </header>
            <div class="form-group" style="text-align: center;">
                <?php 
                    echo 'Usuário não tem permissão necessária!';
                ?>
                <br>
                <br>
                <form action="index.html" method="post">
                    <button type="submit" name="voltar" class="btn btn-primary">Voltar</button>
                </form>
            </div>
            <?php  
}
