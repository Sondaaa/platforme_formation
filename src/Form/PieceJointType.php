<?php

namespace App\Form;

use App\Entity\Formations;
use App\Entity\PieceJoint;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PieceJointType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {  $disableFormation = $options['disable_formation']; // now safe
        $builder
            ->add('titre')
            ->add('description')
            ->add('fichier', FileType::class, [
                'label' => 'Attachment File',
                'mapped' => false,
                'required' => true,
            ])

             ->add('formation', EntityType::class, [
            'class' => Formations::class,
            'choice_label' => 'titre',
            'disabled' => $disableFormation,
            'label' => 'Formation',
        ])
            ->add('save', SubmitType::class, [
                'label' => 'Add Attachment',
                'attr' => ['class' => 'btn btn-success']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => PieceJoint::class,        'disable_formation' => false, // default value

        ]);
    }
}
