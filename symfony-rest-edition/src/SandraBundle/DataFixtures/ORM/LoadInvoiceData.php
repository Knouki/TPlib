<?php
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use SandraBundle\Entity\Invoice;

/**
 * Created by PhpStorm.
 * User: Skooky
 * Date: 23/06/2016
 * Time: 14:44
 */
class LoadInvoiceData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        $invoice = new Invoice();
        $invoice->setRef("Invoice1");
        $invoice->setDateInvoice(new DateTime());

        $manager->persist($invoice);

        $invoice1 = new Invoice();
        $invoice1->setRef("Invoice2");
        $invoice1->setDateInvoice(new DateTime());

        $manager->persist($invoice1);
        $invoice2 = new Invoice();
        $invoice2->setRef("Invoice3");
        $invoice2->setDateInvoice(new DateTime());

        $manager->persist($invoice2);
        $invoice3 = new Invoice();
        $invoice3->setRef("Invoice4");
        $invoice3->setDateInvoice(new DateTime());

        $manager->persist($invoice3);

        $this->addReference('invoice', $invoice);
        $this->addReference('invoice1', $invoice1);
        $this->addReference('invoice2', $invoice2);
        $this->addReference('invoice3', $invoice3);

        $manager->flush();
    }


    /**
     * Get the invoice of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 4;
    }
}