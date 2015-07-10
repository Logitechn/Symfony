<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class PlayerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', 'text', array(
            'label'=>'Vardas'))
        ->add('surname', 'text', array(
            'label'=>'Pavardė'))
        ->add('birthYears', 'date', array(
            'input'=>'datetime',
            'widget'=>'single_text',
            'format'=>'yyyy-MM-dd',
            'label'=>'Gimimo metai',
            'required'=>false))
        ->add('shirtNumber', 'number', array(
            'label'=>'Marškinėliu numeris',
            'max_length'=> 2,
            'required'=>false))
        ->add('Save', 'submit');
    }
    public function getName()
    {
        return 'players';
    }
}