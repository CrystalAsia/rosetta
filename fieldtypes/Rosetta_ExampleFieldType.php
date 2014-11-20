<?php
namespace Craft;

/**
* Exampl FieldType
*/
class Rosetta_ExampleListFieldType extends BaseFieldType
{

	public function getName()
	{
		return Craft::t('Example List');
	}

	/**
	 * Display our FieldType
	 * @param  string $name
	 * @param  string $value
	 * @return string HTML of the input from a template
	 */
	public function getInputHtml($name, $value)
	{
		// Reformat the input name into something that looks more like an ID
		$id = craft()->templates->formatInputId($name);

		// Figure out what that ID is going to look like once it has been namespaced
		$namespacedId = craft()->templates->namespaceInputId($id);

		// Include our Javascript
		craft()->templates->includeJsResource('rosetta/js/input.js');
		craft()->templates->includeJs("$('#{$namespacedId}').example();");

		// Render the HTML
		return craft()->templates->render('example/input', [
			'name'  => $name,
			'id'    => $id,
			'value' => $value
		]);
	}

    /**
     * Define FieldType Settings
     * @return array Keys define the setting names, and values define the parameters
     */
    protected function defineSettings()
    {
    	return [];
    }

    /**
     * Returns the HTML for displaying your settings
     * @return string HTML settings
     */
    public function getSettingsHtml()
    {
    	return craft()->templates->render('rosetta/examplelist/settings', [
            'settings' => $this->getSettings()
        ]);
    }

    /**
     * Processing on the settings post data before it's saved
     * @param  string $settings
     * @return void
     */
    public function prepSettings($settings)
    {
    	return $settings;
    }

    /**
     * Set default column type other than VARCHAR(255).
     * Return false if using your own table.
     * @return void
     */
    public function defineContentAttribute()
    {
    	return AttributeType::Number;
    }

    /**
     * Processing of post values before saving to database
     * @param  string $value
     * @return string
     */
    public function prepValueFromPost($value)
    {
    	return $value;
    }

    /**
     * Processing on the fieldtype’s stored data before it can be used by the templates
     * and $this->getInputHtml()
     */
    public function prepValue($value)
    {
    	return $value;
    }

    /**
     * Called right before a field is saved.
     * @return void
     */
    public function onBeforeSave() {}

    /**
     * Called right after a field is saved, and $this->model->id is set.
     * @return void
     */
    public function onAfterSave() {}

    /**
	 * Called right after an element is saved, and $this->element->id is set.
	 * @return void
	 */
    public function onAfterElementSave() {}


}