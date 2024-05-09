<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "orders_article")]
class OrdersArticle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'integer')]
    private ?int $ordersId = null;

    #[ORM\Column(type: 'integer')]
    private ?int $articleId = null;

    #[ORM\Column(type: 'float')]
    private ?float $amount = null;

    #[ORM\Column(type: 'float')]
    private ?float $price = null;

    #[ORM\Column(type: 'float', nullable: true)]
    private ?float $priceEur = null;

    #[ORM\Column(type: 'string', columnDefinition: "ENUM('USD', 'EUR', 'GBP')")]
    private ?string $currency = null;

    #[ORM\Column(type: 'string', columnDefinition: "ENUM('m', 'cm', 'sqm')")]
    private ?string $measure = null;

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $deliveryTimeMin = null;

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $deliveryTimeMax = null;

    #[ORM\Column(type: 'float')]
    private ?float $weight = null;

    #[ORM\Column(type: 'smallint', nullable: true)]
    private ?int $multiplePallet = null;

    #[ORM\Column(type: 'float')]
    private ?float $packagingCount = null;

    #[ORM\Column(type: 'float')]
    private ?float $pallet = null;

    #[ORM\Column(type: 'float')]
    private ?float $packaging = null;

    #[ORM\Column(type: 'boolean')]
    private ?bool $swimmingPool = null;

    // Getters and Setters

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getOrdersId(): ?int
    {
        return $this->ordersId;
    }

    public function setOrdersId(int $ordersId): self
    {
        $this->ordersId = $ordersId;
        return $this;
    }

    public function getArticleId(): ?int
    {
        return $this->articleId;
    }

    public function setArticleId(int $articleId): self
    {
        $this->articleId = $articleId;
        return $this;
    }

    public function getAmount(): ?float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): self
    {
        $this->amount = $amount;
        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;
        return $this;
    }

    public function getPriceEur(): ?float
    {
        return $this->priceEur;
    }

    public function setPriceEur(?float $priceEur): self
    {
        $this->priceEur = $priceEur;
        return $this;
    }

    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    public function setCurrency(string $currency): self
    {
        $this->currency = $currency;
        return $this;
    }

    public function getMeasure(): ?string
    {
        return $this->measure;
    }

    public function setMeasure(string $measure): self
    {
        $this->measure = $measure;
        return $this;
    }

    public function getDeliveryTimeMin(): ?\DateTimeInterface
    {
        return $this->deliveryTimeMin;
    }

    public function setDeliveryTimeMin(?\DateTimeInterface $deliveryTimeMin): self
    {
        $this->deliveryTimeMin = $deliveryTimeMin;
        return $this;
    }

    public function getDeliveryTimeMax(): ?\DateTimeInterface
    {
        return $this->deliveryTimeMax;
    }

    public function setDeliveryTimeMax(?\DateTimeInterface $deliveryTimeMax): self
    {
        $this->deliveryTimeMax = $deliveryTimeMax;
        return $this;
    }

    public function getWeight(): ?float
    {
        return $this->weight;
    }

    public function setWeight(float $weight): self
    {
        $this->weight = $weight;
        return $this;
    }

    public function getMultiplePallet(): ?int
    {
        return $this->multiplePallet;
    }

    public function setMultiplePallet(?int $multiplePallet): self
    {
        $this->multiplePallet = $multiplePallet;
        return $this;
    }

    public function getPackagingCount(): ?float
    {
        return $this->packagingCount;
    }

    public function setPackagingCount(float $packagingCount): self
    {
        $this->packagingCount = $packagingCount;
        return $this;
    }

    public function getPallet(): ?float
    {
        return $this->pallet;
    }

    public function setPallet(float $pallet): self
    {
        $this->pallet = $pallet;
        return $this;
    }

    public function getPackaging(): ?float
    {
        return $this->packaging;
    }

    public function setPackaging(float $packaging): self
    {
        $this->packaging = $packaging;
        return $this;
    }

    public function isSwimmingPool(): ?bool
    {
        return $this->swimmingPool;
    }

    public function setSwimmingPool(bool $swimmingPool): self
    {
        $this->swimmingPool = $swimmingPool;
        return $this;
    }
}