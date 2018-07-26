<?php
/**
 * Created by Developerlab.
 * User: Puya Sarmidani
 * Date: 24-07-18
 * Time: 09:32
 */

namespace Developerlab\MolliePaymentBundle\Command;

use Developerlab\MolliePaymentBundle\Entity\Customer;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Doctrine\ORM\Tools\SchemaTool;
use Mollie\Api\MollieApiClient;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ConfirmationQuestion;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class MollieCustomersCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('mollie:customers')
            ->setDescription('Store all existing customers in the database');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        $schemaManager = $this->getContainer()->get('doctrine')->getConnection()->getSchemaManager();
            try {
                $mollie = new MollieApiClient();
                $mollie->setApiKey($this->getContainer()->getParameter('developerlab.mollie_payment.api_key_test'));
                $customers = $mollie->customers->page(null);
                $countCustomers = $customers->count();

                $helper = $this->getHelper('question');
                $io->section($countCustomers.' customers found');
                $io->newLine();

                if($countCustomers > 0) {

                    $question = new ConfirmationQuestion('Would you like to export all customers to your database?(yes/no)', true);

                    if ($helper->ask($input, $output, $question)) {
                        $output->writeln('Checking customer table');
                        if ($schemaManager->tablesExist(array('mollie_customer')) == true) {
                            $output->writeln('Table exists');
                            $io->newLine();
                            $output->writeln('Start importing customers...');
                            $this->importCustomers($output, $customers);
                            $io->newLine();
                            $io->title("<info>Import completed!</info>");
                        }else{
                            $output->writeln('Table does not exists');
                            $question = new ConfirmationQuestion('Would you like to create mollie_customers table?(yes/no)', true);
                            if ($helper->ask($input, $output, $question)) {
                                $this->createTableByEntity(Customer::class);
                                $output->writeln('Table mollie_customer created.');
                                $io->newLine();
                                $output->writeln('Start importing customers...');
                                $this->importCustomers($output, $customers);
                                $io->newLine();
                                $io->title("<info>Import completed!</info>");
                            }else{
                                $io->title("<info>Import aborted</info>");
                                die;
                            }
                        }
                    }else{
                        $io->title("<info>Import aborted</info>");
                    }
                }else{
                    $io->title("<info>$countCustomers customers found</info>");
                    $io->section('This import will be aborted');
                }
            }catch (\Exception $exception) {
                $io->title("<error>Error occurred</error>");
                $io->section($exception->getMessage());
                $io->newLine();
                exit;
            }
    }

    /**
     * @param string $entityName
     */
    public function createTableByEntity($entityName)
    {
        $schemaTool = new SchemaTool($this->getContainer()->get('doctrine.orm.default_entity_manager'));
        $schemaTool->createSchema(
            [$this->getContainer()->get('doctrine.orm.default_entity_manager')->getClassMetadata($entityName)]
        );
    }

    public function importCustomers($output, $customers)
    {
        $em = $this->getContainer()->get('doctrine.orm.default_entity_manager');
        foreach($customers->getArrayCopy() as $customer)
        {
            $mollieCustomerEntity = new Customer();
            $mollieCustomerEntity->setCustomerid($customer->id);
            $mollieCustomerEntity->setMode($customer->mode);
            $mollieCustomerEntity->setName($customer->name);
            $mollieCustomerEntity->setEmail($customer->email);
            $mollieCustomerEntity->setMetadata($customer->metadata);
            $mollieCustomerEntity->setCreatedAt(new \DateTime($customer->createdAt));

            try {

                $em->persist($mollieCustomerEntity);
            }catch (UniqueConstraintViolationException $e)
            {
                $updateCustomer = $em->getRepository(Customer::class)->findOneBy(array('customerid' => $customer->id));
                $mollieCustomerEntity->setMode($customer->mode);
                $mollieCustomerEntity->setName($customer->name);
                $mollieCustomerEntity->setEmail($customer->email);
                $mollieCustomerEntity->setMetadata($customer->metadata);
                $mollieCustomerEntity->setCreatedAt(new \DateTime($customer->createdAt));
            }
        }
        $em->flush();
    }
}