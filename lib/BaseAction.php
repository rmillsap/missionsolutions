<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BaseAction
 *
 * @author robbymillsap
 */
class BaseAction extends sfActions{

    public function setMsg( $msg ) {
        $this->getUser()->setAttribute("msg", $msg );
    }

    public function setErrorMsg( $msg ) {
        $this->getUser()->setAttribute("errorMsg", $msg );
    }

    public function login( UserModel $user ) {
        $this->setCurrentUser($user);
    }

    public function clearCurrentUser() {
        $this->getUser()->setAttribute("user", null);
        $this->currentUser = null;
        $this->getUser()->setAuthenticated(false);
    }

    public function  __construct($context, $moduleName, $actionName) {
        parent::__construct($context, $moduleName, $actionName);
        $this->errorMap    = array();
        $this->currentUser = $this->getCurrentUser();
    }

    public function hasErrors( Array $fieldNameArr ) {

        $request = $this->getRequest();

        foreach($fieldNameArr as $fieldName) {
            if(!$request->hasParameter($fieldName) || trim($request->getPostParameter($fieldName)) == "")
                $this->addError( $fieldName, strtoupper (substr($fieldName, 0, 1)) . substr($fieldName, 1) . " is required" );
        }

        return count($this->errorMap) > 0;
    }

    public function getCurrentUser() {
        $user = $this->getUser()->getAttribute("user");
        //if(!$user && isset($_COOKIE["user_id"])) {
            //$user = UserDAO::getUserById($_COOKIE["user_id"]);
        //}

        return $user;
    }

    public function setCurrentUser(UserModel $user) {
        $this->getUser()->setAttribute("user", $user);
        $this->getUser()->setAuthenticated( $user != null );
    }

    public function addError($fieldName, $message) {
        $this->errorMap[$fieldName] = $message;
    }

}
?>
