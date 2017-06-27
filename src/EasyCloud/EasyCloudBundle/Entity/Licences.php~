<?php

namespace EasyCloud\EasyCloudBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * licences
 *
 * @ORM\Table(name="licences")
 * @ORM\Entity(repositoryClass="EasyCloud\EasyCloudBundle\Repository\LicencesRepository")
 */
class Licences
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
     * @var string
     *
     * @ORM\Column(name="sku", type="string", length=40)
     */
    private $sku;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="designation", type="string", length=200)
     */
    private $designation;

    /**
    * @var  ProductsLicences products_licences
    *
    *  @ORM\OneToMany(targetEntity="ProductsLicences", mappedBy="licence", cascade={"persist"})
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

    /**
     * Set sku
     *
     * @param string $sku
     * @return Licences
     */
    public function setSku($sku)
    {
        $this->sku = $sku;

        return $this;
    }

    /**
     * Get sku
     *
     * @return string 
     */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * Set designation
     *
     * @param string $designation
     * @return Licences
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
     * Set quantity
     *
     * @param integer $quantity
     * @return Licences
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

    public function __construct() {
        $this->products_licences = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Licences
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
     * Add products_licences
     *
     * @param \AppBundle\Entity\ProductsLicences $productsLicences
     * @return Licences
     */
    public function addProductsLicence(\AppBundle\Entity\ProductsLicences $productsLicences)
    {
        $this->products_licences[] = $productsLicences;

        return $this;
    }

    /**
     * Remove products_licences
     *
     * @param \AppBundle\Entity\ProductsLicences $productsLicences
     */
    public function removeProductsLicence(\AppBundle\Entity\ProductsLicences $productsLicences)
    {
        $this->products_licences->removeElement($productsLicences);
    }

    /**
     * Get products_licences
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProductsLicences()
    {
        return $this->products_licences;
    }
}
