<?php

namespace App\Services;

class MenuService
{
    public function getMenuForUser($user)
    {
        if ($user->isAdmin()) {
            return $this->adminMenu();
        } elseif ($user->isEmpresa()) {
            return $this->empresaMenu();
        } elseif ($user->isFuncionario()) {
            return $this->funcionarioMenu();
        } elseif ($user->isConvidado()) {
            return $this->convidadoMenu();
        }

        return [];
    }

    private function adminMenu()
    {
        return [
            [
                'name' => 'Dashboard',
                'route' => 'dashboard',
                'icon' => 'fas fa-tachometer-alt',
            ],
            [
                'name' => 'Usuários',
                'route' => 'dashboard/usuarios',
                'icon' => 'fas fa-users',
            ],
            [
                'name' => 'Relatório completo',
                'route' => 'dashboard/relatorio',
                'icon' => 'fas fa-file-alt',
            ],
            // Outros itens para admin...
        ];
    }

    private function empresaMenu()
    {
        return [
            [
                'name' => 'Dashboard',
                'route' => 'dashboard',
                'icon' => 'fas fa-tachometer-alt',
            ],
            [
                'name' => 'Main',
                'route' => '#',
                'icon' => 'fas fa-chart-line',
                'subMenu' => [
                    ['name' => 'Analytics', 'route' => '#', 'icon' => 'fas fa-chart-pie'],
                    ['name' => 'Fintech', 'route' => '#', 'icon' => 'fas fa-chart-bar'],
                ]
            ],
            [
                'name' => 'Relatório completo',
                'route' => 'dashboard/relatorio',
                'icon' => 'fas fa-file-alt',
            ],
            // Outros itens para empresa...
        ];
    }

    private function funcionarioMenu()
    {
        return [
            [
                'name' => 'Dashboard',
                'route' => 'dashboard',
                'icon' => 'fas fa-tachometer-alt',
            ],
            [
                'name' => 'Tarefas',
                'route' => '#',
                'icon' => 'fas fa-tasks',
            ],
            // Outros itens para funcionário...
        ];
    }

    private function convidadoMenu()
    {
        return [
            [
                'name' => 'Dashboard',
                'route' => 'dashboard',
                'icon' => 'fas fa-tachometer-alt',
            ],
        ];
    }
}
