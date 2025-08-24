<?php

namespace PHPMaker2025\project240825SeleccionarManualCoop\Entity;

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
use PHPMaker2025\project240825SeleccionarManualCoop\AdvancedUserInterface;
use PHPMaker2025\project240825SeleccionarManualCoop\AbstractEntity;
use PHPMaker2025\project240825SeleccionarManualCoop\AdvancedSecurity;
use PHPMaker2025\project240825SeleccionarManualCoop\UserProfile;
use PHPMaker2025\project240825SeleccionarManualCoop\UserRepository;
use function PHPMaker2025\project240825SeleccionarManualCoop\Config;
use function PHPMaker2025\project240825SeleccionarManualCoop\EntityManager;
use function PHPMaker2025\project240825SeleccionarManualCoop\RemoveXss;
use function PHPMaker2025\project240825SeleccionarManualCoop\HtmlDecode;
use function PHPMaker2025\project240825SeleccionarManualCoop\HashPassword;
use function PHPMaker2025\project240825SeleccionarManualCoop\Security;

/**
 * Entity class for "stock" table
 */

#[Entity]
#[Table("stock", options: ["dbId" => "DB"])]
class Stock extends AbstractEntity
{
    #[Id]
    #[Column(name: "id", type: "integer", unique: true)]
    #[GeneratedValue]
    private int $Id;

    #[Column(name: "cooperativa_id", type: "integer", nullable: true)]
    private ?int $CooperativaId;

    #[Column(name: "nombre_material", type: "string")]
    private string $NombreMaterial;

    #[Column(name: "unidad", type: "string", nullable: true)]
    private ?string $Unidad;

    #[Column(name: "cantidad", type: "decimal", nullable: true)]
    private ?string $Cantidad;

    #[Column(name: "descripcion", type: "text", nullable: true)]
    private ?string $Descripcion;

    public function __construct()
    {
        $this->Cantidad = "0.00";
    }

    public function getId(): int
    {
        return $this->Id;
    }

    public function setId(int $value): static
    {
        $this->Id = $value;
        return $this;
    }

    public function getCooperativaId(): ?int
    {
        return $this->CooperativaId;
    }

    public function setCooperativaId(?int $value): static
    {
        $this->CooperativaId = $value;
        return $this;
    }

    public function getNombreMaterial(): string
    {
        return HtmlDecode($this->NombreMaterial);
    }

    public function setNombreMaterial(string $value): static
    {
        $this->NombreMaterial = RemoveXss($value);
        return $this;
    }

    public function getUnidad(): ?string
    {
        return HtmlDecode($this->Unidad);
    }

    public function setUnidad(?string $value): static
    {
        $this->Unidad = RemoveXss($value);
        return $this;
    }

    public function getCantidad(): ?string
    {
        return $this->Cantidad;
    }

    public function setCantidad(?string $value): static
    {
        $this->Cantidad = $value;
        return $this;
    }

    public function getDescripcion(): ?string
    {
        return HtmlDecode($this->Descripcion);
    }

    public function setDescripcion(?string $value): static
    {
        $this->Descripcion = RemoveXss($value);
        return $this;
    }
}
