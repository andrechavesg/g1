<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="Vendor/View/CSS/reset.css">
	<link rel="stylesheet" href="Vendor/View/CSS/bootstrap.css">
	<link rel="stylesheet" href="Vendor/View/CSS/formulario.css">
	<title>Formulario de inserção de noticias</title>
</head>
<body>
<form role="form" action="index.php?c=Noticia&m=Adiciona" method="POST">
	<?php 
		$noticia = ["id" => "", "titulo" => "", "subTitulo" => "", "categoria" => "", "conteudo" => "", "destaque" => ""];
		include "Vendor/View/_Shared/form-noticia.php";
	?>
<button class="btn btn-warning" type="submit">Salvar</button>
</form>
</body>
</html>