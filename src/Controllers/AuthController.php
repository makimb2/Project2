<?php
/**
 * File name: AuthController.php
 *
 * Project: Project1
 *
 * PHP version 5
 *
 * $LastChangedDate$
 * $LastChangedBy$
 */

namespace Controllers;


use Common\Authentication\FileBase;
use Common\Authentication\InMemory;
use Common\Authentication\PdoConnection;

/**
 * Class AuthController
 */
class AuthController extends Controller
{


    /**
     * Function execute
     *
     * @access public
     */
    public function action()
    {
        $postData = $this->request->getPost();

        echo 'Authenticate the above two different ways' . var_dump($postData). "<br/>";
/*
        $auth = new InMemory();
        $auth->authenticate($postData->username, $postData->password);

       $auth2 = new FileBase();
       $auth2->authenticate($postData->username, $postData->password);
*/

        $db_host = "localhost";
        $db_name = "a_database";
        $db_username = "root";
        $db_password = "";


        $db = new PdoConnection( $db_host, $db_name, $db_username, $db_password );
        $result = $db->authenticate($postData->username, $postData->password);

        if($result){
            echo "Meow-tastic!";
        } else {
            die("oh snap");
        }



    }
}
