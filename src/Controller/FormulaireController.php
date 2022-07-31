<?php

namespace App\Controller;

use App\Entity\Services;
use App\Form\ServiceType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
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
            $this->addFlash('success', ' ajout effectué avec succès');
           return $this->redirectToRoute('maquette');
          

        }
        return $this->render('formulaire/index.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('/form/edit/{id}', name: 'formedit')]
    public function edit(ManagerRegistry $doctrine, Request $request, $id): Response
    {
        $repository = $doctrine->getRepository(Services::class);
        $service = $repository->find($id);
        $form = $this->createForm(ServiceType::class, $service);
        
        $form->handleRequest($request);
        if($form->isSubmitted())
        {
            $manager = $doctrine->getManager();
            $manager->persist($service);
            $manager->flush();
            $this->addFlash('success', 'mise à jour éffectué avec succès');
            return $this->redirectToRoute('maquette');
        }

        return $this->render('formulaire/edit.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('/form/delete/{id}', name: 'formdelete')]
    public function delete(ManagerRegistry $doctrine, Request $request, $id): RedirectResponse
    {
        $repository = $doctrine->getRepository(Services::class);
        $service = $repository->find($id);
        $manager = $doctrine->getManager();
        $manager->remove($service);
        $manager->flush();
        $this->addFlash('success', 'suppression éffectué avec succès');
        return $this->redirectToRoute('maquette');
    }

}
