<?php
/**
 * Created by Developerlab.
 * User: Puya Sarmidani
 * Date: 23-07-18
 * Time: 16:22
 */


namespace Developerlab\MolliePaymentBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class DeveloperlabMolliePaymentExtension extends Extension
{
    /**
     * @param array            $configs
     * @param ContainerBuilder $container
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__.'/../Resources/config')
        );
        $loader->load('services.yml');

        $container->setParameter('developerlab.mollie_payment.api_key', $config['api_key']);
        $container->setParameter('developerlab.mollie_payment.api_key_test', $config['api_key_test']);
        $container->setParameter('developerlab.mollie_payment.testmode', $config['testmode']);
        $container->setParameter('developerlab.mollie_payment.redirect_url', $config['redirect_url']);
        $container->setParameter('developerlab.mollie_payment.webhook', $config['webhook']);

    }

    public function getAlias()
    {
        return 'mollie_payment';
    }
}