<?php
require_once('header.php');
require_once('functions.php');
?>

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading text-center">
            <h3><b><?= $title ?> <br> Adicionar</h3></b>
        </div>
        <div class="row">

            <div class="col-md-3"></div>
            <div class="col-md-6">

                <table class="table table-bordered table-responsive table-hover">
                    <form method="post" action="add.php">
                        <tr>
                            <td>Nome</td>
                            <td><input type="text" name="nome" autofocus></td>
                        </tr>
                        <tr>
                            <td>E-mail</td>
                            <td><input type="text" name="email"></td>
                        </tr>
                        <tr>
                            <td>Endereco</td>
                            <td><input type="text" name="endereco"></td>
                        </tr>
                        <tr>
                            <td>Bairro</td>
                            <td><input type="text" name="bairro"></td>
                        </tr>
                        <tr>
                            <td>Cidade</td>
                            <td><input type="text" name="cidade"></td>
                        </tr>
                        <tr>
                            <td>Uf</td>
                            <td><input type="text" name="uf"></td>
                        </tr>
                        <tr>
                            <td>Limite Credito</td>
                            <td><input type="text" name="limite_credito"></td>
                        </tr>
                        <tr>
                            <td>Data Analise Credito</td>
                            <td><input type="text" name="data_analise_credito"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input class="btn btn-primary" name="enviar" type="submit" value="Cadastrar">&nbsp;&nbsp;&nbsp;
                                <input class="btn btn-warning" name="enviar" type="button" onclick="location='index.php'" value="Voltar">
                            </td>
                        </tr>
                    </form>
                </table>
            </div>
        </div>
    </div>

    <?php
    require_once('db_connect.php');

    if (isset($_POST['enviar'])) {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $endereco = $_POST['endereco'];
        $bairro = $_POST['bairro'];
        $cidade = $_POST['cidade'];
        $uf = $_POST['uf'];
        $limite_credito = $_POST['limite_credito'];
        $data_analise_credito = $_POST['data_analise_credito'];

        try {
            $stmte = $pdo->prepare("INSERT INTO clientes(nome,email,endereco,bairro,cidade,uf,limite_credito,data_analise_credito) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmte->bindParam(1, $nome, PDO::PARAM_STR);
            $stmte->bindParam(2, $email, PDO::PARAM_STR);
            $stmte->bindParam(3, $endereco, PDO::PARAM_STR);
            $stmte->bindParam(4, $bairro, PDO::PARAM_STR);
            $stmte->bindParam(5, $cidade, PDO::PARAM_STR);
            $stmte->bindParam(6, $uf, PDO::PARAM_STR);
            $stmte->bindParam(7, $limite_credito, PDO::PARAM_STR);
            $stmte->bindParam(8, $data_analise_credito, PDO::PARAM_STR);
            $executa = $stmte->execute();

            if ($executa) {
                echo 'Dados inseridos com sucesso';
                header('location: index.php');
            } else {
                echo 'Erro ao inserir os dados';
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    require_once('footer.php');
    ?>