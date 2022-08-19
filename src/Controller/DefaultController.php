<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RequestStack;
use App\Repository\TodoRepository;
use App\Entity\Todo;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class DefaultController extends AbstractController
{

    function __construct()
    {
    }


    /**
     * @Route("/{reactRouting}", name="home", defaults={"reactRouting": null})
     */
    public function index(EntityManagerInterface $entityManager, TodoRepository $repo): Response
    {
        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("api/add", name="add", methods={"POST"})
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function addDatas(SerializerInterface $serializer, Request $request, EntityManagerInterface $entityManager, TodoRepository $repo)
    {

        $todo = new Todo();
        $content = $request->get('content');
        // $content = $request->get('content');


        $todo->setContent($content);
        $todo->setCreatedAt(new \DateTime());
        $entityManager->persist($todo);
        $entityManager->flush();


        $data = $serializer->serialize($todo, 'json');
        return new JsonResponse($data, Response::HTTP_OK, [], true);
    }

    /**
     * @Route("api/edit", name="edit", methods={"POST"})
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function editDatas(SerializerInterface $serializer, Request $request, EntityManagerInterface $entityManager, TodoRepository $repo)
    {

        // $entityManager = $doctrine->getManager();
        $id = $request->get('id');
        $content = $request->get('content');

        $product = $repo->find($id);

        // dd($id);

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id ' . $id
            );
        }

        $product->setContent($content);
        $entityManager->flush();

        $data = $serializer->serialize($product, 'json');
        return new JsonResponse($data, Response::HTTP_OK, [], true);
    }

    /**
     * @Route("api/getDatas", name="session", methods={"GET"})
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function getDatas(SerializerInterface $serializer, TodoRepository $repo): JsonResponse
    {

        $models = $repo->findAll();
        $data = $serializer->serialize($models, 'json');
        return new JsonResponse($data, Response::HTTP_OK, [], true);
    }
}
