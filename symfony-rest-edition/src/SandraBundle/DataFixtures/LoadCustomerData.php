<?php
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use SandraBundle\Entity\Customer;

/**
 * Created by PhpStorm.
 * User: Skooky
 * Date: 23/06/2016
 * Time: 14:44
 */
class LoadCustomerData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $userAdmin = new Customer();
        $userAdmin->setName('jean');
        $userAdmin->setAddress('rue de la patate');
        $userAdmin->setPostalCode('35555');
        $userAdmin->setCity('Rennes');
        $userAdmin->setPhone('0254545445');
        $userAdmin->setMail('lala@lala.com');

        $manager->persist($userAdmin);

        $userAdmin = new Customer();
        $userAdmin->setName('paul');
        $userAdmin->setAddress('rue de la rigourdière');
        $userAdmin->setPostalCode('55555');
        $userAdmin->setCity('Vannes');
        $userAdmin->setPhone('0555454545');
        $userAdmin->setMail('toto@lala.com');


        $userAdmin = new Customer();
        $userAdmin->setName('Caroline');
        $userAdmin->setAddress('rue du général de gaulle');
        $userAdmin->setPostalCode('62000');
        $userAdmin->setCity('Poitiers');
        $userAdmin->setPhone('0244446655');
        $userAdmin->setMail('titi@lala.com');


        $userAdmin = new Customer();
        $userAdmin->setName('Lola');
        $userAdmin->setAddress('rue de lune');
        $userAdmin->setPostalCode('75000');
        $userAdmin->setCity('Paris');
        $userAdmin->setPhone('0254555545');
        $userAdmin->setMail('tutu@lala.com');
        $manager->flush();
    }


}