<?php

class Request
{
  protected static $originalGet = array();
  protected static $originalPost = array();

  public static function loadRequest()
  {

    static::$originalGet = $_GET;
    static::$originalPost = $_POST;
    // will load all the request information into itself
  }

  public static function get($key, $default = null)
  {
    // returns the value from $_GET with the key $key
    // if not present in $_GET, returns $default
    if(isset(static::$originalGet[$key]))
    {
      return static::$originalGet[$key];
    }
    else
    {
      return $default;
    }    
  }

  public static function post($key, $default = null)
  {
    // returns the value from $_POST with the key $key
    // if not present in $_POST, returns $default
    return isset(static::$originalPost[$key]) ? static::$originalPost[$key] : $default;
  }

  public static function isPost()
  {
    return ($_SERVER['REQUEST_METHOD']=='POST');
  }


}

