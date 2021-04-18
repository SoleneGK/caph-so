<?php

declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

final class CommentAdmin extends AbstractAdmin
{
    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->add('validate', $this->getRouterIdParameter().'/validate');
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper): void
    {
        $datagridMapper
            ->add('publicationDate', null, [
                'label' => 'Posté le',
            ])
            ->add('authorPseudo', null, [
                'label' => 'Pseudo',
            ])
            ->add('authorEmail', null, [
                'label' => 'Email',
            ])
            ->add('validated', null, [
                'label' => 'Validé',
            ])
        ;
    }

    protected function configureListFields(ListMapper $listMapper): void
    {
        $listMapper
            ->add('article.title', null, [
                'label' => 'Article',
                'route' => [
					'name' => 'show',
				],    
            ])
            ->add('publicationDate', null, [
                'label' => 'Posté le',
                'format' => 'd F Y h:i',
                'timezone' => 'Europe/Paris',
            ])
            ->add('authorPseudo', null, [
                'label' => 'Pseudo',
            ])
            ->add('authorEmail', null, [
                'label' => 'Email',
            ])
            ->add('content', null, [
                'label' => 'Contenu',
            ])
            ->add('validated', null, [
                'label' => 'Validé',
            ])
            ->add(ListMapper::NAME_ACTIONS, null, [
                'actions' => [
                    'validate' => [
                        'template' => 'admin/CRUD/list__action_validate.html.twig',
                    ],
                    'show' => [],
                    'edit' => [],
                    'delete' => [],
                ],
            ])
        ;
    }

    protected function configureFormFields(FormMapper $formMapper): void
    {
        $formMapper
            ->add('article.title', TextType::class, [
                'label' => 'Article',
                'required' => true,
                'disabled' => true,
            ])
            ->add('publicationDate', DateTimeType::class, [
                'label' => 'Publié le',
                'required' => true,
                'widget' => 'single_text',
            ])
            ->add('authorPseudo', TextType::class, [
                'label' => 'Pseudo',
                'required' => true,
            ])
            ->add('authorEmail', EmailType::class, [
                'label' => 'Email',
                'required' => false,
            ])
            ->add('content', TextareaType::class, [
                'label' => 'Contenu',
                'required' => true,
            ])
            ->add('validated', CheckboxType::class, [
                'label' => 'Validé',
                'required' => false,
            ])
        ;
    }

    protected function configureShowFields(ShowMapper $showMapper): void
    {
        $showMapper
            ->add('article.title', null, [
                'label' => 'Article',
            ])
            ->add('publicationDate', null, [
                'label' => 'Publié le',
            ])
            ->add('authorPseudo', null, [
                'label' => 'Pseudo',
            ])
            ->add('authorEmail', null, [
                'label' => 'Email',
            ])
            ->add('content', null, [
                'label' => 'Contenu',
            ])
            ->add('validated', null, [
                'label' => 'Validé',
            ])
        ;
    }

    public function toString($object)
    {
        return $object->getAuthorPseudo()
            .', le '.$object->getPublicationDate()->format('d/m/Y à G:i')
            .' ('.$object->getArticle()->getTitle().')';
    }
}
