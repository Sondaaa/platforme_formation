<?php namespace App\Form;

use App\Entity\Societe;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SocieteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('rs')               // correspond à la propriété 'rs' dans l'entité
            ->add('adresse')
            ->add('contact')
            ->add('fax')
            ->add('email')
            ->add('logo', FileType::class, [
                'label' => 'Logo (image)',
                'mapped' => false,    // upload manuel
                'required' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Societe::class,
        ]);
    }
}
