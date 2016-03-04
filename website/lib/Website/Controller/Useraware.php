<?php

namespace Website\Controller;

use Pimcore\Model;
use Pimcore\Tool;

class Useraware extends Action {

    public function init () {

        parent::init();

        $pimUser = false;
        if(\Pimcore\Tool::isFrontentRequestByAdmin()) {
            $pimUser = \Pimcore\Tool\Admin::getCurrentUser();
            if ($pimUser) {
                //echo "IS ADMIN";
            }
        }

        //$identity = \Zend_Auth::getInstance()->getIdentity();

        if( !$pimUser && !$this->currentMember ) {
            $this->redirect( $this->view->getProperty('login-url') );
        }


    }

}

