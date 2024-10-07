<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var list<string>
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------

    public $insertPelayanan = [
        'nama_jasa_pelayanan' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Nama harus diisi',
            ]
        ],
        'harga' => [
            'rules' => 'required|numeric',
            'errors' => [
                'required' => 'Harga harus diisi',
                'numeric'  => 'Harga tidak valid'
            ]
        ],
        'satuan' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Satuan harus diisi',
            ]
        ],
        
    ];

    public $updatePelayanan = [
        'id_prod_jasa' => [
            'rules' => 'required',
            'error' => [
                'required' => 'Id harus di isi'
            ]
        ],
        'nama_jasa_pelayanan' => [
            'rules' => 'required|is_unique[master_produk_jasa.nama_jasa_pelayanan,id_prod_jasa,{id_prod_jasa}]',
            'errors' => [
                'required' => 'Nama harus diisi',
                'is_unique' => 'Nama jasa pelayanan sudah terdaftar.'
            ]
        ],
        'harga' => [
            'rules' => 'required|numeric|greater_than[0]',
            'errors' => [
                'required' => 'Harga harus diisi',
                'numeric'  => 'Harga tidak valid',
                'greater_than' => 'Harga tidak boleh 0'
            ]
        ],
        'satuan' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Satuan harus diisi',
            ]
        ],
    ];
    
}
