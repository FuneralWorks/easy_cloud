<?php

namespace EasyCloud\EasyCloudBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SubscriptionsProducts
 *
 * @ORM\Table(name="subscriptions_products")
 * @ORM\Entity(repositoryClass="EasyCloud\EasyCloudBundle\Repository\SubscriptionsProductsRepository")
 */
class SubscriptionsProducts
{
    
   
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int subscriptions
     * @ORM\ManyToOne(targetEntity="Subscriptions", inversedBy="products")
     * @ORM\JoinColumn(name="subscription_id", referencedColumnName="id")
     */
    private $subscriptions;

    /**
     * @var int products
     * @ORM\ManyToOne(targetEntity="Products", inversedBy="subscriptions")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     */
    private $products;

  

    /**
     * @var int
     *
     * @ORM\Column(name="quantity", type="integer")
     */
    private $quantity;


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
     * Set quantity
     *
     * @param integer $quantity
     *
     * @return SubscriptionsProducts
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set subscriptions
     *
     * @param \EasyCloud\EasyCloudBundle\Entity\Subscriptions $subscriptions
     *
     * @return SubscriptionsProducts
     */
    public function setSubscriptions(\EasyCloud\EasyCloudBundle\Entity\Subscriptions $subscriptions = null)
    {
        $this->subscriptions = $subscriptions;

        return $this;
    }

    /**
     * Get subscriptions
     *
     * @return \EasyCloud\EasyCloudBundle\Entity\Subscriptions
     */
    public function getSubscriptions()
    {
        return $this->subscriptions;
    }

    /**
     * Set products
     *
     * @param \EasyCloud\EasyCloudBundle\Entity\Products $products
     *
     * @return SubscriptionsProducts
     */
    public function setProducts(\EasyCloud\EasyCloudBundle\Entity\Products $products = null)
    {
        $this->products = $products;

        return $this;
    }

    /**
     * Get products
     *
     * @return \EasyCloud\EasyCloudBundle\Entity\Products
     */
    public function getProducts()
    {
        return $this->products;
    }
}
