<?php
use Vendor\Lib\ViewUtil;
?>

<input type="hidden" name="id" value="<?= $noticia->getId() ?>"/>
	
	<?php 
	$errors = $viewBag["errors"];
	
	foreach ($errors as $erro) {
		?>
		<li>
		<?php
		echo "$erro";
		?>
		</li>
		<?php
	}
	?>

	titulo: <input type="text" name="titulo" value="<?= $noticia->getTitulo() ?>"/><br/>
	sub-titulo: <input type="text" name="subTitulo" value="<?= $noticia->getSubTitulo() ?>"/><br/>
	Categoria: <input type="text" name="categoria" value="<?= $noticia->getCategoria() ?>"/><br/>
	Conteudo: <input type="text" name="conteudo" value="<?= $noticia->getConteudo() ?>"/><br/>
	<strong>Destaque</strong>
	<?= ViewUtil::MakeCheckBox("destaque","principal",$noticia->getDestaque()!="normal",["class"=>"destaque"]); ?>
	<div class="destaque-opcoes">
		<label><?=  ViewUtil::MakeRadioButton("destaque","principal",$noticia->getDestaque()); ?>Principal</label>
		<label><?=  ViewUtil::MakeRadioButton("destaque","secundaria",$noticia->getDestaque()); ?>Secundaria</label>
</div>