<?php
namespace Vendor\DAO;
use Vendor\Model\Noticia;
class NoticiaDAO{
	private $con;
	public function __construct(\PDO $con){
		$this->con = $con;
	}

	public function adiciona(Noticia $noticia){
		try{
			$query = "insert into Noticia (titulo,subTitulo,categoria_id,conteudo,dataCadastro,".
			"dataUltimaAtualizacao,destaque) values ".
			"(:titulo,:subTitulo,:categoria_id,:conteudo,:dataCadastro,:dataUltimaAtualizacao,:destaque)";
			
			$stm = $this->con->prepare($query);
			$stm->bindValue(":titulo",$noticia->getTitulo());
			$stm->bindValue(":subTitulo",$noticia->getSubTitulo());
			$stm->bindValue(":categoria_id",$noticia->getCategoria());
			$stm->bindValue(":conteudo",$noticia->getConteudo());
			$stm->bindValue(":dataCadastro",date("Y-m-d H:i:s"));
			$stm->bindValue(":dataUltimaAtualizacao",date("Y-m-d H:i:s"));
			$stm->bindValue(":destaque",$noticia->getDestaque());
			$stm->execute();
		}
		catch(PDOException $e){
			echo $e->getMessage(); 
		}
	}

	public function altera(Noticia $noticia){
		try{
		$query = "UPDATE Noticia SET titulo=:titulo, subTitulo=:subTitulo, categoria=:categoria, ".
		"conteudo=:conteudo, dataUltimaAtualizacao=:dataUltimaAtualizacao, destaque=:destaque WHERE id=:id";

			$stm = $this->con->prepare($query);
			$stm->bindValue(":titulo",$noticia->getTitulo());
			$stm->bindValue(":subTitulo",$noticia->getSubTitulo());
			$stm->bindValue(":categoria",$noticia->getCategoria());
			$stm->bindValue(":conteudo",$noticia->getConteudo());
			$stm->bindValue(":dataUltimaAtualizacao",date("Y-m-d H:i:s"));
			$stm->bindValue(":destaque",$noticia->getDestaque());
			$stm->bindValue(":id",$noticia->getId());
			$stm->execute();
			}
		catch(PDOException $e){
			echo $e->getMessage(); 
		}	
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
	  $noticia=$stm->fetch(\PDO::FETCH_ASSOC);
	  return $noticia;
	}
}