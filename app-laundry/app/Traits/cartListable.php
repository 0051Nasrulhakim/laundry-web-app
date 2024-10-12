<?php
namespace App\Traits;

use App\Models\Cart;
use App\Models\MasterProdukJasa;

trait cartListable
{
    protected $cart;

    public function initCart()
    {
        $this->cart = new Cart();
        $this->masterProdukJasa = new MasterProdukJasa();
    }

    public function GetListCart()
    {
        // buat relasi ke prduk
        return $data = $this->cart->join('master_produk_jasa', 'master_produk_jasa.id_prod_jasa = cart.id_prod_jasa')->findAll();

    }
    
    public function GetListProductToCheckOut()
    {
        // $data = $this->cart->select('id_kasir, id_prod_jasa, harga, total_harga, qty')->findAll();
        // return $data;

        $data = $this->cart->select('id_kasir, id_prod_jasa, harga, total_harga, qty')->findAll();
        $totalHarga = 0;
    
        foreach ($data as $item) {
            $totalHarga += $item['total_harga']; // Jumlahkan total_harga dari setiap item
        }
    
        return [
            'data' => $data,
            'total_harga' => $totalHarga // Kembalikan total_harga bersama data
        ];
    }



}

?>