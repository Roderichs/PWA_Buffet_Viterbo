<?php 
namespace App\Models;

use CodeIgniter\Model;

class Comentario extends Model{
    // Uncomment below if you want add primary key
    // protected $primaryKey = 'id';
    protected $table      = 'comentarios';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre','correo','comentario'];
}