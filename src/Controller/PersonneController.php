<?php

namespace App\Controller;

use App\Entity\Personne;
use App\Repository\PersonneRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/personne')]
class PersonneController extends AbstractController
{
    private $manager;
    public function __construct(private PersonneRepository $repository, private ManagerRegistry $doctrine)
    {
        $this->manager = $doctrine->getManager();
    }
    #[Route('/', name: 'app_personne')]
    public function index(): Response
    {
        $personnes = $this->repository->findAll();
        return $this->render('personne/index.html.twig', [
            'personnes' => $personnes,
        ]);
    }
    #[Route('/delete/{id}', name: 'app_personne_delete')]
    public function deletePersonne(Personne $personne = null): Response
    {
        if (!$personne) {
            throw new NotFoundHttpException('Route innexistante');
        } else {
            $this->manager->remove($personne);
            $this->manager->flush();
            $this->addFlash('success',"Personne supprimée avec succès :)");
            return $this->forward("App\\Controller\\PersonneController::index");
        }
    }
}
