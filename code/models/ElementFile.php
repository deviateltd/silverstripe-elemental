<?php
class ElementFile extends BaseElement {

	private static $db = array(
		'FileDescription' => 'Text'
	);

	private static $has_one = array(
		'File' => 'File'
	);

	/**
	 * @var string
	*/
	private static $type = "File";

 	/**
	 * @var string
	*/
	private static $title = "File Element";

	/**
	* @var string
	*/
	private static $cmsTitle = "File Element";

	/**
	* @var string
	*/
	private static $description = "File";

	/**
	* Defines the fields shown to the CMS users
	*/
	public function getCMSFields(){
		$fields = parent::getCMSFields();

		$uploadField = UploadField::create('File', 'File')
			->setAllowedFileCategories('doc')
			->setAllowedMaxFileNumber(1)
			->setFolderName('Uploads/files');
		$fields->addFieldToTab('Root.Content',$uploadField);

		$desc = TextareaField::create('FileDescription', 'Description');
		$desc->setRightTitle('Optional');
		$fields->addFieldToTab('Root.Content',$desc);

		$this->extend('updateCMSFields', $fields);

		return $fields;
	}
}

class ElementFile_Controller extends BaseElement_Controller {

}