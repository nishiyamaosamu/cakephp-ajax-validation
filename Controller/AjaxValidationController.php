<?php
/**
 * @copyright     Osamu Nishiyama
 * @link          not yet...
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

class AjaxValidationController extends AppController {

  public $name = 'AjaxValidation';

  public $helpers = array();

  public $components = array('RequestHandler');

  public function action() {
    // デバッグ情報出力を抑制
    Configure::write('debug', 0);
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
      $this->log("AjaxValidation Error");
    }
  }
}
