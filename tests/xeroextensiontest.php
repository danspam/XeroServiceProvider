<?php
require_once __DIR__.'/../vendor/autoload.php';


class XeroExtensionTest extends PHPUnit_Framework_TestCase
{
    public function testXeroExtensionLoads()
    {

        $app = new Silex\Application;
		$app->register(new \XeroServiceProvider\XeroServiceProvider(), array(
			'xero.key' =>  'SOMEKEY',
			'xero.secret' => 'SOMESECRET',
			'xero.publickeypath' =>  'xeropublickey.cer' ,
			'xero.privatekeypath' =>  'xeroprivatekey.pem',
            'xero.useragent' => 'My Private App'
		));

		$xero = $app['xero'];

		$this->assertInstanceOf('XeroOAuth', $xero);

    }
}