<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderTransaksi extends Model
{
    protected $table            = 'order_transaksi';
    protected $primaryKey       = 'id_transaksi';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = [
        'id_transaksi',
        'id_kasir',
        'total_harga_transaksi',
        'nama_pembeli',
        'alamat_pembeli',
        'no_hp',
        'tanggal_order',
        'status'
    ];
}
