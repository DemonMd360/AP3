<?php

namespace App\Controllers;

use App\Models\PersonneModel;
use CodeIgniter\Controller;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin/index');
    }

    public function delete($id)
    {
        $model = new PersonneModel();
        $model->deletePersonne($id);

        return $this->response->setJSON([
            'status' => 'success',
            'message' => "Personne #$id supprimée"
        ]);
    }
}
