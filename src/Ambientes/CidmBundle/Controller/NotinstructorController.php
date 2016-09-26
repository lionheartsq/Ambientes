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
    join tipo_notificacion on notificaciones.id_notificacion=tipo_notificacion.id_tipo_notificacion join ficha
    on ficha.id_ficha=notificaciones.id_ficha join usuario on notificaciones.id_usuario_gen=usuario.id_usuario
    where notificaciones.estado='0' order by notificaciones.fecha_inicio ASC";
        $stmt2 = $db->prepare($query);
        $params = array();
        $stmt2->execute($params);
        $po=$stmt2->fetchAll();
echo '<div class="panel-heading" id="cabecera"><h1>Atención de solicitudes </h1></div>';            
echo  '<div>';	         
   echo "<table class='table'><th>Instructor</th><th>Detalle notificacion</th><th>Radicada en</th>"
        . "<th>Fecha inicial</th><th>Fecha final</th><th>Hora inicial</th><th>Hora final</th>"
         . "<th>ficha</th><th>Notificacion</th><th>Cédula reemplazo</th><th>Estado</th><th>Responder</th>";
        // Mostrar todo
  
        foreach ($po as $p) {
            echo "<tr>";
  echo "<form action='notcoord' method='post'>";    
        
            $id_notificacion=$p["id_notificacion"];
            $id_usuario_gen=$p["nombre"];
            $descripcion=$p["descripcion"];
            $fecha_notificacion=$p["fecha_notificacion"];
            $fecha_inicio=$p["fecha_inicio"];
            $fecha_fin=$p["fecha_fin"];
            $hora_inicio=$p["hora_inicio"];
            $hora_fin=$p["hora_fin"];
            $ficha=$p["ficha"];
            $notificacion=$p["notificacion"];
echo '<td>'.$id_usuario_gen.'</td><td>'.$descripcion.'</td><td>'.$fecha_notificacion.'</td>';
echo '<td>'.$fecha_inicio.'</td><td>'.$fecha_fin.'</td><td>'.$hora_inicio.'</td><td>'.$hora_fin.'</td>';
echo '<td>'.$ficha.'</td><td>'.$notificacion.'</td><td><input type="number" name="reem"></input></td><td>'
        . '<select name="respuesta"><option value="0">Espera</option><option value="1">Aceptada</option><option value="2">Rechazada</option></select></td>';   
echo "<input type='hidden' name='notificacion' value='$id_notificacion'/>";
echo "<td><input class='btn btn-primary' type='submit' id='boton2' name='submit' value='Enviar'></td>";
echo "</form></tr>";   

        }
        
echo "</table>";     
echo "</div>";        
        return $this->render('AmbientesCidmBundle:Formatos:notif.html.twig', array('notif'));
     
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

echo '<div class="panel-heading" id="cabecera"><h1>Atención de solicitudes </h1></div>';            
echo  '<div>';	     
   echo "<table class='table'><th>Instructor</th><th>Radicada en</th><th>Fecha inicial</th>"
        . "<th>Fecha final</th><th>Hora inicial</th><th>Hora final</th>"
         . "<th>Numero personas</th><th>Ambientes adecuados</th><th>Estado</th><th>Responder</th>";
        // Mostrar todo
  
        foreach ($po2 as $p) {
            echo "<tr>";
  echo "<form action='soliccoord' method='post'>";    
        
            $id_solicitud=$p["id_solicitud"];
            $id_usuario=$p["nombre"];
            $fecha_solicitud=$p["fecha_solicitud"];
            $fecha_inicio=$p["fecha_inicio"];
            $fecha_fin=$p["fecha_fin"];
            $hora_inicio=$p["hora_inicio"];
            $hora_fin=$p["hora_fin"];
            $capacidad=$p["numero_personas"];
            $software=$p["id_software"];

$query = "SELECT ambiente.nombre,ambiente.id_ambiente,ambiente.puestos_trabajo,sw_ambiente.id_software from ambiente 
 join sw_ambiente on ambiente.id_ambiente=sw_ambiente.id_ambiente join software on 
 software.id_software=sw_ambiente.id_software where software.id_software='$software' and ambiente.puestos_trabajo >= '$capacidad'";
        $stmt = $db->prepare($query);
        $params = array();
        $stmt->execute($params);
        $po=$stmt->fetchAll();
        $flag=0;    
echo '<td>'.$id_usuario.'</td><td>'.$fecha_solicitud.'</td>';
echo '<td>'.$fecha_inicio.'</td><td>'.$fecha_fin.'</td><td>'.$hora_inicio.'</td><td>'.$hora_fin.'</td>';
echo '<td>'.$capacidad.'</td><td><select name="amb">';
            foreach ($po as $pa) {     
            $id_ambiente=$pa["id_ambiente"];
            $nambiente=$pa["nombre"];
            $flag=$flag+1;
            echo "<option value='$id_ambiente'>$nambiente</option>";
                } 
            if($flag==0){
            echo "<option value='1'>No disponible</option>";
            }    
echo '</select></td><td><select name="respuesta"><option value="0">En espera</option><option value="1">Aceptada</option><option value="2">Rechazada</option></select></td>';   
echo "<input type='hidden' name='notificacion' value='$id_solicitud'/>";
echo "<td><input class='btn btn-primary' type='submit' id='boton2' name='submit' value='Enviar'></td>";
echo "</form></tr>";   

        }
        
echo "</table>";     
echo "</div>";        
        return $this->render('AmbientesCidmBundle:Formatos:solic.html.twig', array('solic'));
     
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
 
        // Mostrar todo
        foreach ($po as $p) {
            $salida=$p["nombre"];
        }
        echo "<div id='prueba2'>";
        echo "<h2>Notificación exitosa! Notificación por motivo: $salida</h2>";
        echo "</div>";  
             
        $securityContext = $this->container->get('security.context');    
        if ($securityContext->isGranted('ROLE_USER')) {
        return $this->render('AmbientesCidmBundle:Formatos:notinstructora.html.twig', array('notinstructora'));   
        }
        
    }   
}
