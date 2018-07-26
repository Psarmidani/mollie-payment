<?php

namespace Developerlab\MolliePaymentBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Invoice
 *
 * @ORM\Table(name="mollie_order")
 * @ORM\Entity
 */
class Order
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="order_prefix", type="integer", nullable=false)
     */
    private $orderprefix;

    /**
     * @var int
     *
     * @ORM\Column(name="user_id", type="integer", nullable=false)
     */
    private $userid;

    /**
     * @var string
     *
     * @ORM\Column(name="company", type="string", length=100, nullable=true)
     */
    private $company;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=100, nullable=false)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=100, nullable=false)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="street", type="string", length=255, nullable=false)
     */
    private $street;

    /**
     * @var string
     *
     * @ORM\Column(name="housenr", type="string", length=10, nullable=false)
     */
    private $housenr;

    /**
     * @var string
     *
     * @ORM\Column(name="postfix", type="string", length=10, nullable=true)
     */
    private $postfix;

    /**
     * @var string
     *
     * @ORM\Column(name="zipcode", type="string", length=20, nullable=false)
     */
    private $zipcode;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=100, nullable=false)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=50, nullable=false)
     */
    private $phone;

    /**
     * @var integer
     *
     * @ORM\Column(name="kvk", type="integer", nullable=true)
     */
    private $kvk;

    /**
     * @var string
     *
     * @ORM\Column(name="vat_number", type="string", length=50, nullable=true)
     */
    private $vatnumber;

    /**
     * @var string
     *
     * @ORM\Column(name="tax", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $tax;

    /**
     * @var string
     *
     * @ORM\Column(name="tax_amount", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $taxamount;

    /**
     * @var string
     *
     * @ORM\Column(name="price_excl", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $priceexcl;

    /**
     * @var string
     *
     * @ORM\Column(name="price_incl", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $priceincl;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdat;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="paid_on", type="datetime", nullable=true)
     */
    private $paidon;

    /**
     * @var int
     *
     * @ORM\Column(name="is_credited", type="integer", nullable=false)
     */
    private $iscredited;

    /**
     * @var int
     *
     * @ORM\Column(name="original_order_id", type="integer", nullable=true)
     */
    private $originalorderid;

    /**
     * @var string
     *
     * @ORM\Column(name="credit_amount", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $creditamount;

    /**
     * @var string
     *
     * @ORM\Column(name="payment_system", type="string", length=100, nullable=true)
     */
    private $paymentsystem;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="first_reminder", type="datetime", nullable=true)
     */
    private $firstreminder;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="second_reminder", type="datetime", nullable=true)
     */
    private $secondreminder;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="incasso_date", type="datetime", nullable=true)
     */
    private $incassodate;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=100, nullable=true)
     */
    private $status;

    /**
     * @return int
     */
    public function getOrderprefix()
    {
        return $this->orderprefix;
    }

    /**
     * @param int $orderprefix
     */
    public function setOrderprefix($orderprefix)
    {
        $this->orderprefix = $orderprefix;
    }

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
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param string $company
     */
    public function setCompany($company)
    {
        $this->company = $company;
    }

    /**
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param string $street
     */
    public function setStreet($street)
    {
        $this->street = $street;
    }

    /**
     * @return string
     */
    public function getHousenr()
    {
        return $this->housenr;
    }

    /**
     * @param string $housenr
     */
    public function setHousenr($housenr)
    {
        $this->housenr = $housenr;
    }

    /**
     * @return string
     */
    public function getPostfix()
    {
        return $this->postfix;
    }

    /**
     * @param string $postfix
     */
    public function setPostfix($postfix)
    {
        $this->postfix = $postfix;
    }

    /**
     * @return string
     */
    public function getZipcode()
    {
        return $this->zipcode;
    }

    /**
     * @param string $zipcode
     */
    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return int
     */
    public function getKvk()
    {
        return $this->kvk;
    }

    /**
     * @param int $kvk
     */
    public function setKvk($kvk)
    {
        $this->kvk = $kvk;
    }

    /**
     * @return string
     */
    public function getVatnumber()
    {
        return $this->vatnumber;
    }

    /**
     * @param string $vatnumber
     */
    public function setVatnumber($vatnumber)
    {
        $this->vatnumber = $vatnumber;
    }

    /**
     * @return string
     */
    public function getTax()
    {
        return $this->tax;
    }

    /**
     * @param string $tax
     */
    public function setTax($tax)
    {
        $this->tax = $tax;
    }

    /**
     * @return string
     */
    public function getTaxamount()
    {
        return $this->taxamount;
    }

    /**
     * @param string $taxamount
     */
    public function setTaxamount($taxamount)
    {
        $this->taxamount = $taxamount;
    }

    /**
     * @return string
     */
    public function getPriceexcl()
    {
        return $this->priceexcl;
    }

    /**
     * @param string $priceexcl
     */
    public function setPriceexcl($priceexcl)
    {
        $this->priceexcl = $priceexcl;
    }

    /**
     * @return string
     */
    public function getPriceincl()
    {
        return $this->priceincl;
    }

    /**
     * @param string $priceincl
     */
    public function setPriceincl($priceincl)
    {
        $this->priceincl = $priceincl;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedat()
    {
        return $this->createdat;
    }

    /**
     * @param \DateTime $createdat
     */
    public function setCreatedat($createdat)
    {
        $this->createdat = $createdat;
    }

    /**
     * @return \DateTime
     */
    public function getPaidon()
    {
        return $this->paidon;
    }

    /**
     * @param \DateTime $paidon
     */
    public function setPaidon($paidon)
    {
        $this->paidon = $paidon;
    }

    /**
     * @return int
     */
    public function getIscredited()
    {
        return $this->iscredited;
    }

    /**
     * @param int $iscredited
     */
    public function setIscredited($iscredited)
    {
        $this->iscredited = $iscredited;
    }

    /**
     * @return int
     */
    public function getOriginalorderid()
    {
        return $this->originalorderid;
    }

    /**
     * @param int $originalorderid
     */
    public function setOriginalorderid($originalorderid)
    {
        $this->originalorderid = $originalorderid;
    }

    /**
     * @return string
     */
    public function getCreditamount()
    {
        return $this->creditamount;
    }

    /**
     * @param string $creditamount
     */
    public function setCreditamount($creditamount)
    {
        $this->creditamount = $creditamount;
    }

    /**
     * @return string
     */
    public function getPaymentsystem()
    {
        return $this->paymentsystem;
    }

    /**
     * @param string $paymentsystem
     */
    public function setPaymentsystem($paymentsystem)
    {
        $this->paymentsystem = $paymentsystem;
    }

    /**
     * @return \DateTime
     */
    public function getFirstreminder()
    {
        return $this->firstreminder;
    }

    /**
     * @param \DateTime $firstreminder
     */
    public function setFirstreminder($firstreminder)
    {
        $this->firstreminder = $firstreminder;
    }

    /**
     * @return \DateTime
     */
    public function getSecondreminder()
    {
        return $this->secondreminder;
    }

    /**
     * @param \DateTime $secondreminder
     */
    public function setSecondreminder($secondreminder)
    {
        $this->secondreminder = $secondreminder;
    }

    /**
     * @return \DateTime
     */
    public function getIncassodate()
    {
        return $this->incassodate;
    }

    /**
     * @param \DateTime $incassodate
     */
    public function setIncassodate($incassodate)
    {
        $this->incassodate = $incassodate;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
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

