<?php

namespace Iut\PlanningBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class UserController extends Controller
{
    /**
     * @Route("/add")
     * @Template()
     */
     
    public function addAction()
    {
		return array(); 
    }
	
    /**
     * @Route("/show/id")
     * @Template()
     */
    public function idAction($id)
    {
    }

}
