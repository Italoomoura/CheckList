<?php

use function PHPSTORM_META\elementType;

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

if(isset($_POST['Sinaleiro'])){    $_POST['Sinaleiro'] = "OK"; }
    else{       $_POST['Sinaleiro'] = 'X';}

if(isset($_POST['Extintor'])){    $_POST['Extintor'] = "OK"; }
    else{       $_POST['Extintor'] = 'X';}

if(isset($_POST['Cinto'])){    $_POST['Cinto'] = "OK"; }
    else{       $_POST['Cinto'] = 'X';}
if(isset($_POST['Buzina'])){    $_POST['Buzina'] = "OK"; }
    else{       $_POST['Buzina'] = 'X';}

if(isset($_POST['Oleo'])){    $_POST['Oleo'] = "OK"; }
    else{       $_POST['Oleo'] = 'X';}

if(isset($_POST['Agua'])){    $_POST['Agua'] = "OK"; }
    else{       $_POST['Agua'] = 'X';}

if(isset($_POST['Pintura'])){    $_POST['Pintura'] = "OK"; }
    else{       $_POST['Pintura'] = 'X';}

if(isset($_POST['Trava'])){    $_POST['Trava'] = "OK"; }
    else{       $_POST['Trava'] = 'X';}

if(isset($_POST['Garfos'])){    $_POST['Garfos'] = "OK"; }
    else{       $_POST['Garfos'] = 'X';}

if(isset($_POST['Banco'])){    $_POST['Banco'] = "OK"; }
    else{       $_POST['Banco'] = 'X';}

if(isset($_POST['Chave'])){    $_POST['Chave'] = "OK"; }
    else{       $_POST['Chave'] = 'X';}

if(isset($_POST['Mangueiras'])){    $_POST['Mangueiras'] = "OK"; }
    else{       $_POST['Mangueiras'] = 'X';}

if(isset($_POST['Correntes'])){    $_POST['Correntes'] = "OK"; }
    else{       $_POST['Correntes'] = 'X';}

if(isset($_POST['Estruturas'])){    $_POST['Estruturas'] = "OK"; }
    else{       $_POST['Estruturas'] = 'X';}

if(isset($_POST['Checar'])){    $_POST['Checar'] = "OK"; }
    else{       $_POST['Checar'] = 'X';}


if(isset($_POST['Limpeza'])){    $_POST['Limpeza'] = "OK"; }
    else{       $_POST['Limpeza'] = 'X';}


if(isset($_POST['Direcao'])){    $_POST['Direcao'] = "OK"; }
    else{       $_POST['Direcao'] = 'X';}


if(isset($_POST['Aceleracao']))  {    $_POST['Aceleracao'] = "OK"; }
    else    {       $_POST['Aceleracao'] = 'X';  }


if(isset($_POST['Freio']))   {    $_POST['Freio'] = "OK"; }
    else    {       $_POST['Freio'] = 'X';   }


if(isset($_POST['Funcao']))  {    $_POST['Funcao'] = "OK";     }
    else    {   $_POST['Funcao'] = 'X';  }


if(isset($_POST['Barulhos']))    {  $_POST['Barulhos'] = "OK";   }
    else    {   $_POST['Barulhos'] = 'X';    }


$Sinaleiro = $_POST['Sinaleiro'];
$Extintor = $_POST['Extintor'];
$Cinto = $_POST['Cinto'];
$Buzina = $_POST['Buzina'];
$Oleo = $_POST['Oleo'];
$Agua = $_POST['Agua'];
$Pintura = $_POST['Pintura'];
$Trava = $_POST['Trava'];
$Garfos = $_POST['Garfos'];
$Banco = $_POST['Banco'];
$Chave = $_POST['Chave'];
$Mangueiras = $_POST['Mangueiras'];
$Correntes = $_POST['Correntes'];
$Estruturas = $_POST['Estruturas'];
$Checar = $_POST['Checar'];
$Limpeza = $_POST['Limpeza'];
$Direcao = $_POST['Direcao'];
$Aceleracao = $_POST['Aceleracao'];
$Freio = $_POST['Freio'];
$Funcao = $_POST['Funcao'];
$Barulhos = $_POST['Barulhos'];

$valor = $Sinaleiro."'".", "."'".$Extintor."'".", "."'".$Cinto."'".", "."'".$Buzina."'".", "."'".$Oleo."'".", "."'".$Agua."'".", "."'".$Pintura."'".", "."'".$Trava."'".", "."'".$Garfos."'".", "."'".$Banco."'".", "."'".$Chave."'".", "."'".$Mangueiras."'".", "."'".$Correntes."'".", "."'".$Estruturas."'".", "."'".$Checar."'".", "."'".$Limpeza."'".", "."'".$Direcao."'".", "."'".$Aceleracao."'".", "."'".$Freio."'".", "."'".$Funcao."'".", "."'".$Barulhos;

$empilhadeira = $_POST['empilhadeira'];
$turno = $_POST['turno'];
$username = $_SESSION['name'];
$Horimetro = $_POST['Horimetro'];

$obs = $_POST['obs'];

date_default_timezone_set('America/Sao_Paulo');    
$DateAndTime = date('d-m-Y h:i:s a', time());  

$data = $DateAndTime;

$insert = "INSERT INTO checklist(EmpilhadeiraNumero, Turno, OperadorResponsavel, HorimetroInicial, Sinaleiro, Extintor, CintodeSeguranca, Buzina, NiveldeOleodoMotor, NiveldeAguadoRadiador, Pintura, TravadoCilindrodeGas, AlinhamentodosGarfos, Banco, ChaveFrenteRe, Mangueiras, Correntes, EstruturasdaMaquina, ChecarAnormalidade, LimpezadoEquipamento, Direcao, Aceleracao, Freio, FuncaoHidraulica, BarulhosAnormais, Observacoes, data) 
VALUES ('$empilhadeira', '$turno', '$username', '$Horimetro', '$valor', '$obs', '$data')";

$stmt = $con->prepare($insert);

$stmt->execute();

?>
<link rel="stylesheet" href="temp.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
            <header class="barra">
                <img class="img" src="Motherson_Logo-hori-Dark-Background-PNG.png"  >
                <h2 class="titulo-principal">Salvo</h2>
            </header>
            <div style="background: white; display: flex; justify-content: center; align-items: center; height: 15vh; flex-direction: column;">
            <?php
            echo "Salvo Com Sucesso!";
            ?>
    <form action="index.html" method="post">
        <button type="submit" name="voltar" class="btn btn-primary">Voltar</button>
    </form>
            </div>

<?php

$stmt->close();
$con->close();

?>