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
}

?>