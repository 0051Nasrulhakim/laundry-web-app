<?php

namespace App\Controllers;

class Crud extends BaseController
{

    public function __construct()
    {
        $this->masterProdukJasa = new \App\Models\MasterProdukJasa();
        $this->cart = new \App\Models\Cart();
        $this->validation = \Config\Services::validation();
    }

    public function insertPelayanan()
    {
        $data = [
            'nama_jasa_pelayanan' => $this->request->getPost('nama_jasa_pelayanan'),
            'harga' => $this->request->getPost('harga'),
            'satuan' => $this->request->getPost('satuan'),
        ];

        $this->validation->run($data, 'insertPelayanan');
        $errors = $this->validation->getErrors();

        if ($errors) {

            session()->setFlashdata('errors', $errors);
            return redirect()->to(base_url('admin/add_pelayanan'));
            // dd($errors);

        } else {

            if ($data['harga'] < 1) {

                session()->setFlashdata('errors', ['harga' => 'Harga tidak boleh 0']);
                return redirect()->to(base_url('admin/add_pelayanan'));
            } else {

                $this->masterProdukJasa->insert($data);

                return redirect()->to(base_url('admin/list_harga'));
            }
        }
    }

    public function deletePelayanan($id)
    {
        $this->masterProdukJasa->delete($id);

        $res = [
            'status_code' => 200
        ];

        response()->setJSON($res);
        return response();
    }

    public function updatePelayanan()
    {

        $id = $this->request->getPost('id_prod_jasa');

        $data = [
            'id_prod_jasa' => $id,
            'nama_jasa_pelayanan' => $this->request->getPost('nama_jasa_pelayanan'),
            'harga' => $this->request->getPost('harga'),
            'satuan' => $this->request->getPost('satuan'),
        ];

        $this->validation->run($data, 'updatePelayanan');
        $errors = $this->validation->getErrors();

        if ($errors) {

            session()->setFlashdata('errors', $errors);
            return redirect()->to(base_url('admin/showFormUpdate/' . $id))->withInput();
            // dd($errors);

        } else {

            if ($data['harga'] < 1) {

                session()->setFlashdata('errors', ['harga' => 'Harga tidak boleh 0']);
                return redirect()->to(base_url('admin/showFormUpdate/' . $id))->withInput();
            } else {

                $this->masterProdukJasa->update($id, $data);

                return redirect()->to(base_url('admin/list_harga'));
            }
        }
    }

    public function search()
    {
        $term = $this->request->getVar('term'); // Ambil term pencarian dari request
        $data = $this->masterProdukJasa->like('nama_jasa_pelayanan', $term)->findAll();
        $result = [];
        foreach ($data as $row) {
            $result[] = [
                'id' => $row['id_prod_jasa'],
                'text' => $row['nama_jasa_pelayanan']
            ];
        }
        // dd($result);

        return $this->response->setJSON($result);
    }

    public function detail($id)
    {
        $item = $this->masterProdukJasa->find($id);

        if ($item) {
            return $this->response->setJSON($item);
        }

        return $this->response->setJSON(['error' => 'Item not found'], 404);
    }


    /* 
        menu kasir
        add keranjang
    
    */


    public function addToCart()
    {
        $data = [
            'id_prod_jasa' => $this->request->getPost('id_prod_jasa'),
            'id_kasir'     => '0',
            'qty'          => $this->request->getPost('qty'),
            'total_harga'  => $this->request->getPost('total_harga'), 
            'harga'        => $this->request->getPost('harga')
        ];

        // dd($data);

        $this->cart->insert($data);
        // return 
        // buat tanpa reload

        return redirect()->to(base_url('admin/kasir'));

    }

    
    /* 
        menu kasir
        add keranjang
    
    */



}
