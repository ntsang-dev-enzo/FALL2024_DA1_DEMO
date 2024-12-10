<?php

namespace App\Models;

class Contact extends BaseModel
{
    protected $table = 'contact';
    protected $id = 'id';

    public function getAllContact()
    {
        return $this->getAll();
    }
    // public function getOneContact()
    // {
    //     return $this->getOne();
    // }

    public function createContact($data)
    {
        return $this->create($data);
    }
    // public function createContact($email)
    // {
    //     return $this->create($email);
    // }
    //  public function updateProduct($id, $data)
    //  {
    //      return $this->update($id, $data);
    //  }

    // public function deleteProduct($id)
    // {
    //     return $this->delete($id);
    // }
}
    ?>