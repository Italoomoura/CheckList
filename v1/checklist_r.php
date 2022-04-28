<?php

session_start();
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'db_contact';

$con = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if ($con->connect_error) 
{
	exit('Falha ao conectar ao MySQL: ' . $con->connect_error);
}

$elementos = $_POST['elementos'];
$empilhadeira = $_POST['empilhadeira'];
$turno = $_POST['turno'];
$username = $_POST['username'];
$Horimetro = $_POST['Horimetro'];

$obs = $_POST['obs'];
$data = $_POST['data'];

$string = implode("', '",$elementos); 

$insert = "INSERT INTO checklist(EmpilhadeiraNumero, Turno, OperadorResponsavel, HorimetroInicial, Sinaleiro, Extintor, CintodeSeguranca, Buzina, NiveldeOleodoMotor, NiveldeAguadoRadiador, Pintura, TravadoCilindrodeGas, AlinhamentodosGarfos, Banco, ChaveFrenteRe, Mangueiras, Correntes, EstruturasdaMaquina, ChecarAnormalidade, LimpezadoEquipamento, Direcao, Aceleracao, Freio, FuncaoHidraulica, BarulhosAnormais, Observacoes, data) 
VALUES ('$empilhadeira', '$turno', '$username', '$Horimetro', '$string', '$obs', '$data')";

$stmt = $con->prepare($insert);

$stmt->execute();
        
echo "Salvo Com Sucesso!";

?>
    <form action="index.html" method="post">
        <button type="submit" name="voltar" class="btn btn-primary">Voltar</button>
    </form>
<?php

#$stmt->close();
$con->close();
?>