<?php

namespace PHPMaker2025\project250825NoRepiteCIniEmailEnNuevosIngresos\Entity;

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
use PHPMaker2025\project250825NoRepiteCIniEmailEnNuevosIngresos\AdvancedUserInterface;
use PHPMaker2025\project250825NoRepiteCIniEmailEnNuevosIngresos\AbstractEntity;
use PHPMaker2025\project250825NoRepiteCIniEmailEnNuevosIngresos\AdvancedSecurity;
use PHPMaker2025\project250825NoRepiteCIniEmailEnNuevosIngresos\UserProfile;
use PHPMaker2025\project250825NoRepiteCIniEmailEnNuevosIngresos\UserRepository;
use function PHPMaker2025\project250825NoRepiteCIniEmailEnNuevosIngresos\Config;
use function PHPMaker2025\project250825NoRepiteCIniEmailEnNuevosIngresos\EntityManager;
use function PHPMaker2025\project250825NoRepiteCIniEmailEnNuevosIngresos\RemoveXss;
use function PHPMaker2025\project250825NoRepiteCIniEmailEnNuevosIngresos\HtmlDecode;
use function PHPMaker2025\project250825NoRepiteCIniEmailEnNuevosIngresos\HashPassword;
use function PHPMaker2025\project250825NoRepiteCIniEmailEnNuevosIngresos\Security;

/**
 * Entity class for "pagos_socios" table
 */

#[Entity]
#[Table("pagos_socios", options: ["dbId" => "DB"])]
class PagosSocio extends AbstractEntity
{
    #[Id]
    #[Column(name: "id", type: "integer", unique: true)]
    #[GeneratedValue]
    private int $Id;

    #[Column(name: "cooperativa_id", type: "integer", nullable: true)]
    private ?int $CooperativaId;

    #[Column(name: "socio_id", type: "integer")]
    private int $SocioId;

    #[Column(name: "monto", type: "decimal")]
    private string $Monto;

    #[Column(name: "concepto", type: "text", nullable: true)]
    private ?string $Concepto;

    #[Column(name: "fecha", type: "date")]
    private DateTime $Fecha;

    #[Column(name: "comprobante", type: "blob")]
    private mixed $Comprobante;

    #[Column(name: "created_at", type: "datetime")]
    private DateTime $CreatedAt;

    #[Column(name: "updated_at", type: "datetime")]
    private DateTime $UpdatedAt;

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

    public function getSocioId(): int
    {
        return $this->SocioId;
    }

    public function setSocioId(int $value): static
    {
        $this->SocioId = $value;
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

    public function getConcepto(): ?string
    {
        return HtmlDecode($this->Concepto);
    }

    public function setConcepto(?string $value): static
    {
        $this->Concepto = RemoveXss($value);
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

    public function getComprobante(): mixed
    {
        return $this->Comprobante;
    }

    public function setComprobante(mixed $value): static
    {
        $this->Comprobante = $value;
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
