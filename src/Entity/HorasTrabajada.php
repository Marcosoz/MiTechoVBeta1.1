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
 * Entity class for "horas_trabajadas" table
 */

#[Entity]
#[Table("horas_trabajadas", options: ["dbId" => "DB"])]
class HorasTrabajada extends AbstractEntity
{
    #[Id]
    #[Column(name: "id", type: "integer", unique: true)]
    #[GeneratedValue]
    private int $Id;

    #[Column(name: "cooperativa_id", type: "integer", nullable: true)]
    private ?int $CooperativaId;

    #[Column(name: "socio_id", type: "integer")]
    private int $SocioId;

    #[Column(name: "fecha", type: "date")]
    private DateTime $Fecha;

    #[Column(name: "horas", type: "decimal")]
    private string $Horas;

    #[Column(name: "tarea", type: "text", nullable: true)]
    private ?string $Tarea;

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

    public function getFecha(): DateTime
    {
        return $this->Fecha;
    }

    public function setFecha(DateTime $value): static
    {
        $this->Fecha = $value;
        return $this;
    }

    public function getHoras(): string
    {
        return $this->Horas;
    }

    public function setHoras(string $value): static
    {
        $this->Horas = $value;
        return $this;
    }

    public function getTarea(): ?string
    {
        return HtmlDecode($this->Tarea);
    }

    public function setTarea(?string $value): static
    {
        $this->Tarea = RemoveXss($value);
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
