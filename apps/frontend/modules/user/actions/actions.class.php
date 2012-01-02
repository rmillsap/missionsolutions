<?php

/**
 * user actions.
 *
 * @package    PhpProject1
 * @subpackage user
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class userActions extends BaseAction
{

  public function executeResetPassword(sfWebRequest $request) {
      $this->x = $request->getParameter("x");
      $this->pass1 = $request->getPostParameter("password1");
      $this->pass2 = $request->getPostParameter("password2");

      if($this->pass1 == "" || $this->pass2 == "") {
          $this->setErrorMsg("Password and Password Confirm are Required!");
          return;
      }elseif($this->pass1 != $this->pass2) {
          $this->setErrorMsg("Password and Password Confirm Do Not Match!");
      }else {
          $u = UserDAO::getUserForPasswordRecovery($this->x);
          UserDAO::setPassword($u->id, $this->pass1);
          $this->login($u);
          $this->redirect("dashboard/index");
      }
  }

  public function executeRecover(sfWebRequest $request) {

      if($request->getMethod() != "POST") return;

      $this->email = $request->getPostParameter("email");
      if(!$this->email) return;

      if( UserDAO::resetPassword($this->email) ) {
        $this->setMsg("Your password has been sent to " . $this->email);
      }else {
        $this->setErrorMsg("That email address was not found in our system");
        $this->redirect("user/recover");
      }
      
  }

  public function executeLogin(sfWebRequest $request) {
      if($request->getMethod() != "POST") return;

      $this->username = $request->getParameter("username");
      $this->password = $request->getParameter("password");

      $this->user = UserDAO::getUser($this->username, $this->password);

      if(!$this->user) {
        $this->clearCurrentUser ();
        $this->setErrorMsg( "User name or password not found" );
      }else {
          $this->login($this->user);
          $this->redirect("dashboard/index");
      }
  }

  public function executeNew(sfWebRequest $request) {
      if($request->getMethod() != "POST") return;

      $this->username = $request->getPostParameter("username");

      if(!$this->username)
        return $this->setErrorMsg ("Username is a required field!");

      $this->user = UserDAO::getUser($this->username);
      if($this->user)
        return $this->setErrorMsg("That username is already in use!");

      $this->password1 = $request->getPostParameter("password1");
      $this->password2 = $request->getPostParameter("password2");

      if( !$this->password1 || !$this->password2 )
        return $this->setErrorMsg("Password is a required field");

      if( $this->password1 != $this->password2 )
        return $this->setErrorMsg("Password and password confirm must match!");

      $this->email = $request->getPostParameter("email");

      $this->user = UserDAO::createUser($this->username, $this->password1, $this->email);
      $this->login($this->user);
      $this->redirect("dashboard/index");
  }

  
  public function executeLogout(sfWebRequest $request) {
      $this->clearCurrentUser();
      $this->redirect("user/login");
  }



}
