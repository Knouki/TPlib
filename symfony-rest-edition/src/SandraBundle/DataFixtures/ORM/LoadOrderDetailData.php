<?php
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use SandraBundle\Entity\OrderDetail;

/**
 * Created by PhpStorm.
 * User: Skooky
 * Date: 23/06/2016
 * Time: 14:44
 */
class LoadOrderDetailData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        $orderDetail = new OrderDetail();
        $orderDetail->setQty(5);
        $orderDetail->setProduct($this->getReference('product'));
        $orderDetail->setOrder($this->getReference('order'));

        $manager->persist($orderDetail);

        $orderDetail1 = new OrderDetail();
        $orderDetail1->setQty(7);
        $orderDetail1->setProduct($this->getReference('product1'));
        $orderDetail1->setOrder($this->getReference('order1'));

        $manager->persist($orderDetail1);
        $orderDetail2 = new OrderDetail();
        $orderDetail2->setQty(20);
        $orderDetail2->setProduct($this->getReference('product2'));
        $orderDetail2->setOrder($this->getReference('order2'));

        $manager->persist($orderDetail2);
        $orderDetail3 = new OrderDetail();
        $orderDetail3->setQty(300);
        $orderDetail3->setProduct($this->getReference('product3'));
        $orderDetail3->setOrder($this->getReference('order3'));

        $manager->persist($orderDetail3);

        $this->addReference('orderDetail', $orderDetail);
        $this->addReference('orderDetail1', $orderDetail1);
        $this->addReference('orderDetail2', $orderDetail2);
        $this->addReference('orderDetail3', $orderDetail3);

        $manager->flush();
    }


    /**
     * Get the orderDetail of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 5;
    }
}