<?php

namespace api\Bundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use \Symfony\Component\HttpFoundation\JsonResponse;


class DefaultController extends Controller
{
        public function regionalesAction()
    {   
        //Entity manager y conexión a la BD
        $em = $this->getDoctrine()->getManager();
        $db = $em->getConnection();
 
        $query = "SELECT * FROM regional";
        $stmt = $db->prepare($query);
        $params = array();
        $stmt->execute($params);
        $po=$stmt->fetchAll();
 
        $result = array();
        // Mostrar todo
        foreach ($po as $p) {
            $result[] = $p;
            }
            
          return new JsonResponse(array('Regionales' => $result));
          }
          
        public function ambientesAction()
    {   
        //Entity manager y conexión a la BD
        $em = $this->getDoctrine()->getManager();
        $db = $em->getConnection();
 
        $query = "SELECT * FROM ambiente";
        $stmt = $db->prepare($query);
        $params = array();
        $stmt->execute($params);
        $po=$stmt->fetchAll();
 
        $result = array();
        // Mostrar todo
        foreach ($po as $p) {
            $result[] = $p;
            }
            
          return new JsonResponse(array('Ambientes' => $result));
          }     
          
        public function fichasAction()
    {   
        //Entity manager y conexión a la BD
        $em = $this->getDoctrine()->getManager();
        $db = $em->getConnection();
 
        $query = "SELECT * FROM ficha";
        $stmt = $db->prepare($query);
        $params = array();
        $stmt->execute($params);
        $po=$stmt->fetchAll();
 
        $result = array();
        // Mostrar todo
        foreach ($po as $p) {
            $result[] = $p;
            }
            
          return new JsonResponse(array('FIchas' => $result));
          }          

        public function usuariosAction()
    {   
        //Entity manager y conexión a la BD
        $em = $this->getDoctrine()->getManager();
        $db = $em->getConnection();
 
        $query = "SELECT * FROM usuario";
        $stmt = $db->prepare($query);
        $params = array();
        $stmt->execute($params);
        $po=$stmt->fetchAll();
 
        $result = array();
        // Mostrar todo
        foreach ($po as $p) {
            $result[] = $p;
            }
            
          return new JsonResponse(array('Usuarios' => $result));
          }          

        public function solicitudesAction()
    {   
        //Entity manager y conexión a la BD
        $em = $this->getDoctrine()->getManager();
        $db = $em->getConnection();
 
        $query = "SELECT * FROM solicitud";
        $stmt = $db->prepare($query);
        $params = array();
        $stmt->execute($params);
        $po=$stmt->fetchAll();
 
        $result = array();
        // Mostrar todo
        foreach ($po as $p) {
            $result[] = $p;
            }
            
          return new JsonResponse(array('Solicitudes' => $result));
          }          

        public function fichaidAction(Request $request) {

        // recupera las variables GET y POST respectivamente
            
        $appId=$request->query->get('id');
        
        $em = $this->getDoctrine()->getManager();
        $db = $em->getConnection();
 
        $query = "SELECT * FROM ficha where CODIGO='$appId'";
        $stmt = $db->prepare($query);
        $params = array();
        $stmt->execute($params);
        $po=$stmt->fetchAll();
 
        $result = array();
        // Mostrar todo
        foreach ($po as $p) {
            $result[] = $p;
            }
            
          return new JsonResponse(array('Ficha' => $result));
          } 
          
}
