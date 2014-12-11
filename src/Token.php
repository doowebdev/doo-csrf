<?php

namespace DooCSRF;


class Token {

    public static function generate()
    {
        return Session::set('token', md5( uniqid() ) );
    }

    //check if token exists
    public static function check( $token )
    {
        $token_name = 'token';

        if(Session::exists($token_name) && $token == Session::exists($token_name) )
        {
            Session::delete($token_name);
            return true;
        }
        return false;
    }

} 
