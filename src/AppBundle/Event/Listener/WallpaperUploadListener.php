<?php

namespace AppBundle\Event\Listener;

use AppBundle\Entity\Wallpaper;
use AppBundle\Service\FileMover;
use AppBundle\Service\ImageFileDimensionsHelper;
use AppBundle\Service\WallpaperFilePathHelper;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;

class WallpaperUploadListener
{
    /**
     * @var FileMover
     */
    private $fileMover;
    /**
     * @var WallpaperFilePathHelper
     */
    private $wallpaperFilePathHelper;
    /**
     * @var ImageFileDimensionsHelper
     */
    private $imageFileDimensionsHelper;

    public function __construct(
        FileMover $fileMover,
        WallpaperFilePathHelper $wallpaperFilePathHelper,
        ImageFileDimensionsHelper $imageFileDimensionsHelper
    )
    {
        $this->fileMover = $fileMover;
        $this->wallpaperFilePathHelper = $wallpaperFilePathHelper;
        $this->imageFileDimensionsHelper = $imageFileDimensionsHelper;
    }

    public function prePersist(LifecycleEventArgs $eventArgs)
    {
        $entity = $eventArgs->getEntity();

        // if not Wallpaper entity, return false
        if (false === $entity instanceof Wallpaper) {
            return false;
        }

        /**
         * @var $entity Wallpaper
         */

        // get access to the file
        $file = $entity->getFile();

        $newFileLocation = $this->wallpaperFilePathHelper->getNewFilePath(
            $file->getFilename()
        );

        // got here
        $this->fileMover->move($file->getPathname(), $newFileLocation);

        $this->imageFileDimensionsHelper->setImageFilePath($newFileLocation);

        return $entity
            ->setFilename($file->getFilename())
            ->setHeight($this->imageFileDimensionsHelper->getHeight())
            ->setWidth($this->imageFileDimensionsHelper->getWidth())
        ;

    }

    public function preUpdate(PreUpdateEventArgs $eventArgs)
    {
    }
}
