# laravel-directadmin
=======================

DirectAdmin API Laravel bundle

    php artisan bundle:install directadmin

Add it to application/bundles.php:

    return array(
        ...
        'directadmin' => array(
            'auto'  => true
        ),
        ...
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