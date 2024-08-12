<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'type', // Adicionado campo 'type'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
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
