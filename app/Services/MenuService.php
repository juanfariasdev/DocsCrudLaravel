<?php

namespace App\Services;

class MenuService
{
    public function getMenuForUser($user)
    {
        $menu = $this->dashboardMenu();
        
        if ($user->isAdmin()) {
            array_push($menu, ...$this->adminMenu());
        } elseif ($user->isEmpresa()) {
            array_push($menu, ...$this->empresaMenu());
        } elseif ($user->isFuncionario()) {
            array_push($menu, ...$this->funcionarioMenu());
        } 
        // elseif ($user->isConvidado()) {
        //     return $this->convidadoMenu();
        // }

        return $menu;
    }

    private function dashboardMenu()
    {
        return [
            [
                'name' => 'Dashboard',
                'route' => 'dashboard',
                'icon' => 'fas fa-home'
            ]
        ];
    }

    private function adminMenu()
    {
        return [
            [
                'name' => 'Administrador',
                'route' => '#',
                'icon' => 'fas fa-user-shield',
                'subMenu' => [
                    ['name' => 'Todos Usuários', 'route' => 'dashboard/usuarios', 'icon' => 'fas fa-users'],
                    ['name' => 'Relatório completo', 'route' => 'dashboard/relatorio', 'icon' => 'fas fa-chart-pie'],
                    // Outros itens para admin...
                ]
            ],
            [
                'name' => 'Empresa',
                'route' => '#',
                'icon' => 'fas fa-building',
                'subMenu' => $this->empresaMenu()
            ],
            [
                'name' => 'Funcionário',
                'route' => '#',
                'icon' => 'fas fa-user-tie',
                'subMenu' => $this->funcionarioMenu()
            ],
        ];
    }

    private function empresaMenu()
    {
        return [
            [
                'name' => 'Relatório',
                'route' => 'dashboard/relatorio',
                'icon' => 'fas fa-chart-line',
            ],
            // Outros itens para empresa...
        ];
    }

    private function funcionarioMenu()
    {
        return [
            [
                'name' => 'Tarefas',
                'route' => '#',
                'icon' => 'fas fa-clipboard-list',
            ],
            // Outros itens para funcionário...
        ];
    }

    // private function convidadoMenu()
    // {
    //     // Como o convidado só tem o Dashboard, retornamos apenas o menu básico
    //     return $this->dashboardMenu();
    // }
}
