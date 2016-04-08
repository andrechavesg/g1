<!DOCTYPE html>
<html>
<head>
	<title>Listagem de Noticias</title>
	<link rel="stylesheet" href="Vendor/View/CSS/bootstrap.css">
</head>
<body>
	<div class="container">
	<h1>Noticias</h1>
	<table class="table-striped table-bordered">
		<thead>
			<tr>
				<td>Titulo</td>
				<td>Sub-Titulo</td>
				<td>Categoria</td>
				<td>Data de Cadastro</td>
				<td>Data da ultima atualizacao</td>
				<td>Quantidade de views</td>
				<td>Destaque</td>
				<td>alterar</td>
				<td>Remover</td>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach($viewBag["noticias"] as $noticia) {
			?>
			<tr>
				<td><?= $noticia["titulo"] ?></td>
				<td><?= $noticia["subTitulo"] ?></td>
				<td><?= $noticia["categoria"] ?></td>
				<td><?= $noticia["dataCadastro"] ?></td>
				<td><?= $noticia["dataUltimaAtualizacao"] ?></td>
				<td><?= $noticia["qtdViews"] ?></td>
				<td><?= $noticia["destaque"] ?></td>
				<td>
				<a href="/index.php?c=Noticia&m=mostra&id=<?=$noticia['id']?>">
				<button class="btn btn-warning">alterar</button>
				</a>
				</td>
				<td>
				<a href="/index.php?c=Noticia&m=remove&id=<?=$noticia['id']?>">
				<button class="btn btn-danger">remover</button>
				</a>
				</td>
			</tr>	
			<?php
			}
			?>
		</tbody>
	</table>
	<a href="/index.php?c=Noticia&m=formulario"><button class="btn btn-success">adicionar</button></a>
</body>
</html>