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

$(function() {
  $(".currency").maskMoney({prefix:'R$ ', thousands:'.', decimal:',', affixesStay: false});
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
    echo form_open('admin/festas/novo', $attributes);
    ?><div class="form-group"><?
    echo form_label("Casa: ", 'casa', $labels);
    ?><div class="col-sm-10"><?
    echo form_input('casa', '', 'id="casa" class="form-control"');
    ?></div></div><div class="form-group"><?
    echo form_label("Data: ", 'data', $labels);
    ?><div class="col-sm-10 input-group date datetimepickernew" id="datetimepicker3"><?
    echo form_input('data', '', 'id="data" class="form-control data-date-format="YYYY-MM-DD""');
    ?><span class="input-group-addon"><span class="glyphicon glyphicon-time"></span>
    </div></div><div class="form-group"><?
    echo form_label("Hora: ", 'hora', $labels);
    ?><div class="col-sm-10 input-group date datetimepickernew" id="datetimepicker4"><?
    echo form_input('hora', '', 'id="hora" class="form-control"');
    ?><span class="input-group-addon"><span class="glyphicon glyphicon-time"></span>
    </div></div><div class="form-group"><?
    echo form_label("Preço: ", 'preco', $labels);
    ?><div class="col-sm-10"><?
    echo form_input('preco', '', 'id="preco" class="form-control currency"');
    ?></div></div><div class="form-group"><?
    echo form_label("Festa/Atracao: ", 'festa_atracao', $labels);
    ?><div class="col-sm-10"><?
    echo form_input('festa_atracao', '', 'id="festa_atracao" class="form-control"');
    ?></div></div><div class="form-group"><div class="col-sm-offset-2 col-sm-10"><?
    echo "<br>";
    echo form_submit("","Cancelar", $submitbtn2) . " " . form_submit("","Cadastrar", $submitbtn);
    ?></div><?
    echo form_close();
  ?>
</div>
</div>
