<?php

namespace App\Factory;

use App\Entity\Order;
use App\Entity\Panier;
use App\Entity\Produit;
use App\Entity\OrderBook;

/**
 * Class OrderFactory
 * @package App\Factory
 */
class OrderFactory
{
    /**
     * Creates an order.
     *
     * @return Order
     */
    public function create(): Order
    {
        $order = new Order();
        $order
            ->setStatus(Order::STATUS_CART)
            ->setCreatedAt(new \DateTime())
            ->setUpdateAt(new \DateTime());

        return $order;
    }

    /**
     * Creates an item for a product.
     *
     * @param Panier $produit
     *
     * @return OrderBook
     */
    public function createItem(Panier $produit): OrderBook
    {
        $item = new OrderBook();
        $item->setProduit($produit);
        $item->setQuantity(1);

        return $item;
    }
}