<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Osamu Nishiyama
 * @link          
 * @since         CakeAjaxValidation 0.1
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AppHelper', 'View/Helper');

class AjaxValidationHelper extends AppHelper {



/**
 * helpers property
 *
 * @var array
 */
  public $helpers = array('Html', 'Form');

/**
 * settings property
 *
 * @var array
 */
  public $settings = array('format' => 'html', 'forceEnable' => false);

/**
 * Construct the helper and make the backend helper.
 *
 * @param $View
 * @param array|string $options
 * @return \ToolbarHelper
 */
  public function __construct($View, $options = array()) {
    parent::__construct($View, $options);
  }

/**
 * afterLayout callback
 *
 * @param string $layoutFile
 * @return void
 */
  public function afterLayout($layoutFile) {
    if (!$this->request->is('requested')) {
      pr($layoutFile);
    }
  }
  public function active(){
    $js = '/ajax_validation/js/script.js';
    echo $this->Html->script($js);
  }
}