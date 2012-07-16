<?php
namespace XeroServiceProvider;

use Silex\Application;
use Silex\ServiceProviderInterface;

class XeroServiceProvider implements ServiceProviderInterface
{
    function register(Application $app)
    {
        $app['xero'] = $app->share(function () use ($app) {
            return new \PhpXero\Xero(
                $app['xero.key'],
                $app['xero.secret'],
                $app['xero.certpath'],
                $app['xero.keypath'], 'json'
            );
        });
    }

    function boot(Application $app)
    {

    }
}