<?php

namespace App\Controller;

use App\Entity\CargaComplejidadAcumulada;
use App\Entity\Empleado;
use App\Entity\SoporteTipo;
use App\Repository\CargaComplejidadAcumuladaRespository;
use DateTime;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SoporteTipoController extends AbstractController
{
    #[Route('/soporte/empleado', name: 'app_empleados')]
    public function empleados(ManagerRegistry $doctrine){
        $em = $doctrine->getManager();
        $listEmpleados = $doctrine-> getRepository(Empleado::class)-> findBy([],['nombre'=> 'ASC']);
        return $this -> render('Empleado/empleado.html.twig',['listEmpleados' => $listEmpleados]);
    }


    #[Route('/soporte/crear', name: 'app_soporte_tipo_crear')]
    public function create(Request $request, ManagerRegistry $doctrine){
        $em = $doctrine->getManager();
        $soporteTipo = new \App\Entity\SoporteTipo();
        $form_soporte_tipo = $this->createForm(\App\Form\SoporteTipoForm::class, $soporteTipo);
        $form_soporte_tipo->handleRequest($request );
        if($form_soporte_tipo-> isSubmitted() && $form_soporte_tipo->isValid()){
            $em ->persist($soporteTipo);
            $em ->flush();
            return $this->redirectToRoute('app_soporte_tipo');
        }
        return $this->render('SoporteTipo/crear.html.twig', [
            'form_soporte_tipo' =>$form_soporte_tipo->createView()
        ]);
    }
    #[Route('/soporte/soportes', name: 'app_soportes')]
    public function soportes(ManagerRegistry $doctrine){
        $em = $doctrine->getManager();
        $listSoportes = $doctrine-> getRepository(SoporteTipo::class)-> findBy([],['id'=> 'ASC']);
        return $this -> render('SoporteTipo/soportes.html.twig',['listSoportes' => $listSoportes]);
    }


}
