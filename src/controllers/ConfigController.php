<?php
namespace src\controllers;

use ClanCats\Hydrahon\Query\Sql\Update;
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

            // Avatar
            if(isset($_FILES['avatar']) && !empty($_FILES['avatar']['tmp_name']) ) {
                $newAvatar = $_FILES['avatar'];

                if( in_array($newAvatar['type'], ['image/jpeg', 'image/jpg', 'image/png']) ) {
                    $avatarName = $this->cutImage($newAvatar, 200, 200, 'media/avatars');
                    $updateFields['avatar'] = $avatarName;
                    echo $avatarName;
                    exit;
                }
            }

            //Cover
            if(isset($_FILES['cover']) && !empty($_FILES['cover']['tmp_name']) ) {
                $newCover = $_FILES['cover'];

                if( in_array($newCover['type'], ['image/jpeg', 'image/jpg', 'image/png']) ) {
                    $coverName = $this->cutImage($newCover, 850, 310, 'media/covers');
                    $updateFields['cover'] = $coverName;
                }
            }


            UserHandler::updateUser($updateFields, $this->loggedUser->id);
            $this->redirect('/config');


        } else {
            $_SESSION['flash'] = 'Os campos nome, data de nascimento e e-mail são obrigatorio.';
            $this->redirect('/config');
        }


    }


    private function cutImage($file, $w, $h, $folder) {
        list($widthOrig, $heightOrig) = getimagesize($file['tmp_name']);
        $ratio = $widthOrig / $heightOrig;

        $newWidth = $w;
        $newHeigth = $newWidth / $ratio;

        if($newHeigth < $h) {
            $newHeigth = $h;
            $newWidth = $newHeigth * $ratio;
        }

        $x = $w - $newWidth;
        $y = $h - $newHeigth;

        $x = ($x < 0) ? $x / 2 : $x ;
        $y = ($y < 0) ? $y / 2 : $y ;

        $finalImage = imagecreatetruecolor($w, $h);

        switch($file['type']) {
            case 'image/jpeg':
            case 'image/jpg':
                $image = imagecreatefromjpeg($file['tmp_name']);
                break;
            case 'image/png':
                $image = imagecreatefrompng($file['tmp_name']);
                break;
        }

        imagecopyresampled(
            $finalImage, $image,
            $x, $y, 0, 0,
            $newWidth, $newHeigth, $widthOrig, $heightOrig
        );

        $fileName = md5(time().rand(0, 9999)).'.jpg';

        imagejpeg($finalImage, $folder.'/'.$fileName);

        return $fileName;

    }

    

}