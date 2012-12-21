# laravel-directadmin
=======================

Laravel bundle for DirectAdmin API

    php artisan bundle:install directadmin

Add it to application/bundles.php:

    return array(
        ...
        'directadmin' => array(
            'auto'  => true
        ),
        ...
    );

Edit default settings (use if you only need to access 1 DA server):

    return array(
        'host'          => '127.0.0.1',
        'port'          => 2222,
        'login'         => '',
        'password'      => ''
    );

Get an instance:

    $da = IoC::resolve('DirectAdmin');

Now play with it, for example:

    $da->set_method('get');
    $da->query('/CMD_API_POP',
        array(
            'domain' => 'domain.com',
            'action' => 'list'
        ));
    $da = $da->fetch_body();

Default settings are entered in config/settings.php. If you need to access multiple servers in 1 project, remove these settings and to it manually.

More info on DirectAdmin's API: http://www.directadmin.com/api.html