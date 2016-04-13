<?php 
namespace Vendor\Validator;

class ValidatorNoticia{
	public static function ValidaNoticia($noticia){
		$errors = [];
		$titulo = $noticia->getTitulo();
		if($titulo==null or strlen($titulo)<=8){
			array_push($errors, "Titulo precisa ter 8, ou mais, caracteres");
		}
		
		$subTitulo = $noticia->getSubTitulo();
		if($subTitulo==null or strlen($subTitulo)<=10){
			array_push($errors, "Sub Titulo precisa ter 10, ou mais, caracteres");
		}

		$categoria = $noticia->getCategoria();
		if($categoria==null or strlen($categoria)<=8){
			array_push($errors, "Categoria precisa ter 8, ou mais, caracteres");
		}
		
		$conteudo = $noticia->getConteudo();
		if($conteudo==null or strlen($conteudo)<=120){
			array_push($errors, "Conteudo precisa ter 120, ou mais, caracteres");
		}
		return $errors;
	}
}