<?php


namespace DooCSRF;


class Session {

    //put session
    public static function set( $name, $value )
    {
        if( isset( $name ) )
        {
            return $_SESSION[$name] = $value;
        }

        return null;

    }

    //check if session exists
    public static function exists( $name )
    {
        return ( isset( $_SESSION[$name] ) ) ? true : false;
    }
    //get session
    public static function get( $name )
    {
        if( isset( $_SESSION[$name] ) )
        {
            return $_SESSION[$name];
        }

        return null;
    }
    //delete session
    public static function delete( $name )
    {
        if( self::exists( $name ) )
        {
            unset( $_SESSION[$name] );
        }
    }
    // flash form, alert messages
    public static function flash( $name, $string = '')
    {
        if( self::exists( $name ) )
        {
            $session = self::get( $name );
            self::delete( $name );
            return $session;
        }else{
            self::set( $name, $string );
        }
        return '';
    }

    public static function destroy()
    {
        $_SESSION = array();
        if( isset( $_COOKIE['session_name'] ) )
        {
            setcookie( session_name(), '', time()-4200, '/');
        }
        session_destroy();
    }


} 