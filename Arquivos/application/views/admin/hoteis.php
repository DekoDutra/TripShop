      <script>

    	$(function(){
    		$('#formulario_editnew').ajaxForm({
    			success: function(data) {
    				if (data == 1) {

    					//se for sucesso, simplesmente recarrego a página.
    					document.location.href = document.location.href;
              alert("Ação finalizada com sucesso!");
    				}
    			}
    		});
    	});

    	//Aqui eu seto uma variável javascript com o base_url do CodeIgniter, para usar nas funções do post.
    	var base_url = "<?= base_url() ?>";

	    /*
	     *	Esta função serve para preencher os campos do cliente na janela flutuante
	     * usando jSon.
	     */
    	function carregaDadosJSon(id){
    		$.post(base_url+'admin/hoteis/dados', {
    			'id': id,
          '<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>'
    		}, function (data){
          $('#name').val(data.nome);
          $('#estrelas').val(data.estrelas);
          $('#quartos').val(data.quartos);
    			$('#quartos_vagos').val(data.quartos_vagos);
    			$('#id').val(data.id);//aqui eu seto a o input hidden com o id do cliente, para que a edição funcione. Em cada tela aberta, eu seto o id do cliente.
    		}, 'json');
    	}

    	function janelaEditar(id){

    		//antes de abrir a janela, preciso carregar os dados do cliente e preencher os campos dentro do modal
    		carregaDadosJSon(id);

	    	$('#modalEditar').modal('show');
    	}

      function deletar(id){

            $.post(base_url+'admin/hoteis/deletar', {
                id: id,
                '<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>'
            }, function (data){
                $('#id').val(data.id);//aqui eu seto a o input hidden com o id do cliente, para que a edição funcione. Em cada tela aberta, eu seto o id do cliente.
            }, 'json');
        }

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
    <p>Administração de todos os Hotéis cadastrados!</p>
    <footer>Someone famous in <cite title="Source Title">Source Title</cite></footer>
    <a href="/tripshop/adicionar/cadastrar_hotel">Novo hotel <span class="glyphicon glyphicon-plus"></span></a>
  </blockquote>
    <table class="table table-striped table-fluid ">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Estrelas</th>
                    <th>Quartos</th>
                    <th>Quartos Vagos</th>
                    <th class="table-iconcell">Editar</th>
                    <th class="table-iconcell">Deletar</th>
                </tr>
                <? foreach ($seleciona -> result() as $seleciona): ?>
                    <tr>
                        <td><?= $seleciona->id ?></td>
                        <td><?= $seleciona->nome ?></td>
                        <td><?= $seleciona->estrelas ?></td>
                        <td><?= $seleciona->quartos ?></td>
                        <td><?= $seleciona->quartos_vagos ?></td>
                        <td><a href="javascript:;" onclick="janelaEditar(<?= $seleciona->id ?>)"><span class="glyphicon glyphicon-pencil"></span></td>
                        <td><a href="javascript:;" onclick="deletar(<?= $seleciona->id ?>)"><span class='glyphicon glyphicon-trash'></span></td>
                    </tr>
                <? endforeach; ?>
              </table>
          </div>
        </div>
    </div><!-- /.container -->


	<div class="modal fade bs-example-modal-lg" id="modalEditar" >
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fechar</span></button>
	        <h4 class="modal-title">Editar hotel</h4>
	      </div>
	      <div class="modal-body">
          <?php
            $attributes = array('class'=>"form-horizontal",'role' => 'form', 'id' => 'formulario_editnew', 'method' => 'POST');
            $inputs = 'class="form-control"';
            $labels = array('class' => 'col-sm-2' );
            $submitbtn = 'class = "btn btn-default btn_novo"';
            echo form_open('admin/hoteis/salvar', $attributes);
            ?><div class="form-group"><?
            echo form_label("Nome: ", 'nome', $labels);
            ?><div class="col-sm-10"><?
            echo form_input('nome', '', 'id="name" class="form-control"');
            ?></div></div><div class="form-group"><?
            echo form_label("Estrelas: ", 'estrelas', $labels);
            ?><div class="col-sm-10"><?
            echo form_input('estrelas', '', 'id="estrelas" class="form-control"');
            ?></div></div><div class="form-group"><?
            echo form_label("Quartos: ", 'quartos', $labels);
            ?><div class="col-sm-10"><?
            echo form_input('quartos', '', 'id="quartos" class="form-control"');
            ?></div></div><div class="form-group"><?
            echo form_label("Quartos Vagos: ", 'quartos_vagos', $labels);
            ?><div class="col-sm-10"><?
            echo form_input('quartos_vagos', '', 'id="quartos_vagos" class="form-control"');
            ?></div></div><div class="form-group"><?
            echo form_label("ID: ", 'id', $labels);
            ?><div class="col-sm-10"><?
            echo form_input('id', '', 'id="id" class="form-control" readonly');
            ?></div></div>
            <div class="form-group"><div class="col-sm-offset-2 col-sm-10"><?
            ?></div><?
            echo form_close();
          ?>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
	        <button type="button" class="btn btn-primary" onclick="$('#formulario_editnew').submit()">Salvar Alterações</button>
	      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
