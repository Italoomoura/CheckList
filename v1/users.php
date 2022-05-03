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

$sql = "SELECT username, password FROM accounts";
$result = $con->query($sql);
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="temp.css">
<header class="barra">
    <img class="img" src="Motherson_Logo-hori-Dark-Background-PNG.png"  >
    <h2 class="titulo-principal">Usuários</h2>
</header>
<div class="form-group" style="text-align: center;">
<?php
if ($result->num_rows > 0) {
  echo "<table class='table' border=1><tr class='info'><th>Nome</th><th>Senha</th></tr>";

  while($row = $result->fetch_assoc()) {
    echo "<tr class='active'><td>".$row["username"]."</td><td>".$row["password"]."</td></tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}
?>
<br>
<button type="submit" name="voltar" class="btn btn-primary">Registrar mais usuários</button>
</div>

<?php

$con->close();
?>