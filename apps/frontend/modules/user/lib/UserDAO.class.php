<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserDAO
 *
 * @author robbymillsap
 */
class UserDAO {

    public static function setPassword($userId, $password) {
        $userDb = UserPeer::retrieveByPK($userId);
        $userDb->setPassword(md5($password));
        if($userDb->isModified())
            UserPeer::doUpdate ($userDb);
    }

    public static function updateUser( UserModel $user) {
        $userDb = UserPeer::retrieveByPK($user->id);
        $userDb->setFirstName($user->firstName);
        $userDb->setLastName($user->lastName);
        $userDb->setTitle($user->title);
        $userDb->setEmail($user->email);

        if($userDb->isModified())
            UserPeer::doUpdate ($userDb);
    }

    public static function getUserByEmail( $email ) {
        $c = new Criteria();
        $c->add(UserPeer::EMAIL, $email);

        $userDb = UserPeer::doSelectOne($c);
        if($userDb)
            return self::_toUser($userDb);
        else
            return null;
    }

    public static function get( $userId) {
        return self::_toUser(UserPeer::retrieveByPK($userId));
    }

    public static function createUser( $email, $password, $type) {

        $c = new Criteria();
        $c->add(UserPeer::EMAIL, $email);
        $user = UserPeer::doSelectOne($c);
        
        if(!$user) {
            $user = new User();
            $user->setEmail( $email );
            $user->setPassword( md5( $password ));

            $newId = UserPeer::doInsert( $user );
            $user->setId($newId);
        }else {
            $user->setEmail( $email );
            $user->setPassword( md5( $password ));

            if($user->isModified())
                UserPeer::doUpdate ($user);
        }


        return self::_toUser( $user );
    }

    public static function getUserForLogin( $email, $pass ) {
        $c = new Criteria();
        $c->add( UserPeer::EMAIL, $email );
        $c->add( UserPeer::PASSWORD, md5($pass) );

        $userDb = UserPeer::doSelectOne( $c );

        if( $userDb ) return self::_toUser ( $userDb );

        return null;
    }

    public static function getUserTypeDb( $code ) {
        $c = new Criteria();
        $c->add( UserTypePeer::CODE, $code);

        return UserTypePeer::doSelectOne( $c );
    }

    public static function isEmailUnique( $email ) {

        $c = new Criteria();
        $c->add(UserPeer::EMAIL, $email);
        $c->add(UserPeer::PASSWORD, null, Criteria::ISNOTNULL);

        $count = UserPeer::doCount( $c );

        return ($count == 0) ? 1 : 0;
    }

    private static function _toUser( User $userDb ) {

        return new UserModel(   $userDb->getId(),
                                $userDb->getUsername(),
                                $userDb->getEmail()
                                );
    }

}


?>
