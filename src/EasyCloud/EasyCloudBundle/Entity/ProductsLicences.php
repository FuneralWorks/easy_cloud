<?php

namespace EasyCloud\EasyCloudBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductsLicences
 *
 * @ORM\Table(name="products_licences")
 * @ORM\Entity(repositoryClass="EasyCloud\EasyCloudBundle\Repository\ProductsLicencesRepository")
 */
class ProductsLicences
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
    * @var Licences licence
    * @ORM\ManyToOne(targetEntity="Licences", inversedBy="products_licences", cascade={"persist"})
    */
    private $licence;

    
    /**
    * @var Products product
    * @ORM\ManyToOne(targetEntity="Products", inversedBy="products_licences", cascade={"persist"})
    */
    private $product;

    /**
    * @var int quantity
    * @ORM\Column(name="quantity", type="integer")
    */
    private $quantity;


    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->licence = new \Doctrine\Common\Collections\ArrayCollection();
        
    }

    
    /**
    * @ORM\PrePersist
    */
    public function setCreatedAtValue()
    {
        $this->produit = "PrePersisted";
    }

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
     * @return ProductsLicences
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
     * Set licence
     *
     * @param \EasyCloud\EasyCloudBundle\Entity\Licences $licence
     *
     * @return ProductsLicences
     */
    public function setLicence(\EasyCloud\EasyCloudBundle\Entity\Licences $licence = null)
    {
        $this->licence = $licence;

        return $this;
    }

    /**
     * Get licence
     *
     * @return \EasyCloud\EasyCloudBundle\Entity\Licences
     */
    public function getLicence()
    {
        return $this->licence;
    }

    /**
     * Set product
     *
     * @param \EasyCloud\EasyCloudBundle\Entity\Products $product
     *
     * @return ProductsLicences
     */
    public function setProduct(\EasyCloud\EasyCloudBundle\Entity\Products $product = null)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \EasyCloud\EasyCloudBundle\Entity\Products
     */
    public function getProduct()
    {
        return $this->product;
    }
}
