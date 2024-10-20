<?php

namespace App\Models;

use CodeIgniter\Model;

class StatusOrder extends Model
{
    protected $table            = 'status_order';
    protected $primaryKey       = 'id_status';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = [
        'id_status',
        'id_transaksi',
        'status',
        'waktu'
    ];
}
