<?php

namespace App\Controllers;

use App\Models\PersonneModel;
use App\Libraries\JWTService;
//use CodeIgniter\RESTful\ResourceController;
use App\Controllers\BaseController

class AuthController extends BaseController
{
    protected $format = 'json';

    /* ============================
       LOGIN
    ============================ */
    public function login()
    {
        dd('here');
        // $json = $this->request->getJSON(true);

        // if (!$json) {
        //     return $this->failValidationErrors(['json' => 'Format JSON invalide']);
        // }

        // $rules = [
        //     'Email'      => 'required|valid_email',
        //     'MotDePasse' => 'required|min_length[6]'
        // ];

        // if (!$this->validateData($json, $rules)) {
        //     return $this->failValidationErrors($this->validator->getErrors());
        // }

        // $email = $json['Email'];
        // $password = $json['MotDePasse'];

        // $userModel = new PersonneModel();
        // $user = $userModel->where('Email', $email)->first();

        // if (!$user) {
        //     return $this->failUnauthorized('Email ou mot de passe incorrect');
        // }

        // if (!password_verify($password, $user['MotDePasse'])) {
        //     return $this->failUnauthorized('Email ou mot de passe incorrect');
        // }

        // $accessToken = JWTService::generateToken($user);
        // $refreshToken = JWTService::generateRefreshToken($user);

        // return $this->respond([
        //     'status' => 'success',
        //     'message' => 'Connexion réussie',
        //     'data' => [
        //         'access_token' => $accessToken,
        //         'refresh_token' => $refreshToken,
        //         'token_type' => 'Bearer',
        //         'expires_in' => 3600,
        //         'user' => [
        //             'id' => $user['idPersonne'],
        //             'Email' => $user['Email'],
        //             'Nom' => $user['Nom'],
        //             'Prenom' => $user['Prenom'],
        //             'idRole' => $user['idRole']
        //         ]
        //     ]
        // ]);
    }

    /* ============================
       REGISTER
    ============================ */
   public function register()
{
    // Récupération du JSON envoyé par Postman
    $json = $this->request->getJSON(true);

    if (!$json) {
        return $this->failValidationErrors(['json' => 'Format JSON invalide']);
    }

    // Règles de validation
    $rules = [
        'Nom'        => 'required',
        'Prenom'     => 'required',
        'Email'      => 'required|valid_email|is_unique[Personne.Email]',
        'MotDePasse' => 'required|min_length[6]',
        'Telephone'  => 'required',
        'Adresse'    => 'required'
    ];

    // Validation des données JSON
    if (!$this->validateData($json, $rules)) {
        return $this->failValidationErrors($this->validator->getErrors());
    }

    // Préparation des données
    $data = [
        'Nom'        => $json['Nom'],
        'Prenom'     => $json['Prenom'],
        'Email'      => $json['Email'],
        'Telephone'  => $json['Telephone'],
        'Adresse'    => $json['Adresse'],
        'MotDePasse' => password_hash($json['MotDePasse'], PASSWORD_DEFAULT),
        'idRole'     => 3
    ];

    // Appel du modèle
    $model = new PersonneModel();
    $model->createWithProcedure($data);

    // Réponse
    return $this->respondCreated([
        'status' => 'success',
        'message' => 'Compte créé avec succès'
    ]);
}

