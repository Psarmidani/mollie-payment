<?php
/**
 * Created by Developerlab.
 * User: Puya Sarmidani
 * Date: 23-07-18
 * Time: 15:20
 */


namespace Developerlab\MolliePaymentBundle;

use Developerlab\MolliePaymentBundle\DependencyInjection\DeveloperlabMolliePaymentExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class MolliePaymentBundle extends Bundle
{
    /**
     * Overridden to allow for the custom extension alias.
     */
    public function getContainerExtension()
    {
        if (null === $this->extension) {
            $this->extension = new DeveloperlabMolliePaymentExtension();
        }
        return $this->extension;
    }
}