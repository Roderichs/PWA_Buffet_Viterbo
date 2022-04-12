<?php
    namespace App\Models;
    
    use CodeIgniter\Model;

    class Usuario extends Model
    {
        protected $table = 'usuarios';
        protected $primaryKey = 'id';
        protected $allowedFields = ['nombre','correo','password'];
    }