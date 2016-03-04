<?php

use Website\Controller\Useraware;
use Pimcore\Model\Object\User;

class ExampleController extends Useraware{

	public function exampleAction(){
		$this->enableLayout();

	}

	public function loginAction(){
		$this->enableLayout();

		if( strlen( $this->getParam( 'email' ) ) > 0 && strlen( $this->getParam( 'password' ) ) > 0 ){
			$auth = \Zend_Auth::getInstance();
			$auth->clearIdentity();

			$email = $this->getParam( "email" );
			$password = $this->getParam( "password" );

			$authAdapter = new AuthAdapter( $email, $password );
			$result = $auth->authenticate( $authAdapter );
			if( $result->isValid() ){
				$identity = \Zend_Auth::getInstance()->getIdentity();
				$this->redirect( $this->view->getProperty( 'logged-in' )->getFullPath() );
			}else{
				$this->view->error = [ 'user' => 'E-Mail / Passwort falsch.' ];
			}
		}
	}

	/**
	 * Neuen User erstellen
	 */
	public function registerAction(){
		$this->enableLayout();

		if( (int) $this->getParam( 'sendRegister' ) == 1 ){

			$user = User::getByEmail( $this->view->escape( $this->getParam( 'email' ) ), [ 'limit' => 1,
				'unpublished' => true ] );
			if( $user instanceof User ){
				$this->view->error = [ 'user' => 'User bereits vorhanden. <a href="/de/login">Login</a>' ];
			}else{

				$password = password_hash( $this->getParam( 'password' ), PASSWORD_DEFAULT );

				$newUser = new User();
				$newUser->setParentId( 27 );
				$newUser->setKey( Pimcore\File::getValidFilename( $this->view->escape( $this->getParam( 'username' ) ) ) );
				$newUser->setUsername( $this->view->escape( $this->getParam( 'username' ) ) );
				$newUser->setPublished( 1 );
				$newUser->setPassword( $password );
				$newUser->setEmail( $this->view->escape( $this->getParam( 'email' ) ) );
				$newUser->save();

				$this->redirect( $this->view->getProperty( 'login-url' ) );
			}

		}

	}

}
