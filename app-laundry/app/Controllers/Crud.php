<?php

namespace App\Controllers;

use App\Models\OrderHistory;
use App\Traits\cartListable;

class Crud extends BaseController
{

    use cartListable;
    public function __construct()
    {
        $this->masterProdukJasa = new \App\Models\MasterProdukJasa();
        $this->orderHistory = new \App\Models\OrderHistory();
        $this->orderTransaksi = new \App\Models\OrderTransaksi();
        $this->cart = new \App\Models\Cart();
        $this->statusOrder = new \App\Models\StatusOrder();
        $this->validation = \Config\Services::validation();
        $this->initCart();
        date_default_timezone_set('Asia/Jakarta');
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

    public function deleteCart($id)
    {
        $this->cart->delete($id);

        $res = [
            'status_code' => 200
        ];

        response()->setJSON($res);
        return response();
    }

    public function cancelCart($id_kasir)
    {
        $this->cart->where('id_kasir', $id_kasir)->delete();

        $res = [
            'status_code' => 200
        ];

        response()->setJSON($res);
        return response();
    }

    public function checkout($id)
    {
        // echo $id;
        $data = [
            "list_harga"  =>  $this->GetListProductToCheckOut(),
        ];

        $orderHistory = [];

        foreach ($data['list_harga']['data'] as $loopdata){
            $orderHistory[] = [
                'id_transaksi' => $id,
                'id_kasir'     => $loopdata['id_kasir'],
                'id_prod_jasa' => $loopdata['id_prod_jasa'],
                'harga'        => $loopdata['harga'],
                'total_harga'  => $loopdata['total_harga'],
                'qty'          => $loopdata['qty'],

            ];
        }

        // dd($orderHistory);
        $this->orderHistory->insertBatch($orderHistory);
        
        // dd($orderTransaksi);
        $data_statusOrder = [
            'id_transaksi' => $id,
            'status_order' => '1',
            'waktu' => date('Y-m-d H:i:s')
        ];
        
        $this->statusOrder->insert($data_statusOrder);
        $lastId = $this->statusOrder->insertID();
        
        $orderTransaksi = [
            'id_transaksi' => $id,
            'id_kasir'     => $orderHistory[0]['id_kasir'],
            'total_harga_transaksi' => $data['list_harga']['total_harga'],
            'nama_pembeli' => $this->request->getPost('nama_pembeli'),
            'alamat_pembeli' => $this->request->getPost('alamat_pembeli'),
            'no_hp' => $this->request->getPost('no_hp'),
            'tanggal_order' => date('Y-m-d H:i:s'),
            'status'    => $lastId
        ];

        $this->orderTransaksi->insert($orderTransaksi);
        $this->cart->where('id_kasir', '0')->delete();
        // dd($transaksi);
        return redirect()->to(base_url('admin/invoice/').$id);

    }

    /* 
        menu kasir
        add keranjang
    
    */

    /* 
        menu kasir
        add keranjang
    
    */
    public function ubahStatus()
    {
        $idTransaksi = $this->request->getPost('id');
        $status = $this->request->getPost('status');

        // dd($idTransaksi, $status);
        $find_status = $this->statusOrder->where('id_transaksi', $idTransaksi)->where('status >=', $status)->delete();
        // dd($find_status); 
        $data = [
            'id_transaksi' => $idTransaksi,
            'status'       => $status,
            'waktu'        => date('Y-m-d H:i:s')
        ];

        $this->statusOrder->insert($data);
        $lastId = $this->statusOrder->insertID();

        $this->orderTransaksi->update($idTransaksi, ['status' => $lastId]);
        return redirect()->to(base_url('admin/list_order_masuk'));


    }

    public function cekStatusOrder()
    {
        $idTransaksi = $this->request->getPost('idTransaksi');
        // $idTransaksi = '20241020083518';

        $data = $this->statusOrder->where('id_transaksi', $idTransaksi)->findAll();
        // dd($data);
        $max = $this->statusOrder->selectMax('status')->where('id_transaksi', $idTransaksi)->first();
        $data = [
            'max' => $max,
            'data' => $data,
        ];
        response()->setJSON($data);
        return response();
    }

}
