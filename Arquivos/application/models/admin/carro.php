<?php
  Class carro extends CI_Model
  {
   //Função de Select
   function seleciona($carro = null)
   {

		if ($carro != null) {
			$this->db->where("carro", $carro);
		}

		$this->db->order_by("id");
		return $this->db->get("carros");

	  }

    function selecionamodel($id = null)
    {

     if ($id != null) {
       $this->db->where("id", $id);
     }

     $this->db->order_by("id");
     return $this->db->get("carros");

     }

   function salvar($id = null, $dados = null){

		if ($this->db->where("id", $id)->update("carros", $dados))
			return true;
		else
			return false;
	 }
   function novo($dados = null){

    if ($this->db->insert("carros", $dados))
      return true;
    else
      return false;
   }
   public function deletar($id = null){

		if ($this->db->where("id", $id)->delete("carros"))
			return true;
		else
			return false;

	 }
  }
?>
