<?php
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use SandraBundle\Entity\Delivery;

/**
 * Created by PhpStorm.
 * User: Skooky
 * Date: 23/06/2016
 * Time: 14:44
 */
class LoadDeliveryData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        $delivery = new Delivery();
        $delivery->setRef("delivery1");
        $delivery->setDateDelivery(new DateTime());
        $delivery->setInvoice($this->getReference('invoice'));
        $delivery->setOrder($this->getReference('order'));

        $manager->persist($delivery);

        $delivery1 = new Delivery();
        $delivery1->setRef("delivery2");
        $delivery1->setDateDelivery(new DateTime());
        $delivery1->setInvoice($this->getReference('invoice1'));
        $delivery1->setOrder($this->getReference('order1'));

        $manager->persist($delivery1);
        $delivery2 = new Delivery();
        $delivery2->setRef("delivery3");
        $delivery2->setDateDelivery(new DateTime());
        $delivery2->setInvoice($this->getReference('invoice2'));
        $delivery2->setOrder($this->getReference('order2'));

        $manager->persist($delivery2);
        $delivery3 = new Delivery();
        $delivery3->setRef("delivery4");
        $delivery3->setDateDelivery(new DateTime());
        $delivery3->setInvoice($this->getReference('invoice3'));
        $delivery3->setOrder($this->getReference('order3'));

        $manager->persist($delivery3);

        $this->addReference('delivery', $delivery);
        $this->addReference('delivery1', $delivery1);
        $this->addReference('delivery2', $delivery2);
        $this->addReference('delivery3', $delivery3);

        $manager->flush();
    }


    /**
     * Get the delivery of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 6;
    }
}