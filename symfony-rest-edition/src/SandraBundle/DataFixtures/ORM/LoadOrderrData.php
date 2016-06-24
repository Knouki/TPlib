<?php
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use SandraBundle\Entity\Orderr;

/**
 * Created by PhpStorm.
 * User: Skooky
 * Date: 23/06/2016
 * Time: 14:44
 */
class LoadOrderrData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        $order = new Orderr();
        $order->setRef("Orderr1");
        $order->setDateCreated(new DateTime());
        $order->setCustomer($this->getReference('customer'));

        $manager->persist($order);

        $order1 = new Orderr();
        $order1->setRef("Orderr2");
        $order1->setDateCreated(new DateTime());
        $order1->setCustomer($this->getReference('customer1'));

        $manager->persist($order1);
        $order2 = new Orderr();
        $order2->setRef("Orderr3");
        $order2->setDateCreated(new DateTime());
        $order2->setCustomer($this->getReference('customer2'));

        $manager->persist($order2);
        $order3 = new Orderr();
        $order3->setRef("Orderr4");
        $order3->setDateCreated(new DateTime());
        $order3->setCustomer($this->getReference('customer3'));

        $manager->persist($order3);

        $this->addReference('order', $order);
        $this->addReference('order1', $order1);
        $this->addReference('order2', $order2);
        $this->addReference('order3', $order3);

        $manager->flush();
    }


    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 3;
    }
}