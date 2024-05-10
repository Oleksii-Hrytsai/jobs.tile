<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240507053551 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        $this->addSql('CREATE TABLE orders (
        id INT AUTO_INCREMENT PRIMARY KEY,
        hash VARCHAR(32) NOT NULL COMMENT \'hash заказа\',
        user_id INT COMMENT \'ID пользователя\',
        token VARCHAR(64) NOT NULL COMMENT \'уникальный хеш пользователя\',
        number VARCHAR(10) COMMENT \'Номер заказа\',
        status INT DEFAULT 1 NOT NULL COMMENT \'Статус заказа\',
        email VARCHAR(100) COMMENT \'контактный E-mail\',
        vat_type TINYINT DEFAULT 0 NOT NULL COMMENT \'Частное лицо или плательщик НДС\',
        vat_number VARCHAR(100) COMMENT \'НДС-номер\',
        tax_number VARCHAR(50) COMMENT \'Индивидуальный налоговый номер налогоплательщика\',
        discount SMALLINT COMMENT \'Процент скидки\',
        delivery DOUBLE COMMENT \'Стоимость доставки\',
        delivery_type ENUM(\'client_address\', \'warehouse_address\') DEFAULT \'client_address\' NOT NULL COMMENT \'Тип доставки\',
        delivery_time_min DATE COMMENT \'Минимальный срок доставки\',
        delivery_time_max DATE COMMENT \'Максимальный срок доставки\',
        delivery_time_confirm_min DATE COMMENT \'Минимальный срок доставки подтверждённый производителем\',
        delivery_time_confirm_max DATE COMMENT \'Максимальный срок доставки подтверждённый производителем\',
        delivery_time_fast_pay_min DATE COMMENT \'Минимальный срок доставки для быстрой оплаты\',
        delivery_time_fast_pay_max DATE COMMENT \'Максимальный срок доставки для быстрой оплаты\',
        delivery_old_time_min DATE COMMENT \'Прошлый минимальный срок доставки\',
        delivery_old_time_max DATE COMMENT \'Прошлый максимальный срок доставки\',
        delivery_index VARCHAR(20),
        delivery_country INT,
        delivery_region VARCHAR(50),
        delivery_city VARCHAR(200),
        delivery_address VARCHAR(300),
        delivery_building VARCHAR(200),
        delivery_phone_code VARCHAR(20),
        delivery_phone VARCHAR(20),
        sex ENUM(\'male\', \'female\', \'other\') COMMENT \'Пол клиента\',
        client_name VARCHAR(255) COMMENT \'Имя клиента\',
        client_surname VARCHAR(255) COMMENT \'Фамилия клиента\',
        company_name VARCHAR(255) COMMENT \'Название компании\',
        pay_type SMALLINT NOT NULL COMMENT \'Выбранный тип оплаты заказа\',
        pay_date_execution DATETIME COMMENT \'Дата до которой действует текущая цена заказа\',
        offset_date DATETIME COMMENT \'Дата сдвига предполагаемого расчета доставки\',
        offset_reason ENUM(\'factory_holidays\', \'factory_production_delay\', \'other\') COMMENT \'Причина сдвига сроков: каникулы на фабрике, фабрика уточняет сроки пр-ва, другое\',
        proposed_date DATETIME COMMENT \'Предполагаемая дата поставки\',
        ship_date DATETIME COMMENT \'Предполагаемая дата отгрузки\',
        tracking_number VARCHAR(50) COMMENT \'Номер треккинга\',
        manager_name VARCHAR(20) COMMENT \'Имя менеджера сопровождающего заказ\',
        manager_email VARCHAR(30) COMMENT \'Email менеджера сопровождающего заказ\',
        manager_phone VARCHAR(20) COMMENT \'Телефон менеджера сопровождающего заказ\',
        carrier_name VARCHAR(50) COMMENT \'Название транспортной компании\',
        carrier_contact_data VARCHAR(255) COMMENT \'Контактные данные транспортной компании\',
        locale VARCHAR(5) NOT NULL COMMENT \'локаль из которой был оформлен заказ\',
        cur_rate DOUBLE DEFAULT 1 COMMENT \'курс на момент оплаты\',
        currency ENUM(\'EUR\', \'USD\', \'GBP\') DEFAULT \'EUR\' NOT NULL COMMENT \'валюта при которой был оформлен заказ\',
        measure ENUM(\'m\', \'sqm\', \'pcs\') DEFAULT \'m\' NOT NULL COMMENT \'ед. изм. в которой был оформлен заказ\',
        name VARCHAR(200) NOT NULL COMMENT \'Название заказа\',
        description VARCHAR(1000) COMMENT \'Дополнительная информация\',
        create_date DATETIME NOT NULL COMMENT \'Дата создания\',
        update_date DATETIME COMMENT \'Дата изменения\',
        warehouse_data LONGTEXT COMMENT \'Данные склада: адрес, название, часы работы\',
        step SMALLINT DEFAULT 1 NOT NULL COMMENT \'если true то заказ не будет сброшен в следствии изменений\',
        address_equal TINYINT(1) DEFAULT 1 COMMENT \'Адреса плательщика и получателя совпадают (false - разные, true - одинаковые)\',
        bank_transfer_requested TINYINT(1) COMMENT \'Запрашивался ли счет на банковский перевод\',
        accept_pay TINYINT(1) COMMENT \'Если true то заказ отправлен в работу\',
        cancel_date DATETIME COMMENT \'Конечная дата согласования сроков поставки\',
        weight_gross DOUBLE COMMENT \'Общий вес брутто заказа\',
        product_review TINYINT(1) COMMENT \'Оставлен отзыв по коллекциям в заказе\',
        mirror SMALLINT COMMENT \'Метка зеркала на котором создается заказ\',
        process TINYINT(1) COMMENT \'метка массовой обработки\',
        fact_date DATETIME COMMENT \'Фактическая дата поставки\',
        entrance_review SMALLINT COMMENT \'Фиксирует вход клиента на страницу отзыва и последующие клики\',
        payment_euro TINYINT(1) DEFAULT 0 COMMENT \'Если true, то оплату посчитать в евро\',
        spec_price TINYINT(1) COMMENT \'установлена спец цена по заказу\',
        show_msg TINYINT(1) COMMENT \'Показывать спец. сообщение\',
        delivery_price_euro DOUBLE COMMENT \'Стоимость доставки в евро\',
        address_payer INT COMMENT \'ID плательщика\',
        sending_date DATETIME COMMENT \'Расчетная дата поставки\',
        delivery_calculate_type ENUM(\'manual\', \'automatic\') DEFAULT \'manual\' NOT NULL COMMENT \'Тип расчета: ручной, автоматический\',
        full_payment_date DATE COMMENT \'Дата полной оплаты заказа\',
        bank_details LONGTEXT COMMENT \'Реквизиты банка для возврата средств\',
        delivery_apartment_office VARCHAR(30) COMMENT \'Квартира/офис\'
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');

        $this->addSql("CREATE TABLE orders_article (
        id INT AUTO_INCREMENT PRIMARY KEY,
        orders_id INT,
        article_id INT COMMENT 'ID коллекции',
        amount DOUBLE NOT NULL COMMENT 'количество артикулов в ед. измерения',
        price DOUBLE NOT NULL COMMENT 'Цена на момент оплаты заказа',
        price_eur DOUBLE COMMENT 'Цена в Евро по заказу',
        currency ENUM('USD', 'EUR', 'GBP') COMMENT 'Валюта для которой установлена цена',
        measure ENUM('m', 'cm', 'sqm') COMMENT 'Ед. изм. для которой установлена цена',
        delivery_time_min DATE COMMENT 'Минимальный срок доставки',
        delivery_time_max DATE COMMENT 'Максимальный срок доставки',
        weight DOUBLE NOT NULL COMMENT 'вес упаковки',
        multiple_pallet SMALLINT COMMENT 'Кратность палете, 1 - кратно упаковке, 2 - кратно палете, 3 - не меньше палеты',
        packaging_count DOUBLE NOT NULL COMMENT 'Количество кратно которому можно добавлять товар в заказ',
        pallet DOUBLE NOT NULL COMMENT 'количество в палете на момент заказа',
        packaging DOUBLE NOT NULL COMMENT 'количество в упаковке',
        swimming_pool TINYINT(1) DEFAULT 0 NOT NULL COMMENT 'Плитка специально для бассейна'
        ) COMMENT 'Хранит информацию об артикулах заказа' DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB;");
    }


    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE `orders`');
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('DROP TABLE orders_article');
    }
}
