<?php
	session_start();
	if(!isset($_SESSION['usuario'])){
		header ("Location: ../index.php");
	}
?>
<!doctype html>
<html class="fixed">
<head>
<?php 
  include_once '../dao/Conexao.php';
  include_once '../dao/ProdutoDAO.php';
  
  if(!isset($_SESSION['produtos'])){
    header('Location: ../controle/control.php?metodo=listarTodos&nomeClasse=ProdutoControle&nextPage=../html/listar_produto.php');
  }
  if(isset($_SESSION['produtos'])){
    $produtos = $_SESSION['produtos'];
    unset($_SESSION['produtos']);
  }
?>
	<!-- Basic -->
	<meta charset="UTF-8">

	<title>Informaçoes</title>
		
	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

	<!-- Vendor CSS -->
	<link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css" />
	<link rel="stylesheet" href="../assets/vendor/magnific-popup/magnific-popup.css" />
	<link rel="stylesheet" href="../assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

	<!-- Specific Page Vendor CSS -->
	<link rel="stylesheet" href="../assets/vendor/select2/select2.css" />
	<link rel="stylesheet" href="../assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />
	<link rel="icon" href="../img/logofinal.png" type="image/x-icon">

	<!-- Theme CSS -->
	<link rel="stylesheet" href="../assets/stylesheets/theme.css" />

	<!-- Skin CSS -->
	<link rel="stylesheet" href="../assets/stylesheets/skins/default.css" />

	<!-- Theme Custom CSS -->
	<link rel="stylesheet" href="../assets/stylesheets/theme-custom.css">

	<!-- Head Libs -->
	<script src="../assets/vendor/modernizr/modernizr.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
		
	<!-- Vendor -->
	<script src="../assets/vendor/jquery/jquery.min.js"></script>
	<script src="../assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
	<script src="../assets/vendor/bootstrap/js/bootstrap.js"></script>
	<script src="../assets/vendor/nanoscroller/nanoscroller.js"></script>
	<script src="../assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script src="../assets/vendor/magnific-popup/magnific-popup.js"></script>
	<script src="../assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		
	<!-- Specific Page Vendor -->
	<script src="../assets/vendor/jquery-autosize/jquery.autosize.js"></script>
		
	<!-- Theme Base, Components and Settings -->
	<script src="../assets/javascripts/theme.js"></script>
		
	<!-- Theme Custom -->
	<script src="../assets/javascripts/theme.custom.js"></script>
		
	<!-- Theme Initialization Files -->
	<script src="../assets/javascripts/theme.init.js"></script>

	<!-- javascript functions -->
	<script src="../Functions/onlyNumbers.js"></script>
	<script src="../Functions/onlyChars.js"></script>
	<script src="../Functions/enviar_dados.js"></script>
	<script src="../Functions/mascara.js"></script>
		
	<!-- jquery functions -->
	<script>
		function excluir(id){
			window.location.replace('../controle/control.php?metodo=excluir&nomeClasse=ProdutoControle&id_produto='+id);
		}

		function clicar(id)
		   		{
		   			window.location.replace('../html/alterar_produto.php?id_produto='+id);
		   		}

	</script>
	<script>
		$(function(){
			var produtos = <?php 
				echo $produtos;
				?>;
			$.each(produtos, function(i,item){

				$('#tabela')
				.append($('<tr />')
					.append($('<td />')
						.text(item.codigo))
					.append($('<td />')
						.text(item.descricao))
					.append($('<td />')
						.append($('<button />')
							.html('<i class="fas fa-trash-alt"></i>')
							.attr('onclick','excluir("'+item.id_produto+'")')
						)
						.append($('<button/>')
							.html('<i class="fas fa-pencil-alt"</i>')
							.attr('onclick','clicar('+item.id_produto+')')
						)
					)
				);
			});
		});
		$(function () {
	      $("#header").load("header.html");
	      $(".menuu").load("menu.html");
	    });
	</script>

</head>
<body>
	<div id="header"></div>
    <!-- end: header -->
    <div class="inner-wrapper">
      	<!-- start: sidebar -->
      	<aside id="sidebar-left" class="sidebar-left menuu"></aside>
		
		<!-- end: sidebar -->
		<section role="main" class="content-body">
			<header class="page-header">
				<h2>Informaçoes</h2>
			
				<div class="right-wrapper pull-right">
					<ol class="breadcrumbs">
						<li>
							<a href="home.php">
								<i class="fa fa-home"></i>
							</a>
						</li>
						<li><span>Informações produto</span></li>
					</ol>
			
					<a class="sidebar-right-toggle"><i class="fa fa-chevron-left"></i></a>
				</div>
			</header>

			<!-- start: page -->
		
			<section class="panel">
				<header class="panel-heading">
					<div class="panel-actions">
						<a href="#" class="fa fa-caret-down"></a>
					</div>
			
					<h2 class="panel-title">produto</h2>
				</header>
				<div class="panel-body">
					<table class="table table-bordered table-striped mb-none" id="datatable-default">
						<thead>
							<tr>
								<th>codigo</th>
								<th>nome</th>
								<th>ação</th>
							</tr>
						</thead>
						<tbody id="tabela">	
						</tbody>
					</table>
					
				</div><br>
			</section>
			<!-- end: page -->
	
		<!-- Specific Page Vendor -->
		<script src="../assets/vendor/select2/select2.js"></script>
		<script src="../assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
		<script src="../assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js"></script>
		<script src="../assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="../assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="../assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="../assets/javascripts/theme.init.js"></script>


		<!-- Examples -->
		<script src="../assets/javascripts/tables/examples.datatables.default.js"></script>
		<script src="../assets/javascripts/tables/examples.datatables.row.with.details.js"></script>
		<script src="../assets/javascripts/tables/examples.datatables.tabletools.js"></script>
	</body>
</html>
<!--<a href="#" title="" class="btn btn-primary">
	<span class="icon"><i class="fas fa-trash-alt"></i></span>  remover
</a>-->