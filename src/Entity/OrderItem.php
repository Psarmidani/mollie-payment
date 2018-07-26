<?php

namespace Developerlab\MolliePaymentBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * InvoiceItems
 *
 * @ORM\Table(name="mollie_order_item")
 * @ORM\Entity
 */
class OrderItem
{
    /**
     * @var integer
     *
     * @ORM\Column(name="user_id", type="integer", nullable=false)
     */
    private $userid;

    /**
     * @var string
     *
     * @ORM\Column(name="package_id", type="integer", nullable=false)
     */
    private $packageid;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="discount", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $discount;

    /**
     * @var integer
     *
     * @ORM\Column(name="price_excl_discount", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $priceexcldiscount;

    /**
     * @var integer
     *
     * @ORM\Column(name="price_incl_discount", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $priceincldiscount;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */

    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="order_id", type="integer", nullable=true)
     */
    private $orderid;

    /**
     * @return int
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * @param int $userid
     */
    public function setUserid($userid)
    {
        $this->userid = $userid;
    }

    /**
     * @return string
     */
    public function getPackageid()
    {
        return $this->packageid;
    }

    /**
     * @param string $packageid
     */
    public function setPackageid($packageid)
    {
        $this->packageid = $packageid;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * @param string $discount
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;
    }

    /**
     * @return int
     */
    public function getPriceexcldiscount()
    {
        return $this->priceexcldiscount;
    }

    /**
     * @param int $priceexcldiscount
     */
    public function setPriceexcldiscount($priceexcldiscount)
    {
        $this->priceexcldiscount = $priceexcldiscount;
    }

    /**
     * @return int
     */
    public function getPriceincldiscount()
    {
        return $this->priceincldiscount;
    }

    /**
     * @param int $priceincldiscount
     */
    public function setPriceincldiscount($priceincldiscount)
    {
        $this->priceincldiscount = $priceincldiscount;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getOrderid()
    {
        return $this->orderid;
    }

    /**
     * @param int $orderid
     */
    public function setOrderid($orderid)
    {
        $this->orderid = $orderid;
    }
}

