<?php
namespace Craft;

class RosettaTwigExtension extends \Twig_Extension
{
	protected $env;

	public function getName()
	{
		return 'Rosetta Twig Tools';
	}

	public function getFilters()
	{
		return [
			'pr' => new \Twig_Filter_Method($this, 'pr'),
			'vd' => new \Twig_Filter_Method($this, 'vd'),
			'wrap' => new \Twig_Filter_Method($this, 'wrap'),
		];
	}

	public function getFunctions()
	{
		return [
			'pr' => new \Twig_Function_Method($this, 'pr'),
			'vd' => new \Twig_Function_Method($this, 'vd'),
			'wrap' => new \Twig_Function_Method($this, 'wrap'),
		];
	}

	public function initRuntime(\Twig_Environment $env)
	{
		$this->env = $env;
	}

	/**
	 * print_r an array or object
	 *
	 * @todo Stylesheet for pretty printing
	 * @param  object $var
	 * @return string HTML
	 */
	public function pr($var)
	{
		$out = $this->_extract($var);
		return new \Twig_Markup("<pre>".print_r($out, true)."</pre>", $this->env->getCharset());
	}

	/**
	 * var_dump an array or object
	 *
	 * @todo Check if xdebug is on, otherwise wrap it in <pre><code>
	 * @param  object $var
	 * @return string HTML
	 */
	public function vd($var)
	{
		$out = $this->_extract($var);
		return new \Twig_Markup(var_dump($out), $this->env->getCharset());
	}

	/**
	 * Extract variables
	 *
	 * @todo Check that its an array or data or a method, output response
	 * @param  array $var
	 * @return array
	 */
	private function _extract($var)
	{
		if (is_array($var)) {
			foreach ($var as $key => $value) {
				if (is_object($value)) {
					if (method_exists($value, '__toString')) {
						$var[$key] = sprintf('%s', $value);
					}
				}
			}
		}
		return $var;
	}

	/**
	 * Wrap a variable in a tag
	 *
	 * @param [type] $content [description]
	 * @param string $tag     [description]
	 * @param string $html    [description]
	 */
	public function wrap($content, $tag="span", $html='')
	{
		foreach(preg_split("/((\r?\n)|(\r\n?))/", $content) as $line) {
			$html .= "<$tag>" . $line . "</$tag>";
		}
		return $html;
	}

}
