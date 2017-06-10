<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Post;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PostController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
       //dump('444');
        $em=$this->getDoctrine()->getManager();
        $posts=$em->getRepository('AppBundle:Post')
            ->findAll();
       // dump($posts);
       // $posts='5';
        return $this->render('homepage.html.twig',['posts'=>$posts]);
     //   return $this->render('homepage');
    }
}
