<?php

namespace App\Controller;

use App\Entity\Services;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class ApiController extends AbstractController
{
    #[Route('/bproo', name: 'bpro')]
    public function index(): Response
    {
        return $this->render('test.html.twig', [
            
        ]);
    }

    #[Route('/api/list', name: 'api.list')]
    public function applist(ManagerRegistry $doctrine, SerializerInterface $serialize)
    {
        
        $repository = $doctrine->getRepository(Services::class);
        $tabservice = $repository->findAll();
        $rep = $serialize->serialize($tabservice,'json');
        // $res = new Response($rep);
        // $res->headers->set('content-type', 'application/json');
        // return $res;
        $response = new JsonResponse($rep, 200, [], true);
        return $response;
    }
}
 