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
		$this->load->model("admin/admin", "admin");

		//chamo a função clientes() dentro do model que me traz somente os dados de um cliente, pois estou passando o id_cliente como parãmetro
		$consulta = $this->admin->seleciona($id);

		//antes de continuar, verifico se alguma informação foi retornada, para não dar erro.
		if ($consulta->num_rows() == 0) {
			die("Usuario não encontrado");
		}

		//como eu vou retornar os dados para a view em formato jSon, aqui eu crio os índices para serem acessados dentro da função $.post()
		$array = array(

			"id" => $consulta->row()->id,
			"usuario" => $consulta->row()->usuario,
			"email" => $consulta->row()->email

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
		$this->load->model("admin/admin", "admin");

		$id = $this->input->post("id");
		$usuario= $this->input->post("usuario");
		$email = $this->input->post("email");
    $tipo_usuario = $this->input->post("tipo_usuario");
    $ativo = $this->input->post("ativo");


		//Aqui eu seto cada campo da tabela com seu respectivo valor para o update no model.
		$dados = array(

			 "usuario" => $usuario,
       "tipo_usuario" => $tipo_usuario,
       "ativo" => $ativo,
       "email" => $email

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
    $this->load->model("admin/admin", "admin");

    $usuario= $this->input->post("usuario");
    $senha= $this->input->post("senha");
    $email = $this->input->post("email");
    $tipo_usuario = $this->input->post("tipo_usuario");
    $ativo = $this->input->post("ativo");


    //Aqui eu seto cada campo da tabela com seu respectivo valor para o update no model.
    $dados = array(

       "usuario" => $usuario,
       "senha" => md5($senha),
       "tipo_usuario" => $tipo_usuario,
       "ativo" => $ativo,
       "email" => $email

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
		$this->load->model("admin/admin", "admin");

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
