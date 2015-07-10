<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use AppBundle\Entity\Players;
use AppBundle\Form\PlayerType;
use Symfony\Component\HttpFoundation\Response;

class EditController extends Controller
{
    public function EditAction(Players $i)
    {
        $em = $this->getDoctrine()->getManager();
        $news = $em->getRepository('AppBundle:Players')->find($i);
        if (!$news) {
          throw $this->createNotFoundException(
                  'No news found for id ' . $i
          );
        }
        
        
        $form = $this->createFormBuilder($news)
            ->add('name', 'text', array(
            'label'=>'Vardas'))
            ->add('surname', 'text', array(
            'label'=>'Pavardė'))
            ->add('birthYears', 'date', array(
            'widget'=>'single_text',
            'format'=>'yyyy-MM-dd',
            'label'=>'Gimimo metai',
            'required'=>false))
            ->add('shirtNumber', 'text', array(
            'label'=>'Marškinėliu numeris',
            'required'=>false))
            ->add('save', 'submit')
            ->getForm();
        
        $request = $this->get('request');
        $form->handleRequest($request);
     
        if ($form->isValid()) {
            $em->flush();
        }
        
        $build['form'] = $form->createView();

        return $this->render('AppBundle:Edit:Edit.html.twig',  $build);

    }
}
