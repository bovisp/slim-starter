<?php

namespace App\TwigExtensions;

class MethodField extends \Twig_Extension
{
	public function getFunctions()
	{
		return [
			new \Twig_SimpleFunction('method_field', array($this, 'methodField'))
		];
	}

	public function methodField($verb)
	{
		echo "<input type=\"hidden\" name=\"_METHOD\" value=\"{$verb}\" />";
	}
}