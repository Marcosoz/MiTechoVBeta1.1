<?php

namespace PHPMaker2025\project260825TrabajosCreatedAT\Entity;

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
use PHPMaker2025\project260825TrabajosCreatedAT\AdvancedUserInterface;
use PHPMaker2025\project260825TrabajosCreatedAT\AbstractEntity;
use PHPMaker2025\project260825TrabajosCreatedAT\AdvancedSecurity;
use PHPMaker2025\project260825TrabajosCreatedAT\UserProfile;
use PHPMaker2025\project260825TrabajosCreatedAT\UserRepository;
use function PHPMaker2025\project260825TrabajosCreatedAT\Config;
use function PHPMaker2025\project260825TrabajosCreatedAT\EntityManager;
use function PHPMaker2025\project260825TrabajosCreatedAT\RemoveXss;
use function PHPMaker2025\project260825TrabajosCreatedAT\HtmlDecode;
use function PHPMaker2025\project260825TrabajosCreatedAT\HashPassword;
use function PHPMaker2025\project260825TrabajosCreatedAT\Security;

/**
 * Entity class for "proveedores" table
 */

#[Entity]
#[Table("proveedores", options: ["dbId" => "DB"])]
class Proveedore extends AbstractEntity
{
    #[Id]
    #[Column(name: "id", type: "integer", unique: true)]
    #[GeneratedValue]
    private int $Id;

    #[Column(name: "cooperativa_id", type: "integer", nullable: true)]
    private ?int $CooperativaId;

    #[Column(name: "nombre", type: "string")]
    private string $Nombre;

    #[Column(name: "contacto", type: "string", nullable: true)]
    private ?string $Contacto;

    #[Column(name: "telefono", type: "string", nullable: true)]
    private ?string $Telefono;

    #[Column(name: "email", type: "string", nullable: true)]
    private ?string $Email;

    #[Column(name: "direccion", type: "text", nullable: true)]
    private ?string $Direccion;

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

    public function getNombre(): string
    {
        return HtmlDecode($this->Nombre);
    }

    public function setNombre(string $value): static
    {
        $this->Nombre = RemoveXss($value);
        return $this;
    }

    public function getContacto(): ?string
    {
        return HtmlDecode($this->Contacto);
    }

    public function setContacto(?string $value): static
    {
        $this->Contacto = RemoveXss($value);
        return $this;
    }

    public function getTelefono(): ?string
    {
        return HtmlDecode($this->Telefono);
    }

    public function setTelefono(?string $value): static
    {
        $this->Telefono = RemoveXss($value);
        return $this;
    }

    public function getEmail(): ?string
    {
        return HtmlDecode($this->Email);
    }

    public function setEmail(?string $value): static
    {
        $this->Email = RemoveXss($value);
        return $this;
    }

    public function getDireccion(): ?string
    {
        return HtmlDecode($this->Direccion);
    }

    public function setDireccion(?string $value): static
    {
        $this->Direccion = RemoveXss($value);
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
