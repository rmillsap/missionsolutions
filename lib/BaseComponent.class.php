<?php

abstract class BaseComponent extends sfComponents{

    public function  __construct($context, $moduleName, $actionName) {
        parent::__construct($context, $moduleName, $actionName);

        $this->currentUser   = $this->getCurrentUser();
        $this->currentVendor = $this->getVendor();
    }

    public function getCurrentUser() {
        $user = $this->getUser()->getAttribute("UserModel");
        return $user;
    }

    public function setCurrentUser(UserModel $user) {
        $this->getUser()->setAttribute("UserModel", $user);
        $this->getUser()->setAuthenticated( $user != null );
    }

    public function setVendor( VendorModel $vendor ) {
        $this->getUser()->setAttribute( "VendorModel", $vendor );
    }

    public function getVendor() {
        return $this->getUser()->getAttribute( "VendorModel" );
    }

}

?>
