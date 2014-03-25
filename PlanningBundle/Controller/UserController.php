<?php

namespace Iut\PlanningBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use 

class UserController extends Controller
{
    /**
     * @Route("/add")
     * @Template()
     */
    public function addAction()
    {
      $user= new User();
      $user->setName($_POST['nom']);
      $user->setPassword($_POST['mdp'])
      return array();
    }

    /**
     * @Route("/show/id")
     * @Template()
     */
    public function idAction()
    {
		
    }

}
