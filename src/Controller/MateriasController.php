<?php

namespace App\Controller;

use App\Entity\Materias;
use App\Services\Helpers;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MateriasController extends AbstractController
{
    #[Route('/materias', name: 'app_materias')]
    public function index(ManagerRegistry $doctrine, Helpers $helpers){
        $datos=$doctrine->getRepository(Materias::class)->findAll();
        $json=$helpers->serializador($datos);

        return $json;
    }
}
