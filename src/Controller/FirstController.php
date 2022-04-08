<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class FirstController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function first() {
        dump('in First');
        $tab = ["mouna", 'ahmed', 'chez pas'];
        dump($tab);
        return $this->forward('App\Controller\SecondController::index', [
            'name' => $tab[rand()%count($tab)]]
        );
//        return new Response("<h1>cc Gl2 G2 :)</h1>");
    }
}