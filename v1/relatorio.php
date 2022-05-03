
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

$sql = "SELECT data, EmpilhadeiraNumero, Turno, OperadorResponsavel, HorimetroInicial, Sinaleiro, Extintor, CintodeSeguranca, Buzina, NiveldeOleodoMotor, NiveldeAguadoRadiador, Pintura, 
TravadoCilindrodeGas, AlinhamentodosGarfos, Banco, ChaveFrenteRe, Mangueiras, Correntes, EstruturasdaMaquina, ChecarAnormalidade, LimpezadoEquipamento, Direcao, Aceleracao, Freio, 
FuncaoHidraulica, BarulhosAnormais, Observacoes FROM checklist";
$result = $con->query($sql);
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="temp.css">
<header class="barra">
    <img class="img" src="Motherson_Logo-hori-Dark-Background-PNG.png"  >
    <h2 class="titulo-principal">Relatório</h2>
</header>
<div class="form-group" style="text-align: center;">
<?php
if ($result->num_rows > 0) {
  echo "<table class='table' border=1><tr class='info'><th>Data</th><th>Número da Empilhaderia</th><th>Turno</th>
  <th>Operador Responsável</th><th>Horimetro Inicial</th>
  <th>Sinaleiro/Giofles/Farol</th><th>Extintor</th>
  <th>Cinto de Segurança</th><th>Buzina</th>
  <th>Nível de Óleo do Motor</th><th>Nível de Água do Radiador</th>
  <th>Pintura</th><th>Trava do Cilindro de Gás</th>
  <th>Alinhamento dos Garfos</th><th>Banco</th>
  <th>Chave Frente/Ré</th><th>Mangueiras</th>
  <th>Correntes</th><th>Estruturas da Máquina</th>
  <th>Checar Anormalidade</th><th>Limpeza do Equipamento</th>
  <th>Direção</th><th>Aceleração</th>
  <th>Freio</th><th>Função Hidráulica</th>
  <th>Barulhos Anormais</th><th>Observações</th></tr>";

  while($row = $result->fetch_assoc()) {
    echo "<tr class='active'><td>".$row["data"]."</td><td>".$row["EmpilhadeiraNumero"]."</td><td>".$row["Turno"]."</td>
    <td>".$row["OperadorResponsavel"]."</td><td>".$row["HorimetroInicial"]."</td><td>".$row["Sinaleiro"]."</td>
    <td>".$row["Extintor"]."</td><td>".$row["CintodeSeguranca"]."</td><td>".$row["Buzina"]."</td>
    <td>".$row["NiveldeOleodoMotor"]."</td><td>".$row["NiveldeAguadoRadiador"]."</td><td>".$row["Pintura"]."</td>
    <td>".$row["TravadoCilindrodeGas"]."</td><td>".$row["AlinhamentodosGarfos"]."</td><td>".$row["Banco"]."</td>
    <td>".$row["ChaveFrenteRe"]."</td><td>".$row["Mangueiras"]."</td><td>".$row["Correntes"]."</td>
    <td>".$row["EstruturasdaMaquina"]."</td><td>".$row["ChecarAnormalidade"]."</td><td>".$row["LimpezadoEquipamento"]."</td>
    <td>".$row["Direcao"]."</td><td>".$row["Aceleracao"]."</td><td>".$row["Freio"]."</td>
    <td>".$row["FuncaoHidraulica"]."</td><td>".$row["BarulhosAnormais"]."</td><td>".$row["Observacoes"]."</td></tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}
?>
</div>
<?php
$con->close();
?>