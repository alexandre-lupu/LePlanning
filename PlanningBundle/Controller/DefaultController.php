<?php

namespace Iut\PlanningBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
  /**
   * @Route("/hello/{name}")
   * @Template()
   */
  public function indexAction($name)
  {
    return array('name' => $name);
  }

  /**
   * @Route("/formuser")
   * @Template()
   */
    
  public function formuserAction(){
    return $this->render('IutPlanningBundle:Default:formuser.html.twig');	
  }

  /**
   * @Route("/formactivity")
   * @Template()
   */
  public function formactivityAction(){
    return $this->render('IutPlanningBundle:Default:formactivity.html.twig');
  }

/**
*@Route("/identification")
*@Template()
*/
    public function identificationAction(){
    	   return $this->render('IutPlanningBundle:Default:identification.html.twig');
    }
}