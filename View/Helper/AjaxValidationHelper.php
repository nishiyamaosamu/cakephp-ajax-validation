<?php
/**
 * @copyright     Osamu Nishiyama
 * @link          not yet...
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AppHelper', 'View/Helper');

class AjaxValidationHelper extends AppHelper {

  public $helpers = array('Html', 'Form');

  public $settings = array('format' => 'html', 'forceEnable' => false);

  public function __construct($View, $options = array()) {
    parent::__construct($View, $options);
  }

  public function active(){
    $js = '/ajax_validation/js/script.js';
    echo $this->Html->script($js);
  }
}