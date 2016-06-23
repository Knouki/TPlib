<?php

namespace SandraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use SandraBundle\Entity\Orderr;
use SandraBundle\Entity\Invoice;

/**
 * Delivery
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SandraBundle\Entity\DeliveryRepository")
 */
class Delivery
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
     * @ORM\Column(name="dateDelivery", type="datetimetz")
     */
    private $dateDelivery;

    /**
     * @ORM\ManyToOne(targetEntity="Orderr", inversedBy="deliveries")
     * @ORM\JoinColumn(name="orderr_id", referencedColumnName="id")
     */
    private $order;

    /**
     * @ORM\ManyToOne(targetEntity="Invoice", inversedBy="deliveries")
     * @ORM\JoinColumn(name="invoice_id", referencedColumnName="id")
     */
    private $invoice;

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
     * @return Delivery
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
     * Set dateDelivery
     *
     * @param \DateTime $dateDelivery
     *
     * @return Delivery
     */
    public function setDateDelivery($dateDelivery)
    {
        $this->dateDelivery = $dateDelivery;

        return $this;
    }

    /**
     * Get dateDelivery
     *
     * @return \DateTime
     */
    public function getDateDelivery()
    {
        return $this->dateDelivery;
    }
}

