<?php

namespace PHPMaker2025\project22092025TrabajosCupoParentField\Entity;

use DateTime;
use DateTimeImmutable;
use DateInterval;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\SequenceGenerator;
use Doctrine\DBAL\Types\Types;
use PHPMaker2025\project22092025TrabajosCupoParentField\AdvancedUserInterface;
use PHPMaker2025\project22092025TrabajosCupoParentField\AbstractEntity;
use PHPMaker2025\project22092025TrabajosCupoParentField\AdvancedSecurity;
use PHPMaker2025\project22092025TrabajosCupoParentField\UserProfile;
use PHPMaker2025\project22092025TrabajosCupoParentField\UserRepository;
use function PHPMaker2025\project22092025TrabajosCupoParentField\Config;
use function PHPMaker2025\project22092025TrabajosCupoParentField\EntityManager;
use function PHPMaker2025\project22092025TrabajosCupoParentField\RemoveXss;
use function PHPMaker2025\project22092025TrabajosCupoParentField\HtmlDecode;
use function PHPMaker2025\project22092025TrabajosCupoParentField\HashPassword;
use function PHPMaker2025\project22092025TrabajosCupoParentField\Security;

/**
 * Entity class for "cupos" table
 */

#[Entity]
#[Table("cupos", options: ["dbId" => "DB"])]
class Cupo extends AbstractEntity
{
    #[Id]
    #[Column(name: "id", type: "integer", unique: true)]
    #[GeneratedValue]
    private int $Id;

    #[Column(name: "cupo", type: "integer")]
    private int $_Cupo;

    public function getId(): int
    {
        return $this->Id;
    }

    public function setId(int $value): static
    {
        $this->Id = $value;
        return $this;
    }

    public function get_Cupo(): int
    {
        return $this->_Cupo;
    }

    public function set_Cupo(int $value): static
    {
        $this->_Cupo = $value;
        return $this;
    }
}
