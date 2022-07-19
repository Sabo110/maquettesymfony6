<?php

namespace App\Controller;

use App\Entity\Services;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MaquetteController extends AbstractController
{
    #[Route('/', name: 'maquette')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(Services::class);
        $tabservices = $repository->findAll();
        return $this->render('maquette/index.html.twig', [
            'services' => $tabservices
        ]);
    }
}
