<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'latitude',
        'longitude',
        'descricao',
    ];


    /**
     * Nome da tabela associada ao modelo.
     *
     * @var string
     */
    protected $table = 'business';

    /**
     * Relacionamento com o usuário.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reviews()
    {
        return $this->hasMany(NpsReview::class);
    }

}
