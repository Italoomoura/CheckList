<?php

session_start();
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'db_contact';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if (mysqli_connect_errno()) 
{
	exit('Falha ao conectar ao MySQL: ' . mysqli_connect_error());
}

extract($_POST);

$sql=mysqli_query($con,"SELECT username FROM accounts WHERE username = '$username'");
if(mysqli_num_rows($sql)>0)
{
    echo "usuário já existe"; 
    ?>
    <form action="registrar.php" method="post">
        <button type="submit" name="voltar" class="btn btn-primary">Voltar</button>
    </form>
    <?php
	exit;
}

else if(isset($_POST['save']))
{  
    $sql=mysqli_query($con,"INSERT INTO accounts(nome, username, Password) VALUES ('$nome', '$username', '$password')")or die("Could Not Perform the Query");
    header ("Location: users.php?status=success");
}

else  
{
	echo "Erro. Por Favor Tente Novamente";
}

?>