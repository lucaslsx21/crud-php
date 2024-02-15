<?php
require_once('header.php');
require_once('db_connect.php');

$id=$_GET['id'];

$sth = $pdo->prepare("SELECT id, nome,email,endereco,bairro,cidade,uf,limite_credito,data_analise_credito from clientes WHERE id = :id");
$sth->bindValue(':id', $id, PDO::PARAM_STR); // No select e no delete basta um bindValue
$sth->execute();

$reg = $sth->fetch(PDO::FETCH_OBJ);
$nome = $reg->nome;
$email = $reg->email;
$endereco = $reg->endereco;
$bairro = $reg->bairro;
$cidade = $reg->cidade;
$uf = $reg->uf;
$limite_credito = $reg->limite_credito;
$data_analise_credito = $reg->data_analise_credito;

require_once('header.php');
?>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading text-center"><h3><b><?=$title?> <br>Atualizar</h3></b></div>
        <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <form method="post" action="">
                <table class="table table-bordered table-responsive table-hover">
                <tr><td><b>Nome</td><td><input type="text" name="nome" value="<?=$nome?>"></td></tr>
                <tr><td><b>E-mail</td><td><input type="text" name="email" value="<?=$email?>"></td></tr>
                <tr><td><b>Endereco</td><td><input type="text" name="endereco" value="<?=$endereco?>"></td></tr>
                <tr><td><b>Bairro</td><td><input type="text" name="bairro" value="<?=$bairro?>"></td></tr>
                <tr><td><b>Cidade</td><td><input type="text" name="cidade" value="<?=$cidade?>"></td></tr>
                <tr><td><b>Uf</td><td><input type="text" name="uf" value="<?=$uf?>"></td></tr>
                <tr><td><b>Limite Credito</td><td><input type="text" name="limite_credito" value="<?=$limite_credito?>"></td></tr>
                <tr><td><b>Data Analise Credito</td><td><input type="text" name="data_analise_credito" value="<?=$data_analise_credito?>"></td></tr>
                <input name="id" type="hidden" value="<?=$id?>">
                <tr><td></td><td><input name="enviar" class="btn btn-primary" type="submit" value="Editar">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input name="enviar" class="btn btn-warning" type="button" onclick="location='index.php'" value="Voltar"></td></tr>
                </table>
            </form>
            <?php require_once('footer.php'); ?>
        </div>
    <div>
</div>

<?php

if(isset($_POST['enviar'])){
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $endereco = $_POST['endereco'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $uf = $_POST['uf'];
    $limite_credito = $_POST['limite_credito'];
    $data_analise_credito = $_POST['data_analise_credito'];

    $sql = "UPDATE clientes SET nome = :nome, email = :email, endereco = :endereco, bairro = :bairro, cidade = :cidade, uf = :uf, limite_credito = :limite_credito, data_analise_credito = :data_analise_credito WHERE id = :id";
//print $sql;exit;
    $sth = $pdo->prepare($sql);
    $sth->bindParam(':id', $_POST['id'], PDO::PARAM_INT);   
    $sth->bindParam(':nome', $_POST['nome'], PDO::PARAM_STR);   
    $sth->bindParam(':email', $_POST['email'], PDO::PARAM_STR);   
    $sth->bindParam(':endereco', $_POST['endereco'], PDO::PARAM_STR);   
    $sth->bindParam(':bairro', $_POST['bairro'], PDO::PARAM_STR);
    $sth->bindParam(':cidade', $_POST['cidade'], PDO::PARAM_STR);
    $sth->bindParam(':uf', $_POST['uf'], PDO::PARAM_STR);
    $sth->bindParam(':limite_credito', $_POST['limite_credito'], PDO::PARAM_STR);
    $sth->bindParam(':data_analise_credito', $_POST['data_analise_credito'], PDO::PARAM_INT);

   if($sth->execute()){
        print "<script>alert('Registro alterado com sucesso!');location='index.php';</script>";
    }else{
        print "Erro ao alterar o registro!<br><br>";
    }
}
?>

