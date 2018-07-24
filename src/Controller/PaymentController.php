<?php
/**
 * Created by Developerlab.
 * User: Puya Sarmidani
 * Date: 23-07-18
 * Time: 16:03
 */

namespace Developerlab\MolliePaymentBundle\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Mollie\Api\MollieApiClient;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class PaymentController extends Controller
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $entityManager;

    /**
     * @var
     */
    protected $apimode;

    /**
     * @var
     */
    protected $apiKey;

    /**
     * @var
     */
    protected $apiKeyTest;

    /**
     * @var
     */
    protected $redirectUrl;

    /**
     * @var
     */
    protected $webhook;

    /**
     * @param EntityManager    $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager, $apimode, $apiKey, $apiKeyTest, $redirectUrl, $webhook)
    {
        $this->entityManager = $entityManager;
        $this->apimode = $apimode;
        $this->apiKey = $apiKey;
        $this->apiKeyTest = $apiKeyTest;
        $this->redirectUrl = $redirectUrl;
        $this->webhook = $webhook;
    }

    /**
     * @Route("/mollie", name="mollie_index")
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function mollieIndex(Request $request)
    {
        echo '<pre>';
        print_r();
        exit;
    }

    private function mollieConnect()
    {
        $apiKey = $this->apimode === true ? $this->apiKeyTest : $this->apiKey;
        $mollie = new MollieApiClient();
        $mollie->setApiKey($apiKey);

        return $mollie;

    }
}