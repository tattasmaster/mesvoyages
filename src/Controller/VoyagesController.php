<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\VisiteRepository;

/**
 * Description of VoyagesController
 *
 * @author theok
 */
class VoyagesController extends AbstractController{
    /**
     * @Route("/voyages", name="voyages")
     * @return Response
     */
    public function index(): Response {
        $visites = $this->repository->findAll();
        return $this->render("pages/voyages.html.twig", [
            'visites' => $visites
        ]);
    }
    
    private $repository;
    
    public function __construct(VisiteRepository $repository) {
        $this->repository = $repository;
    }
}
