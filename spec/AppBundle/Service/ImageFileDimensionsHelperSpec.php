<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 9/20/2017
 * Time: 5:06 PM
 */

namespace spec\AppBundle\Service;


use AppBundle\Service\ImageFileDimensionsHelper;
use PhpSpec\ObjectBehavior;

class ImageFileDimensionsHelperSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(ImageFileDimensionsHelper::class);
    }
}