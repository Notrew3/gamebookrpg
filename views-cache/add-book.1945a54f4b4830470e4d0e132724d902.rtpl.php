<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<h1>Criar novo Livro</h1>
	<hr>
	<div class="col-xs-2">
	</div>
	<div class="col-xs-8">
	<form action="/painel/add-book" method="post">
	      <div class="form-group has-feedback">
	        <input type="text" class="form-control" placeholder="Nome do Livro" name="nome">
	        <span class="glyphicon glyphicon-book form-control-feedback"></span>
	      </div>
	      <div class="form-group has-feedback">
	        <input type="password" class="form-control" placeholder="Categoria" name="categoria">
	        <span class="glyphicon glyphicon-list form-control-feedback"></span>
	      </div>	      
	        <!-- /.col -->
	        <div class="col-xs-12">
	          <button type="submit" class="btn btn-primary btn-block btn-flat">Criar</button>
	        </div>
	        <!-- /.col -->
	      </div>
	</form>
</div>

</div>