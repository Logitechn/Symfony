<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Players;
use AppBundle\Form\PlayerType;
use Symfony\Component\HttpFoundation\Response;

class DeleteController extends Controller
{
    /**
     * @Route("/delete/{id}", name="index")
     */
    public function indexAction(Players $i)
    {
        if (!$i) {
        throw $this->createNotFoundException('No guest found');
        }

        $em = $this->getDoctrine()->getEntityManager();
        $em->remove($i);
        $em->flush();
        
        
        return $this->render('AppBundle:Delete:index.html.twig'); 
    }

}
