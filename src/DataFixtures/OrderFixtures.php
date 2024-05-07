<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Order;

class OrderFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $totalOrders = 100;

        for ($i = 1; $i <= $totalOrders; $i++) {
            $order = new Order();
            $randomDate = new \DateTime();
            $randomDays = '-' . mt_rand(0, 365) . ' days';
            $randomDate->modify($randomDays);

            $order->setOrderDate($randomDate);
            $order->setTotal(mt_rand(100, 1000));
            $order->setStatus('new');

            $manager->persist($order);
        }

        $manager->flush();
    }
}
