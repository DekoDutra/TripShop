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
    		$.post(base_url+'admin/usuarios/dados', {
    			'id': id,
          '<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>'
    		}, function (data){
          $('#name').val(data.nome);
          $('#sobrenome').val(data.sobrenome);
          $('#telefone').val(data.telefone);
    			$('#email').val(data.email);
          $('#logradouro').val(data.logradouro);
          $('#cep').val(data.cep);
          $('#rg').val(data.rg);
          $('#cpf').val(data.cpf);
    			$('#id').val(data.id);//aqui eu seto a o input hidden com o id do cliente, para que a edição funcione. Em cada tela aberta, eu seto o id do cliente.
    		}, 'json');
    	}

    	function janelaEditar(id){

    		//antes de abrir a janela, preciso carregar os dados do cliente e preencher os campos dentro do modal
    		carregaDadosJSon(id);

	    	$('#modalEditar').modal('show');
    	}

      function deletar(id){

            $.post(base_url+'admin/usuarios/deletar', {
                id: id,
                '<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>'
            }, function (data){
                $('#id').val(data.id);//aqui eu seto a o input hidden com o id do cliente, para que a edição funcione. Em cada tela aberta, eu seto o id do cliente.
            }, 'json');
        }

    </script>

  <div class="container-fluid">
  <blockquote>
    <p>Administração de todos os Usuarios cadastrados!</p>
    <footer>Someone famous in <cite title="Source Title">Source Title</cite></footer>
    <a href="/tripshop/adicionar/cadastrar_usuario">Novo Usuario <span class="glyphicon glyphicon-plus"></span></a>
  </blockquote>
    <table class="table table-striped table-fluid ">
                <tr>
                    <th>ID</th>
                    <th>Nome Completo</th>
                    <th>Telefone</th>
                    <th>E-mail</th>
                    <th>Logradouro</th>
                    <th>CEP</th>
                    <th>RG</th>
                    <th>CPF</th>
                    <th class="table-iconcell">Editar</th>
                    <th class="table-iconcell">Deletar</th>
                </tr>
                <? foreach ($seleciona -> result() as $seleciona): ?>
                    <tr>
                        <td><?= $seleciona->id ?></td>
                        <td><?= $seleciona->nome ?> <?= $seleciona->sobrenome ?></td>
                        <td><?= $seleciona->telefone ?></td>
                        <td><?= $seleciona->email ?></td>
                        <td><?= $seleciona->logradouro ?></td>
                        <td><?= $seleciona->cep ?></td>
                        <td><?= $seleciona->rg ?></td>
                        <td><?= $seleciona->cpf ?></td>
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
	        <h4 class="modal-title">Editar Usuario</h4>
	      </div>
	      <div class="modal-body">
          <?php
            $attributes = array('class'=>"form-horizontal",'role' => 'form', 'id' => 'formulario_editnew', 'method' => 'POST');
            $inputs = 'class="form-control"';
            $labels = array('class' => 'col-sm-2' );
            $submitbtn = 'class = "btn btn-default btn_novo"';
            echo form_open('admin/usuarios/salvar', $attributes);
            ?><div class="form-group"><?
            echo form_label("Nome: ", 'nome', $labels);
            ?><div class="col-sm-10"><?
            echo form_input('nome', '', 'id="name" class="form-control"');
            ?></div></div><div class="form-group"><?
            echo form_label("Sobrenome: ", 'sobrenome', $labels);
            ?><div class="col-sm-10"><?
            echo form_input('sobrenome', '', 'id="sobrenome" class="form-control"');
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
