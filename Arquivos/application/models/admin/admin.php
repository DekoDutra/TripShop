<?php
  Class Admin extends CI_Model
  {
    //Função de Login
   function login($email, $senha)
   {
     $this ->db->select('*');
     $this ->db->from('admin');
     $this ->db->where('email', $email);
     $this ->db->where('senha', MD5($senha));
     $this ->db->limit(1);

     $query = $this->db->get();

     if($query->num_rows() == 1)
     {
       return $query->result();
     }
     else
     {
       return false;
     }
   }
   //Função de Select
   function seleciona($id = null)
   {

		if ($id != null) {
			$this->db->where("id", $id);
		}

		$this->db->order_by("id");
		return $this->db->get("admin");

	  }

   function salvar($id = null, $dados = null){

		if ($this->db->where("id", $id)->update("admin", $dados))
			return true;
		else
			return false;
	 }
   function novo($dados = null){

    if ($this->db->insert("admin", $dados))
      return true;
    else
      return false;
   }
   public function deletar($id = null){

		if ($this->db->where("id", $id)->delete("admin"))
			return true;
		else
			return false;

	 }
  }
?>
