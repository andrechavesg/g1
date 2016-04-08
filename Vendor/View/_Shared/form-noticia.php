<?php
use Vendor\Lib\ViewUtil;
?>
<input type="hidden" name="id" value="<?= $noticia["id"] ?>"/>
	titulo: <input type="text" name="titulo" value="<?= $noticia["titulo"] ?>"/><br/>
	sub-titulo: <input type="text" name="subTitulo" value="<?= $noticia["subTitulo"] ?>"/><br/>
	Categoria: <input type="text" name="categoria" value="<?= $noticia["categoria"] ?>"/><br/>
	Conteudo: <input type="text" name="conteudo" value="<?= $noticia["conteudo"] ?>"/><br/>
	<strong>Destaque</strong>
	<?=  ViewUtil::MakeCheckBox("destaque","principal",$noticia["destaque"]!="normal",["class"=>"destaque"]); ?>
	<div class="destaque-opcoes">
		<label><?=  ViewUtil::MakeRadioButton("destaque","principal",$noticia["destaque"]); ?>Principal</label>
		<label><?=  ViewUtil::MakeRadioButton("destaque","secundaria",$noticia["destaque"]); ?>Secundaria</label>
</div>