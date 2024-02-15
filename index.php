<?php
// Inclui o cabeçalho da página
include_once("header.php");
?>
<body>

<div class="container">
    <div class="panel panel-default">
        <!-- Título da página -->
        <div class="panel-heading text-center"><h3><b><?=$title?></h3></b></div>
        <div class="row">

            <!-- Adicionar registro -->
            <!-- Botão para adicionar um novo registro -->
            <div class="text-left col-md-2 top">
                <a href="add.php" class="btn btn-primary pull-left">
                    <span class="glyphicon glyphicon-plus"></span> Adicionar
                </a>
            </div>

            <!-- Formulário de busca -->
            <!-- Formulário para realizar a busca -->
            <div class="col-md-10">
                <form action="search.php" method="get" >
                  <div class="pull-right top">
                  <span class="pull-right">  
                    <label class="control-label" for="palavra" style="padding-right: 5px;">
                      <input type="text" value="" placeholder="Nome ou parte" class="form-control" name="keyword">
                    </label>
                    <button class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Busca</button>&nbsp;
                  </span>                 
                  </div>
                </form>
            </div>
	    </div>

        <!-- Tabela de registros -->
        <table class="table table-bordered table-hover">
            <thead>  
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Nome</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Endereco</th>
                    <th class="text-center">Bairro</th>
                    <th class="text-center">Uf</th>
                    <th class="text-center">Limite Credito</th>
                    <th class="text-center">Data Analise Credito</th>
                </tr>
            </thead>
            <tbody id="pg-results">
            </tbody>
        </table>
        <!-- Paginação -->
        <div class="panel-footer text-center">
            <div class="pagination"></div>
        </div>
    </div>
</div>
    
<!-- Scripts JavaScript -->
<script src="js/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/jquery-3.5.0.min.js" type="text/javascript"></script>

<!-- Script para carregar dados e configurar a paginação -->
<script type="text/javascript">
$(document).ready(function() {
    // Carrega os dados da página inicial
    $("#pg-results").load("fetch_data.php");
    // Configura a paginação
    $(".pagination").bootpag({
        total: <?php echo $total_pages; ?>,
        page: 1,
        maxVisible: <?php echo $max_visible; ?>,// páginas da paginação
        leaps: true,
        firstLastUse: true,
        first: 'Primeiro',//←
        last: 'Último',//→
        wrapClass: 'pagination',
        activeClass: 'active',
        disabledClass: 'disabled',
        nextClass: 'next',
        prevClass: 'prev',
        lastClass: 'last',
        firstClass: 'first'
    }).on("page", function(e, page_num){
        // Ao trocar de página, carrega os dados da página correspondente
        $("#results").prepend('<div class="loading-indication"><img src="ajax-loader.gif" /> Loading...</div>');
        $("#pg-results").load("fetch_data.php", {"page": page_num});
    });
});
</script>

<?php 
// Inclui o rodapé da página
include_once("footer.php");
?>
