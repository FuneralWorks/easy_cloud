<?php

namespace EasyCloud\EasyCloudBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Products
 *
 * @ORM\Table(name="products")
 * @ORM\Entity(repositoryClass="EasyCloud\EasyCloudBundle\Repository\ProductsRepository")
 */
class Products
{
    

    /**
    * @var int $subscriptions
    * @ORM\OneToMany(targetEntity="SubscriptionsProducts", mappedBy="products") 
    */
    private $subscriptions;

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
    * @ORM\Column(name="designation", type="string", length=255)
    */
    private $designation;

    /**
    * @var string
    *
    * @ORM\Column(name="name", type="string", length=50)
    */
    private $name;

    /**
    * @var  ProductsLicences products_licences
    *
    *  @ORM\OneToMany(targetEntity="ProductsLicences",mappedBy="product", cascade={"persist"})
    */
    private $products_licences;
    
    

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    public function __construct() {
        $this->subscriptions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->products_licences = new \Doctrine\Common\Collections\ArrayCollection();

    }


    /**
     * Set designation
     *
     * @param string $designation
     *
     * @return Products
     */
    public function setDesignation($designation)
    {
        $this->designation = $designation;

        return $this;
    }

    /**
     * Get designation
     *
     * @return string
     */
    public function getDesignation()
    {
        return $this->designation;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Products
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
     * Add subscription
     *
     * @param \EasyCloud\EasyCloudBundle\Entity\SubscriptionsProducts $subscription
     *
     * @return Products
     */
    public function addSubscription(\EasyCloud\EasyCloudBundle\Entity\SubscriptionsProducts $subscription)
    {
        $this->subscriptions[] = $subscription;

        return $this;
    }

    /**
     * Remove subscription
     *
     * @param \EasyCloud\EasyCloudBundle\Entity\SubscriptionsProducts $subscription
     */
    public function removeSubscription(\EasyCloud\EasyCloudBundle\Entity\SubscriptionsProducts $subscription)
    {
        $this->subscriptions->removeElement($subscription);
    }

    /**
     * Get subscriptions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSubscriptions()
    {
        return $this->subscriptions;
    }

    /**
     * Add productsLicence
     *
     * @param \EasyCloud\EasyCloudBundle\Entity\ProductsLicences $productsLicence
     *
     * @return Products
     */
    public function addProductsLicence(\EasyCloud\EasyCloudBundle\Entity\ProductsLicences $productsLicence)
    {
        $this->products_licences[] = $productsLicence;

        return $this;
    }

    /**
     * Remove productsLicence
     *
     * @param \EasyCloud\EasyCloudBundle\Entity\ProductsLicences $productsLicence
     */
    public function removeProductsLicence(\EasyCloud\EasyCloudBundle\Entity\ProductsLicences $productsLicence)
    {
        $this->products_licences->removeElement($productsLicence);
    }

    /**
     * Get productsLicences
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProductsLicences()
    {
        return $this->products_licences;
    }
}
