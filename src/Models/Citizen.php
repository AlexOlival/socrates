<?php

namespace Reducktion\Socrates\Models;

use Carbon\Carbon;
use Reducktion\Socrates\Exceptions\UnsupportedOperationException;

class Citizen
{
    private $gender;
    private $dateOfBirth;

    public function getGender(): string
    {
        return $this->gender;
    }

    public function getDateOfBirth(): Carbon
    {
        return $this->dateOfBirth;
    }

    public function getAge(): int
    {
        if (!$this->dateOfBirth) {
            throw new UnsupportedOperationException('Citizen date of birth is null.');
        }
        return $this->dateOfBirth->age;
    }

    public function setGender($gender): void
    {
        $this->gender = $gender;
    }

    public function setDateOfBirth(Carbon $dateOfBirth): void
    {
        $this->dateOfBirth = $dateOfBirth;
    }

    public function __toString()
    {
        return 'Gender - ' . $this->gender . ' DoB - ' . $this->dateOfBirth->format('Y-m-d');
    }
}