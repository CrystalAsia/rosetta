<?php
namespace Craft;

/**
 * Settings Widget
 */
class RosettaSettingswidget extends BaseWidget
{

	protected $colspan = 1;

	/**
	 * Widget Name
	 * @return string Widget name
	 */
	public function getName()
	{
		return Craft::t('Settings');
	}

	/**
	 * Returns your widget’s body HTML
	 * @return string HTML from template
	 */
	public function getBodyHtml()
	{
		$cocktails = craft()->Rosetta->getSettings();

		return craft()->templates->render('rosetta/_widgets/recentcocktails/body', array(
			'cocktails' => $cocktails,
			));
	}

	/**
	 * Colspan might depend on other factors
	 * @return int colspan
	 */
	public function getColspan()
	{
		return $this->getSettings()->colspan;
	}

	/**
	 * Define widget settings
	 * @return array
	 */
	protected function defineSettings()
	{
		return [];
	}

	/**
	 * Returns HTML for the settings
	 * @return string HTML from template
	 */
	public function getSettingsHtml()
	{

	}

}
