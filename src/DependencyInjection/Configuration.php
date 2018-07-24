<?php
/**
 * Created by Developerlab.
 * User: Puya Sarmidani
 * Date: 23-07-18
 * Time: 16:14
 */

namespace Developerlab\MolliePaymentBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * @return TreeBuilder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('mollie_payment');

        $rootNode
            ->children()
            ->scalarNode('testmode')->isRequired()->end()
            ->scalarNode('api_key')->isRequired()->end()
            ->scalarNode('api_key_test')->isRequired()->end()
            ->scalarNode('redirect_url')->defaultValue('/mollie/redirect_url')->end()
            ->scalarNode('webhook')->defaultValue('/mollie/hooks')->end()
            ->end();

        return $treeBuilder;
    }
}