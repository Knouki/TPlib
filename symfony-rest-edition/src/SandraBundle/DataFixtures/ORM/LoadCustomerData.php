<?php
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use SandraBundle\Entity\Customer;

/**
 * Created by PhpStorm.
 * User: Skooky
 * Date: 23/06/2016
 * Time: 14:44
 */
class LoadCustomerData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $customer = new Customer();
        $customer->setRef("CUS100");
        $customer->setName('jean');
        $customer->setAddress('rue de la patate');
        $customer->setPostalCode('35555');
        $customer->setCity('Rennes');
        $customer->setPhone('0254545445');
        $customer->setMail('lala@lala.com');

        $manager->persist($customer);

        $customer1 = new Customer();
        $customer1->setRef("CUS200");
        $customer1->setName('paul');
        $customer1->setAddress('rue de la rigourdière');
        $customer1->setPostalCode('55555');
        $customer1->setCity('Vannes');
        $customer1->setPhone('0555454545');
        $customer1->setMail('toto@lala.com');

        $manager->persist($customer1);

        $customer2 = new Customer();
        $customer2->setRef("CUS300");
        $customer2->setName('Caroline');
        $customer2->setAddress('rue du général de gaulle');
        $customer2->setPostalCode('62000');
        $customer2->setCity('Poitiers');
        $customer2->setPhone('0244446655');
        $customer2->setMail('titi@lala.com');

        $manager->persist($customer2);

        $customer3 = new Customer();
        $customer3->setRef("CUS400");
        $customer3->setName('Lola');
        $customer3->setAddress('rue de lune');
        $customer3->setPostalCode('75000');
        $customer3->setCity('Paris');
        $customer3->setPhone('0254555545');
        $customer3->setMail('tutu@lala.com');

        $manager->persist($customer3);

        $this->addReference('customer', $customer);
        $this->addReference('customer1', $customer1);
        $this->addReference('customer2', $customer2);
        $this->addReference('customer3', $customer3);

        $manager->flush();
    }


    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 2;
    }
}