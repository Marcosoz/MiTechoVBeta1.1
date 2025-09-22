<?php

namespace PHPMaker2025\project22092025ReparadoAsignacionCoopAutom\Entity;

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
use PHPMaker2025\project22092025ReparadoAsignacionCoopAutom\AdvancedUserInterface;
use PHPMaker2025\project22092025ReparadoAsignacionCoopAutom\AbstractEntity;
use PHPMaker2025\project22092025ReparadoAsignacionCoopAutom\AdvancedSecurity;
use PHPMaker2025\project22092025ReparadoAsignacionCoopAutom\UserProfile;
use PHPMaker2025\project22092025ReparadoAsignacionCoopAutom\UserRepository;
use function PHPMaker2025\project22092025ReparadoAsignacionCoopAutom\Config;
use function PHPMaker2025\project22092025ReparadoAsignacionCoopAutom\EntityManager;
use function PHPMaker2025\project22092025ReparadoAsignacionCoopAutom\RemoveXss;
use function PHPMaker2025\project22092025ReparadoAsignacionCoopAutom\HtmlDecode;
use function PHPMaker2025\project22092025ReparadoAsignacionCoopAutom\HashPassword;
use function PHPMaker2025\project22092025ReparadoAsignacionCoopAutom\Security;

/**
 * Entity class for "compras" table
 */

#[Entity]
#[Table("compras", options: ["dbId" => "DB"])]
class Compra extends AbstractEntity
{
    #[Id]
    #[Column(name: "id", type: "integer", unique: true)]
    #[GeneratedValue]
    private int $Id;

    #[Column(name: "cooperativa_id", type: "integer", nullable: true)]
    private ?int $CooperativaId;

    #[Column(name: "proveedor_id", type: "integer")]
    private int $ProveedorId;

    #[Column(name: "fecha", type: "date")]
    private DateTime $Fecha;

    #[Column(name: "descripcion", type: "text", nullable: true)]
    private ?string $Descripcion;

    #[Column(name: "monto", type: "decimal")]
    private string $Monto;

    #[Column(name: "saldo_pendiente", type: "decimal", nullable: true)]
    private ?string $SaldoPendiente;

    #[Column(name: "created_at", type: "datetime")]
    private DateTime $CreatedAt;

    #[Column(name: "updated_at", type: "datetime")]
    private DateTime $UpdatedAt;

    public function __construct()
    {
        $this->SaldoPendiente = "0.00";
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

    public function getProveedorId(): int
    {
        return $this->ProveedorId;
    }

    public function setProveedorId(int $value): static
    {
        $this->ProveedorId = $value;
        return $this;
    }

    public function getFecha(): DateTime
    {
        return $this->Fecha;
    }

    public function setFecha(DateTime $value): static
    {
        $this->Fecha = $value;
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

    public function getMonto(): string
    {
        return $this->Monto;
    }

    public function setMonto(string $value): static
    {
        $this->Monto = $value;
        return $this;
    }

    public function getSaldoPendiente(): ?string
    {
        return $this->SaldoPendiente;
    }

    public function setSaldoPendiente(?string $value): static
    {
        $this->SaldoPendiente = $value;
        return $this;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->CreatedAt;
    }

    public function setCreatedAt(DateTime $value): static
    {
        $this->CreatedAt = $value;
        return $this;
    }

    public function getUpdatedAt(): DateTime
    {
        return $this->UpdatedAt;
    }

    public function setUpdatedAt(DateTime $value): static
    {
        $this->UpdatedAt = $value;
        return $this;
    }
}
