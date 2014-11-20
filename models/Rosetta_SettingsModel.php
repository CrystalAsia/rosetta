<?php
namespace Craft;

/**
* Settings Model
*/
class Rosetta_SettingsModel extends BaseModel
{

	protected function defineAttributes()
	{
		return [
			'pluginNameOverride'  => AttributeType::String
		];
	}
}