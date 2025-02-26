<?php

namespace App\Controllers;

class Cidades extends BaseController
{
    public function index()
    {
        $data['titulo'] = 'Cidades';
        $data['form'] = 'listar';
        $data['cidades'] = array(
            ['id' => '1', 'cidade' => 'Ceres', 'uf' => 'GO'],
            ['id' => '2', 'cidade' => 'Goiânia', 'uf' => 'GO'],
            ['id' => '3', 'cidade' => 'Anápolis', 'uf' => 'GO'],
            ['id' => '4', 'cidade' => 'Brasília', 'uf' => 'DF'],
            ['id' => '5', 'cidade' => 'São Paulo', 'uf' => 'SP']
        );

        return view('home', $data);
    }
}
