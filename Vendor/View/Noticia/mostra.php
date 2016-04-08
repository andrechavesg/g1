<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="Vendor/View/CSS/bootstrap.css">
	<link rel="stylesheet" href="Vendor/View/CSS/formulario.css">
	<title>Formulario de alteração de noticias</title>
</head>
<body>
<form role="form" action="index.php?c=Noticia&m=Altera" method="POST">
	<?php
		$noticia = $viewBag["noticia"];
		include "Vendor/View/_Shared/form-noticia.php";
	?>
	<button class="btn btn-success" type="submit">alterar</button>
</form>
</body>
</html>