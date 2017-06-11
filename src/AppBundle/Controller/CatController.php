<?php

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CatController extends Controller
{


    /**
     * @Route("/cats/{cat}", name="cat")
     */
    public function post_of_cat_Action($cat)
    {
        //категории для хедера
        $em=$this->getDoctrine()->getManager();
        $cats=$em->getRepository('AppBundle:Cat')->findAll();

        //вытаскиваем категорию по slug и берем ее id
        $em=$this->getDoctrine()->getManager();
        $cats_one=$em->getRepository('AppBundle:Cat')->findOneBy(['slug' => $cat]);

//var_dump($cats_one->id);
      //  dump($cats_one->id);


       // вытаскиваем посты этой категории
       // $cat_id=11;
        $em = $this->getDoctrine()->getManager();
        $posts = $em->getRepository('AppBundle:Post')->findBy(['cat_id' => $cats_one->id]);
           // ->findBy(['cat_id' => $cat_id]);
        dump($posts);



        return $this->render('homepage.html.twig',[
            'cats'=>$cats,
            'posts'=>'ss'
            ]);
    }


}
