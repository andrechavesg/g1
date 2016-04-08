<?php
$noticias = $viewBag["noticias"];
$noticiasPrincipais = $viewBag["noticiasPrincipais"];
$noticiasSecundarias = $viewBag["noticiasSecundarias"];
?>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="Vendor/View/CSS/reset.css">
	<link rel="stylesheet" href="Vendor/View/CSS/index.css">
	<title>Pagina incial</title>
</head>
<body>
	<header>
		<div class="menu">menu</div>
		<a href="/"><div class="logo">G1</div></a>
		<div class="busca">buscar</div>
	</header>
	<div class="container">
		<div class="noticias-principais">
		<?php
		foreach ($noticiasPrincipais as $noticiaPrincipal) {
		?>	
		
			<div class="noticia-principal">	
				<h1><?= $noticiaPrincipal["titulo"] ?></h1>
			</div>

		<?php
		}
		?>
		</div>
		<div class="noticias-secundarias">

		<?php
		foreach ($noticiasSecundarias as $noticiaSecundaria) {
		?>
	
			<div class="noticia-secundaria">
				<h2><?= $noticiaSecundaria["titulo"] ?></h2>
			</div>
		
		<?php
		}
		?>

		</div>
	</div>
	<div class="container">
			<div class="noticias">			
			<?php
				foreach($noticias as $noticia){
			?>
				<div class="noticia">
					<div class="noticia-header">
						<div class="categoria"> <?= $noticia["categoria"] ?> </div>
						<div class="noticia-post-tempo"> <?= $noticia["dataUltimaAtualizacao"] ?> </div>
					</div>
					<p class="noticia-titulo"> <?= $noticia["titulo"] ?> </p>
					<p class="noticia-subTitulo"> <?= $noticia["subTitulo"] ?></p>
				</div>
			<?php
				}
			?>
			</div>
			<div class="noticias-especificas">
			</div>
	</div>
</body>
</html>