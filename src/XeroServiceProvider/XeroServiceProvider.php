<?php
namespace XeroServiceProvider;

use Silex\Application;
use Silex\ServiceProviderInterface;

class XeroServiceProvider implements ServiceProviderInterface
{
    function register(Application $app)
    {
        $app['xero'] = $app->share(function () use ($app) {
            return new \XeroOAuth(array(
                'consumer_key' => $app['xero.key'],
                'shared_secret' => $app['xero.secret'],
                'access_token' => $app['xero.key'],
                'access_token_secret' => $app['xero.secret'],
                'rsa_private_key' => $app['xero.privatekeypath'],
                'rsa_public_key' => $app['xero.publickeypath'],
                'core_version' => '2.0',
                'payroll_version' => '1.0',
                'application_type' => 'Private',
                'oauth_callback' => 'oob',
                'user_agent' => $app['xero.useragent']
            ));
        });
    }

    function boot(Application $app)
    {

    }
}
