<?php

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{


    /**
     * @Route("/users/{userId}", name="user")
     */
    public function postOfCatAction($userId)
    {
        //категории для хедера
        $em=$this->getDoctrine()->getManager();
        $cats=$em->getRepository('AppBundle:Cat')->findAll();

        // ищем такого пользователя
        $em = $this->getDoctrine()->getManager();
        $user=$em->getRepository('AppBundle:User')->findBy(['id' => $userId]);

        //извлекаем посты пользователя
        $em = $this->getDoctrine()->getManager();
        $posts=$em->getRepository('AppBundle:Post')->findBy(['user' => $userId]);
//dump($posts);
        return $this->render('user.html.twig',[
            'cats'=>$cats,
            'user'=>$user,
            'posts'=>$posts
        ]);
    }








    /**
     * @Route("/users", name="allusers")
     */
    public function showCatAction(){
        $em=$this->getDoctrine()->getManager();
        $cats=$em->getRepository('AppBundle:Cat')->findAll();

        $em2=$this->getDoctrine()->getManager();
        $users=$em2->getRepository('AppBundle:User')->findAll();

        return $this->render('users.html.twig',[
            'cats'=>$cats,
            'users'=>$users,

        ]);
    }










}
