<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Wallpaper;

class LoadWallpaperFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $wallpaper = (new Wallpaper())
            ->setFilename('abstract-background-pink.jpg')
            ->setSlug('abstract-background-pink')
            ->setWidth(1920)
            ->setHeight(1080)
            ->setCategory(
                $this->getReference('category.abstract')
            )
        ;

        $manager->persist($wallpaper);
        $manager->flush();
    }

    public function getOrder()
    {
        return 200;
    }
}
