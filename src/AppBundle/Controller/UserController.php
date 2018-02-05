<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;
use AppBundle\Entity\User;

class UserController extends Controller
{
    /**
     * @Route("/users", name="user1")
     */
    public function getAction()
    {

        echo "hi";
        $restresult = $this->getDoctrine()->getRepository('AppBundle:User')->findAll();
        if ($restresult === null) {
            return new View("there are no users exist", Response::HTTP_NOT_FOUND);
        }
        return $restresult;

    }

    /**
     * @Route("/users/create", name="user2")
     */
    public function postAction(Request $request)
    {
        //print_r($request->request->all());exit;


        $data = new User;
        $name = $request->get('name');
        $role = $request->get('role');
        if (empty($name) || empty($role))
        {
            return new View("No Values Entered", Response::HTTP_NOT_ACCEPTABLE);
        }
        else
            {
            $data->setName($name);
            $data->setRole($role);
            $em = $this->getDoctrine()->getManager();
            $em->persist($data);
            $em->flush();
            return new View("User Added Successfully", Response::HTTP_OK);
        }
    }

    /**
     * @Route("/users/put/{id}", name="users_update")
     */
    public function updateAction($id,Request $request)
    {
        $data = new User;
        $name = $request->get('name');
        $role = $request->get('role');
        $sn = $this->getDoctrine()->getManager();
        $user = $this->getDoctrine()->getRepository('AppBundle:User')->find($id);
        if (empty($user)) {
            return new View("user not found", Response::HTTP_NOT_FOUND);
        }
        elseif(!empty($name) && !empty($role)){
            $user->setName($name);
            $user->setRole($role);
            $sn->flush();
            return new View("User Updated Successfully", Response::HTTP_OK);
        }
        elseif(empty($name) && !empty($role)){
            $user->setRole($role);
            $sn->flush();
            return new View("role Updated Successfully", Response::HTTP_OK);
        }
        elseif(!empty($name) && empty($role)){
            $user->setName($name);
            $sn->flush();
            return new View("User Name Updated Successfully", Response::HTTP_OK);
        }
        else return new View("User name or role cannot be empty", Response::HTTP_NOT_ACCEPTABLE);
    }


    /**
     * @Route("/users/delete/{id}", name="users_delete", requirements={"id"="\d+"})
     */
    public function deleteAction($id)
    {
        $data = new User;
        $sn = $this->getDoctrine()->getManager();
        $user = $this->getDoctrine()->getRepository('AppBundle:User')->find($id);
        if (empty($user)) {
            return new View("user not found", Response::HTTP_NOT_FOUND);
        }
        else {
            $sn->remove($user);
            $sn->flush();
        }
        return new View("deleted successfully", Response::HTTP_OK);
    }
}

 ?>

