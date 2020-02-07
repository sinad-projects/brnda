<?php
class  Session {
    public static function setFlash($label, $data) {
        self::set($label, $data);
    }
    public static function hasFlash($label) {
        return !is_null(self::get($label));
    }
    public static function flash($label) {
        echo self::get($label);
        self::delete($label);
    }
    public static function is_logged_in($key) {
        if ( !isset($_SESSION[$key]) ) {
            return false;
        }
        return true;
    }
    public static function is_authorized($key, $value) {
        if ( self::is_logged_in($key) ) {
            if ( $_SESSION[$key] === $value ) {
                return true;
            }
        }
        return false;
    }
    public static function set($key, $value) {
        $_SESSION[$key] = $value;
    }
    public static function get($key) {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }
    public static function delete($key) {
        unset($_SESSION[$key]);
    }
    public static function destroy() {
        session_destroy();
    }
}