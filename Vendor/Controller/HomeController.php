<?php
namespace Vendor\Controller;
use Vendor\Lib\View;
use Vendor\DAO\NoticiaDAO;
use Vendor\Model\Noticia;
use Vendor\Factory\ConnectionFactory;

class HomeController{
	private $noticiaDAO;

	public function __construct(){
		$con = ConnectionFactory::getConnection();
		$this->noticiaDao = new NoticiaDAO($con);
	}
	public function index(){
		$view = new View("index","Home");
		$noticias = $this->noticiaDao->listaPorDestaque("normal");
		$noticiasPrincipais = array_slice($this->noticiaDao->listaPorDestaque("principal"),0,3);
		$noticiasSecundarias = array_slice($this->noticiaDao->listaPorDestaque("secundaria"),0,2);
		$view->addAttribute("noticiasPrincipais",$noticiasPrincipais);
		$view->addAttribute("noticiasSecundarias",$noticiasSecundarias);
		$view->addAttribute("noticias",$noticias);
		return $view;
	}
}