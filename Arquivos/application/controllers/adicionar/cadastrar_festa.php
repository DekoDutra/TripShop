<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Cadastrar_festa extends CI_Controller {

   function __construct()
   {
     parent::__construct();
   }

   function index()
   {
     if($this->session->userdata('logged_in'))
     {

       $session_data = $this->session->userdata('logged_in');

      $this->load->model("admin/festa", "admin");
       $this->load->helper(array('form'));
       $this->load->view('head/head');
       $this->load->view('head/header');
       $this->load->view('adicionar/adicionar_festas');
     }
     else
     {
       //If no session, redirect to login page
       redirect('admin/login', 'refresh');
     }
   }

 }
