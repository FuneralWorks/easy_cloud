<?php

namespace EasyCloud\EasyCloudBundle\Entity;

use \Symfony\Component\Security\Core\User\UserInterface;
use \Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class User implements UserInterface, \Serializable
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $login;

     /**
     * @ORM\Column(type="string", length=255)
     */
    protected $firstName;

     /**
     * @ORM\Column(type="string", length=255)
     */
    protected $lastName;

     /**
     * @ORM\Column(type="string", length=255)
     */
    protected $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $password;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string salt
     */
    protected $salt;

    /**
     * @ORM\ManyToMany(targetEntity="Role")
     * @ORM\JoinTable(name="_assoc_user_role",
     *     joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="role_id", referencedColumnName="id")}
     * )
     *
     * @var ArrayCollection $userRoles
     */
    protected $userRoles;


    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->userRoles = new ArrayCollection();
        $this->updatedAt = new \DateTime();
    }

    /**
     * Gets an array of roles.
     * 
     * @return array An array of Role objects
     */
    public function getRoles()
    {
        return $this->getUserRoles()->toArray();
    }

    /**
     * Gets the user roles.
     *
     * @return ArrayCollection A Doctrine ArrayCollection
     */
    public function getUserRoles()
    {
        return $this->userRoles;
    }

    /**
     * Gets the user password.
     *
     * @return string The password.
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Sets the user password.
     *
     * @param string $value The password.
     */
    public function setPassword($value)
    {
        $this->password = $value;
    }

    /**
     * Gets the user salt.
     *
     * @return string The salt.
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Sets the user salt.
     *
     * @param string $value The salt.
     */
    public function setSalt($value)
    {
        $this->salt = $value;
    }

    /**
     * Gets the username.
     *
     * @return string The username.
     */
    public function getUsername()
    {
        return $this->login;
    }

    /**
     * Sets the username.
     *
     * @param string $value The username.
     */
    public function setUsername($value)
    {
        $this->login = $value;
    }

    /**
     * Erases the user credentials.
     */
    public function eraseCredentials()
    {

    }

    /**
     * Renvoie l'objet au format serialisé
     * @return string
     */
    public function serialize()
    {
        return \json_encode(array($this->id, $this->login, $this->password, $this->salt, $this->userRoles));
    }

    /**
     * Renseigne les valeurs de l'objet à partir d'une chaine serialisée
     * @param type $serialized
     */
    public function unserialize($serialized)
    {
        list($this->id, $this->login, $this->password, $this->salt, $this->userRoles) = \json_decode($serialized);
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
     * Set login
     *
     * @param string $login
     *
     * @return User
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Add userRole
     *
     * @param \EasyCloud\EasyCloudBundle\Entity\Role $userRole
     *
     * @return User
     */
    public function addUserRole(\EasyCloud\EasyCloudBundle\Entity\Role $userRole)
    {
        $this->userRoles[] = $userRole;

        return $this;
    }

    /**
     * Remove userRole
     *
     * @param \EasyCloud\EasyCloudBundle\Entity\Role $userRole
     */
    public function removeUserRole(\EasyCloud\EasyCloudBundle\Entity\Role $userRole)
    {
        $this->userRoles->removeElement($userRole);
    }

    public function __toString()
    {
    return $this->getEmail();
    }

    /**
     * Add client
     *
     * @param \EasyCloud\EasyCloudBundle\Entity\Clients $client
     *
     * @return User
     */
    public function addClient(\EasyCloud\EasyCloudBundle\Entity\Clients $client)
    {
        $this->clients[] = $client;

        return $this;
    }

    /**
     * Remove client
     *
     * @param \EasyCloud\EasyCloudBundle\Entity\Clients $client
     */
    public function removeClient(\EasyCloud\EasyCloudBundle\Entity\Clients $client)
    {
        $this->clients->removeElement($client);
    }

    /**
     * Get clients
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getClients()
    {
        return $this->clients;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }
}
