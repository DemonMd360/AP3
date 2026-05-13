<?php

namespace App\Models;

use CodeIgniter\Model;

class PersonneModel extends Model
{
    protected $table = 'Personne';
    protected $primaryKey = 'idPersonne';

    protected $allowedFields = [
        'Nom', 'Prenom', 'Email', 'Telephone', 'Adresse', 'MotDePasse', 'idRole'
    ];

    public function getAllPersonnes()
    {
        return $this->db->query("EXEC GetAllPersonnes")->getResultArray();
    }

    public function updatePersonne($id, $data)
    {
        $sql = "EXEC UpdatePersonne ?, ?, ?, ?, ?, ?";
        $this->db->query($sql, [
            $id,
            $data['Nom'],
            $data['Prenom'],
            $data['Email'],
            $data['Telephone'],
            $data['Adresse']
        ]);
    }
    public function createPersonne($data)
{
    $db = \Config\Database::connect();
    $sql = "EXEC CreatePersonne ?, ?, ?, ?, ?, ?, ?";
    $query = $db->query($sql, [
        $data['Nom'],
        $data['Prenom'],
        $data['Email'],
        $data['Telephone'],
        $data['Adresse'],
        $data['MotDePasse'],
        $data['idRole']
    ]);

    return $query->getRowArray(); // contient NewPersonneId
}


    public function deletePersonne($id)
    {
        $this->db->query("EXEC DeletePersonne ?", [$id]);
    }
}
