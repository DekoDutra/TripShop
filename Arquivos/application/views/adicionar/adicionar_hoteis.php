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
    echo form_open('admin/hoteis/novo', $attributes);
    ?><div class="form-group"><?
    echo form_label("Nome: ", 'nome', $labels);
    ?><div class="col-sm-10"><?
    echo form_input('nome', '', 'id="name" class="form-control"');
    ?></div></div><div class="form-group"><?
    echo form_label("Estrelas: ", 'estrelas', $labels);
    ?><div class="col-sm-10"><?
    echo form_number('estrelas', '', 'id="estrelas" class="form-control"');
    ?></div></div><div class="form-group"><?
    echo form_label("Quartos: ", 'quartos', $labels);
    ?><div class="col-sm-10"><?
    echo form_number('quartos', '', 'id="quartos" class="form-control"');
    ?></div></div><div class="form-group"><?
    echo form_label("Quartos Vagos: ", 'quartos_vagos', $labels);
    ?><div class="col-sm-10"><?
    echo form_number('quartos_vagos', '', 'id="quartos_vagos" class="form-control"');
    ?></div></div><div class="form-group"><div class="col-sm-offset-2 col-sm-10"><?
    echo "<br>";
    echo form_submit("","Cadastrar", $submitbtn);
    ?></div><?
    echo form_close();
  ?>
</div>
</div>
