<?php
/**
 * Created by PhpStorm.
 * User: celeste
 * Date: 3/18/2015
 * Time: 8:35 PM
 */

namespace Common\Authentication;


class FileBase implements IAuthentication {

    /**
     * Function authenticate
     *
     * @param string $username
     * @param string $password
     * @return mixed
     *
     * @access public
     */
    public function authenticate($username, $password)
    {
        $dir = realpath(getcwd());
//        die($dir);
        $dir = realpath($dir.'/../src/Common/Authentication/');
//        die($dir."\\auth.txt");
        $fh = fopen($dir."\\auth.txt", "r");
        $fileUsername = trim(fgets($fh));
        $filePassword = trim(fgets($fh));
        fclose($fh);

        if($fileUsername !== $username || $filePassword !== $password) {
            echo "NOT AUTHORIZED";
            return "NOT AUTHORIZED";
        }
        echo "WELCOME";
        return "WELCOME";
    }
}