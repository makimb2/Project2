<?php
/**
 * Created by PhpStorm.
 * User: celeste
 * Date: 3/18/2015
 * Time: 8:19 PM
 */

namespace Common\Authentication;


class InMemory implements IAuthentication {

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
        if ($username !== 'test' && $password !== '1234') {
            echo 'Sorry '.$username.' is not known.';
            return false;
        }

        echo 'Hello, '.$username;

        return true;
    }
}