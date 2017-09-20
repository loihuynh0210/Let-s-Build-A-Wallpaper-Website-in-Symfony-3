<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class GalleryController extends Controller
{
    /**
     * @Route("/gallery", name="gallery")
     * @param Request $request
     */
    public function indexAction(Request $request)
    {
        $images = [
            'landscape-summer-beach.jpg',
            'landscape-summer-field.jpg',
            'landscape-summer-flowers.jpg',
            'landscape-summer-hill.jpg',
            'landscape-summer-mountain.png',
            'landscape-summer-sea.jpg',
            'landscape-summer-sky.jpg',
        ];

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $images,
            $request->query->getInt('different', 1)/*page number*/,
            2/*limit per page*/
        );
        return $this->render('gallery/index.html.twig', [
            'images' => $pagination
        ]);
    }
}
