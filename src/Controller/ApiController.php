<?php

namespace App\Controller;

use App\Entity\User;
use App\Controller\ApiController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ApiController extends AbstractController
{
   /**
    * @Route("/user", name="user")
    */
        public function index()
        {
            return $this->render(’user/index.html.twig’, [
            ’controller_name’ => ’ApiController’,
            ]);
        }
        /**
    * @Route("/admin/users", name="User_add")
    */
        public function addUser()
        {
            $personne = new User();
            $User->setphoto(base64_decode($this->photo));
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($User);
            $entityManager->flush();
            return $this->render(’User/index.html.twig’, 
            [
            ’controller_name’ => ’UserController’,
            ’User’ => $User,
            ’adjectif’ => ’ajoutée’
            ]);
        }
       
        
}
