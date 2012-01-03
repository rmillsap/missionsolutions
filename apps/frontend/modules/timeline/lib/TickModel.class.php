<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TickModel
 *
 * @author robbymillsap
 */
class TickModel extends BaseModel{

    public $label;

    public function  __construct($id, $label) {
        parent::__construct($id);

        $this->label = $label;
    }

}
?>
