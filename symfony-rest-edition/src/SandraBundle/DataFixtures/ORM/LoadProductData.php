<?php
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use SandraBundle\Entity\Product;

/**
 * Created by PhpStorm.
 * User: Skooky
 * Date: 23/06/2016
 * Time: 14:44
 */
class LoadProductData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        $product = new Product();
        $product->setName("Product 1");
        $product->setDescription("lala");
        $product->setPrice(1.65);

        $manager->persist($product);

        $product1 = new Product();
        $product1->setName("Product 2");
        $product1->setDescription("lala");
        $product1->setPrice(1.65);

        $manager->persist($product1);
        $product2 = new Product();
        $product2->setName("Product 3");
        $product2->setDescription("lala");
        $product2->setPrice(1.65);

        $manager->persist($product2);
        $product3 = new Product();
        $product3->setName("Product 4");
        $product3->setDescription("lala");
        $product3->setPrice(1.65);

        $manager->persist($product3);
        $product4 = new Product();
        $product4->setName("Product 5");
        $product4->setDescription("lala");
        $product4->setPrice(1.65);

        $manager->persist($product4);


        $this->addReference('product', $product);
        $this->addReference('product1', $product1);
        $this->addReference('product2', $product2);
        $this->addReference('product3', $product3);
        $this->addReference('product4', $product4);

        $manager->flush();
    }


    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 1;
    }
}