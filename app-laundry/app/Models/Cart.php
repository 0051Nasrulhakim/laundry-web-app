<?php

namespace App\Models;

use CodeIgniter\Model;

class Cart extends Model
{
    protected $table            = 'cart';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['id', 'id_kasir', 'id_prod_jasa','harga', 'total_harga', 'qty'];
}
