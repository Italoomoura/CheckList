<link rel="stylesheet" type="text/css" href="style.css">
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

if ($result->num_rows > 0) {
  echo "<table><tr><th>Nome</th><th>Senha</th></tr>";

  while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["username"]."</td><td>".$row["password"]."</td></tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}
$con->close();
?>