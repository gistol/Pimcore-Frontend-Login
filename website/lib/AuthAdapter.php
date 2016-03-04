<?php
namespace Website;

use Pimcore\Model\Object\User;

class AuthAdapter implements \Zend_Auth_Adapter_Interface {

    protected $password;
    protected $email;

    public function __construct($email, $password) {
        $this->email= $email;
        $this->password = $password;
    }


    public function authenticate() {
        $member = User::getByEmail( $this->email, [ 'limit' => 1 ] );
        if($member instanceof User ) {
            $verifiedPassword = password_verify( $this->password, $member->getPassword() );
            var_dump($verifiedPassword);
            if($verifiedPassword === true && ($member->getEmail() == $this->email) && $member->isPublished() ) {
                return new \Zend_Auth_Result(\Zend_Auth_Result::SUCCESS, [
                    'id' => $member->getId(), 
                    'email' => $member->getUsername(), 
                    'username' => $member->getUsername()
                ]);
            } else {
                return new \Zend_Auth_Result(\Zend_Auth_Result::FAILURE_CREDENTIAL_INVALID, null);
            }
        } else {
            return new \Zend_Auth_Result(\Zend_Auth_Result::FAILURE_CREDENTIAL_INVALID, null);
        }
    }

}
