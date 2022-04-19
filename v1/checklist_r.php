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
$checkbox = $_POST['chk1'];
if($_POST["salvar"]=="salvar"){
    for ($i=0; $i<sizeof($checkbox); $i++){

        $con->prepare("INSERT INTO checklist(Sinaleiro, Extintor, CintodeSeguranca, Buzina, NiveldeOleodoMotor, NiveldeAguadoRadiador, Pintura, TravadoCilindrodeGas, AlinhamentodosGarfos, Banco, ChaveFrenteRe, Mangueiras, Correntes, EstruturasdaMaquina, ChecarAnormalidade, LimpezadoEquipamento, Direcao, Aceleracao, Freio, FuncaoHidraulica, BarulhosAnormais) 
        VALUES ('".$checkbox[$i]. "', '".$checkbox[$i]. "', '".$checkbox[$i]. "', '".$checkbox[$i]. "', '".$checkbox[$i]. "', '".$checkbox[$i]. "', '".$checkbox[$i]. "', '".$checkbox[$i]. "', '".$checkbox[$i]. "', '".$checkbox[$i]. "', '".$checkbox[$i]. "', '".$checkbox[$i]. "', '".$checkbox[$i]. "', '".$checkbox[$i]. "', '".$checkbox[$i]. "', '".$checkbox[$i]. "', '".$checkbox[$i]. "', '".$checkbox[$i]. "', '".$checkbox[$i]. "', '".$checkbox[$i]. "', '".$checkbox[$i]. "')" );
    }
}
$stmt = $con->prepare("INSERT INTO checklist(EmpilhadeiraNumero, Turno, OperadorResponsavel, HorimetroInicial, Observacoes, data) 
VALUES (?, ?, ?, ?, ?, ?)");

$stmt->bind_param("ssssss", $empilhadeira, $turno, $username, $Horimetro, $obs, $data);
$empilhadeira = $_POST['empilhadeira'];
$turno = $_POST['turno'];
$username = $_POST['username'];
$Horimetro = $_POST['Horimetro'];
$obs = $_POST['obs'];
$data = $_POST['data'];

$stmt->execute();
        
echo "Salvo Com Sucesso!";

?>
    <form action="index.html" method="post">
        <button type="submit" name="voltar" class="btn btn-primary">Voltar</button>
    </form>
<?php

$stmt->close();
$con->close();
?>