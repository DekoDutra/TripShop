<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Usuarios extends CI_Controller {

 function __construct()
 {
   parent::__construct();
 }

 function index()
 {
   if($this->session->userdata('logged_in'))
   {

     $session_data = $this->session->userdata('logged_in');

     //Seleciona o model
     $this->load->model("admin/usuario", "admin");
     //Armazena variaveis no array 'seleciona'
     $dados['seleciona'] = $this->admin->seleciona();

     $this->load->view('head/head');
     $this->load->view('head/header');
     $this->load->view('admin/usuarios', $dados);
   }
   else
   {
     //If no session, redirect to login page
     redirect('admin/login', 'refresh');
   }
 }

	public function dados(){

		//recebo o id_cliente da view para trazer os dados somente daquele cliente
		$id = $this->input->post("id");

		//carrego o model responsável pelos clientes
		$this->load->model("admin/usuario", "admin");

		//chamo a função clientes() dentro do model que me traz somente os dados de um cliente, pois estou passando o id_cliente como parãmetro
		$consulta = $this->admin->selecionamodel($id);

		//antes de continuar, verifico se alguma informação foi retornada, para não dar erro.
		if ($consulta->num_rows() == 0) {
			die("Usuario não encontrado");
		}

		//como eu vou retornar os dados para a view em formato jSon, aqui eu crio os índices para serem acessados dentro da função $.post()
		$array = array(

			"id" => $consulta->row()->id,
      "sobrenome" => $consulta->row()->sobrenome,
      "nome" => $consulta->row()->nome,
      "telefone" => $consulta->row()->telefone,
			"email" => $consulta->row()->email,
      "logradouro" => $consulta->row()->logradouro,
      "cep" => $consulta->row()->cep,
      "rg" => $consulta->row()->rg,
      "cpf" => $consulta->row()->cpf

		);

		/*
		 * Após os índices criados para o formato jSon, dou um echo no jsonEcode da array acima.
		 */
		echo json_encode($array);

	}

	/*
	 * Função que recebe os dados via post do formulário.
	 */

	public function salvar()
	{
		//Carrego o model clientes
		$this->load->model("admin/usuario", "admin");

		$id = $this->input->post("id");
		$nome= $this->input->post("nome");
    $sobrenome= $this->input->post("sobrenome");
    $telefone= $this->input->post("telefone");
		$email = $this->input->post("email");
    $logradouro= $this->input->post("logradouro");
    $cep= $this->input->post("cep");
    $rg= $this->input->post("rg");
    $cpf= $this->input->post("cpf");


		//Aqui eu seto cada campo da tabela com seu respectivo valor para o update no model.
		$dados = array(

			 "nome" => $nome,
       "sobrenome" => $sobrenome,
       "telefone" => $telefone,
       "email" => $email,
       "logradouro" => $logradouro,
       "cep" => $cep,
       "rg" => $rg,
       "cpf" => $cpf

		);

		//Agora eu chamo a função salvar() dentro do model passando o id_cliente e os dados do cliente como parâmetro
		//Se tiver sucesso, então retorno com o código 1, pois recupero as informações via ajax na view.
    $salvar = $this->admin->salvar($id, $dados);
		if ($salvar == true)
			echo 1;
		else
			echo 0;
	}
  public function novo()
  {
    //Carrego o model clientes
    $this->load->model("admin/usuario", "admin");

    $senha= $this->input->post("senha");
    $id = $this->input->post("id");
    $nome= $this->input->post("nome");
    $sobrenome= $this->input->post("sobrenome");
    $telefone= $this->input->post("telefone");
    $email = $this->input->post("email");
    $logradouro= $this->input->post("logradouro");
    $cep= $this->input->post("cep");
    $rg= $this->input->post("rg");
    $cpf= $this->input->post("cpf");


    //Aqui eu seto cada campo da tabela com seu respectivo valor para o update no model.
    $dados = array(

       "senha" => md5($senha),
       "nome" => $nome,
       "sobrenome" => $sobrenome,
       "telefone" => $telefone,
       "email" => $email,
       "logradouro" => $logradouro,
       "cep" => $cep,
       "rg" => $rg,
       "cpf" => $cpf

    );

    //Agora eu chamo a função salvar() dentro do model passando o id_cliente e os dados do cliente como parâmetro
    //Se tiver sucesso, então retorno com o código 1, pois recupero as informações via ajax na view.
    $salvar = $this->admin->novo($dados);
    if ($salvar == true)
      echo 1;
    else
      echo 0;
  }
  public function deletar()
	{
		//Carrego o model clientes
		$this->load->model("admin/usuario", "admin");

		$id = $this->input->post("id");


		//Aqui eu seto cada campo da tabela com seu respectivo valor para o update no model.

		//Agora eu chamo a função salvar() dentro do model passando o id_cliente e os dados do cliente como parâmetro
		//Se tiver sucesso, então retorno com o código 1, pois recupero as informações via ajax na view.
		if ($this->admin->deletar($id))
			redirect('admin/users_admin', 'refresh');
		else
			redirect('admin/users_admin', 'refresh');
	}
}

?>
