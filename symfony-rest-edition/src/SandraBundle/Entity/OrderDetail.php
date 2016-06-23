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

    /**
     * Set product
     *
     * @param \SandraBundle\Entity\Product $product
     *
     * @return OrderDetail
     */
    public function setProduct(\SandraBundle\Entity\Product $product = null)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \SandraBundle\Entity\Product
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Set order
     *
     * @param \SandraBundle\Entity\Orderr $order
     *
     * @return OrderDetail
     */
    public function setOrder(\SandraBundle\Entity\Orderr $order = null)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * Get order
     *
     * @return \SandraBundle\Entity\Orderr
     */
    public function getOrder()
    {
        return $this->order;
    }
}
