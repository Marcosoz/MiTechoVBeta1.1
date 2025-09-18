<?php

namespace PHPMaker2025\project290825TrabajosCreatedAT\Entity;

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
use PHPMaker2025\project290825TrabajosCreatedAT\AdvancedUserInterface;
use PHPMaker2025\project290825TrabajosCreatedAT\AbstractEntity;
use PHPMaker2025\project290825TrabajosCreatedAT\AdvancedSecurity;
use PHPMaker2025\project290825TrabajosCreatedAT\UserProfile;
use PHPMaker2025\project290825TrabajosCreatedAT\UserRepository;
use function PHPMaker2025\project290825TrabajosCreatedAT\Config;
use function PHPMaker2025\project290825TrabajosCreatedAT\EntityManager;
use function PHPMaker2025\project290825TrabajosCreatedAT\RemoveXss;
use function PHPMaker2025\project290825TrabajosCreatedAT\HtmlDecode;
use function PHPMaker2025\project290825TrabajosCreatedAT\HashPassword;
use function PHPMaker2025\project290825TrabajosCreatedAT\Security;

/**
 * Entity class for "actividad_log" table
 */

#[Entity]
#[Table("actividad_log", options: ["dbId" => "DB"])]
class ActividadLog extends AbstractEntity
{
    #[Id]
    #[Column(name: "id", type: "integer", unique: true)]
    #[GeneratedValue]
    private int $Id;

    #[Column(name: "usuario_id", type: "integer", nullable: true)]
    private ?int $UsuarioId;

    #[Column(name: "cooperativa_id", type: "integer", nullable: true)]
    private ?int $CooperativaId;

    #[Column(name: "accion", type: "string", nullable: true)]
    private ?string $Accion;

    #[Column(name: "detalles", type: "text", nullable: true)]
    private ?string $Detalles;

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

    public function getUsuarioId(): ?int
    {
        return $this->UsuarioId;
    }

    public function setUsuarioId(?int $value): static
    {
        $this->UsuarioId = $value;
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

    public function getAccion(): ?string
    {
        return HtmlDecode($this->Accion);
    }

    public function setAccion(?string $value): static
    {
        $this->Accion = RemoveXss($value);
        return $this;
    }

    public function getDetalles(): ?string
    {
        return HtmlDecode($this->Detalles);
    }

    public function setDetalles(?string $value): static
    {
        $this->Detalles = RemoveXss($value);
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
