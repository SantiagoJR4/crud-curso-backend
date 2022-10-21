<?php

namespace App\Controller;

use App\Entity\Usuarios;
use App\Services\Helpers;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UsuariosController extends AbstractController
{
    #[Route('/usuarios', name: 'app_usuarios')]
    public function index(ManagerRegistry $doctrine, Helpers $helpers){
        
        $datos=$doctrine->getRepository(Usuarios::class)->findAll();
        $json=$helpers->serializador($datos);

        return $json;
    }
}
