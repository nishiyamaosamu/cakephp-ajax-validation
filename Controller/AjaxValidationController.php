<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         DebugKit 1.1
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Security', 'Utility');

/**
 * DebugKit ToolbarAccess Controller
 *
 * Allows retrieval of information from the debugKit internals.
 *
 * @since         DebugKit 1.1
 */
class AjaxValidationController extends AppController {

/**
 * name
 *
 * @var string
 */
  public $name = 'AjaxValidation';

/**
 * Helpers
 *
 * @var array
 */
  public $helpers = array();

/**
 * Components
 *
 * @var array
 */
  public $components = array('RequestHandler');

/**
 * Get a stored history state from the toolbar cache.
 *
 * @return string
 */
  public function action() {
    // デバッグ情報出力を抑制
    //Configure::write('debug', 0);
    // ajax用のレイアウトを使用
    $this->layout = "ajax";

    if (!empty($this->request->data)) {
      $m = $this->request->data['model'];
      $f = $this->request->data['field'];
      $d[$m][$f] = $this->request->data['val'];
      $this->loadModel($m);
      $this->$m->set( $d );
      if( $this->$m->validates(array( 'fieldList' => array($f)))){
          $this->set('r', null);
      }else{
          $this->set('r', $this->$m->validationErrors[$f][0]);
      }
    }else{

    }
  }

}
