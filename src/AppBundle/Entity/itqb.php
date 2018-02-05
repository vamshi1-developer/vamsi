<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * itqb
 *
 * @ORM\Table(name="itqb")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\itqbRepository")
 */
class itqb
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
     * @ORM\Column(name="Your_Name", type="string", length=40)
     */
    private $yourName;

    /**
     * @var string
     *
     * @ORM\Column(name="Your_Email", type="string", length=40)
     */
    private $yourEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="Username", type="string", length=30)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="Password", type="string", length=255)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="Confirm_Password", type="string", length=255)
     */
    private $confirmPassword;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set yourName
     *
     * @param string $yourName
     *
     * @return itqb
     */
    public function setYourName($yourName)
    {
        $this->yourName = $yourName;

        return $this;
    }

    /**
     * Get yourName
     *
     * @return string
     */
    public function getYourName()
    {
        return $this->yourName;
    }

    /**
     * Set yourEmail
     *
     * @param string $yourEmail
     *
     * @return itqb
     */
    public function setYourEmail($yourEmail)
    {
        $this->yourEmail = $yourEmail;

        return $this;
    }

    /**
     * Get yourEmail
     *
     * @return string
     */
    public function getYourEmail()
    {
        return $this->yourEmail;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return itqb
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return itqb
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set confirmPassword
     *
     * @param string $confirmPassword
     *
     * @return itqb
     */
    public function setConfirmPassword($confirmPassword)
    {
        $this->confirmPassword = $confirmPassword;

        return $this;
    }

    /**
     * Get confirmPassword
     *
     * @return string
     */
    public function getConfirmPassword()
    {
        return $this->confirmPassword;
    }
}

