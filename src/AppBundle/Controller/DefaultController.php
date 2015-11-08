<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Article;
use AppBundle\Entity\Tag;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $name = 'Just do it!';

        $em = $this->getDoctrine()->getRepository('AppBundle:Tag')->findAll();
        foreach($em as $tag)
            dump(($tag->getArticles()->getValues()));
        exit;

        return $this->render('AppBundle:Default:index.html.twig', array('name' => $name));
    }
}
