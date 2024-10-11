<?php

namespace App\Controllers;
use App\Traits\GetListPelayanan;
use App\Traits\cartListable;


class Admin extends BaseController
{
    use GetListPelayanan, cartListable;

    public function __construct()
    {
        $this->initCart();
    }

    public function list_harga()
    {
        helper('currency');
        $data = [
           "list_harga"  =>  $this->fetchListPelayanan(),
        ];

        return view('admin/page/list_harga', $data);
    }

    public function add_pelayanan()

    {
        return view('admin/form/add_pelayanan');
    }

    public function kasir()

    {
        $data = [
            'listCart' => $this->GetListCart()
        ];
        // dd($data);
        return view('admin/page/order', $data);
    }

    public function showFormUpdate($id)
    {
        $data = [
            'pelayanan' => $this->fetchPelayanan($id)
        ];
        // dd($data);
        return view('admin/form/update_pelayanan', $data);
    }
}
