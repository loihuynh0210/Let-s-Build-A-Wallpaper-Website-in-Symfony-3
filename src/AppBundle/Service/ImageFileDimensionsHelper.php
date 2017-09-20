<?php

namespace AppBundle\Service;

/**
 * Class ImageFileDimensionsHelper
 * @package AppBundle\Service
 */
class ImageFileDimensionsHelper
{
    /**
     * @var array $imageSizeAttributes
     */
    private $imageSizeAttributes;

    /**
     * @param string $filepath
     */
    public function setImageFilePath(string $filepath)
    {
        $this->imageSizeAttributes = getimagesize($filepath);
    }

    /**
     * @return int
     */
    public function getWidth()
    {
        try {
            return (int) $this->imageSizeAttributes[0];
        } catch (\Exception $e) {
            return 0;
        }
    }

    /**
     * @return int
     */
    public function getHeight()
    {
        try {
            return (int) $this->imageSizeAttributes[1];
        } catch (\Exception $e) {
            return 0;
        }
    }
}
