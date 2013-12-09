Cakephp Ajax Validation
=======================

Cakephp ajax validation plugin


Requirements
------------
* CakePHP >= 2.0
* Jquery >= 1.7


Installation
------------
* Clone/Copy the files in this directory into `app/Plugin/AjaxValidation`
* Ensure the plugin is loaded in `app/Config/bootstrap.php` by calling `CakePlugin::load('AjaxValidation');`
* Include the helper in your `AppController.php` or a specific Controller:(Ex. Controller/UsersController.php)
    * `public $helpers = array('AjaxValidation.AjaxValidation');`
* Set some validations in your Models.(Ex. Model/User.php)
* Set only `$this->AjaxValidation->active();` in your View you want to use AjaxValidation.(Ex. Users/add.ctp)


Usage
------------
* When a cursol go out of a form, run validation immediately from models validation settings.


Sample
------------
not yet...
