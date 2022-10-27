<?php

namespace App\Controller;

use App\Entity\Pensum;
use App\Entity\Usuarios;
use App\Entity\Materias;
use App\Services\Helpers;
use App\Repository\busquedaRepository;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class PensumController extends AbstractController
{
    #[Route('/pensum', name: 'app_pensum')]
    public function pensum(ManagerRegistry $doctrine, Helpers $helpers)
    {
        $datos = $doctrine->getRepository(Pensum::class)->findAll();
        $json = $helpers->serializador($datos);

        return $json;

    }
    #[Route('/pensumbusqueda', name: 'app_pensum')]
    public function pensumBusqueda(ManagerRegistry $doctrine, busquedaRepository $busquedaRepository)
    {
        $nombre='santiago';

        /** @var busquedaRepository */
        $busquedaRepository=$doctrine->getRepository(pensum::class)->findAll();
        $algo = $busquedaRepository->busqueda($nombre);

        return $algo;
    }

    #[Route('/materias', name: 'app_materias')]
    public function materias(ManagerRegistry $doctrine, Helpers $helpers){
        $datos=$doctrine->getRepository(Materias::class)->findAll();
        $json=$helpers->serializador($datos);

        return $json;
    }

    #[Route('/usuarios', name:'app_usuarios')]
    public function usuarios(ManagerRegistry $doctrine, Helpers $helpers){
        $datos=$doctrine->getRepository(Usuarios::class)->findAll();
        $json=$helpers->serializador($datos);

        return $json;
    }
}
