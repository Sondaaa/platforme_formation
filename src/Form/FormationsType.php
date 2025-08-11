<?php

namespace App\Form;

use App\Entity\Formations;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormationsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre')
            ->add('objectifs')
            ->add('modalite')
            ->add('dureeHeures')
            ->add('casPratiques')
            ->add('testValidation')
            ->add('prix')
            ->add('photo', FileType::class, [
                'label' => 'Photo (image)',
                'mapped' => false,    // upload manuel
                'required' => false,
            ])
            ->add('video', FileType::class, [
                'label' => 'Vidéo (fichier vidéo)',
                'mapped' => false,
                'required' => false,
                'attr' => [
                    'accept' => 'video/*'
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Formations::class,
        ]);
    }
}
