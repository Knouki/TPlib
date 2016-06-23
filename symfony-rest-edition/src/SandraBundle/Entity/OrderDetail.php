<?php

namespace SandraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use SandraBundle\Entity\Orderr;
use SandraBundle\Entity\Product;

/**
 * OrderDetail
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SandraBundle\Entity\OrderDetailRepository")
 */
class OrderDetail
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
     * @var float
     *
     * @ORM\Column(name="qty", type="float")
     */
    private $qty;

    /**
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="orderDetails")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     */
    private $product;

    /**
     * @ORM\ManyToOne(targetEntity="Orderr", inversedBy="orderDetails")
     * @ORM\JoinColumn(name="orederr_id", referencedColumnName="id")
     */
    private $order;

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
     * Set qty
     *
     * @param float $qty
     *
     * @return OrderDetail
     */
    public function setQty($qty)
    {
        $this->qty = $qty;

        return $this;
    }

    /**
     * Get qty
     *
     * @return float
     */
    public function getQty()
    {
        return $this->qty;
    }
}

