<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Players;
use AppBundle\Form\PlayerType;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    
    public function indexAction()
    {
        $player = new Players();
        $form = $this->createForm(new PlayerType(), $player);
        
        $request = $this->get('request');
        $form->handleRequest($request);
              
        
        if($request->getMethod() == 'POST')
        {
            if ($form->isValid())
            {
                $name = $form->get('name')->getData();
                $surname = $form->get('surname')->getData();
                $birthYears = $form->get('birthYears')->getData();
                $shirtNumber = $form->get('shirtNumber')->getData();
                    
                $player->setName($name);
                $player->setSurname($surname);
                $player->setBirthYears($birthYears);
                $player->setShirtNumber($shirtNumber);
                    
                $em = $this->getDoctrine()->getManager();
                $em->persist($player);
                $em->flush();
                    
                return new Response('Player '.$name.' '.$surname.' Created!');
            }
            return $this->render('default/index.html.twig', array('form'=>$form->createView()));
        }
            
        $ema = $this->getDoctrine()->getManager();
        $players = $ema->getRepository('AppBundle:Players')->findAll();
            
        return $this->render('default/index.html.twig', array('form'=>$form->createView(), 'players'=>$players));
    }
}


