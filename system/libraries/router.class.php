<?php

class Router
{

  public static function getControllerName()
  {
    // we get the page name from $_GET

    $page = Request::get('page', 'homepage');
    // if a controller file exists with this name
    $fileName = $page . '.controller.php';
    $filePath = CONTROLLERS_DIR . '/' . $fileName;
    if(file_exists($filePath))
    {
      // return the path to that file
      return $page;
    }
    else
    {
      // return the path to the error 404 file
      return 'error404';
    }
  }

  public static function runController($controllerName)
  {
    // get the file path
    $controllerFile = Router::getControllerFile($controllerName);

    // get the name of the class
    $controllerClass = $controllerName.'Controller';

    // we include the controller file
    include($controllerFile);

    // create the controller object
    $controller = new $controllerClass();

    // run the controller!
    $controller->run();
  }

  public static function getControllerFile($controllerName)
  {
    return CONTROLLERS_DIR . '/' . $controllerName . '.controller.php';
  }


}