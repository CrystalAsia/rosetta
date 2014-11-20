<?php
namespace Craft;

/**
* Settings Record
*/
class Rosetta_SettingsRecord extends BaseRecord
{
	public function getTableName()
	{
		return 'rosetta_settings';
	}

	protected function defineAttributes()
	{
		return [
			'name' => AttributeType::String
		];
	}

	public function defineIndexes()
	{
		return [
			['columns' => ['name'], 'unique' => true]
		];
	}

	public function defineRelations() {}

}