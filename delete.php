<?php
require_once('header.php');
require_once('db_connect.php');

$id=$_GET['id'];

$sth = $pdo->prepare("SELECT id, nome,email,endereco,bairro,cidade,uf,limite_credito,data_analise_credito from clientes WHERE id = :id");
$sth->bindValue(':id', $id, PDO::PARAM_STR);
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
        <div class="panel-heading text-center"><h3><b><?=$title?> <br> Excluir</h3></b></div>
        <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h3>Realmente excluir o registro abaixo?</h3>
            <br>
            <b>ID:</b> <?=$id?><br>
            <b>Nome:</b> <?=$nome?><br>
            <b>E-mail:</b> <?=$email?><br>
            <b>Endereco:</b> <?=$nascimento?><br>
            <b>Bairro:</b> <?=$cpf?><br>
            <b>Cidade:</b> <?=$cpf?><br>
            <b>Uf:</b> <?=$cpf?><br>
            <b>Limite Credito:</b> <?=$cpf?><br>
            <b>Data Analise Credito:</b> <?=$cpf?><br>
            <br>
            <form method="post" action="">
            <input name="id" type="hidden" value="<?=$id?>">
            <input name="enviar" class="btn btn-danger" type="submit" value="Excluir!">&nbsp;&nbsp;&nbsp;
            <input name="enviar" class="btn btn-warning" type="button" onclick="location='index.php'" value="Voltar">
            </form>
            <br><br><br>
        <?php require_once('footer.php'); ?>
        </div>
    <div>
</div>

<?php

if(isset($_POST['enviar'])){
$id = $_POST['id'];
    $sql = "DELETE FROM clientes WHERE id = :id";
    $sth = $pdo->prepare($sql);
    $sth->bindParam(':id', $id, PDO::PARAM_INT);   
    if( $sth->execute()){
        print "<script>alert('Registro excluído com sucesso!');location='index.php';</script>";
    }else{
        print "Erro ao exclur o registro!<br><br>";
    }
}
?>
