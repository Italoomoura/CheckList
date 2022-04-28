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
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Registrar</title>
</head>
<body>
<body>
<div class="resgistrar-form">
    <form action="registrar_a.php" method="post">
		<h2>Registrar</h2>
		<p class="hint-text">Criar nova conta</p>
        <div>
			<div class="row">
				<div class="col"><input type="text" class="form-control" name="username" placeholder="Nome" required="required"></div>
			</div>        	
        </div>
		<div>
            <input type="text" class="form-control" name="password" placeholder="Senha" required="required">
        </div>
        <br> 
		<div>
            <button type="submit" name="save" class="btn btn-success btn-lg btn-block">Registrar</button>
        </div>
    </form>
</div>
</body>
</html>