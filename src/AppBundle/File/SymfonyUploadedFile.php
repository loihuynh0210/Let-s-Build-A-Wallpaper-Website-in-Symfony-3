<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 9/20/2017
 * Time: 3:20 PM
 */

namespace AppBundle\File;

use AppBundle\Model\FileInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class SymfonyUploadedFile implements FileInterface
{
    /**
     * @var $uploadedFile UploadedFile
     */
    private $file;

    /**
     * @return UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param UploadedFile $file
     * @return SymfonyUploadedFile
     */
    public function setFile($file)
    {
        $this->file = $file;

        return $this;
    }


    public function getPathname()
    {
        return $this->file->getPathname();
    }

    public function getFilename()
    {
        return $this->file->getClientOriginalName();
    }

}
