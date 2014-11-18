<?php
  Class hotel extends CI_Model
  {
   //Função de Select
   function seleciona($hotel = null)
   {

		if ($hotel != null) {
			$this->db->where("hotel", $hotel);
		}

		$this->db->order_by("id");
		return $this->db->get("hoteis");

	  }

    function selecionamodel($id = null)
    {

     if ($id != null) {
       $this->db->where("id", $id);
     }

     $this->db->order_by("id");
     return $this->db->get("hoteis");

     }

   function salvar($id = null, $dados = null){

		if ($this->db->where("id", $id)->update("hoteis", $dados))
			return true;
		else
			return false;
	 }
   function novo($dados = null){

    if ($this->db->insert("hoteis", $dados))
      return true;
    else
      return false;
   }
   public function deletar($id = null){

		if ($this->db->where("id", $id)->delete("hoteis"))
			return true;
		else
			return false;

	 }
  }
?>
