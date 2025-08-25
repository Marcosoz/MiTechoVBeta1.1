<?php

namespace PHPMaker2025\project250825AsignacionAutomaticaCoopASocios\Entity;

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
use PHPMaker2025\project250825AsignacionAutomaticaCoopASocios\AdvancedUserInterface;
use PHPMaker2025\project250825AsignacionAutomaticaCoopASocios\AbstractEntity;
use PHPMaker2025\project250825AsignacionAutomaticaCoopASocios\AdvancedSecurity;
use PHPMaker2025\project250825AsignacionAutomaticaCoopASocios\UserProfile;
use PHPMaker2025\project250825AsignacionAutomaticaCoopASocios\UserRepository;
use function PHPMaker2025\project250825AsignacionAutomaticaCoopASocios\Config;
use function PHPMaker2025\project250825AsignacionAutomaticaCoopASocios\EntityManager;
use function PHPMaker2025\project250825AsignacionAutomaticaCoopASocios\RemoveXss;
use function PHPMaker2025\project250825AsignacionAutomaticaCoopASocios\HtmlDecode;
use function PHPMaker2025\project250825AsignacionAutomaticaCoopASocios\HashPassword;
use function PHPMaker2025\project250825AsignacionAutomaticaCoopASocios\Security;

/**
 * Entity class for "movimientos_stock" table
 */

#[Entity]
#[Table("movimientos_stock", options: ["dbId" => "DB"])]
class MovimientosStock extends AbstractEntity
{
    #[Id]
    #[Column(name: "id", type: "integer", unique: true)]
    #[GeneratedValue]
    private int $Id;

    #[Column(name: "cooperativa_id", type: "integer")]
    private int $CooperativaId;

    #[Column(name: "tipo_movimiento", type: "string")]
    private string $TipoMovimiento;

    #[Column(name: "cantidad", type: "decimal")]
    private string $Cantidad;

    #[Column(name: "motivo", type: "text", nullable: true)]
    private ?string $Motivo;

    #[Column(name: "fecha", type: "date")]
    private DateTime $Fecha;

    #[Column(name: "created_at", type: "datetime", nullable: true)]
    private ?DateTime $CreatedAt;

    public function getId(): int
    {
        return $this->Id;
    }

    public function setId(int $value): static
    {
        $this->Id = $value;
        return $this;
    }

    public function getCooperativaId(): int
    {
        return $this->CooperativaId;
    }

    public function setCooperativaId(int $value): static
    {
        $this->CooperativaId = $value;
        return $this;
    }

    public function getTipoMovimiento(): string
    {
        return $this->TipoMovimiento;
    }

    public function setTipoMovimiento(string $value): static
    {
        if (!in_array($value, ["entrada", "salida"])) {
            throw new \InvalidArgumentException("Invalid 'tipo_movimiento' value");
        }
        $this->TipoMovimiento = $value;
        return $this;
    }

    public function getCantidad(): string
    {
        return $this->Cantidad;
    }

    public function setCantidad(string $value): static
    {
        $this->Cantidad = $value;
        return $this;
    }

    public function getMotivo(): ?string
    {
        return HtmlDecode($this->Motivo);
    }

    public function setMotivo(?string $value): static
    {
        $this->Motivo = RemoveXss($value);
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

    public function getCreatedAt(): ?DateTime
    {
        return $this->CreatedAt;
    }

    public function setCreatedAt(?DateTime $value): static
    {
        $this->CreatedAt = $value;
        return $this;
    }
}
