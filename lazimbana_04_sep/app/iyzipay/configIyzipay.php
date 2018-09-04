<?php
namespace App\iyzipay;
/**
 * Iyzipay Spl class loader wrapper.
 *
 * @author Sabri Onur Tuzun
 */
use App\iyzipay\IyzipayBootstrap;

class configIyzipay
{

    /**
     * Inits and registers classes.
     * @param string $includePath
     */
    public static function options()
    {
        IyzipayBootstrap::init();
        $options = new \Iyzipay\Options();
        $options->setApiKey("sandbox-bFRbSz9tFuQRtpS53NkknefnEFAmZhZ4"); //sandbox-bFRbSz9tFuQRtpS53NkknefnEFAmZhZ4  //sandbox-s6oJmR93pHwt6ViMSC7YE10nPwptmVug
        $options->setSecretKey("sandbox-PUZq7kz8YtkniSPCKDQNwfjPgc2JEUX2"); //sandbox-PUZq7kz8YtkniSPCKDQNwfjPgc2JEUX2    //sandbox-fzZcCDNXZlDNSa4tMpSkkPGMwiPGtUl2
        $options->setBaseUrl("https://sandbox-api.iyzipay.com");
        return $options; 
    }

}