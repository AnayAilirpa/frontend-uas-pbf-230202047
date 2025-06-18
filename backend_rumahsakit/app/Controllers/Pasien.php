<?php

namespace App\Controllers;

use App\Models\PasienModel;
use CodeIgniter\RESTful\ResourceController;

class Pasien extends ResourceController
{
    protected $modelName = 'App\\Models\\PasienModel';
    protected $format    = 'json';

    public function index()
    {
        $pasien_model = new PasienModel();
        $all_data_pasien = $pasien_model->findAll();
        return $this->response->setJSON($all_data_pasien);
    }

    public function create()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('pasien');

        $data = $this->request->getJSON(true);

        if (!$data || empty($data['nama']) || empty($data['alamat']) || empty($data['tanggal_lahir']) || empty($data['jenis_kelamin'])) {
            return $this->response->setStatusCode(400)
                ->setJSON(['status' => 'error', 'message' => 'Kolom tidak boleh kosong']);
        }

        if ($builder->insert($data)) {
            return $this->response->setStatusCode(201)
                ->setJSON(['status' => 'success', 'message' => 'Data pasien berhasil ditambahkan']);
        } else {
            return $this->response->setStatusCode(400)
                ->setJSON(['status' => 'error', 'message' => 'Gagal menambahkan data pasien']);
        }
    }
    public function show($id = false)
    {
        $pasien_model = new PasienModel();
        $data_pasien = $pasien_model->find($id);

        if ($data_pasien) {
            return $this->response->setJSON($data_pasien);
        } else {
            return $this->response->setStatusCode(404, 'Data pasien tidak ditemukan');
        }
    }
    public function update($id = false)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('pasien');

        $data = $this->request->getJSON(true);

        if (!$data || empty($data['nama']) || empty($data['alamat']) || empty($data['tanggal_lahir']) || empty($data['jenis_kelamin'])) {
            return $this->response->setStatusCode(400)
                ->setJSON(['status' => 'error', 'message' => 'Kolom tidak boleh kosong']);
        }

        $cekpasien = $builder->where('id', $id)->countAllResults();
        if ($cekpasien == 0) {
            return $this->response->setStatusCode(404)
                ->setJSON(['status' => 'error', 'message' => 'Data pasien tidak ditemukan']);
        }

        $builder->where('id', $id);
        if ($builder->update($data)) {
            return $this->response->setStatusCode(200)
                ->setJSON(['status' => 'success', 'message' => 'Data pasien berhasil diperbarui']);
        } else {
            return $this->response->setStatusCode(400)
                ->setJSON(['status' => 'error', 'message' => 'Gagal memperbarui data pasien']);
        }
    }

    public function delete($id = false)
    {
        $pasien_model = new pasienModel();
        if ($pasien_model->delete($id)) {
            return $this->response->setJSON(['message' => 'Data pasien berhasil dihapus']);
        } else {
            return $this->response->setStatusCode(404, 'Data pasien tidak ditemukan');
        }
    }
}
