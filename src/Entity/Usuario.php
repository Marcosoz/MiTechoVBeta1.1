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
 * Entity class for "usuarios" table
 */

#[Entity]
#[Table("usuarios", options: ["dbId" => "DB"])]
class Usuario extends AbstractEntity
{
    #[Id]
    #[Column(name: "id", type: "integer", unique: true)]
    #[GeneratedValue]
    private int $Id;

    #[Column(name: "username", type: "string", unique: true)]
    private string $Username;

    #[Column(name: "password", type: "string")]
    private string $_Password;

    #[Column(name: "nombre_completo", type: "string", nullable: true)]
    private ?string $NombreCompleto;

    #[Column(name: "email", type: "string", nullable: true)]
    private ?string $Email;

    #[Column(name: "telefono", type: "string", nullable: true)]
    private ?string $Telefono;

    #[Column(name: "userlevel", type: "integer", nullable: true)]
    private ?int $Userlevel;

    #[Column(name: "cooperativa_id", type: "integer", nullable: true)]
    private ?int $CooperativaId;

    #[Column(name: "created_at", type: "datetime")]
    private DateTime $CreatedAt;

    #[Column(name: "updated_at", type: "datetime")]
    private DateTime $UpdatedAt;

    public function __construct()
    {
        $this->Userlevel = 0;
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

    public function getUsername(): string
    {
        return HtmlDecode($this->Username);
    }

    public function setUsername(string $value): static
    {
        $this->Username = RemoveXss($value);
        return $this;
    }

    public function get_Password(): string
    {
        return HtmlDecode($this->_Password);
    }

    public function set_Password(string $value): static
    {
        $this->_Password = RemoveXss($value);
        return $this;
    }

    public function getNombreCompleto(): ?string
    {
        return HtmlDecode($this->NombreCompleto);
    }

    public function setNombreCompleto(?string $value): static
    {
        $this->NombreCompleto = RemoveXss($value);
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

    public function getTelefono(): ?string
    {
        return HtmlDecode($this->Telefono);
    }

    public function setTelefono(?string $value): static
    {
        $this->Telefono = RemoveXss($value);
        return $this;
    }

    public function getUserlevel(): ?int
    {
        return $this->Userlevel;
    }

    public function setUserlevel(?int $value): static
    {
        $this->Userlevel = $value;
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
