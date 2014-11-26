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
    echo form_open('admin/carros/novo', $attributes);
    ?><div class="form-group"><?
    echo form_label("Modelo: ", 'modelo', $labels);
    ?><div class="col-sm-10"><?
    echo form_input('modelo', '', 'id="modelo" class="form-control"');
    ?></div></div><div class="form-group"><?
    echo form_label("Cor: ", 'cor', $labels);
    ?><div class="col-sm-10"><?
    echo form_input('cor', '', 'id="cor" class="color {hash:true} form-control"');
    ?></div></div><div class="form-group"><?
    echo form_label("Placa: ", 'placa', $labels);
    ?><div class="col-sm-10"><?
    echo form_input('placa', '', 'id="placa" class="form-control"');
    ?></div></div><div class="form-group"><div class="col-sm-offset-2 col-sm-10"><?
    echo "<br>";
    echo " " . form_submit("","Cadastrar", $submitbtn);
    ?></div><?
    echo form_close();
  ?>
</div>
</div>
