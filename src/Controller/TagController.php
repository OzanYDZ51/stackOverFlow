<?php

namespace App\Controller;

use App\Entity\Tag;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TagController extends AbstractController
{
    /**
     * @Route("/tag/{id}", name="tag")
     */
    public function index(Tag $id)
    {
        return $this->render('tag/index.html.twig', [
            'tag' => $id,
        ]);
    }
}
