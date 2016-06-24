<?php

namespace SandraBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use SandraBundle\Entity\Delivery;

/**
 * Invoice
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SandraBundle\Entity\InvoiceRepository")
 */
class Invoice
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
     * @ORM\Column(name="dateInvoice", type="datetime")
     */
    private $dateInvoice;
    
    /**
     * @ORM\OneToMany(targetEntity="Delivery", mappedBy="invoice")
     */
    private $deliveries;

    public function __construct() {
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
     * @return Invoice
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
     * Set dateInvoice
     *
     * @param \DateTime $dateInvoice
     *
     * @return Invoice
     */
    public function setDateInvoice($dateInvoice)
    {
        $this->dateInvoice = $dateInvoice;

        return $this;
    }

    /**
     * Get dateInvoice
     *
     * @return \DateTime
     */
    public function getDateInvoice()
    {
        return $this->dateInvoice;
    }

    /**
     * Add delivery
     *
     * @param \SandraBundle\Entity\Delivery $delivery
     *
     * @return Invoice
     */
    public function addDelivery(\SandraBundle\Entity\Delivery $delivery)
    {
        $this->deliveries[] = $delivery;

        return $this;
    }

    /**
     * Remove delivery
     *
     * @param \SandraBundle\Entity\Delivery $delivery
     */
    public function removeDelivery(\SandraBundle\Entity\Delivery $delivery)
    {
        $this->deliveries->removeElement($delivery);
    }

    /**
     * Get deliveries
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDeliveries()
    {
        return $this->deliveries;
    }
}
