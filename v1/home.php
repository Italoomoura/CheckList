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
          
            ?>
            
            <!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="temp.css">
        <title>CheckList Empilhadeira</title>
    </head>
    <body>
        
            <header class="barra">
                <img class="img" src="Motherson_Logo-hori-Dark-Background-PNG.png"  >
                <h2 class="titulo-principal">CheckList</h2>
            </header>
            
            <?php
                $operador = $_SESSION['name'];
            ?>
        
            <form action="checklist_r.php" method="post" style="background: white; display: flex; justify-content: center; align-items: center; height: 85vh; flex-direction: column;">
                <div class="form-group"> 
                    <div class="jumbotron">    
                        <?php 
                        $_POST['username'] = $operador;
                        echo "<h3 name='username' >Operador: $operador</h3>"; ?>
    
                        <div class="form-inline">
                        <label>Número da Empilhadeira:</label>
                        <input type="text" name="empilhadeira" placeholder="Empilhadeira" required="required">
                        <label>Turno:</label>
                        <input type="text" name="turno" placeholder="Turno" required="required">
                        <label>Horimetro Inicial:</label>
                        <input type="text" name="Horimetro" placeholder="Horimetro" required="required">
                    </div>
                </div>
        
            <br>
            <div class="form-horizontal">
            <input type="checkbox" value="ok" name="Sinaleiro" id="check"> Sinaleiro/Giofles/Farol <br>
            <input type="checkbox" value="ok" name="Extintor" id="check"> Extintor <br>
            <input type="checkbox" value="ok" name="Cinto" id="check"> Cinto de Segurança <br>
            <input type="checkbox" value="ok" name="Buzina" id="check"> Buzina <br>
            <input type="checkbox" value="ok" name="Oleo" id="check"> Nível de Óleo do Motor <br>
            <input type="checkbox" value="ok" name="Agua" id="check"> Nível de Água do Radiador <br>
            <input type="checkbox" value="ok" name="Pintura" id="check"> Pintura <br>
            <input type="checkbox" value="ok" name="Trava" id="check"> Trava do Cilindro de Gás <br>
            <input type="checkbox" value="ok" name="Garfos" id="check"> Alinhamento dos Garfos <br>
            <input type="checkbox" value="ok" name="Banco" id="check"> Banco <br>
            <input type="checkbox" value="ok" name="Chave" id="check"> Chave Frente/Ré <br>
            <input type="checkbox" value="ok" name="Mangueiras" id="check"> Mangueiras <br>
            <input type="checkbox" value="ok" name="Correntes" id="check"> Correntes <br>
            <input type="checkbox" value="ok" name="Estruturas" id="check"> Estruturas da Máquina <br>
            <input type="checkbox" value="ok" name="Checar" id="check"> Checar Anormalidade <br>
            <input type="checkbox" value="ok" name="Limpeza" id="check"> Limpeza do Equipamento  <br>
            <input type="checkbox" value="ok" name="Direcao" id="check"> Direção  <br>
            <input type="checkbox" value="ok" name="Aceleracao" id="check"> Aceleração  <br>
            <input type="checkbox" value="ok" name="Freio" id="check"> Freio  <br>
            <input type="checkbox" value="ok" name="Funcao" id="check"> Função Hidráulica  <br>
            <input type="checkbox" value="ok" name="Barulhos" id="check"> Barulhos Anormais  <br> <br>

            <input type="text" name="obs" placeholder="Observações"> <br> <br>

            <button type="submit" name="salvar" value="salvar">Salvar</button>
            </div>
        </form>
        </div>       
    </body>
</html> 


<?php

?>