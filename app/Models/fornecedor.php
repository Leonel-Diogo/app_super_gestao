<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
#INCLUSÃO DO NAMESPACE SOFTDELETES
use Illuminate\Database\Eloquent\SoftDeletes;
class Fornecedor extends Model
{
    use HasFactory;
    #INCLUINDO A CLASSE SOFTDELETES(TRAIT->HERANÇA HORIZONTAL)
    use SoftDeletes;
    protected $table = 'fornecedores';
    protected $fillable = ['name', 'site', 'email', 'uf'];
}


