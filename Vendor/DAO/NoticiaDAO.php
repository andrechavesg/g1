<?php
namespace Vendor\DAO;
use Vendor\Model\Noticia;
use Vendor\Validator\ValidatorNoticia;
class NoticiaDAO{
	private $con;
	public function __construct(\PDO $con){
		$this->con = $con;
	}
	
	private function bindNoticia($query, $noticia){
		$stm = $this->con->prepare($query);
		$stm->bindValue(":titulo",$noticia->getTitulo());
		$stm->bindValue(":subTitulo",$noticia->getSubTitulo());
		$stm->bindValue(":categoria",$noticia->getCategoria());
		$stm->bindValue(":conteudo",$noticia->getConteudo());
		$stm->bindValue(":dataUltimaAtualizacao",date("Y-m-d H:i:s"));
		$stm->bindValue(":destaque",$noticia->getDestaque());
		return $stm;
	}

	public function adiciona(Noticia $noticia){		
		$query = "INSERT into Noticia (titulo,subTitulo,categoria,conteudo,dataCadastro,".
		"dataUltimaAtualizacao,destaque) values ".
		"(:titulo,:subTitulo,:categoria,:conteudo,:dataCadastro,:dataUltimaAtualizacao,:destaque)";
		
		$stm = $this->bindNoticia($query, $noticia);
		$stm->bindValue(":dataCadastro",date("Y-m-d H:i:s"));
		$stm->execute();
	}

	public function altera(Noticia $noticia){
		$query = "UPDATE Noticia SET titulo=:titulo, subTitulo=:subTitulo, categoria=:categoria, ".
		"conteudo=:conteudo, dataUltimaAtualizacao=:dataUltimaAtualizacao, destaque=:destaque WHERE id=:id";
		
		$stm = $this->bindNoticia($query, $noticia);
		$stm->bindValue(":id",$noticia->getId());
		$stm->execute();
	}

	public function remove(int $id){
		$query = "DELETE from Noticia where id=:id";
		$stm = $this->con->prepare($query);
		$stm->bindValue(":id",$id);
		$stm->execute();
	}

	public function lista(){
		$query = "SELECT * FROM Noticia";
		$stm = $this->con->prepare($query);
		$stm->execute();
		$noticias = $stm->fetchAll(\PDO::FETCH_ASSOC);
		return $noticias;
	}

	public function listaPorDestaque($destaque){
		$query = "SELECT * FROM Noticia WHERE destaque = :destaque ORDER BY dataUltimaAtualizacao";
		$stm = $this->con->prepare($query);
		$stm->bindValue(":destaque",$destaque);
		$stm->execute();
		$noticias = $stm->fetchAll(\PDO::FETCH_ASSOC);
		rsort($noticias);
		return $noticias;
	}
	
	public function buscaPorId(int $id){
	  $query = "SELECT * FROM Noticia WHERE id=:id";
	  $stm = $this->con->prepare($query);
	  $stm->execute(array(":id"=>$id));
	  $noticia = new Noticia();
	  $noticiaArray = $stm->fetch(\PDO::FETCH_ASSOC);
	  $noticia->setId($id);
	  $noticia->setTitulo($noticiaArray["titulo"]);
	  $noticia->setSubTitulo($noticiaArray["subTitulo"]);
	  $noticia->setCategoria($noticiaArray["categoria"]);
	  $noticia->setConteudo($noticiaArray["conteudo"]);
	  $noticia->setDestaque($noticiaArray["destaque"]);
	  return $noticia;
	}
}