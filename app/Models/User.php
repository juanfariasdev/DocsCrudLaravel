<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Os atributos que podem ser atribuídos em massa.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'type', // Adicionado campo 'type'
        'profile_photo_url',
    ];

    /**
     * Os atributos que devem ser ocultados para a serialização.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Os atributos que devem ser convertidos para tipos nativos.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function address()
    {
        return $this->hasOne(Address::class);
    }
    public function business()
    {
        return $this->hasOne(Business::class);
    }
    public function reviews()
    {
        return $this->hasMany(NpsReview::class);
    }


    // Constantes para os tipos de usuário
    const TYPE_ADMIN = 'Admin';
    const TYPE_EMPRESA = 'Empresa';
    const TYPE_FUNCIONARIO = 'Funcionario';
    const TYPE_CONVIDADO = 'Convidado';

    // Método para verificar se o usuário é Admin
    public function isAdmin()
    {
        return $this->type === self::TYPE_ADMIN;
    }

    // Método para verificar se o usuário é Empresa
    public function isEmpresa()
    {
        return $this->type === self::TYPE_EMPRESA;
    }

    // Método para verificar se o usuário é Funcionario
    public function isFuncionario()
    {
        return $this->type === self::TYPE_FUNCIONARIO;
    }

    // Método para verificar se o usuário é Convidado
    public function isConvidado()
    {
        return $this->type === self::TYPE_CONVIDADO;
    }
}
