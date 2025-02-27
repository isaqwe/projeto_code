<?php

namespace App\Controllers;

class Cidades extends BaseController
{

    //Metodo Index: Chama a pagina inicial referente ao form 
    public function index()
    {
        $data['titulo'] = "Cidades";
        $data['form'] = 'listar';
        $data['cidades'] = array(
            ['id' => '1', 'cidade' => 'Ceres', 'uf' => 'GO'],
            ['id' => '2', 'cidade' => 'Goiânia', 'uf' => 'GO'],
            ['id' => '3', 'cidade' => 'Anápolis', 'uf' => 'GO'],
            ['id' => '4', 'cidade' => 'Brasília', 'uf' => 'DF'],
            ['id' => '5', 'cidade' => 'São Paulo', 'uf' => 'SP']
        );

        return view('cidades/index', $data);
    }

    //Metodo New: Chama o form de cadastro
    public function new()
    {
        $data['titulo'] = "Cidades";
        $data['form'] = 'cadastrar';
        $data['cidades'] = [
            'cidades_id' => '',
            'cidades_nome' => '',
            'cidades_uf' => ''
        ];
        return view('cidades/form', $data);
    }

    // Metodo Cadastrar
    public function create()
    {
        $data['titulo'] = "Cidades";
        $data['form'] = 'listar';
        $cidade = [
            'id' => 6, 
            'cidades_nome' => $_POST['cidade_nome'],
            'uf' => $_POST['cidade_uf']
        ];

        $data['cidade'] = array(
            ['id' => '1', 'cidade' => 'Ceres', 'uf' => 'GO'],
            ['id' => '2', 'cidade' => 'Goiânia', 'uf' => 'GO'],
            ['id' => '3', 'cidade' => 'Anápolis', 'uf' => 'GO'],
            ['id' => '4', 'cidade' => 'Brasília', 'uf' => 'DF'],
            ['id' => '5', 'cidade' => 'São Paulo', 'uf' => 'SP']
        );

        array_push($data['cidades'], $cidade);

        return view('cidades/index', $data);
    }

    //fazer a chamada do formulario edit 
    public function edit($id)
    {
        $data['titulo'] = "Cidades";
        $data['form'] = 'alterar';
        $data['cidades'] = array(
            ['id' => '1', 'cidade' => 'Ceres', 'uf' => 'GO'],
            ['id' => '2', 'cidade' => 'Goiânia', 'uf' => 'GO'],
            ['id' => '3', 'cidade' => 'Anápolis', 'uf' => 'GO'],
            ['id' => '4', 'cidade' => 'Brasília', 'uf' => 'DF'],
            ['id' => '5', 'cidade' => 'São Paulo', 'uf' => 'SP']
        );

        $data['cidade'] = $data['cidades'][$id-1];

        return view('cidades/form', $data);
    }

}
