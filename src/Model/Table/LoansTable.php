<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class LoansTable extends Table
{
public function initialize(array $config): void
{
parent::initialize($config);

$this->setTable('loans');

$this->belongsTo('Users');

$this->belongsTo('Books');
}
}