<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserModel
 *
 * @author robbymillsap
 */
class UserModel extends BaseModel {

    public $username;
    public $email;
    
    public function  __construct($id, $username, $email) {
        parent::__construct($id);

        $this->username  = $username;
        $this->email     = $email;
    }

    public function name() {
        return $this->firstName . " " . $this->lastName;
    }

}
?>
