 <?php

 define('DOCROOT', __DIR__);
 require(DOCROOT.'/system/config/bootstrap.php');

 Request::loadRequest();
 $controllerName = Router::getControllerName();

 // start output buffering
 ob_start();

 Router::runController($controllerName);

 // end output buffering and return the contents of the buffer
 echo ob_get_clean();

