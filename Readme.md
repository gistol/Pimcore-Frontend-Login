Pimcore Fronend Login
=====================

 

How to install:

1.) Copy files in your website Folder.
2.) Add this lines to your Action.php

```php
<?php
if( \Zend_Auth::getInstance()->hasIdentity() ){
    $ident = \Zend_Auth::getInstance()->getIdentity();
    $member = \Pimcore\Model\Object\User::getById( $ident[ 'id' ] );

    $this->currentMember = $member;
    $this->view->currentMember = $member;
}
?>
```