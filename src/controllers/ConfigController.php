<?php
namespace src\controllers;

use \core\Controller;
use DateTime;
use \src\handlers\UserHandler;
use \src\handlers\PostHandler;

class ConfigController extends Controller {

    private $loggedUser;

    public function __construct() {
        $this->loggedUser = UserHandler::checkLogin();
        if( $this->loggedUser === false ) {
            $this->redirect('/login');
        }
    }   

    public function index() {
        $user = UserHandler::getUser($this->loggedUser->id);

        $flash = '';
        if( !empty($_SESSION['flash']) ) {
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }

        $this->render('config_profile', [
            'loggedUser' => $this->loggedUser,
            'user' => $user,
            'flash' => $flash
        ]);
    }

    public function save() {
        $name = filter_input(INPUT_POST, 'name');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $birthdate = filter_input(INPUT_POST, 'birthdate');
        $city = filter_input(INPUT_POST, 'city');
        $work = filter_input(INPUT_POST, 'work');
        $password = filter_input(INPUT_POST, 'password');
        $confirmPassword = filter_input(INPUT_POST, 'confirmPassword');


        if(!empty($name) && !empty($email) && !empty($birthdate)  ) {
            $updateFields = [];

            $user = UserHandler::getUser($this->loggedUser->id);

            $birthdate = explode('/', $birthdate);
            if( count($birthdate) != 3 ) {
                $_SESSION['flash'] = 'Data de nascimento inválida.';
                $this->redirect('/config');
            }

            if( $user->email != $email ) {
                if( UserHandler::emailExists($email) ) {
                    $updateFields['email'] = $email;
                } else {
                    $_SESSION['flash'] = 'Este e-mail já está em uso.';
                    $this->redirect('/config');
                }                             
            }

        
            $birthdate = $birthdate[2].'-'.$birthdate[1].'-'.$birthdate[0];                
            if( strtotime($birthdate) == false) {
                $_SESSION['flash'] = 'Data de nascimento inválida.';
                $this->redirect('/config');
            }
            $updateFields['birthdate'] = $birthdate;


            if(!empty($password) ) {
                if($password === $confirmPassword) {
                    $updateFields['password'] = $password;         
                } else {
                    $_SESSION['flash'] = 'As não conferem.';
                    $this->redirect('/config');   
                }
            }
            
            $updateFields['name'] = $name;
            $updateFields['city'] = $city;
            $updateFields['work'] = $work;

            UserHandler::updateUser($updateFields, $this->loggedUser->id);

            $this->redirect('/config');


        } else {
            $_SESSION['flash'] = 'Os campos nome, data de nascimento e e-mail são obrigatorio.';
            $this->redirect('/config');
        }


    }

    

}