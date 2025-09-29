<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Image;

final class ImageController extends AbstractController
{
    #[Route('/image', name: 'app_image')]
    public function index(ImageRepository $imageRepository): Response
    {
        $images = $imageRepository->findAll();
        return $this->render('image/index.html.twig', [
            'images' => $images,
        ]);
    }
}
