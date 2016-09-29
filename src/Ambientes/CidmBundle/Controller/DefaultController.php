<?php

namespace Ambientes\CidmBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
     return $this->render('AmbientesCidmBundle:Default:index.html.twig', array('index'));
     
    }
    public function testAction()
    {
       /*         //Entity manager y conexión a la BD
        $em = $this->getDoctrine()->getManager();
        $db = $em->getConnection();
 
        $query = "SELECT * FROM user; ";
        $stmt = $db->prepare($query);
        $params = array();
        $stmt->execute($params);
        $po=$stmt->fetchAll();
 
        // Mostrar todo
        foreach ($po as $p) {
            echo $p["username"];
            echo "<br/>";
            echo $p["email"];
            echo "<hr/>";
        }
        * 
        */
        return $this->render('AmbientesCidmBundle:Default:test.html.twig', array('test'));
    }
    
        public function vistaAction()
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
         

        $po2[$cont++]['opciones']=$po;
}       
      
       
        return $this->render('AmbientesCidmBundle:Default:vista.html.twig', array(
                    'entities' => $po2,
            ));
     
    }

    public function cargausuariosAction()
    {
        $em = $this->getDoctrine()->getManager();
        $db = $em->getConnection();

        //Aquí es donde seleccionamos nuestro csv
         $fname = $_FILES['sel_file']['name'];
         echo 'Cargando nombre del archivo: '.$fname.' ';

             //si es correcto, entonces damos permisos de lectura para subir
             $filename = $_FILES['sel_file']['tmp_name'];
             $handle = fopen($filename, "r");
			 $flag=0;
        
             while (($data = fgetcsv($handle, 1000, ";")) !== FALSE)
             {
               //Insertamos los datos con los valores...
			   //verificacion y eliminacion cabeceras
			   if ($flag==0) { 
				   $flag=1;
			   } else {
                $sql = "INSERT into usuario(id_estado_usuario,id_tipo_usuario,cedula,nombre,telefono,tag,email,foto) 
				values('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]')";
                $stmt = $db->prepare($sql);
                $stmt->execute();
			   }
             }
             //cerramos la lectura del archivo "abrir archivo" con un "cerrar archivo"
             fclose($handle);
             echo "Importación exitosa!";
             
        $securityContext = $this->container->get('security.context');    
        if ($securityContext->isGranted('ROLE_ADMIN')) {
        return $this->render('AmbientesCidmBundle:Default:cargausuarios.html.twig', array('cargausuarios'));   
        }
        else if ($securityContext->isGranted('ROLE_USER')) {
                  
            return $this->redirect($this->generateUrl('ambientes_test'));
        }
        
    }    
    
    public function usAction()
{

        $securityContext = $this->container->get('security.context');

        if ($securityContext->isGranted('ROLE_ADMIN')) {
            return $this->render('AmbientesCidmBundle:Default:us.html.twig',array('us'));
            }
        else if ($securityContext->isGranted('ROLE_USER')) {
                  
            return $this->redirect($this->generateUrl('ambientes_test'));
        }
   }    
   
   
    public function cargaelAction()
    {
 $em = $this->getDoctrine()->getManager();
        $db = $em->getConnection();
        //Aquí es donde seleccionamos nuestro csv
         $fname = $_FILES['sel_file']['name'];
         echo 'Cargando nombre del archivo: '.$fname.' ';

             //si es correcto, entonces damos permisos de lectura para subir
             $filename = $_FILES['sel_file']['tmp_name'];
             $handle = fopen($filename, "r");
			 $flag=0;
           while (($data = fgetcsv($handle, 1000, ";")) !== FALSE)
             {
               //Insertamos los datos con los valores...
			   //verificacion y eliminacion cabeceras
			   if ($flag==0) { 
				   $flag=1;
			   } else {
  $sql = "INSERT into tipo_elemento(descripcion) values('$data[0]')";
                $stmt = $db->prepare($sql);
                $stmt->execute();
			   }
             }
             //cerramos la lectura del archivo "abrir archivo" con un "cerrar archivo"
             fclose($handle);
             echo "Importación exitosa!";
             
        $securityContext = $this->container->get('security.context');    
        if ($securityContext->isGranted('ROLE_ADMIN')) {
        return $this->render('AmbientesCidmBundle:Default:cargael.html.twig', array('cargael'));   
        }
        else if ($securityContext->isGranted('ROLE_USER')) {
                  
            return $this->redirect($this->generateUrl('ambientes_test'));
        } 
            
    }

    
    public function ceAction()
{

        $securityContext = $this->container->get('security.context');

        if ($securityContext->isGranted('ROLE_ADMIN')) {
            return $this->render('AmbientesCidmBundle:Default:ce.html.twig',array('ce'));
            }
        else if ($securityContext->isGranted('ROLE_USER')) {
                  
            return $this->redirect($this->generateUrl('ambientes_test'));
        }
   }
    
    public function cargatipousAction()
    {
        $em = $this->getDoctrine()->getManager();
        $db = $em->getConnection();

        //Aquí es donde seleccionamos nuestro csv
         $fname = $_FILES['sel_file']['name'];
         echo 'Cargando nombre del archivo: '.$fname.' ';

             //si es correcto, entonces damos permisos de lectura para subir
             $filename = $_FILES['sel_file']['tmp_name'];
             $handle = fopen($filename, "r");
			 $flag=0;
        
             while (($data = fgetcsv($handle, 1000, ";")) !== FALSE)
             {
               //Insertamos los datos con los valores...
			   //verificacion y eliminacion cabeceras
			   if ($flag==0) { 
				   $flag=1;
			   } else {
                $sql = "INSERT into tipo_usuario(descripcion) values('$data[0]')";
                $stmt = $db->prepare($sql);
                $stmt->execute();
			   }
             }
             //cerramos la lectura del archivo "abrir archivo" con un "cerrar archivo"
             fclose($handle);
             echo "Importación exitosa!";
             
        $securityContext = $this->container->get('security.context');    
        if ($securityContext->isGranted('ROLE_ADMIN')) {
        return $this->render('AmbientesCidmBundle:Default:cargatipous.html.twig', array('cargatipous'));   
        }
        else if ($securityContext->isGranted('ROLE_USER')) {
                  
            return $this->redirect($this->generateUrl('ambientes_test'));
        }
        
    }    
    
    public function ctAction()
{

        $securityContext = $this->container->get('security.context');

        if ($securityContext->isGranted('ROLE_ADMIN')) {
            return $this->render('AmbientesCidmBundle:Default:ct.html.twig',array('ct'));
            }
        else if ($securityContext->isGranted('ROLE_USER')) {
                  
            return $this->redirect($this->generateUrl('ambientes_test'));
        }
   }   

    public function cargafichasAction()
    {
        $em = $this->getDoctrine()->getManager();
        $db = $em->getConnection();

        //Aquí es donde seleccionamos nuestro csv
         $fname = $_FILES['sel_file']['name'];
         echo 'Cargando nombre del archivo: '.$fname.' ';

             //si es correcto, entonces damos permisos de lectura para subir
             $filename = $_FILES['sel_file']['tmp_name'];
             $handle = fopen($filename, "r");
			 $flag=0;
        
             while (($data = fgetcsv($handle, 1000, ";")) !== FALSE)
             {
               //Insertamos los datos con los valores...
			   //verificacion y eliminacion cabeceras
			   if ($flag==0) { 
				   $flag=1;
			   } else {
                $sql = "INSERT into ficha(id_nivel,codigo,programa,instructor_lider,fecha_inicio_lectiva,fecha_fin_lectiva,fecha_cierre_ficha) 
				values('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]')";
                $stmt = $db->prepare($sql);
                $stmt->execute();
			   }
             }
             //cerramos la lectura del archivo "abrir archivo" con un "cerrar archivo"
             fclose($handle);
             echo "Importación exitosa!";
             
        $securityContext = $this->container->get('security.context');    
        if ($securityContext->isGranted('ROLE_ADMIN')) {
        return $this->render('AmbientesCidmBundle:Default:cargafichas.html.twig', array('cargafichas'));   
        }
        else if ($securityContext->isGranted('ROLE_USER')) {
                  
            return $this->redirect($this->generateUrl('ambientes_test'));
        }
        
    }    
    
    public function cfAction()
{

        $securityContext = $this->container->get('security.context');

        if ($securityContext->isGranted('ROLE_ADMIN')) {
            return $this->render('AmbientesCidmBundle:Default:cf.html.twig',array('cf'));
            }
        else if ($securityContext->isGranted('ROLE_USER')) {
                  
            return $this->redirect($this->generateUrl('ambientes_test'));
        }
}
   
    public function crudAction()
{
        $securityContext = $this->container->get('security.context');

        if ($securityContext->isGranted('ROLE_ADMIN')) {
            return $this->render('AmbientesCidmBundle:Default:crud.html.twig',array('crud'));
            }
        else if ($securityContext->isGranted('ROLE_USER')) {
                    
            return $this->redirect($this->generateUrl('ambientes_test'));
        }            

}

public function pruebaAction()
{
        $securityContext = $this->container->get('security.context');

        if ($securityContext->isGranted('ROLE_USER')) {
            return $this->render('AmbientesCidmBundle:Default:prueba.html.twig',array('prueba'));
            }

}


public function dualpruebaAction()
    {
        $em = $this->getDoctrine()->getManager();
        $db = $em->getConnection();
$jornada=$_REQUEST['descripcionjornada'];
$inicio=$_REQUEST['inicio'];
$fin=$_REQUEST['fin'];
$descestado=$_REQUEST['descripcionestado'];
                $sql = "INSERT into estado(descripcion) values('$descestado')";
                $stmt = $db->prepare($sql);
                $stmt->execute();
                $sql2 = "INSERT into jornada(hora_inicio,hora_fin,descripcion) values('$inicio','$fin','$jornada')";
                $stmt2 = $db->prepare($sql2);
                $stmt2->execute();
        echo "Importación exitosa!";
             
        $securityContext = $this->container->get('security.context');    
        if ($securityContext->isGranted('ROLE_USER')) {
        return $this->render('AmbientesCidmBundle:Default:dualprueba.html.twig', array('dualprueba'));   
        }
        
    }   

}
