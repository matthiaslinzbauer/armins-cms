<?php
/**
 * Created by PhpStorm.
 * User: Matthias
 * Date: 8/12/2017
 * Time: 11:51 AM
 */

/*  DEFINE KNOWN CONSTANT VALUES */
/** @define "APP_PORT" "80" */
/** @define "APP_PROTOCOL" "http" */
/** @define "APP_URL" "www.uphoto.com" */
/** @define "APP_FQDN" "http://www.uphoto.com" */
/** @define "DOCROOT" "D:/websites/uphoto.com/html" */
/** @define "APP_ABS_WEBROOT" "http://www.uphoto.com" */
/** @define "APP_DOCROOT" "D:/websites/uphoto.com/html/app" */

/* DEFINE VITAL CONSTANTS NEEDED FOR APP EXECUTION */
define('APP_URL', $_SERVER['HTTP_HOST']);
define('APP_PORT', $_SERVER['SERVER_PORT']);
define('DOCROOT', str_replace('\\', '/', realpath(dirname(__FILE__))));
define('APP_DOCROOT', str_replace('\\', '/', realpath(dirname(__FILE__))) . '/app');
define('APP_REL_WEBROOT', '/');
define('APP_QUERYSTRING', $_SERVER['QUERY_STRING']);
define('APP_HTTP_PORTS', '80,8080');
define('APP_HTTPS_PORTS', '443');

/**
 * Returns true if the current connection to the server was madeusing
 * SSL encryption and the HTTPS protocol.
 * @return bool
 */
function encrypted_connection() {
    if(in_array(APP_PORT, explode(',', APP_HTTPS_PORTS))) {
        return true;
    }
    return false;
}

define('APP_PROTOCOL', encrypted_connection() ? 'https' : 'http');
define('APP_FQDN', APP_PROTOCOL . '://' . APP_URL);
define('APP_ABS_WEBROOT', APP_FQDN); // ALIAS FOR APP_FQDN
define('APP_REQUEST_URI', APP_FQDN . '/' . APP_QUERYSTRING);
spl_autoload_register(function($class){
    require_once APP_CLASSES_DIRECTORY . '/' . str_replace('\\', '/', $class) . '.php';
});

/* LOAD APP CONFIGURATION FILE */
require_once(APP_DOCROOT . '/config.php');
require_once(APP_FUNCTIONS_DIRECTORY . '/functions.php');

// START OUTPUT BUFFERING
ob_start();

App()->getDefaultView()->renderOutput();

// END OUTPUT BUFFERING AND FLUSH CONTENTS TO STD_OUT
ob_end_flush();-----
