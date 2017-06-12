<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Post;
use AppBundle\Entity\Cat;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CatController extends Controller
{


    /**
     * @Route("/cats/{cat}", name="cat")
     */
    public function postOfCatAction($cat)
    {
        //категории для хедера
        $em=$this->getDoctrine()->getManager();
        $cats=$em->getRepository('AppBundle:Cat')->findAll();

        //вытаскиваем категорию по slug и берем ее id
        $em2=$this->getDoctrine()->getManager();
        $cats_one=$em2->getRepository('AppBundle:Cat')->findOneBy(['slug' => $cat]);

       // вытаскиваем посты этой категории
        $em3 = $this->getDoctrine()->getManager();
        $posts=$em3->getRepository('AppBundle:Post')->findBy(['cat' => $cats_one]);

        return $this->render('homepage.html.twig',[
            'cats'=>$cats,
            'posts'=>$posts
            ]);
    }








    /**
     * @Route("/cats", name="allcats")
     */
    public function showCatAction(){
        $em=$this->getDoctrine()->getManager();
        $cats=$em->getRepository('AppBundle:Cat')->findAll();
        return $this->render('cats.html.twig',[
            'cats'=>$cats

        ]);
    }










}
