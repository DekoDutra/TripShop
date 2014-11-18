<?php
  Class Festa extends CI_Model
  {
   //Função de Select
   function seleciona($festa = null)
   {

		if ($festa != null) {
			$this->db->where("festa", $festa);
		}

		$this->db->order_by("id");
		return $this->db->get("festas");

	  }

    function selecionamodel($id = null)
    {

     if ($id != null) {
       $this->db->where("id", $id);
     }

     $this->db->order_by("id");
     return $this->db->get("festas");

     }

   function salvar($id = null, $dados = null){

		if ($this->db->where("id", $id)->update("festas", $dados))
			return true;
		else
			return false;
	 }
   function novo($dados = null){

    if ($this->db->insert("festas", $dados))
      return true;
    else
      return false;
   }
   public function deletar($id = null){

		if ($this->db->where("id", $id)->delete("festas"))
			return true;
		else
			return false;

	 }
  }
?>
