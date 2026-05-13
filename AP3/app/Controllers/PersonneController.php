<?php

namespace App\Controllers;

use App\Models\PersonneModel;
use CodeIgniter\RESTful\ResourceController;

class PersonneController extends ResourceController
{
    public function edit($id)
    {
        $decoded = $this->request->user ?? null;

        if (!$decoded || $decoded->uid != $id) {
            return $this->respond(['status' => 'error', 'message' => 'Accès non autorisé'], 401);
        }

        $data = $this->request->getJSON(true);

        $model = new PersonneModel();
        $model->updatePersonne($id, $data);

        return $this->respond(['status' => 'success', 'message' => "Compte #$id modifié avec succès"]);
    }

    public function delete($id)
    {
        $decoded = $this->request->user ?? null;

        if (!$decoded || $decoded->uid != $id) {
            return $this->respond(['status' => 'error', 'message' => 'Accès non autorisé'], 401);
        }

        $model = new PersonneModel();
        $model->deletePersonne($id);

        return $this->respond(['status' => 'success', 'message' => "Compte #$id supprimé avec succès"]);
    }
    public function create()
{
    $json = $this->request->getJSON(true);

    $rules = [
        'Nom'        => 'required',
        'Prenom'     => 'required',
        'Email'      => 'required|valid_email|is_unique[Personne.Email]',
        'MotDePasse' => 'required|min_length[6]',
        'Telephone'  => 'required',
        'Adresse'    => 'required',
        'idRole'     => 'required|integer'
    ];

    if (!$this->validateData($json, $rules)) {
        return $this->failValidationErrors($this->validator->getErrors());
    }

    $json['MotDePasse'] = password_hash($json['MotDePasse'], PASSWORD_DEFAULT);

    $model = new PersonneModel();
    $result = $model->createPersonne($json);

    return $this->respondCreated([s
        'status' => 'success',
        'message' => 'Personne créée avec succès',
        'data' => $result
    ]);
}

}
