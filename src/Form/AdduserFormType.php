<?php

namespace App\Form;

use App\Entity\Role;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdduserFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('first_name')
            ->add('last_name')
            ->add('user_password')
            ->add('user_Email')
            ->add('user_login')
            ->add('user_ImagePath')
            ->add('phone')
            ->add('Users_Roles', EntityType::class, [
                'label' => 'role_user',
                'class' => Role::class,
                'choice_label' => 'role_name',
                'expanded' => true, // Render as radio buttons
                'multiple' => true, // Only one role can be selected
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
