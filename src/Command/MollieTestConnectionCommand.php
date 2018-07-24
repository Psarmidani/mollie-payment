<?php
/**
 * Created by Developerlab.
 * User: Puya Sarmidani
 * Date: 24-07-18
 * Time: 09:32
 */

namespace Developerlab\MolliePaymentBundle\Command;

use Mollie\Api\MollieApiClient;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class MollieTestConnectionCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('mollie:testrun')
            ->setDescription('Test your api connection to see if everyting is set up correctly');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        if(!empty($this->getContainer()->getParameter('developerlab.mollie_payment.testmode')) && $this->getContainer()->getParameter('developerlab.mollie_payment.testmode') !== false && !empty($this->getContainer()->getParameter('developerlab.mollie_payment.api_key_test')))
        {
            try {
                $mollie = new MollieApiClient();
                $mollie->setApiKey($this->getContainer()->getParameter('developerlab.mollie_payment.api_key_test'));
            }catch (\Exception $exception) {
                $io->title("<error>Error occurred</error>");
                $io->section($exception->getMessage());
                $io->newLine();
                exit;
            }

            $io->title("<info>API call was successful</info>");
            $io->section('The client\'s request was accepted successfully');

        }else {
            $io->title("<error>Error occurred</error>");
            $io->text('Please check the following in your services.yml');
            $io->section('* mollie_payment.testmode can not be empty');
            $io->section('* mollie_payment.testmode has to be true');
            $io->section('* mollie_payment.api_key_test can not be empty');
            $io->newLine();

        }
    }
}