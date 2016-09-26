<?php

namespace Ambientes\CidmBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SolinstructorController extends Controller
{
    public function indexAction()
    {
     return $this->render('AmbientesCidmBundle:Formatos:index.html.twig', array('index'));
     
    }

public function solinstructorAction()
{
        $securityContext = $this->container->get('security.context');

        if ($securityContext->isGranted('ROLE_USER')) {
            return $this->render('AmbientesCidmBundle:Formatos:solinstructor.html.twig',array('solinstructor'));
            }

}


public function solinstructoraAction()
    {
        $em = $this->getDoctrine()->getManager();
        $db = $em->getConnection();
$fsolicitud=$_REQUEST['fsolicitud'];
$finicio=$_REQUEST['finicio'];
$ffin=$_REQUEST['ffin'];
$hinicio=$_REQUEST['hinicio'];
$hfin=$_REQUEST['hfin'];
$personas=$_REQUEST['personas'];
$usuario=$_REQUEST['usuario'];
$software=$_REQUEST['software'];

$sql = "INSERT into solicitud(fecha_solicitud,fecha_inicio,fecha_fin,hora_inicio,hora_fin,numero_personas,id_usuario,id_software)
 values('$fsolicitud','$finicio','$ffin','$hinicio','$hfin','$personas','$usuario','$software')";
                $stmt = $db->prepare($sql);
                $stmt->execute();
 
        $query = "SELECT nombre FROM software where id_software='$software'";
        $stmt2 = $db->prepare($query);
        $params = array();
        $stmt2->execute($params);
        $po=$stmt2->fetchAll();
 
        // Mostrar todo
        foreach ($po as $p) {
            $salida=$p["nombre"];
        }
        echo "<div id='prueba2'>";
        echo "<h2>Solicitud exitosa! Solicitó el software: $salida</h2>";
        echo "</div>";     
        $securityContext = $this->container->get('security.context');    
        if ($securityContext->isGranted('ROLE_USER')) {
        return $this->render('AmbientesCidmBundle:Formatos:solinstructora.html.twig', array('solinstructora'));   
        }
        
    }   


}
