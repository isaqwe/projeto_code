<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Cidades;
use App\Models\Enderecos as ModelsEnderecos;
use App\Models\Usuarios;

class Enderecos extends BaseController
{
    private $cidades;
    private $enderecos;
    private $usuarios;

    public function __construct()
    {
        $this->cidades = new Cidades();
        $this->enderecos = new ModelsEnderecos();
        $this->usuarios = new Usuarios();
        // Carregando o helper 'functions' para que a função msg() fique disponível
        helper(['form', 'url', 'functions']);
    }

    public function index()
    {
        // Adicionando a checagem da sessão para a mensagem.
        $data = [
            'enderecos' => $this->enderecos->getEnderecosComUsuarios(),
            'title'     => 'Endereços',
            'msg'       => session()->getFlashdata('msg')
        ];
        return view('Enderecos/index', $data);
    }

    public function new()
    {
        $data = [
            'cidades'   => $this->cidades->findAll(),
            'usuarios'  => $this->usuarios->findAll(),
            'title'     => 'Endereços',
            'form'      => 'Cadastrar',
            'op'        => 'create',
            'enderecos' => (object) [
                'enderecos_id'          => '',
                'enderecos_cep'         => '',
                'enderecos_logradouro'  => '',
                'enderecos_numero'      => '',
                'enderecos_complemento' => '',
                'enderecos_bairro'      => '',
                'enderecos_cidades_id'  => '',
                'enderecos_usuarios_id' => ''
            ]
        ];
        return view('Enderecos/form', $data);
    }

    public function create()
    {
        // Regras de validação
        $regrasValidacao = [
            'enderecos_logradouro' => 'required|max_length[255]|min_length[3]',
            'enderecos_cep'        => 'required',
            'enderecos_numero'     => 'required',
            'enderecos_bairro'     => 'required',
            'enderecos_cidades_id' => 'required|is_natural_no_zero',
            'enderecos_usuarios_id'=> 'required|is_natural_no_zero'
        ];

        if ($this->validate($regrasValidacao)) {
            // Forma correta e simplificada de salvar.
            $this->enderecos->save($this->request->getPost());

            // Usando flashdata para a mensagem durar apenas uma requisição.
            session()->setFlashdata('msg', msg('Cadastrado com Sucesso!', 'success'));
            return redirect()->to('enderecos'); // Redireciona para o index.

        } else {
            // Se a validação falhar, volta para o formulário.
            // O CI4 cuida de preservar os dados antigos (old) e os erros de validação.
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    }

    public function edit($id)
    {
        $data = [
            'enderecos' => $this->enderecos->find($id),
            'cidades'   => $this->cidades->findAll(),
            'usuarios'  => $this->usuarios->findAll(),
            'title'     => 'Endereços',
            'form'      => 'Alterar',
            'op'        => 'update'
        ];
        
        // Se o endereço não for encontrado, mostra um erro 404.
        if (!$data['enderecos']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Endereço não encontrado com o ID: ' . $id);
        }

        return view('Enderecos/form', $data);
    }

    public function update()
    {
        // Você precisa pegar o ID do POST para o update
        $id = $this->request->getPost('enderecos_id');

        $regrasValidacao = [
            'enderecos_id'         => 'required|is_natural_no_zero',
            'enderecos_logradouro' => 'required|max_length[255]|min_length[3]',
            'enderecos_cep'        => 'required',
            'enderecos_numero'     => 'required',
            'enderecos_bairro'     => 'required',
            'enderecos_cidades_id' => 'required|is_natural_no_zero',
            'enderecos_usuarios_id'=> 'required|is_natural_no_zero'
        ];
        
        if ($this->validate($regrasValidacao)) {
            // O `save` funciona tanto para insert quanto para update.
            $this->enderecos->save($this->request->getPost());

            session()->setFlashdata('msg', msg('Alterado com Sucesso!', 'success'));
            return redirect()->to('enderecos');

        } else {
            // Se a validação falhar, volta para o formulário de edição.
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    }

    public function delete($id)
    {
        if ($this->enderecos->delete($id)) {
            session()->setFlashdata('msg', msg('Excluído com Sucesso!', 'success'));
        } else {
            session()->setFlashdata('msg', msg('Erro ao excluir!', 'danger'));
        }
        return redirect()->to('enderecos');
    }
}