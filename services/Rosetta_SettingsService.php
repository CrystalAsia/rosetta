<?php
namespace Craft;

/**
 * Settings Service
 */
class Rosetta_SettingsService extends BaseApplicationComponent
{

	/**
	 * Accessible anywhere via craft()->Rosetta_settings->saveSettings($settings);
	 * @param  array $settings
	 * @return bool
	 */
	public function saveSettings($settings)
	{
		$settings = JsonHelper::encode($settings);

		$affectedRows = craft()->db->createCommand()->update('plugins',
			['settings' => $settings],
			['class' => 'Rosetta']
		);
		return (bool) $affectedRows;
	}

}
