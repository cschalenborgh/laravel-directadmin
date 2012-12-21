<?php
/**
 * laravel-directadmin
 *
 * Laravel bundle to access the DirectAdmin API
 *
 * @author Chris Schalenborgh <chris.s@kryap.com>
 * @version 0.1
 * @package laravel-directadmin
 * @link http://www.directadmin.com/api.html
 * @license BSD License
 */

// configure autoloader
Autoloader::map(array(
    //'directadmin' => Bundle::path('directadmin') . 'lib' .DS . 'DirectAdmin.php',
    'HTTPSocket' => Bundle::path('directadmin') . 'lib' .DS . 'DirectAdmin.php',
));

// Register a mailer in the IoC container
IoC::singleton('DirectAdmin', function()
{
    // instantiate new directadmin
    $sock = new HTTPSocket;

    // load settings
    $config = Config::get('directadmin::settings', array());

    // set host/port
    if(!Empty($config['host']) && !Empty($config['port'])) {
        $sock->connect($config['host'], $config['port']);
    }

    // set login/password
    if(!Empty($config['login']) && !Empty($config['password'])) {
        $sock->set_login($config['login'], $config['password']);
    }

    // Return the instance.
    return $sock;
});