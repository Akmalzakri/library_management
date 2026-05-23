<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class User extends Entity
{
    protected array $_accessible = [
    'name' => true,
    'username' => true,
    'email' => true,
    'password' => true,
    'role' => true,
    'contact_number' => true,
    'profile_picture' => true,
    'created' => true,
    'loans' => true,
];

    protected array $_hidden = [
        'password',
    ];

    protected function _setPassword(?string $password): ?string
    {
        if (!empty($password)) {
            return password_hash($password, PASSWORD_DEFAULT);
        }

        return null;
    }
}