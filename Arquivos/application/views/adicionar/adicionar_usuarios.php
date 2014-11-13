<script>
$(function(){
  $('#formulario_new').ajaxForm({
    success: function(data) {
      if (data == 1) {

        //se for sucesso, simplesmente recarrego a página.
        document.location.href = document.location.href;
        alert("Ação finalizada com sucesso!");
      }
    }
  });
});
</script>

<div class="container-fluid">
  <blockquote>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
    <footer>Someone famous in <cite title="Source Title">Source Title</cite></footer>
  </blockquote>

<div class="container add-form">
  <?php
    $attributes = array('class'=>"form-horizontal",'role' => 'form', 'id' => 'formulario_new', 'method' => 'POST');
    $inputs = 'class="form-control"';
    $labels = array('class' => 'col-sm-2' );
    $submitbtn = 'class = "btn btn-primary btn-lg"';
    $submitbtn2 = 'class = "btn btn-default btn-lg btn-novo-add"';
    echo form_open('admin/usuarios/novo', $attributes);
    ?><div class="form-group"><?
    echo form_label("Nome: ", 'nome', $labels);
    ?><div class="col-sm-10"><?
    echo form_input('nome', '', 'id="name" class="form-control"');
    ?></div></div><div class="form-group"><?
    echo form_label("Sobrenome: ", 'sobrenome', $labels);
    ?><div class="col-sm-10"><?
    echo form_input('sobrenome', '', 'id="sobrenome" class="form-control"');
    ?></div></div><div class="form-group"><?
    echo form_label("Senha: ", 'senha', $labels);
    ?><div class="col-sm-10"><?
    echo form_password('senha', '', 'id="senha" class="form-control"');
    ?></div></div><div class="form-group"><?
    echo form_label("Telefone: ", 'telefone', $labels);
    ?><div class="col-sm-10"><?
    echo form_input('telefone', '', 'id="telefone" class="form-control"');
    ?></div></div><div class="form-group"><?
    echo form_label("Email: ", 'email', $labels);
    ?><div class="col-sm-10"><?
    echo form_email('email', '', 'id="email" class="form-control"');
    ?></div></div><div class="form-group"><?
    echo form_label("Logradouro: ", 'logradouro', $labels);
    ?><div class="col-sm-10"><?
    echo form_input('logradouro', '', 'id="logradouro" class="form-control"');
    ?></div></div><div class="form-group"><?
    echo form_label("CEP: ", 'cep', $labels);
    ?><div class="col-sm-10"><?
    echo form_input('cep', '', 'id="cep" class="form-control"');
    ?></div></div><div class="form-group"><?
    echo form_label("RG: ", 'rg', $labels);
    ?><div class="col-sm-10"><?
    echo form_input('rg', '', 'id="rg" class="form-control"');
    ?></div></div><div class="form-group"><?
    echo form_label("CPF: ", 'cpf', $labels);
    ?><div class="col-sm-10"><?
    echo form_input('cpf', '', 'id="cpf" class="form-control"');
    ?></div></div><div class="form-group"><div class="col-sm-offset-2 col-sm-10"><?
    echo "<br>";
    echo form_submit("","Cancelar", $submitbtn2) . " " . form_submit("","Cadastrar", $submitbtn);
    ?></div><?
    echo form_close();
  ?>
</div>
</div>
