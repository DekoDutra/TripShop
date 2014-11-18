<?php
  Class Voo extends CI_Model
  {
   //Função de Select
   function seleciona($voo = null)
   {

		if ($voo != null) {
			$this->db->where("voo", $voo);
		}

		$this->db->order_by("id");
		return $this->db->get("voos");

	  }

    function selecionamodel($id = null)
    {

     if ($id != null) {
       $this->db->where("id", $id);
     }

     $this->db->order_by("id");
     return $this->db->get("voos");

     }

   function salvar($id = null, $dados = null){

		if ($this->db->where("id", $id)->update("voos", $dados))
			return true;
		else
			return false;
	 }
   function novo($dados = null){

    if ($this->db->insert("voos", $dados))
      return true;
    else
      return false;
   }
   public function deletar($id = null){

		if ($this->db->where("id", $id)->delete("voos"))
			return true;
		else
			return false;

	 }
  }
?>
