<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "orders")]
class Orders
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 32)]
    private ?string $hash = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $userId = null;

    #[ORM\Column(type: 'string', length: 64)]
    private ?string $token = null;

    #[ORM\Column(type: 'string', length: 10, nullable: true)]
    private ?string $number = null;

    #[ORM\Column(type: 'integer')]
    private ?int $status = 1;

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(type: 'smallint')]
    private ?int $vatType = 0;

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private ?string $vatNumber = null;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private ?string $taxNumber = null;

    #[ORM\Column(type: 'smallint', nullable: true)]
    private ?int $discount = null;

    #[ORM\Column(type: 'float', nullable: true)]
    private ?float $delivery = null;

    #[ORM\Column(type: 'string', columnDefinition: "ENUM('client_address', 'warehouse_address')", options: ["default" => "client_address"])]
    private ?string $deliveryType = 'client_address';

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $deliveryTimeMin = null;

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $deliveryTimeMax = null;

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $deliveryTimeConfirmMin = null;

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $deliveryTimeConfirmMax = null;

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $deliveryTimeFastPayMin = null;

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $deliveryTimeFastPayMax = null;

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $deliveryOldTimeMin = null;

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $deliveryOldTimeMax = null;

    #[ORM\Column(type: 'string', length: 20, nullable: true)]
    private ?string $deliveryIndex = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $deliveryCountry = null;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private ?string $deliveryRegion = null;

    #[ORM\Column(type: 'string', length: 200, nullable: true)]
    private ?string $deliveryCity = null;

    #[ORM\Column(type: 'string', length: 300, nullable: true)]
    private ?string $deliveryAddress = null;

    #[ORM\Column(type: 'string', length: 200, nullable: true)]
    private ?string $deliveryBuilding = null;

    #[ORM\Column(type: 'string', length: 20, nullable: true)]
    private ?string $deliveryPhoneCode = null;

    #[ORM\Column(type: 'string', length: 20, nullable: true)]
    private ?string $deliveryPhone = null;

    #[ORM\Column(type: 'string', columnDefinition: "ENUM('male', 'female', 'other')", nullable: true)]
    private ?string $sex = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $clientName = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $clientSurname = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $companyName = null;

    #[ORM\Column(type: 'smallint')]
    private ?int $payType = null;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $payDateExecution = null;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $offsetDate = null;

    #[ORM\Column(type: 'string', columnDefinition: "ENUM('factory_holidays', 'factory_production_delay', 'other')", nullable: true)]
    private ?string $offsetReason = null;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $proposedDate = null;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $shipDate = null;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private ?string $trackingNumber = null;

    #[ORM\Column(type: 'string', length: 20, nullable: true)]
    private ?string $managerName = null;

    #[ORM\Column(type: 'string', length: 30, nullable: true)]
    private ?string $managerEmail = null;

    #[ORM\Column(type: 'string', length: 20, nullable: true)]
    private ?string $managerPhone = null;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private ?string $carrierName = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $carrierContactData = null;

    #[ORM\Column(type: 'string', length: 5)]
    private ?string $locale = null;

    #[ORM\Column(type: 'float', options: ["default" => 1])]
    private ?float $curRate = 1;

    #[ORM\Column(type: 'string', columnDefinition: "ENUM('EUR', 'USD', 'GBP')", options: ["default" => 'EUR'])]
    private ?string $currency = 'EUR';

    #[ORM\Column(type: 'string', columnDefinition: "ENUM('m', 'sqm', 'pcs')", options: ["default" => 'm'])]
    private ?string $measure = 'm';

    #[ORM\Column(type: 'string', length: 200)]
    private ?string $name = null;

    #[ORM\Column(type: 'string', length: 1000, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $createDate = null;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $updateDate = null;

    #[ORM\Column(type: 'longtext', nullable: true)]
    private ?string $warehouseData = null;

    #[ORM\Column(type: 'smallint', options: ["default" => 1])]
    private ?int $step = 1;

    #[ORM\Column(type: 'boolean', options: ["default" => 1])]
    private ?bool $addressEqual = true;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private ?bool $bankTransferRequested = null;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private ?bool $acceptPay = null;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $cancelDate = null;

    #[ORM\Column(type: 'float', nullable: true)]
    private ?float $weightGross = null;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private ?bool $productReview = null;

    #[ORM\Column(type: 'smallint', nullable: true)]
    private ?int $mirror = null;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private ?bool $process = null;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $factDate = null;

    #[ORM\Column(type: 'smallint', nullable: true)]
    private ?int $entranceReview = null;

    #[ORM\Column(type: 'boolean', options: ["default" => 0])]
    private ?bool $paymentEuro = false;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private ?bool $specPrice = null;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private ?bool $showMsg = null;

    #[ORM\Column(type: 'float', nullable: true)]
    private ?float $deliveryPriceEuro = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $addressPayer = null;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $sendingDate = null;

    #[ORM\Column(type: 'string', columnDefinition: "ENUM('manual', 'automatic')", options: ["default" => 'manual'])]
    private ?string $deliveryCalculateType = 'manual';

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $fullPaymentDate = null;

    #[ORM\Column(type: 'longtext', nullable: true)]
    private ?string $bankDetails = null;

    #[ORM\Column(type: 'string', length: 30, nullable: true)]
    private ?string $deliveryApartmentOffice = null;

    public function setTrackingNumber(?string $trackingNumber): self
    {
        $this->trackingNumber = $trackingNumber;
        return $this;
    }

    public function setManagerName(?string $managerName): self
    {
        $this->managerName = $managerName;
        return $this;
    }

    public function setManagerEmail(?string $managerEmail): self
    {
        $this->managerEmail = $managerEmail;
        return $this;
    }

    public function setManagerPhone(?string $managerPhone): self
    {
        $this->managerPhone = $managerPhone;
        return $this;
    }

    public function setCarrierName(?string $carrierName): self
    {
        $this->carrierName = $carrierName;
        return $this;
    }

    public function setCarrierContactData(?string $carrierContactData): self
    {
        $this->carrierContactData = $carrierContactData;
        return $this;
    }

    public function setLocale(string $locale): self
    {
        $this->locale = $locale;
        return $this;
    }

    public function setCurRate(float $curRate): self
    {
        $this->curRate = $curRate;
        return $this;
    }

    public function setCurrency(string $currency): self
    {
        $this->currency = $currency;
        return $this;
    }

    public function setMeasure(string $measure): self
    {
        $this->measure = $measure;
        return $this;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function setCreateDate(\DateTimeInterface $createDate): self
    {
        $this->createDate = $createDate;
        return $this;
    }

    public function setUpdateDate(\DateTimeInterface $updateDate): self
    {
        $this->updateDate = $updateDate;
        return $this;
    }

    public function setWarehouseData(?string $warehouseData): self
    {
        $this->warehouseData = $warehouseData;
        return $this;
    }

    public function setStep(int $step): self
    {
        $this->step = $step;
        return $this;
    }

    public function setAddressEqual(bool $addressEqual): self
    {
        $this->addressEqual = $addressEqual;
        return $this;
    }

    public function setBankTransferRequested(?bool $bankTransferRequested): self
    {
        $this->bankTransferRequested = $bankTransferRequested;
        return $this;
    }

    public function setAcceptPay(?bool $acceptPay): self
    {
        $this->acceptPay = $acceptPay;
        return $this;
    }

    public function setCancelDate(\DateTimeInterface $cancelDate): self
    {
        $this->cancelDate = $cancelDate;
        return $this;
    }

    public function setWeightGross(?float $weightGross): self
    {
        $this->weightGross = $weightGross;
        return $this;
    }

    public function setProductReview(?bool $productReview): self
    {
        $this->productReview = $productReview;
        return $this;
    }

    public function setMirror(?int $mirror): self
    {
        $this->mirror = $mirror;
        return $this;
    }

    public function setProcess(?bool $process): self
    {
        $this->process = $process;
        return $this;
    }

    public function setFactDate(\DateTimeInterface $factDate): self
    {
        $this->factDate = $factDate;
        return $this;
    }

    public function setEntranceReview(?int $entranceReview): self
    {
        $this->entranceReview = $entranceReview;
        return $this;
    }

    public function setPaymentEuro(bool $paymentEuro): self
    {
        $this->paymentEuro = $paymentEuro;
        return $this;
    }

    // Getters and Setters for the Orders class

    public function getHash(): ?string
    {
        return $this->hash;
    }

    public function setHash(string $hash): self
    {
        $this->hash = $hash;
        return $this;
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): self
    {
        $this->userId = $userId;
        return $this;
    }

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function setToken(string $token): self
    {
        $this->token = $token;
        return $this;
    }

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(string $number): self
    {
        $this->number = $number;
        return $this;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(int $status): self
    {
        $this->status = $status;
        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getVatType(): ?int
    {
        return $this->vatType;
    }

    public function setVatType(int $vatType): self
    {
        $this->vatType = $vatType;
        return $this;
    }

    public function getVatNumber(): ?string
    {
        return $this->vatNumber;
    }

    public function setVatNumber(string $vatNumber): self
    {
        $this->vatNumber = $vatNumber;
        return $this;
    }

    public function getTaxNumber(): ?string
    {
        return $this->taxNumber;
    }

    public function setTaxNumber(string $taxNumber): self
    {
        $this->taxNumber = $taxNumber;
        return $this;
    }

    public function getDiscount(): ?int
    {
        return $this->discount;
    }

    public function setDiscount(int $discount): self
    {
        $this->discount = $discount;
        return $this;
    }

    public function getDelivery(): ?float
    {
        return $this->delivery;
    }

    public function setDelivery(float $delivery): self
    {
        $this->delivery = $delivery;
        return $this;
    }

    public function getDeliveryType(): ?string
    {
        return $this->deliveryType;
    }

    public function setDeliveryType(string $deliveryType): self
    {
        $this->deliveryType = $deliveryType;
        return $this;
    }

    public function getDeliveryTimeMin(): ?\DateTimeInterface
    {
        return $this->deliveryTimeMin;
    }

    public function setDeliveryTimeMin(\DateTimeInterface $deliveryTimeMin): self
    {
        $this->deliveryTimeMin = $deliveryTimeMin;
        return $this;
    }

    public function getDeliveryTimeMax(): ?\DateTimeInterface
    {
        return $this->deliveryTimeMax;
    }

    public function setDeliveryTimeMax(\DateTimeInterface $deliveryTimeMax): self
    {
        $this->deliveryTimeMax = $deliveryTimeMax;
        return $this;
    }

    public function getDeliveryTimeConfirmMin(): ?\DateTimeInterface
    {
        return $this->deliveryTimeConfirmMin;
    }

    public function setDeliveryTimeConfirmMin(\DateTimeInterface $deliveryTimeConfirmMin): self
    {
        $this->deliveryTimeConfirmMin = $deliveryTimeConfirmMin;
        return $this;
    }

    public function getDeliveryTimeConfirmMax(): ?\DateTimeInterface
    {
        return $this->deliveryTimeConfirmMax;
    }

    public function setDeliveryTimeConfirmMax(\DateTimeInterface $deliveryTimeConfirmMax): self
    {
        $this->deliveryTimeConfirmMax = $deliveryTimeConfirmMax;
        return $this;
    }

    public function getDeliveryTimeFastPayMin(): ?\DateTimeInterface
    {
        return $this->deliveryTimeFastPayMin;
    }

    public function setDeliveryTimeFastPayMin(\DateTimeInterface $deliveryTimeFastPayMin): self
    {
        $this->deliveryTimeFastPayMin = $deliveryTimeFastPayMin;
        return $this;
    }

    public function getDeliveryTimeFastPayMax(): ?\DateTimeInterface
    {
        return $this->deliveryTimeFastPayMax;
    }

    public function setDeliveryTimeFastPayMax(\DateTimeInterface $deliveryTimeFastPayMax): self
    {
        $this->deliveryTimeFastPayMax = $deliveryTimeFastPayMax;
        return $this;
    }

    public function getDeliveryOldTimeMin(): ?\DateTimeInterface
    {
        return $this->deliveryOldTimeMin;
    }

    public function setDeliveryOldTimeMin(\DateTimeInterface $deliveryOldTimeMin): self
    {
        $this->deliveryOldTimeMin = $deliveryOldTimeMin;
        return $this;
    }

    public function getDeliveryOldTimeMax(): ?\DateTimeInterface
    {
        return $this->deliveryOldTimeMax;
    }

    public function setDeliveryOldTimeMax(\DateTimeInterface $deliveryOldTimeMax): self
    {
        $this->deliveryOldTimeMax = $deliveryOldTimeMax;
        return $this;
    }

    public function getDeliveryIndex(): ?string
    {
        return $this->deliveryIndex;
    }

    public function setDeliveryIndex(string $deliveryIndex): self
    {
        $this->deliveryIndex = $deliveryIndex;
        return $this;
    }

    public function getDeliveryCountry(): ?int
    {
        return $this->deliveryCountry;
    }

    public function setDeliveryCountry(int $deliveryCountry): self
    {
        $this->deliveryCountry = $deliveryCountry;
        return $this;
    }

    public function getDeliveryRegion(): ?string
    {
        return $this->deliveryRegion;
    }

    public function setDeliveryRegion(string $deliveryRegion): self
    {
        $this->deliveryRegion = $deliveryRegion;
        return $this;
    }

    public function getDeliveryCity(): ?string
    {
        return $this->deliveryCity;
    }

    public function setDeliveryCity(string $deliveryCity): self
    {
        $this->deliveryCity = $deliveryCity;
        return $this;
    }

    public function getDeliveryAddress(): ?string
    {
        return $this->deliveryAddress;
    }

    public function setDeliveryAddress(string $deliveryAddress): self
    {
        $this->deliveryAddress = $deliveryAddress;
        return $this;
    }

    public function getDeliveryBuilding(): ?string
    {
        return $this->deliveryBuilding;
    }

    public function setDeliveryBuilding(string $deliveryBuilding): self
    {
        $this->deliveryBuilding = $deliveryBuilding;
        return $this;
    }

    public function getDeliveryPhoneCode(): ?string
    {
        return $this->deliveryPhoneCode;
    }

    public function setDeliveryPhoneCode(string $deliveryPhoneCode): self
    {
        $this->deliveryPhoneCode = $deliveryPhoneCode;
        return $this;
    }

    public function getDeliveryPhone(): ?string
    {
        return $this->deliveryPhone;
    }

    public function setDeliveryPhone(string $deliveryPhone): self
    {
        $this->deliveryPhone = $deliveryPhone;
        return $this;
    }

    public function getSex(): ?string
    {
        return $this->sex;
    }

    public function setSex(string $sex): self
    {
        $this->sex = $sex;
        return $this;
    }

    public function getClientName(): ?string
    {
        return $this->clientName;
    }

    public function setClientName(string $clientName): self
    {
        $this->clientName = $clientName;
        return $this;
    }

    public function getClientSurname(): ?string
    {
        return $this->clientSurname;
    }

    public function setClientSurname(string $clientSurname): self
    {
        $this->clientSurname = $clientSurname;
        return $this;
    }

    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    public function setCompanyName(string $companyName): self
    {
        $this->companyName = $companyName;
        return $this;
    }

    public function getPayType(): ?int
    {
        return $this->payType;
    }

    public function setPayType(int $payType): self
    {
        $this->payType = $payType;
        return $this;
    }

    public function getPayDateExecution(): ?\DateTimeInterface
    {
        return $this->payDateExecution;
    }

    public function setPayDateExecution(\DateTimeInterface $payDateExecution): self
    {
        $this->payDateExecution = $payDateExecution;
        return $this;
    }

    public function getOffsetDate(): ?\DateTimeInterface
    {
        return $this->offsetDate;
    }

    public function setOffsetDate(\DateTimeInterface $offsetDate): self
    {
        $this->offsetDate = $offsetDate;
        return $this;
    }

    public function getOffsetReason(): ?string
    {
        return $this->offsetReason;
    }

    public function setOffsetReason(string $offsetReason): self
    {
        $this->offsetReason = $offsetReason;
        return $this;
    }

    public function getProposedDate(): ?\DateTimeInterface
    {
        return $this->proposedDate;
    }

    public function setProposedDate(\DateTimeInterface $proposedDate): self
    {
        $this->proposedDate = $proposedDate;
        return $this;
    }

    public function getShipDate(): ?\DateTimeInterface
    {
        return $this->shipDate;
    }

    public function setShipDate(\DateTimeInterface $shipDate): self
    {
        $this->shipDate = $shipDate;
        return $this;
    }

    public function getSpecPrice(): ?bool
    {
        return $this->specPrice;
    }

    public function setSpecPrice(bool $specPrice): self
    {
        $this->specPrice = $specPrice;
        return $this;
    }

    public function getShowMsg(): ?bool
    {
        return $this->showMsg;
    }

    public function setShowMsg(bool $showMsg): self
    {
        $this->showMsg = $showMsg;
        return $this;
    }

    public function getDeliveryPriceEuro(): ?float
    {
        return $this->deliveryPriceEuro;
    }

    public function setDeliveryPriceEuro(float $deliveryPriceEuro): self
    {
        $this->deliveryPriceEuro = $deliveryPriceEuro;
        return $this;
    }

    public function getAddressPayer(): ?int
    {
        return $this->addressPayer;
    }

    public function setAddressPayer(int $addressPayer): self
    {
        $this->addressPayer = $addressPayer;
        return $this;
    }

    public function getSendingDate(): ?\DateTimeInterface
    {
        return $this->sendingDate;
    }

    public function setSendingDate(\DateTimeInterface $sendingDate): self
    {
        $this->sendingDate = $sendingDate;
        return $this;
    }

    public function getDeliveryCalculateType(): ?string
    {
        return $this->deliveryCalculateType;
    }

    public function setDeliveryCalculateType(string $deliveryCalculateType): self
    {
        $this->deliveryCalculateType = $deliveryCalculateType;
        return $this;
    }

    public function getFullPaymentDate(): ?\DateTimeInterface
    {
        return $this->fullPaymentDate;
    }

    public function setFullPaymentDate(\DateTimeInterface $fullPaymentDate): self
    {
        $this->fullPaymentDate = $fullPaymentDate;
        return $this;
    }

    public function getBankDetails(): ?string
    {
        return $this->bankDetails;
    }

    public function setBankDetails(string $bankDetails): self
    {
        $this->bankDetails = $bankDetails;
        return $this;
    }

    public function getDeliveryApartmentOffice(): ?string
    {
        return $this->deliveryApartmentOffice;
    }

    public function setDeliveryApartmentOffice(string $deliveryApartmentOffice): self
    {
        $this->deliveryApartmentOffice = $deliveryApartmentOffice;
        return $this;
    }




}
