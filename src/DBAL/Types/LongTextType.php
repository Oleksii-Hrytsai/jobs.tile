<?php
namespace App\DBAL\Types;

use Doctrine\DBAL\Types\Type;
use Doctrine\DBAL\Platforms\AbstractPlatform;

class LongTextType extends Type {
    const LONGTEXT = 'longtext'; // Define the type name

    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform) {
        return 'LONGTEXT'; // This is MySQL specific, adjust if using another DBMS
    }

    public function getName() {
        return self::LONGTEXT; // The name used for registering
    }

    public function getMappedDatabaseTypes(AbstractPlatform $platform) {
        return [self::LONGTEXT]; // Maps the custom type to the DB platform types
    }
}
