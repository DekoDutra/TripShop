<?php
  Class Usuario extends CI_Model
  {
   //Função de Select
   function seleciona($usuario = null)
   {

		if ($usuario != null) {
			$this->db->where("usuario", $usuario);
		}

		$this->db->order_by("id");
		return $this->db->get("usuarios");

	  }

    function selecionamodel($id = null)
    {

     if ($id != null) {
       $this->db->where("id", $id);
     }

     $this->db->order_by("id");
     return $this->db->get("usuarios");

     }

   function salvar($id = null, $dados = null){

		if ($this->db->where("id", $id)->update("usuarios", $dados))
			return true;
		else
			return false;
	 }
   function novo($dados = null){

    if ($this->db->insert("usuarios", $dados))
      return true;
    else
      return false;
   }
   public function deletar($id = null){

		if ($this->db->where("id", $id)->delete("usuarios"))
			return true;
		else
			return false;

	 }
  }
?>
