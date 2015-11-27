<?php
/**
 * Created by PhpStorm.
 * User: derekmauldin
 * Date: 11/27/15
 * Time: 12:39 PM
 *
 * controller for Karma user registration
 */

require_once(dirname(__DIR__) . "/classes/autoload.php");
require_once("/etc/apache2/capstone-mysql/encrypted-config.php");
require_once(dirname(dirname(__DIR__)) . "/lib/php/xsrf.php");
require_once(dirname(dirname(dirname(__DIR__))) . "/vendor/autoload.php");