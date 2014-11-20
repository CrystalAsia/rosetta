<?php
namespace Craft;

/**
* Template Variables
*/
class RosettaVariables
{

	protected $plugin;

	public function __construct()
	{
		$this->plugin = craft()->plugins->getPlugin('rosetta');
	}

	#
	#	General Settings
	#

	/**
	 * Get Plugin name
	 * @return string Plugin Name
	 */
	public function getName()
	{
		return $this->plugin->getName();
	}

	/**
	 * Get Plugin version
	 * @return string Plugin version
	 */
	public function getVersion()
	{
		return $this->plugin->getVersion();
	}


}