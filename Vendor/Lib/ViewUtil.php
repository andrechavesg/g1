<?php 
namespace Vendor\Lib;
class ViewUtil {

	public static function MakeRadioButton($name,$value,$checkedValue,$htmlAttributes = []) {
		$atributos = self::criaHtmlAtributos($htmlAttributes);

		if($value == $checkedValue) {
			$html = "<input type='radio' name='{$name}' value='{$value}' checked=\"checked\" {$atributos}>";
		}else {
			$html = "<input type='radio' name='{$name}' value='{$value}' {$atributos}>";
		}

		return $html;
	}

	public static function MakeCheckBox($name,$value,$checked,$htmlAttributes = []) {
		
		$atributos = self::criaHtmlAtributos($htmlAttributes);

		if($checked) {
			$html = "<input type='checkbox' name='{$name}' value='{$value}' checked=\"checked\" {$atributos}>";
		}else {
			$html = "<input type='checkbox' name='{$name}' value='{$value}' {$atributos}>";
		}

		return $html;
	}

	private static function criaHtmlAtributos($htmlAttributes = []) {
		$atributos = [];

		foreach($htmlAttributes as $key => $value) {
			$atributos[] = "{$key}=\"{$value}\""; 
		}

		$atributos = implode(" ",$atributos);

		return $atributos;
	}
}