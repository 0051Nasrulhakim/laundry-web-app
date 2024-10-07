<?php
namespace App\Traits;

use App\Models\MasterProdukJasa;

trait GetListPelayanan
{

    protected $masterProdukJasa;

    public function __construct(){
        $this->masterProdukJasa = new MasterProdukJasa();
    }

    public function fetchListPelayanan()
    {
        return $this->masterProdukJasa->findAll();
    }

    public function fetchPelayanan($id)
    {
        return $this->masterProdukJasa->find($id);
    }

}



?>