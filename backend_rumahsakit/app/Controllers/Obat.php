<?php 
namespace App\Controllers;

use App\Models\ObatModel;
use CodeIgniter\RESTful\ResourceController;

class Obat extends ResourceController {
    protected $modelName = 'App\\Models\\ObatModel';
    protected $format    = 'json';

    public function index()
    {
        $obat_model = new ObatModel();
        $all_data_obat = $obat_model->findAll();
        return $this->response->setJSON($all_data_obat);
    }

    public function create()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('obat');

        $data = $this->request->getJSON(true);

        if (!$data || empty($data['nama_obat']) || empty($data['kategori']) || empty($data['stok']) || empty($data['harga'])) {
            return $this->response->setStatusCode(400)
                ->setJSON(['status' => 'error', 'message' => 'Kolom tidak boleh kosong']);
        }

        if ($builder->insert($data)) {
            return $this->response->setStatusCode(201)
                ->setJSON(['status' => 'success', 'message' => 'Data obat berhasil ditambahkan']);
        } else {
            return $this->response->setStatusCode(400)
                ->setJSON(['status' => 'error', 'message' => 'Gagal menambahkan data obat']);
        }
    }
    public function show($id = false)
    {
        $obat_model = new obatModel();
        $data_obat = $obat_model->find($id);

        if ($data_obat) {
            return $this->response->setJSON($data_obat);
        } else {
            return $this->response->setStatusCode(404, 'Data obat tidak ditemukan');
        }
    }
    public function update($id = false)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('obat');

        $data = $this->request->getJSON(true);

        if (!$data || empty($data['nama_obat']) || empty($data['kategori']) || empty($data['stok']) || empty($data['harga'])) {
            return $this->response->setStatusCode(400)
                ->setJSON(['status' => 'error', 'message' => 'Kolom tidak boleh kosong']);
        }

        $cekobat = $builder->where('id', $id)->countAllResults();
        if ($cekobat == 0) {
            return $this->response->setStatusCode(404)
                ->setJSON(['status' => 'error', 'message' => 'Data obat tidak ditemukan']);
        }

        $builder->where('id', $id);
        if ($builder->update($data)) {
            return $this->response->setStatusCode(200)
                ->setJSON(['status' => 'success', 'message' => 'Data obat berhasil diperbarui']);
        } else {
            return $this->response->setStatusCode(400)
                ->setJSON(['status' => 'error', 'message' => 'Gagal memperbarui data obat']);
        }
    }

    public function delete($id = false)
    {
        $obat_model = new obatModel();
        if ($obat_model->delete($id)) {
            return $this->response->setJSON(['message' => 'Data obat berhasil dihapus']);
        } else {
            return $this->response->setStatusCode(404, 'Data obat tidak ditemukan');
        }
    }
}