<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Wallpaper;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class LoadWallpaperFixtures extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        /**
         * @var $fs Filesystem
         */
        $fs = $this->container->get('filesystem');
        $imagesPath = __DIR__ . '/../images';
        $temporaryImagesPath = sys_get_temp_dir() . '/images';
        echo 'Copying images to temporary location' . PHP_EOL;
        $fs->mirror($imagesPath, $temporaryImagesPath);
        //exec('cp -R ' . $imagesPath . ' ' . $temporaryImagesPath);

        $wallpaper = (new Wallpaper())
            ->setFile(
                new UploadedFile(
                    $temporaryImagesPath . '/abstract-background-pink.jpg',
                    'abstract-background-pink.jpg'
                )
            )
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

        // more fixture data here
        echo 'Removed images from temporary location' . PHP_EOL;
        $fs->remove($temporaryImagesPath);
        //exec('rm -rf ' . $temporaryImagesPath);

    }

    public function getOrder()
    {
        return 200;
    }
}
