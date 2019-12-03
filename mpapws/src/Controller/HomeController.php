<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController{

    public function __construct(Environment $twig)
    {

        $this->twig = $twig;

    }

    public function index():Response{

        return new Response($this->twig->render('pages/home.html.twig'));

    }


    /**
     * @Route("/listeBD/{genre}", name="listeBDGenre")
     */

    public function listeBDGenre($genre)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('App\Entity\BandeDessinee');
        $BandeDessinees = $repository->findBy(array('Genre' => $genre));
        return $this->render('pages/listeBD.html.twig', [
            'BandeDessinees' => $BandeDessinees
        ]);
    }

    /**
     * @Route("/listeBD/{genre}/{sousGenre}", name="listeBDSousGenre")
     */

    public function listeBDSousGenre($genre, $sousGenre)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('App\Entity\BandeDessinee');
        $BandeDessinees = $repository->findBy(array('Genre' => $genre, 'SousGenre' => $sousGenre));
        return $this->render('pages/listeBD.html.twig', [
            'BandeDessinees' => $BandeDessinees
        ]);
    }
}