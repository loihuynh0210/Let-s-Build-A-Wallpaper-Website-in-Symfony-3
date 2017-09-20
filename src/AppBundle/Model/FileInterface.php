<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 9/20/2017
 * Time: 2:55 PM
 */

namespace AppBundle\Model;

interface FileInterface
{
    public function getPathname();
    public function getFilename();
}