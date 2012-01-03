<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TimelineModel
 *
 * @author robbymillsap
 */
class TimelineModel extends BaseModel{

    public $name;
    public $user;

    public $tickArr;

    public function  __construct($id, $name, UserModel $user) {
        parent::__construct($id);
        $this->name = $name;
        $this->user = $user;
    }

}
?>
