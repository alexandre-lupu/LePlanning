<?php

namespace Iut\PlanningBundle\Controller;

use Iut\PlanningBundle\Entity\User;

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
    $request = $this->getRequest();
    $nom=$request->request->get('nom');
    $mdp=md5($request->request->get('mdp'));
		
    $user=new User();
    $user->setName($nom);
    $user->setPassword($mdp);
		
    $em = $this->getDoctrine()->getManager();
		
    $em->persist($user);
    $em->flush();
		
    return $this->render('IutPlanningBundle:User:add.html.twig',array('name'=>$nom));
  }
	
  /**
   * @Route("/show/id")
   * @Template()
   */
  public function idAction($id)
  {
  }


  /**
   *@Route("/identification/session")
   *@Template
   */
  public function sessionAction(){
    
    $request = $this->getRequest();
    $nom=$request->request->get('nom');
    $mdp=md5($request->request->get('mdp'));
    
    $em = $this->getDoctrine()->getManager();

    $user=$em->getRepository()->find($nom,$mdp);

    if($user){}
    else{
      return $this->render('IutPlanningBundle:Default:identification.html.twig',array('error'=>$nom));
    }

  } 

}
