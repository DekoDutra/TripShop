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
  $options = array(
          '1'  => 'Usuario',
          '2'    => 'Vendedor',
          '3'   => 'Desenvolvedor',
        );
  $options2 = array(
          '1'  => 'Sim',
          '0'    => 'Não',
        );
    $attributes = array('class'=>"form-horizontal",'role' => 'form', 'id' => 'formulario_new', 'method' => 'POST');
    $inputs = 'class="form-control"';
    $labels = array('class' => 'col-sm-2' );
    $submitbtn = 'class = "btn btn-primary btn-lg"';
    $submitbtn2 = 'class = "btn btn-default btn-lg btn-novo-add"';
    echo form_open('admin/users_admin/novo', $attributes);
    ?><div class="form-group"><?
    echo form_label("Usuario: ", 'usuario', $labels);
    ?><div class="col-sm-10"><?
    echo form_input('usuario', '', 'id="usuario", class="form-control"');
    ?></div></div><div class="form-group"><?
    echo form_label("Senha: ", 'senha', $labels);
    ?><div class="col-sm-10"><?
    echo form_password('senha', '', 'id="senha", class="form-control"');
    ?></div></div><div class="form-group"><?
    echo form_label("Email: ", 'email', $labels);
    ?><div class="col-sm-10"><?
    echo form_email('email', '', 'id="email", class="form-control"');
    ?></div></div><div class="form-group"><?
    echo form_label("Tipo Usuario: ", 'tipo_usuario', $labels);
    ?><div class="col-sm-10"><?
    echo form_dropdown('tipo_usuario', $options, 'large', 'class="form-control"');
    ?></div></div><div class="form-group"><?
    echo form_label("Ativo: ", 'ativo', $labels);
    ?><div class="col-sm-10"><?
    echo form_dropdown('ativo', $options2, 'large', 'class="form-control"');
    ?></div></div><div class="form-group"><div class="col-sm-offset-2 col-sm-10"><?
    echo "<br>";
    echo form_submit("","Cancelar", $submitbtn2) . " " . form_submit("","Cadastrar", $submitbtn);
    ?></div><?
    echo form_close();
  ?>
</div>
</div>
