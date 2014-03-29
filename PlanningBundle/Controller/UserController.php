<?php

namespace Iut\PlanningBundle\Controller;

use Iut\PlanningBundle\Entity\User;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Session\Session;

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

    #On demarre une session
    $session=new Session();
    $session->start();
    $session->set('name', $nom);
    
    $liste=$em->getRepository('IutPlanningBundle:Activity')->findAll();
	$activite=$em->getRepository('IutPlanningBundle:Participate')->findBy(array('nameUser'=>$session->get('name')));
	return $this->render('IutPlanningBundle:Default:session.html.twig', array('nom' => $session->get('name'), 
	       								          'activities' => $activite,
										  'liste' => $liste));
    }
  } 

/**
*@Route("/deconnexion")
*@Template()
*/
public function deconnexionAction(){
       $session=new Session;
       $nom=$session->get('name');
       $session->invalidate();
       return $this->render('IutPlanningBundle:User:deconnexion.html.twig', array('nom'=>$nom));
}
}
