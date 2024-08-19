<?php

namespace App\Services;

class MenuService
{
    public function getMenuForUser($user)
    {
        $menu = $this->dashboardMenu();

        if ($user->isAdmin()) {
            $menu = array_merge($menu, $this->adminMenu(), $this->empresaMenu(), $this->funcionarioMenu(), $this->convidadoMenu());
        } elseif ($user->isEmpresa()) {
            $menu = array_merge($menu, $this->empresaMenu());
        } elseif ($user->isFuncionario()) {
            $menu = array_merge($menu, $this->funcionarioMenu());
        } elseif ($user->isConvidado()) {
            $menu = array_merge($menu, $this->convidadoMenu());
        }

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
                'name' => 'Administração',
                'icon' => 'fas fa-user-shield',
                'subMenu' => [
                    ['name' => 'Gerenciamento de Usuários', 'route' => 'dashboard/usuarios', 'icon' => 'fas fa-users'],
                    ['name' => 'Relatórios Gerais', 'route' => 'dashboard/relatorio', 'icon' => 'fas fa-chart-pie'],
                    ['name' => 'Configurações do Sistema', 'route' => 'dashboard/configuracoes', 'icon' => 'fas fa-cogs'],
                    ['name' => 'Logs de Sistema', 'route' => 'dashboard/logs', 'icon' => 'fas fa-file-alt'],
                ]
            ]
        ];
    }

    private function empresaMenu()
    {
        return [
            [
                'name' => 'Gestão Empresarial',
                'icon' => 'fas fa-building',
                'subMenu' => [
                    ['name' => 'Relatórios de Desempenho', 'route' => 'dashboard/relatorios', 'icon' => 'fas fa-chart-line'],
                    ['name' => 'Gestão de Equipe', 'route' => 'dashboard/equipe', 'icon' => 'fas fa-users-cog'],
                    ['name' => 'Controle Financeiro', 'route' => 'dashboard/financeiro', 'icon' => 'fas fa-wallet'],
                ]
            ]
        ];
    }

    private function funcionarioMenu()
    {
        return [
            [
                'name' => 'Minhas Atividades',
                'icon' => 'fas fa-user-tie',
                'subMenu' => [
                    ['name' => 'Tarefas Diárias', 'route' => 'dashboard/tarefas', 'icon' => 'fas fa-clipboard-list'],
                    ['name' => 'Horários e Turnos', 'route' => 'dashboard/horarios', 'icon' => 'fas fa-clock'],
                    ['name' => 'Meu Perfil', 'route' => 'dashboard/perfil', 'icon' => 'fas fa-id-badge'],
                ]
            ]
        ];
    }

    private function convidadoMenu()
    {
        return [
            [
                'name' => 'Visão Geral',
                'route' => 'dashboard/visao-geral',
                'icon' => 'fas fa-eye',
            ],
            [
                'name' => 'Contato',
                'route' => 'dashboard/contato',
                'icon' => 'fas fa-envelope',
            ]
        ];
    }
}
