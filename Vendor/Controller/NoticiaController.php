<?php
namespace Vendor\Controller;
use Vendor\Lib\View;
use Vendor\DAO\NoticiaDAO;
use Vendor\Model\Noticia;
use Vendor\Factory\ConnectionFactory;

class NoticiaController{
	private $noticiaDao;

	public function __construct(){
		$con = ConnectionFactory::getConnection();
		$this->noticiaDao = new NoticiaDAO($con);
	}

	public function index(){
		$noticias = $this->noticiaDao->lista();
		$view = new View("index","Noticia");
		$view->addAttribute("noticias",$noticias);
		return $view;
	}
	public function mostra(){
		$view = new View("mostra","Noticia");
		$id = $_GET["id"];
		$noticia = $this->noticiaDao->buscaPorId($id);
		$view->addAttribute("noticia",$noticia);
		return $view;
	}
	public function formulario(){
		$view = new View("formulario", "Noticia");
		return $view;
	}
	public function adiciona(){
		$noticia = new Noticia();
		foreach($_POST as $key => $value){
			$setter = "set".ucfirst($key);
			$noticia->$setter($value);
		}
		$this->noticiaDao->adiciona($noticia);
		return header("Location: /index.php?c=Noticia");
	}
	public function remove(){
		$id = $_GET["id"];
		$this->noticiaDao->remove($id);
		return header("Location: /index.php?c=Noticia");
	}
	public function altera(){
		$noticia = new Noticia();
		foreach($_POST as $key => $value){
			$setter = "set".ucfirst($key);
			$noticia->$setter($value);
		}
		$this->noticiaDao->altera($noticia);
		return header("Location: /index.php?c=Noticia");
	}
}