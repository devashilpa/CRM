<?php

namespace App\Entity;

use App\Repository\LeadsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LeadsRepository::class)]
class Leads
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'integer')]
    private $phone_number;

    #[ORM\Column(type: 'string', length: 255)]
    private $email_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPhoneNumber(): ?int
    {
        return $this->phone_number;
    }

    public function setPhoneNumber(int $phone_number): self
    {
        $this->phone_number = $phone_number;

        return $this;
    }

    public function getEmailId(): ?string
    {
        return $this->email_id;
    }

    public function setEmailId(string $email_id): self
    {
        $this->email_id = $email_id;

        return $this;
    }
}
