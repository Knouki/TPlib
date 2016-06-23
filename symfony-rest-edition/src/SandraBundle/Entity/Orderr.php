<?php

namespace SandraBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use SandraBundle\Entity\OrderDetail;
use SandraBundle\Entity\Delivery;
use SandraBundle\Entity\Customer;

/**
 * Orderr
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SandraBundle\Entity\OrderrRepository")
 */
class Orderr
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="ref", type="string", length=255)
     */
    private $ref;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCreated", type="datetimetz")
     */
    private $dateCreated;

    /**
     * @ORM\OneToMany(targetEntity="OrderDetail", mappedBy="order")
     */
    private $orderDetails;

    /**
     * @ORM\ManyToOne(targetEntity="Customer", inversedBy="orders")
     * @ORM\JoinColumn(name="customer_id", referencedColumnName="id")
     */
    private $customer;

    /**
     * @ORM\OneToMany(targetEntity="Delivery", mappedBy="order")
     */
    private $deliveries;

    public function __construct() {
        $this->orderDetails = new ArrayCollection();
        $this->deliveries = new ArrayCollection();
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
     * Set ref
     *
     * @param string $ref
     *
     * @return Orderr
     */
    public function setRef($ref)
    {
        $this->ref = $ref;

        return $this;
    }

    /**
     * Get ref
     *
     * @return string
     */
    public function getRef()
    {
        return $this->ref;
    }

    /**
     * Set dateCreated
     *
     * @param \DateTime $dateCreated
     *
     * @return Orderr
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }

    /**
     * Get dateCreated
     *
     * @return \DateTime
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }
}

