<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Loan extends Entity
{
    protected array $_accessible = [
        'user_id' => true,
        'book_id' => true,
        'borrower_name' => true,
        'borrower_email' => true,
        'borrower_contact' => true,
        'contact_number' => true,
        'loan_date' => true,
        'return_date' => true,
        'actual_return_date' => true,
        'status' => true,
        'book' => true,
        'user' => true,
    ];
}