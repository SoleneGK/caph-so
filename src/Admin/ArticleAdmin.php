<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

final class ArticleAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title', TextType::class, [
                'label' => 'Titre',
                'required' => true,
            ])
            ->add('publicationDate', DateTimeType::class, [
                'label' => 'Date de publication',
                'required' => true,
                'widget' => 'single_text',
                'data' => new \DateTime('now'),
                'format' => 'd/m/Y',
            ])
            ->add('content', TextareaType::class, [
                'label' => 'Contenu',
                'required' => true,
            ])
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title', null, [
                'label' => 'Titre',
            ])
            ->add('publicationDate', null, [
                'label' => 'Date de publication',
            ])
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title', null, [
                'label' => 'Titre',
                'route' => [
					'name' => 'show',
				],
            ])
            ->add('publicationDate', null, [
                'label' => 'Date de publication',
                'format' => 'd F Y h:i',
            ])
            ->add(ListMapper::NAME_ACTIONS, null, [
                'actions' => [
                    'show' => [],
                    'edit' => [],
                    'delete' => [],
                ],
            ])
        ;
    }

    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->with('Article')
                ->add('title', null, [
                    'label' => 'Titre',
                ])
                ->add('publicationDate', null, [
                    'label' => 'Publié le',
                    'format' => 'd F Y h:i',
                ])
                ->add('Voir sur le site', null, [
                    'template' => 'admin/article/show_link.html.twig',
                ])
                ->add('content', null, [
                    'label' => '',
                ])
            ->end()
            ->with('Commentaires')
                ->add('', null, [
                    'template' => 'admin/article/show_comment.html.twig',
                ])
            ->end()
        ;
    }

    public function toString($object)
    {
        return $object->getTitle();
    }
}
