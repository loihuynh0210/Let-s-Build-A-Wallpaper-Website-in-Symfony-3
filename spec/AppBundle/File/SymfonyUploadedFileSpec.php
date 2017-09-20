<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 9/20/2017
 * Time: 3:15 PM
 */

namespace spec\AppBundle\File;

use AppBundle\File\SymfonyUploadedFile;
use AppBundle\Model\FileInterface;
use PhpSpec\ObjectBehavior;

class SymfonyUploadedFileSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(SymfonyUploadedFile::class);
        $this->shouldHaveType(FileInterface::class);
    }
}