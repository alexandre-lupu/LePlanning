<?php

namespace Iut\PlanningBundle\Controller;

use Iut\PlanningBundle\Entity\User;
use Iut\PlanningBundle\Entity\Participate;

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
	$session=new Session();
	

    if($user===null and $session->get('name')===null){
      return $this->render('IutPlanningBundle:Default:identification.html.twig');
    }
    else{

    #On demarre une session
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
 
   /**
  *@Route("/session/addParticipate")
  *@Template()
  */
public function addParticipateAction(){
       $session=new Session();
	   
       $nom=$session->get('name');

       $nom="toto";

       $request = $this->getRequest();
       $nom_act=$request->request->get('act');
       $strDate=$request->request->get('date')." ".$request->request->get('heure');
       $date=new \DateTime($strDate);
       
       $p=new Participate();
       $p->setNameUser($nom);
       $p->setNameActivity($nom_act);
       $p->setDate($date);

       $em=$this->getDoctrine()->getManager();
       $em->persist($p);
       $em->flush();

       return $this->render('IutPlanningBundle:Participate:addParticipate.html.twig');
   }   
}
