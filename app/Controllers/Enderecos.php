<?php namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Enderecos as EnderecosModel;
use App\Models\Cidades  as CidadesModel;
use App\Models\Usuarios as UsuariosModel;

class Enderecos extends BaseController
{
    private $enderecos;
    private $cidades;
    private $usuarios;

    public function __construct()
    {
        helper('functions');
        $this->enderecos = new EnderecosModel();
        $this->cidades   = new CidadesModel();
        $this->usuarios  = new UsuariosModel();
    }

    public function index()
    {
        // Obtém o ID do usuário da sessão
        $usuarioId = session()->get('login')->usuarios_id;
    
        // Verifica se o usuário está logado e tem um ID de usuário válido
        if (!$usuarioId) {
            return redirect()->to('/login')->with('msg', 'Você precisa estar logado para acessar esta página.');
        }
    
        // Recupera os dados do título
        $data['title'] = 'Meus Endereços';
    
        // Certifique-se de usar o nome correto da coluna
        $data['enderecos'] = $this->enderecos
            ->select('enderecos.*, cidades.cidades_nome as cidade_nome') // Alias para cidade_nome
            ->join('cidades', 'cidades.cidades_id = enderecos.cidade_id', 'left') // Corrigir nome de coluna na junção
            ->where('usuario_id', $usuarioId)
            ->findAll();
        
            
        // Verifica se encontrou endereços
        if (empty($data['enderecos'])) {
            $data['msg'] = 'Nenhum endereço encontrado.';
        }
    
        // Retorna a view
        return view('enderecos/index', $data);
    }
    
    
    // GET /enderecos/new
    public function new(): string
    {
        $usuarioId = session()->get('user_id');

        $data['title']    = 'Novo Endereço';
        $data['op']       = 'create';
        $data['form']     = 'cadastrar';
        $data['endereco'] = (object) [
            'id'           => '',
            'usuario_id'   => $usuarioId,
            'cidade_id'    => '',
            'cep'          => '',
            'rua'          => '',
            'numero'       => '',
            'complemento'  => '',
            'bairro'       => ''
        ];
        $data['usuarios'] = $this->usuarios->findAll();
        $data['cidades']  = $this->cidades->findAll();


        return view('enderecos/form', $data);
    }

    // POST /enderecos/create
    public function create()
    {
        $post = $this->request->getPost();
        $post['usuario_id'] = session()->get('login')->usuarios_id;

        $this->enderecos->save($post);
        return redirect()->to('/enderecos');

    }

    public function search()
    {
        // Obtém o termo de pesquisa enviado pelo formulário
        $pesquisa = $this->request->getPost('pesquisar');

        // Obtém o ID do usuário da sessão
        $usuario = session()->get('login');
        $usuarioId = $usuario ? $usuario->usuarios_id : null;

        // Verifica se o usuário está logado
        if (!$usuarioId) {
            return redirect()->to('/login')->with('msg', 'Você precisa estar logado para acessar esta página.');
        }

        // Recupera os dados do título
        $data['title'] = 'Meus Endereços';

        // Busca os endereços que correspondem ao termo de pesquisa
        $enderecos = $this->enderecos
            ->select('enderecos.*, cidades.cidades_nome as cidade_nome')
            ->join('cidades', 'cidades.cidades_id = enderecos.cidade_id', 'left')
            ->where('usuario_id', $usuarioId)
            ->groupStart()
                ->like('enderecos.rua', $pesquisa)
                ->orLike('enderecos.bairro', $pesquisa)
                ->orLike('enderecos.numero', $pesquisa)
                ->orLike('enderecos.complemento', $pesquisa)
            ->groupEnd()
            ->findAll();

        $quantidade = count($enderecos);
        $data['enderecos'] = $enderecos;

        // Mensagem de quantidade
        if ($quantidade > 0) {
            $data['msg'] = "<div class='alert alert-success'>{$quantidade} endereço" . ($quantidade > 1 ? 's encontrados.' : ' encontrado.') . "</div>";
        } else {
            $data['msg'] = "<div class='alert alert-warning'>Nenhum endereço encontrado.</div>";
        }

        // Retorna a view com os dados
        return view('enderecos/index', $data);
    }    

    // GET /enderecos/edit/{id}
    public function edit($id)
    {
        // Verifica se o usuário está logado
        $usuarioId = session()->get('login')->usuarios_id;
        if (!$usuarioId) {
            return redirect()->to('/login')->with('msg', 'Você precisa estar logado para acessar esta página.');
        }

        // Recupera o endereço a ser editado
        $endereco = $this->enderecos->find($id);

        // Verifica se o endereço existe
        if (!$endereco) {
            return redirect()->to('/enderecos')->with('msg', 'Endereço não encontrado.');
        }

        // Recupera as cidades para o campo de seleção
        $cidades = $this->cidades->findAll();

        // Dados para a view
        $data['title'] = 'Editar Endereço';
        $data['op'] = 'update';
        $data['form'] = 'alterar';
        $data['endereco'] = $endereco;
        $data['cidades'] = $cidades;

        // Passa os dados para a view
        return view('enderecos/form', $data);
        }

    // POST /enderecos/update/{id}
    public function update($id)
    {
        $post = $this->request->getPost();
    
        // Recupera o ID do usuário da sessão
        $usuario = session()->get('login');
        $usuario_id = $usuario ? $usuario->usuarios_id : null; // Garantir que seja só o ID
    
        // Verifica se tem algo na sessão
        if (!$usuario_id) {
            return redirect()->back()->with('msg', 'Usuário não autenticado.');
        }
    
        // Adiciona ao array de dados
        $post['usuario_id'] = $usuario_id;
        $post['id'] = $id;
    
       //ERRO
    
        // Faz o UPDATE manual
        $result = $this->enderecos->update($id, $post);
    
        if ($result) {
            return redirect()->to('/enderecos')->with('msg', 'Endereço atualizado com sucesso!');
        } else {
            return redirect()->back()->with('msg', 'Erro ao atualizar o endereço.');
        }
    }
    
    

    // GET /enderecos/delete/{id}
    public function delete($id)
    {
        $this->enderecos->delete($id);
        return redirect()->to('/enderecos');
    }
}
