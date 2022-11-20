<?php

namespace App\Controller;

use App\Entity\Item;
use App\Repository\ItemRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ItemController extends AbstractController
{
    #[Route('/items', name: 'app_items')]
    public function index(ItemRepository $itemRepository): Response
    {
        return $this->render('item/index.html.twig', [
            'items' => $itemRepository->findAll()
        ]);
    }

    #[Route('/items/{id}', name: 'app_item')]
    public function show(Item $item): Response
    {
        // ParamConverter requires `sensio/framework-extra-bundle` dependency to be installed to function properly
        return $this->render('item/show.html.twig', [
            'item' => $item
        ]);
    }

}
