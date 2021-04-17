<?php

namespace App\Form;

use App\Entity\Comment;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('authorPseudo', TextType::class, [
                'required' => true,
                'label' => 'Pseudo (requis)',
            ])
            ->add('authorEmail', TextType::class, [
                'required' => false,
                'label' => 'Email (il ne sera pas affiché dans les commentaires)',
            ])
            ->add('content', TextareaType::class, [
                'required' => true,
                'label' => 'Entrez votre commentaire :',
            ])
            ->add('send', SubmitType::class, [
                'label' => 'Envoyer',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Comment::class,
        ]);
    }
}
