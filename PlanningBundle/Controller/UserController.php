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
   *@Route("/session")
   *@Template
   */
  public function sessionAction(){
    
    $request = $this->getRequest();
    $nom=$request->request->get('nom');
    $mdp=md5($request->request->get('mdp'));
    
    $em = $this->getDoctrine()->getManager();

    $user=$em->getRepository('IutPlanningBundle:User')->findOneBy(array('name' => $nom,
							    'password' => $mdp)
							     );

    if($user===null){
      return $this->render('IutPlanningBundle:Default:identification.html.twig');
    }
    else{
    $liste=$em->getRepository('IutPlanningBundle:Activity')->findAll();
	$activite=$em->getRepository('IutPlanningBundle:Participate')->findBy(array('nameUser'=>$nom));
	return $this->render('IutPlanningBundle:Default:session.html.twig', array('nom' => $nom, 
	       								          'activities' => $activite,
										  'liste' => $liste));
    }
  } 

}
