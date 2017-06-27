<?php

namespace EasyCloud\EasyCloudBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Subscriptions
 *
 * @ORM\Table(name="subscriptions")
 * @ORM\Entity(repositoryClass="EasyCloud\EasyCloudBundle\Repository\SubscriptionsRepository")
 */
class Subscriptions
{

    /**
    * @var int $products
    * @ORM\OneToMany(targetEntity="SubscriptionsProducts", mappedBy="subscriptions", cascade={"persist"})
    */
    private $products;

    /**
    * @var int $client
    * @ORM\ManyToOne(targetEntity="Clients")
    * @ORM\JoinColumn(name="client", referencedColumnName="id")
    */
  private $client;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100)
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="startDate", type="date")
     */
    private $startDate;

    /**
     * @var int
     *
     * @ORM\Column(name="monthDuration", type="integer")
     */
    private $monthDuration;

    /**
     * @var string
     *
     * @ORM\Column(name="sapContractNumber", type="string", length=20)
     */
    private $sapContractNumber;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->products = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Subscriptions
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set startDate
     *
     * @param \DateTime $startDate
     *
     * @return Subscriptions
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set monthDuration
     *
     * @param integer $monthDuration
     *
     * @return Subscriptions
     */
    public function setMonthDuration($monthDuration)
    {
        $this->monthDuration = $monthDuration;

        return $this;
    }

    /**
     * Get monthDuration
     *
     * @return integer
     */
    public function getMonthDuration()
    {
        return $this->monthDuration;
    }

    /**
     * Set sapContractNumber
     *
     * @param string $sapContractNumber
     *
     * @return Subscriptions
     */
    public function setSapContractNumber($sapContractNumber)
    {
        $this->sapContractNumber = $sapContractNumber;

        return $this;
    }

    /**
     * Get sapContractNumber
     *
     * @return string
     */
    public function getSapContractNumber()
    {
        return $this->sapContractNumber;
    }

    /**
     * Add product
     *
     * @param \EasyCloud\EasyCloudBundle\Entity\SubscriptionsProducts $product
     *
     * @return Subscriptions
     */
    public function addProduct(\EasyCloud\EasyCloudBundle\Entity\SubscriptionsProducts $product)
    {
        $this->products[] = $product;

        return $this;
    }

    /**
     * Remove product
     *
     * @param \EasyCloud\EasyCloudBundle\Entity\SubscriptionsProducts $product
     */
    public function removeProduct(\EasyCloud\EasyCloudBundle\Entity\SubscriptionsProducts $product)
    {
        $this->products->removeElement($product);
    }

    /**
     * Get products
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * Set client
     *
     * @param \EasyCloud\EasyCloudBundle\Entity\Clients $client
     *
     * @return Subscriptions
     */
    public function setClient(\EasyCloud\EasyCloudBundle\Entity\Clients $client = null)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return \EasyCloud\EasyCloudBundle\Entity\Clients
     */
    public function getClient()
    {
        return $this->client;
    }
}
