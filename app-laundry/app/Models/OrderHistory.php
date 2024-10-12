<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderHistory extends Model
{
    protected $table            = 'order_history';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    
    protected $allowedFields    = [
        'id',
        'id_transaksi',
        'id_kasir',
        'id_prod_jasa',
        'harga',
        'total_harga',
        'qty'
    ];

}
