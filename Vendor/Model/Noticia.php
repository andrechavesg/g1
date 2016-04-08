<?php
namespace Vendor\Model;
class Noticia{
	private $id;
	private $titulo;
	private $subTitulo;
	private $categoria;
	private $conteudo;
	private $desatque;
	private $dataCadastro;
	private $dataUltimaAtualizacao;
	private $qtdViews;

	public function getId(){
		return $this->id;
	}
	public function setId($id){
		$this->id = $id;
	}

	public function getTitulo(){
		return $this->titulo;
	}
	public function setTitulo($titulo){
		$this->titulo = $titulo;
	}

	public function getSubTitulo(){
		return $this->subTitulo;
	}
	public function setSubTitulo($subTitulo){
		$this->subTitulo = $subTitulo;
	}

	public function getCategoria(){
		return $this->categoria;
	}
	public function setCategoria($categoria){
		$this->categoria = $categoria;
	}

	public function getConteudo(){
		return $this->conteudo;
	}
	public function setConteudo($conteudo){
		$this->conteudo = $conteudo;
	}

	public function getDataCadastro(){
		return $this->dataCadastro;
	}
	public function setDataCadastro($dataCadastro){
		$this->dataCadastro = $dataCadastro;
	}

	public function getDataUltimaAtualizacao(){
		return $this->dataUltimaAtualizacao;
	}	
	public function setDataUltimaAtualizacao($dataUltimaAtualizacao){
		$this->dataUltimaAtualizacao = $dataUltimaAtualizacao;
	}

	public function getQtdViews(){
		return $this->qtdViews;
	}
	public function setQtdViews($qtdViews){
		$this->qtdViews = $qtdViews;
	}

	public function getDestaque(){
		if(is_null($this->destaque)){
			$this->setDestaque("normal");
		}
		return  $this->destaque;
	}

	public function setDestaque($destaque){
		$this->destaque = $destaque;
	}
}