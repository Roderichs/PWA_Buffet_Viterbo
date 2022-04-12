<?php 
namespace App\Models;

use CodeIgniter\Model;

class Bebida extends Model{
    // Uncomment below if you want add primary key
    // protected $primaryKey = 'id';
    protected $table      = 'bebidas';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre','descripcion','precio','imagen'];
}