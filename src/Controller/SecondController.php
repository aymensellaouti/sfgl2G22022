<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('second')]
class SecondController extends AbstractController
{
    #[Route('/{name<[01]?\d{1,2}>}', name: 'app_second')]
    public function index($name, Request $request): Response
    {
//        dump($request);
//        if($name % 3 == 0) {
//            $this->addFlash('success','ca marche :)');
//        }
        return $this->render('second/index.html.twig', [
            'controller_name' => 'SecondController',
            'esm' => $name,
        ]);
    }
}
