<?php

namespace App\Controller;

use App\Entity\Services;
use App\Form\ServiceType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FormulaireController extends AbstractController
{
    #[Route('/form', name: 'form')]
    public function index(ManagerRegistry $doctrine, Request $request): Response
    {
        
        $service = new Services();
        $form = $this->createForm(ServiceType::class,$service);
        $form->handleRequest($request);
        if($form->isSubmitted()){
            // si le formulaire a été soumis on rajoute l'objet service dans la base de donnée
            $manager = $doctrine->getManager();
            $manager->persist($service);
            $manager->flush();
            $this->addFlash('success', 'Serice ajouté avec succès');
           return $this->redirectToRoute('maquette');
          

        }
        return $this->render('formulaire/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
