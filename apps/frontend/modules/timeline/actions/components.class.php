<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of components
 *
 * @author robbymillsap
 */
class timelineComponents extends BaseComponent {
    //put your code here

    public function executeShow(){
        $this->timeline = TimelineDAO::get($this->timeline_id);
    }

}
?>
