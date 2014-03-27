<?php

namespace Iut\PlanningBundle\Controller;

use Iut\PlanningBundle\Entity\Activity;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class ActivityController extends Controller
{
  /**
   * @Route("/session/addActivity")
   * @Template()
   */
  public function addactivityAction()
  {
    $request=$this->getRequest();
    $nomact=$request->request->get('nomactivite');

    $activity=new Activity();
    $activity->setName($nomact);

    $em=$this->getDoctrine()->getManager();
    $em->persist($activity);
    $em->flush();

    return $this->render('IutPlanningBundle:Activity:add.html.twig',array('name'=>$nomact));
  }

}
