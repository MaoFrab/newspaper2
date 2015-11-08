<?php
// src/AppBundle/Admin/PostAdmin.php

namespace AppBundle\Admin;

use AppBundle\Entity\Article;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;

class ArticleAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('subject', 'text', array(
                'label' => 'Post Title'
            ))
            ->add('body', 'textarea')

            // if no type is specified, SonataAdminBundle tries to guess it
            ->add('tags', 'genemu_jqueryselect2_entity',
                [
                    'class' => 'AppBundle\Entity\Tag',
                    'property' => 'name',
                    'multiple' => true,
                    'attr' => ['
                    class' => 'js-example-tags'],
                    'required' => false
                ]);

            // ...
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('subject')
            ->add('body')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('subject')
            ->add('body')
        ;
    }

    // Fields to be shown on show action
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('subject')
            ->add('body')
        ;
    }
}