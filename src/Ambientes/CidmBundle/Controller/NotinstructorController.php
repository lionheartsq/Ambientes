<?php

namespace Ambientes\CidmBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class NotinstructorController extends Controller
{
    public function notifAction()
    {
        $em = $this->getDoctrine()->getManager();
        $db = $em->getConnection();

$query = "SELECT notificaciones.id_notificacion,usuario.nombre as nombre,notificaciones.descripcion,
    notificaciones.fecha_notificacion,notificaciones.fecha_inicio,notificaciones.fecha_fin,notificaciones.hora_inicio,
    notificaciones.hora_fin,tipo_notificacion.nombre as notificacion,ficha.codigo as ficha from notificaciones
    join tipo_notificacion on notificaciones.id_tipo_notificacion=tipo_notificacion.id_tipo_notificacion join ficha
    on ficha.id_ficha=notificaciones.id_ficha join usuario on notificaciones.id_usuario_gen=usuario.id_usuario
    where notificaciones.estado='0' order by notificaciones.fecha_inicio ASC";
        $stmt2 = $db->prepare($query);
        $params = array();
        $stmt2->execute($params);
        $po=$stmt2->fetchAll();           
        return $this->render('AmbientesCidmBundle:Formatos:notif.html.twig', array(
                     'entities' => $po,
        ));      
    }


public function notcoordAction()
    {
        $em = $this->getDoctrine()->getManager();
        $db = $em->getConnection();

$notificacion=$_REQUEST['notificacion']; 
$reemplazo=$_REQUEST['reem'];
$respuesta=$_REQUEST['respuesta'];

$hoy=date("Y-m-d");
$sql = "update notificaciones set id_usuario_reem='$reemplazo',estado='$respuesta',fecha_respuesta='$hoy' where id_notificacion='$notificacion'";
                $stmt = $db->prepare($sql);
                $stmt->execute();

                
        $securityContext = $this->container->get('security.context');    
        if ($securityContext->isGranted('ROLE_ADMIN')) {
        return $this->render('AmbientesCidmBundle:Formatos:notcoord.html.twig', array('notcoord'));   
        }else{
             return $this->render('AmbientesCidmBundle:Default:crud.html.twig', array('crud'));   
        }
        
    }       
    
    public function solicAction()
    {
        $em = $this->getDoctrine()->getManager();
        $db = $em->getConnection();

$query2 = "SELECT  solicitud.id_solicitud,solicitud.fecha_solicitud,solicitud.fecha_inicio,
solicitud.fecha_fin,solicitud.hora_inicio,solicitud.hora_fin,solicitud.numero_personas,solicitud.id_software,
usuario.nombre from solicitud join usuario on solicitud.id_usuario=usuario.id_usuario 
where solicitud.estado='0' order by solicitud.fecha_inicio ASC";
        $stmt2 = $db->prepare($query2);
        $params = array();
        $stmt2->execute($params);
        $po2=$stmt2->fetchAll();
        
        $cont=0;
        foreach ($po2 as $p2) {
            
            $capacidad=$p2["numero_personas"];
            $software=$p2["id_software"];  

$query = "SELECT ambiente.nombre as nombreambiente,ambiente.id_ambiente from ambiente 
 join sw_ambiente on ambiente.id_ambiente=sw_ambiente.id_ambiente join software on 
 software.id_software=sw_ambiente.id_software where software.id_software='$software' and ambiente.puestos_trabajo >= '$capacidad'";
        $stmt = $db->prepare($query);
        $params = array();
        $stmt->execute($params);
        $po=$stmt->fetchAll();
$nod='No disponible';
$noid='0';
     
        if(empty($po)){    
            $po[0] = array('nombreambiente'=>$nod,'id_ambiente'=>$noid);
        }
        
        $po2[$cont++]['opciones']=$po;
}       
/*      
print_r($po2);
*/
        return $this->render('AmbientesCidmBundle:Default:vista.html.twig', array(
                    'entities' => $po2,
            ));

    }

        public function soliccoordAction()
    {
        
$em = $this->getDoctrine()->getManager();
        $db = $em->getConnection();

$notificacion=$_REQUEST['notificacion']; 
$idambiente=$_REQUEST['amb'];
$respuesta=$_REQUEST['respuesta'];

$hoy=date("Y-m-d");
$sql = "update solicitud set id_ambiente='$idambiente',estado='$respuesta',fecha_respuesta='$hoy' where id_solicitud='$notificacion'";
                $stmt = $db->prepare($sql);
                $stmt->execute();

        $securityContext = $this->container->get('security.context');    
        if ($securityContext->isGranted('ROLE_ADMIN')) {
        return $this->render('AmbientesCidmBundle:Formatos:soliccoord.html.twig', array('soliccoord'));   
        }else{
             return $this->render('AmbientesCidmBundle:Default:crud.html.twig', array('crud'));   
        }
     
    }
    
public function notinstructorAction()
{
        $securityContext = $this->container->get('security.context');

        if ($securityContext->isGranted('ROLE_USER')) {
            return $this->render('AmbientesCidmBundle:Formatos:notinstructor.html.twig',array('notinstructor'));
            }

}


public function notinstructoraAction()
    {
        $em = $this->getDoctrine()->getManager();
        $db = $em->getConnection();

$tipo=$_REQUEST['tipo']; 
$ficha=$_REQUEST['ficha'];
$usuario=$_REQUEST['usuario'];
$descripcion=$_REQUEST['descripcion'];
$fnot=$_REQUEST['fnot'];
$finicio=$_REQUEST['finicio'];
$ffin=$_REQUEST['ffin'];
$hinicio=$_REQUEST['hinicio'];
$hfin=$_REQUEST['hfin'];


$sql = "INSERT into notificaciones(id_tipo_notificacion,id_ficha,id_usuario_gen,descripcion,fecha_notificacion,
fecha_inicio,fecha_fin,hora_inicio,hora_fin) 
values('$tipo','$ficha','$usuario','$descripcion','$fnot','$finicio','$ffin','$hinicio','$hfin')";
                $stmt = $db->prepare($sql);
                $stmt->execute();
 
        $query = "SELECT nombre FROM tipo_notificacion where id_tipo_notificacion='$tipo'";
        $stmt2 = $db->prepare($query);
        $params = array();
        $stmt2->execute($params);
        $po=$stmt2->fetchAll();
       
        $securityContext = $this->container->get('security.context'); 
        
        if ($securityContext->isGranted('ROLE_USER')) {
 
            return $this->render('AmbientesCidmBundle:Formatos:notinstructora.html.twig', array(
                     'entities' => $po,
        )); 
        
        }

        
    }   
}
