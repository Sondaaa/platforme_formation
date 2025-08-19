<?php

namespace App\Form;
use Symfony\Component\Form\Extension\Core\Type\FileType;

use App\Entity\Societe;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Societe3Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('rs')
            ->add('adresse')
            ->add('contact')
            ->add('fax')
            ->add('email')  ->add('tel')
             ->add('logo', FileType::class, [
                'label' => 'Logo (image)',
                'mapped' => false,    // upload manuel
                'required' => false,
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Societe::class,
        ]);
    }
}
