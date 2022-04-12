<?php 
namespace App\Models;

use CodeIgniter\Model;

class Platillo extends Model{
    // Uncomment below if you want add primary key
    // protected $primaryKey = 'id';
    protected $table      = 'platillos';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre','descripcion','precio','imagen'];
}