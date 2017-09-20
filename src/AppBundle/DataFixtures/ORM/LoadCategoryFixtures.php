<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 9/5/2017
 * Time: 1:49 PM
 */

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Category;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadCategoryFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $category = (new Category())
            ->setName('Abstract')
        ;

        $this->addReference('category.abstract', $category);

        $manager->persist($category);
        $manager->flush();
    }

    public function getOrder()
    {
        return 100;
    }
}
