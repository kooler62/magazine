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
        $em=$this->getDoctrine()->getManager();
        $cats=$em->getRepository('AppBundle:Cat')->findAll();

        $em=$this->getDoctrine()->getManager();
        $posts=$em->getRepository('AppBundle:Post')->findAll();

        return $this->render('homepage.html.twig',[
            'cats'=>$cats,
            'posts'=>$posts]);
     //   return $this->render('homepage');
    }

    /**
     * @Route("/p/{id}", name="shortpost")
     */
    public function postsAction($id,Request $request)
    {
        $em=$this->getDoctrine()->getManager();
        $cats=$em->getRepository('AppBundle:Cat')->findAll();

        $em=$this->getDoctrine()->getManager();
        $post=$em->getRepository('AppBundle:Post')->find($id);
            //->findOneBy('id'=>$id);
dump($post);
        return $this->render('post.html.twig',[
            'cats'=>$cats,
            'post'=>$post
        ]);
        //   return $this->render('homepage');
    }
}
