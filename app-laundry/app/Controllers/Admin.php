<?php

namespace App\Controllers;
use App\Traits\GetListPelayanan;

class Admin extends BaseController
{
    use GetListPelayanan;

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

    public function showFormUpdate($id)
    {
        $data = [
            'pelayanan' => $this->fetchPelayanan($id)
        ];
        // dd($data);
        return view('admin/form/update_pelayanan', $data);
    }
}
