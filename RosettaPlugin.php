<?php
namespace Craft;

/**
 * Rosetta
 *
 * Goal is to create a skeleton plugin with a page with all the elements a
 * normal plugin might need. For sure it can detect other plugins for it to
 * integrate if necessary.
 */
class RosettaPlugin extends BasePlugin
{

	function getName()
	{
		return Craft::t('Rosetta');
	}

	function getVersion()
	{
		return '1.0';
	}

	function getDeveloper()
	{
		return 'Crystal Asia';
	}

	function getDeveloperUrl()
	{
		return 'http://crystal-asia.com';
	}

	/**
	 * Has Control Panel section
	 * @return boolean
	 */
	function hasCpSection()
    {
        return true;
    }

    /**
     * Routes
     * @return array
     */
    public function registerCpRoutes()
    {
        return [];
	}

	/**
	 * Go to Rosetta home after install
	 * @return void
	 */
    public function onAfterInstall()
    {
        craft()->request->redirect(UrlHelper::getCpUrl('/rosetta/'));
    }

    public function addTwigExtension()
    {
        Craft::import('plugins.rosetta.twigextensions.RosettaTwigExtension');

        return new RosettaTwigExtension();
    }

}
