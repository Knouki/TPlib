<?php

namespace SandraBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use SandraBundle\Entity\OrderDetail;

/**
 * Product
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SandraBundle\Entity\ProductRepository")
 */
class Product
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float")
     */
    private $price;

    /**
     * @ORM\OneToMany(targetEntity="OrderDetail", mappedBy="product")
     */
    private $orderDetails;

    public function __construct() {
        $this->orderDetails = new ArrayCollection();
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
     * Set name
     *
     * @param string $name
     *
     * @return Product
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
     * Set description
     *
     * @param string $description
     *
     * @return Product
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set price
     *
     * @param float $price
     *
     * @return Product
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Add orderDetail
     *
     * @param \SandraBundle\Entity\OrderDetail $orderDetail
     *
     * @return Product
     */
    public function addOrderDetail(\SandraBundle\Entity\OrderDetail $orderDetail)
    {
        $this->orderDetails[] = $orderDetail;

        return $this;
    }

    /**
     * Remove orderDetail
     *
     * @param \SandraBundle\Entity\OrderDetail $orderDetail
     */
    public function removeOrderDetail(\SandraBundle\Entity\OrderDetail $orderDetail)
    {
        $this->orderDetails->removeElement($orderDetail);
    }

    /**
     * Get orderDetails
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOrderDetails()
    {
        return $this->orderDetails;
    }
}
