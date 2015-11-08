<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\Tag;
//use AppBundle\Form\ArticleType;

/**
 * Article controller.
 *
 */
class TagController extends Controller
{

    /**
     * Lists all Article entities.
     *
     */
    public function indexAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:Tag')->find($id);
        $articles = $entities->getArticles()->getValues();
        $tags = $em->getRepository('AppBundle:Tag')->findBy(array(), array('popularity' => 'DESC'), 10);

        $result = array();
        foreach($articles as $entity)
        {
            $result[$entity->getId()]['article'] = $entity;
            $result[$entity->getId()]['tags'] = $entity->getTags();
        }

        return $this->render('AppBundle:Article:index.html.twig', array(
            'entities' => $result,
            'tags' => $tags
        ));
    }

}