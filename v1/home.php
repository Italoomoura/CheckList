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

if ( !isset($_POST['username'], $_POST['password']) ) {

	exit('Por favor preencha os campos de Nome e Senha!');
}

if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();

	$stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password);
        $stmt->fetch();

        if ($_POST['password'] === $password) {
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $_POST['username'];
            $_SESSION['id'] = $id;

            ?>


            <!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CheckList Empilhadeira</title>
    </head>
    <body>
        
        <h2>Check List Empilhadeira</h2> <br>
        <?php
            echo 'Bem Vindo ' . $_SESSION['name'] . '!';
        ?>
        <br>
        <br>
        <br>

        <form action="checklist_r.php" method="post">
            <input type="text" name="empilhadeira" placeholder="Empilhadeira Número" required="required"> <br> <br>
            <input type="text" name="turno" placeholder="Turno" required="required"> <br> <br>
            <input type="text" name="Horimetro" placeholder="Horimetro Inicial" required="required"> <br> <br>
            <input type="text" name="username" placeholder="Nome" required="required"> <br> <br>
            <input type="checkbox" value="ok" name="chk1[]"> Sinaleiro/Giofles/Farol <br>
            <input type="checkbox" value="ok" name="chk1[]"> Extintor <br>
            <input type="checkbox" value="ok" name="chk1[]"> Cinto de Segurança <br>
            <input type="checkbox" value="ok" name="chk1[]"> Buzina <br>
            <input type="checkbox" value="ok" name="chk1[]"> Nível de Óleo do Motor <br>
            <input type="checkbox" value="ok" name="chk1[]"> Nível de Água do Radiador <br>
            <input type="checkbox" value="ok" name="chk1[]"> Pintura <br>
            <input type="checkbox" value="ok" name="chk1[]"> Trava do Cilindro de Gás <br>
            <input type="checkbox" value="ok" name="chk1[]"> Alinhamento dos Garfos <br>
            <input type="checkbox" value="ok" name="chk1[]"> Banco <br>
            <input type="checkbox" value="ok" name="chk1[]"> Chave Frente/Ré <br>
            <input type="checkbox" value="ok" name="chk1[]"> Mangueiras <br>
            <input type="checkbox" value="ok" name="chk1[]"> Correntes <br>
            <input type="checkbox" value="ok" name="chk1[]"> Estruturas da Máquina <br>
            <input type="checkbox" value="ok" name="chk1[]"> Checar Anormalidade <br>
            <input type="checkbox" value="ok" name="chk1[]"> Limpeza do Equipamento  <br>
            <input type="checkbox" value="ok" name="chk1[]"> Direção  <br>
            <input type="checkbox" value="ok" name="chk1[]"> Aceleração  <br>
            <input type="checkbox" value="ok" name="chk1[]"> Freio  <br>
            <input type="checkbox" value="ok" name="chk1[]"> Função Hidráulica  <br>
            <input type="checkbox" value="ok" name="chk1[]"> Barulhos Anormais  <br> <br>
            <input type="text" name="obs" placeholder="Observações"> <br> <br>
            <input type="date" name="data" require="required"> <br> <br>

            <button type="submit" name="salvar" value="salvar">Salvar</button>
        </form>
    </body>
</html> 


<?php
        } else {
            echo 'Nome e/ou Senha incorretas!';
            ?>
            <br>
            <br>
            <form action="index.html" method="post">
                <button type="submit" name="voltar" class="btn btn-primary">Voltar</button>
            </form>
            <?php
        }
    } else {
        echo 'Nome e/ou Senha incorretas!';
        ?>
        <br>
        <br>
        <form action="index.html" method="post">
            <button type="submit" name="voltar" class="btn btn-primary">Voltar</button>
        </form>
        <?php
    }
	$stmt->close();
}
?>