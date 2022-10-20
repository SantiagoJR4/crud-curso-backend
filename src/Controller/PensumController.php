<?php

namespace App\Controller;

use App\Entity\Pensum;
use App\Services\Helpers;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class PensumController extends AbstractController
{
    #[Route('/pensum', name: 'app_pensum')]
    public function index(ManagerRegistry $doctrine, Helpers $helpers)
    {
        $datos = $doctrine->getRepository(Pensum::class)->findAll();
        $json = $helpers->serializador($datos);

        return $json;

    }
}
