<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MahasiswaModel;

class Mahasiswa extends BaseController
{
    public function index()
    {
        $mahasiswa = new MahasiswaModel();
        return $this->response->setJSON($mahasiswa->findAll());
    }

    public function create()
    {
        $mahasiswa = new MahasiswaModel();

        $json = $this->request->getJson();

        $mahasiswa->save([
            'nim' => $json->nim,
            'nama' => $json->nama,
            'hp' => $json->hp,
            'jk' => $json->jk
        ]);

        return $this->response->setStatusCode(200);
    }
}
