<?php
namespace App\Traits;

use App\Models\Cart;
use App\Models\MasterProdukJasa;
use App\Models\OrderTransaksi;
use App\Models\OrderHistory;
use App\Models\StatusOrder;

trait cartListable
{
    protected $cart;

    public function initCart()
    {
        $this->cart = new Cart();
        $this->masterProdukJasa = new MasterProdukJasa();
        $this->orderHistori = new OrderHistory();
        $this->orderTransaksi = new OrderTransaksi();
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


    public function GetListOrderTransaksi($id)
    {
        // buat relasi ke prduk
        return $data = $this->orderHistori->join('master_produk_jasa', 'master_produk_jasa.id_prod_jasa = order_history.id_prod_jasa')->where('order_history.id_transaksi', $id)->findAll();

    }

    public function getAllOrderTransaksi()
    {
        return $data = $this->orderTransaksi
                ->join('status_order', 'status_order.id_status = order_transaksi.status')
                ->findAll();

        
    }

    public function getOrderTransaksiById($id)
    {
        return $this->orderTransaksi->where('id_transaksi', $id)->first();
    }



}

?>