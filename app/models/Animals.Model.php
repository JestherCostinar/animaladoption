<?php

class Animals
{
    private $db;

    // Constructor
    public function __construct()
    {
        $this->db = new Database;
    }

    // Function to return all animals
    public function getAnimals()
    {
        $this->db->query("SELECT * FROM animals");
        return $this->db->resultset();
    }

    // function that return not adopted animal status
    public function findAnimalsByStatus() {
        $this->db->query("SELECT * FROM animals WHERE adoption_status = :status");
        $this->db->bind(':status', 'Not adopted');
        return $this->db->resultset();
    }


    // Save Animal Record to Database
    public function insertAnimal($data)
    {
        $this->db->query("INSERT INTO animals (name, breed, gender, size, color, age, coat_length, adoption_status, vaccinated, adoption_fee, description, image)
        VALUES (:name, :breed, :gender, :size, :color, :age, :coat_length, :adoption_status, :vaccinated, :adoption_fee, :description, :image)");
        $this->db->bind(':name', $data['petName']);
        $this->db->bind(':breed', $data['petBreed']);
        $this->db->bind(':gender', $data['petGender']);
        $this->db->bind(':size', $data['petSize']);
        $this->db->bind(':age', $data['petAge']);
        $this->db->bind(':color', $data['petColor']);
        $this->db->bind(':vaccinated', $data['petVaccinated']);
        $this->db->bind(':coat_length', $data['coatLength']);
        $this->db->bind(':adoption_status', 'Not adopted');
        $this->db->bind(':adoption_fee', $data['adoptionFee']);
        $this->db->bind(':description', $data['petDescription']);
        $this->db->bind(':image', $data['path']);

        // Execute query
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // functiont that return row base on id
    public function findAnimalById($id)
    {
        $this->db->query("SELECT * FROM animals WHERE id = :id");
        $this->db->bind(':id', $id);
        return $row = $this->db->single();
    }

    // Update animal record 
    public function updateAnimal($data) {
        $this->db->query("UPDATE animals SET name = :name, breed = :breed, 
        gender = :gender, size = :size, color = :color, age = :age, vaccinated = :vaccinated, coat_length = :coat_length,
        adoption_status = :adoption_status, adoption_fee = :adoption_fee, description = :description, image = :image WHERE id = :id");
        $this->db->bind(':name', $data['petName']);
        $this->db->bind(':breed', $data['petBreed']);
        $this->db->bind(':gender', $data['petGender']);
        $this->db->bind(':size', $data['petSize']);
        $this->db->bind(':age', $data['petAge']);
        $this->db->bind(':color', $data['petColor']);
        $this->db->bind(':vaccinated', $data['petVaccinated']);
        $this->db->bind(':coat_length', $data['coatLength']);
        $this->db->bind(':adoption_status', 'Not adopted');
        $this->db->bind(':adoption_fee', $data['adoptionFee']);
        $this->db->bind(':description', $data['petDescription']);
        $this->db->bind(':image', $data['path']);
        $this->db->bind(':id', $data['id']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Delete animal record
    public function deleteAnimal($id)
    {
        $this->db->query("DELETE FROM animals WHERE id = :id");
        $this->db->bind(':id', $id);

        // Execute query
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}