<?php

namespace App\DataFixtures;

use App\Entity\Orders;
use App\Entity\OrdersArticle;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class OrderFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();
        $totalOrders = 70;

        for ($i = 0; $i < $totalOrders; $i++) {
            $order = new Orders();

            $startDate = $faker->dateTimeBetween('-1 year', 'now');
            $endDate = $faker->dateTimeInInterval($startDate, '+1 year');

            $confirmStartDate = $faker->dateTimeBetween('-1 year', 'now');
            $confirmEndDate = $faker->dateTimeInInterval($confirmStartDate, '+6 months');

            $fastPayStartDate = $faker->dateTimeBetween('now', '+6 months');
            $fastPayEndDate = $faker->dateTimeInInterval($fastPayStartDate, '+6 months');

            $oldStartDate = $faker->dateTimeBetween('-2 years', '-1 year');
            $oldEndDate = $faker->dateTimeInInterval($oldStartDate, '+6 months');


            $fullPaymentDate = $faker->dateTimeThisYear();

            $order->setHash($faker->regexify('[A-Za-z0-9]{32}'));
            $order->setUserId($faker->numberBetween(1, 100));
            $order->setToken($faker->regexify('[A-Za-z0-9]{64}'));
            $order->setNumber($faker->randomNumber(5, true));
            $order->setStatus($faker->numberBetween(1, 5));
            $order->setEmail($faker->email);
            $order->setVatType($faker->numberBetween(0, 1));
            $order->setVatNumber($faker->randomNumber(9, true));
            $order->setTaxNumber($faker->randomNumber(9, true));
            $order->setDiscount($faker->numberBetween(0, 30));
            $order->setDelivery($faker->randomFloat(2, 10, 100));
            $order->setDeliveryType($faker->randomElement(['client_address', 'warehouse_address']));
            $order->setDeliveryTimeMin($startDate);
            $order->setDeliveryTimeMax($endDate);
            $order->setDeliveryTimeConfirmMin($confirmStartDate);
            $order->setDeliveryTimeConfirmMax($confirmEndDate);
            $order->setDeliveryTimeFastPayMin($fastPayStartDate);
            $order->setDeliveryTimeFastPayMax($fastPayEndDate);
            $order->setDeliveryOldTimeMin($oldStartDate);
            $order->setDeliveryOldTimeMax($oldEndDate);
            $order->setDeliveryIndex($faker->postcode);
            $order->setDeliveryCountry((int)$faker->countryCode);
            $order->setDeliveryRegion($faker->state);
            $order->setDeliveryCity($faker->city);
            $order->setDeliveryAddress($faker->address);
            $order->setDeliveryBuilding($faker->buildingNumber);
            $order->setDeliveryPhoneCode($faker->countryCode);
            $order->setDeliveryPhone($faker->phoneNumber);
            $order->setSex($faker->randomElement(['male', 'female', 'other']));
            $order->setClientName($faker->firstName);
            $order->setClientSurname($faker->lastName);
            $order->setCompanyName($faker->company);
            $order->setPayType($faker->numberBetween(1, 3));
            $order->setPayDateExecution($faker->dateTimeThisYear());
            $order->setOffsetDate($faker->dateTimeThisYear());
            $order->setOffsetReason($faker->randomElement(['factory_holidays', 'factory_production_delay', 'other']));
            $order->setProposedDate($faker->dateTimeThisYear('+1 year'));
            $order->setShipDate($faker->dateTimeThisYear('+1 year'));
            $order->setTrackingNumber($faker->regexify('[A-Za-z0-9]{20}'));
            $order->setManagerName('$faker->name');
            $order->setManagerEmail('$faker->email()');
            $order->setManagerPhone($faker->phoneNumber);
            $order->setCarrierName($faker->company);
            $order->setCarrierContactData($faker->address);
            $order->setLocale('test');
            $order->setCurRate($faker->randomFloat(2, 0.5, 1.5));
            $order->setCurrency($faker->randomElement(['EUR', 'USD', 'GBP']));
            $order->setMeasure($faker->randomElement(['m', 'sqm', 'pcs']));
            $order->setName($faker->sentence(3));
            $order->setDescription($faker->text(200));
            $order->setCreateDate($faker->dateTimeThisYear());
            $order->setUpdateDate($faker->dateTimeThisYear('+1 year'));
            $order->setWarehouseData($faker->address);
            $order->setStep($faker->boolean ? 1 : 0);
            $order->setAddressEqual($faker->boolean(75));
            $order->setBankTransferRequested($faker->boolean(50));
            $order->setAcceptPay($faker->boolean(80));
            $order->setCancelDate($faker->dateTimeThisYear('+1 year'));
            $order->setWeightGross($faker->randomFloat(2, 5, 200));
            $order->setProductReview($faker->boolean(50));
            $order->setMirror($faker->randomDigitNotNull);
            $order->setProcess($faker->boolean(20));
            $order->setFactDate($faker->dateTimeThisYear('+2 years'));
            $order->setEntranceReview($faker->randomDigitNotNull);
            $order->setPaymentEuro($faker->boolean(80));
            $order->setSpecPrice($faker->boolean(30));
            $order->setShowMsg($faker->boolean(20));
            $order->setDeliveryPriceEuro($faker->randomFloat(2, 10, 100));
            $order->setAddressPayer($faker->numberBetween(1, 100));
            $order->setSendingDate($faker->dateTimeThisYear('+1 year'));
            $order->setDeliveryCalculateType($faker->randomElement(['manual', 'automatic']));
            $order->setFullPaymentDate($fullPaymentDate);
            $order->setBankDetails($faker->text(200));
            $order->setDeliveryApartmentOffice($faker->buildingNumber);

            $manager->persist($order);

            for ($j = 0; $j < $totalOrders; $j++) {
                $article = new OrdersArticle();
                $article->setOrdersId($j);
                $article->setArticleId($faker->numberBetween(1000, 5000));
                $article->setAmount($faker->randomFloat(2, 1, 100));
                $article->setPrice($faker->randomFloat(2, 10, 1000));
                $article->setPriceEur($faker->randomFloat(2, 10, 1000));
                $article->setCurrency($faker->randomElement(['EUR', 'USD', 'GBP']));
                $validMeasures = ['m', 'sqm', 'pcs']; // Allowed measures
                $measure = $faker->randomElement($validMeasures); // Ensuring valid data

                if (!in_array($measure, $validMeasures)) {
                    throw new \InvalidArgumentException("Invalid measure value");
                }

                $article->setMeasure(1);
//                $article->setMeasure($faker->randomElement(['m', 'sqm', 'pcs']));
                $articleStartDate = $faker->dateTimeBetween('-1 year', 'now');
                $articleEndDate = $faker->dateTimeInInterval($articleStartDate, '+1 year');
                $article->setDeliveryTimeMin($articleStartDate);
                $article->setDeliveryTimeMax($articleEndDate);
                $article->setWeight($faker->randomFloat(2, 1, 100));
                $article->setMultiplePallet($faker->randomElement([1, 2, 3]));
                $article->setPackagingCount($faker->randomFloat(2, 1, 100));
                $article->setPallet($faker->randomFloat(2, 1, 100));
                $article->setPackaging($faker->randomFloat(2, 1, 100));
                $article->setSwimmingPool($faker->boolean(50));

                $manager->persist($article);
            }

        }
        $manager->flush();
    }
}
