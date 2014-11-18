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

$(function () {
     $('#datetimepicker3').datetimepicker({
      format: 'DD-MM-YYYY',
       pickTime: false
     });
});

$(function () {
     $('#datetimepicker4').datetimepicker({
       format: 'HH:mm:ss',
       useSeconds: true,
    pickDate: false,
    pickSeconds: false,
    pick12HourFormat: false
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
    echo form_open('admin/voos/novo', $attributes);
    ?><div class="form-group"><?
    echo form_label("Nº Vôo: ", 'numero_voo', $labels);
    ?><div class="col-sm-10"><?
    echo form_input('numero_voo', '', 'id="numero_voo" class="form-control"');
    ?></div></div><div class="form-group"><?
    echo form_label("Data: ", 'data_voo', $labels);
    ?><div class="col-sm-10 input-group date datetimepickernew" id="datetimepicker3"><?
    echo form_input('data_voo', '', 'id="data_voo" class="form-control data-date-format="YYYY-MM-DD""');
    ?><span class="input-group-addon"><span class="glyphicon glyphicon-time"></span>
    </div></div><div class="form-group"><?
    echo form_label("Hora: ", 'horario_voo', $labels);
    ?><div class="col-sm-10 input-group date datetimepickernew" id="datetimepicker4"><?
    echo form_input('horario_voo', '', 'id="horario_voo" class="form-control"');
    ?><span class="input-group-addon"><span class="glyphicon glyphicon-time"></span>
    </div></div><div class="form-group"><?
    echo form_label("Quantidade Passagens: ", 'qtd_passagens', $labels);
    ?><div class="col-sm-10"><?
    echo form_input('qtd_passagens', '', 'id="qtd_passagens" class="form-control"');
    ?></div></div><div class="form-group"><div class="col-sm-offset-2 col-sm-10"><?
    echo "<br>";
    echo form_submit("","Cancelar", $submitbtn2) . " " . form_submit("","Cadastrar", $submitbtn);
    ?></div><?
    echo form_close();
  ?>
</div>
</div>
