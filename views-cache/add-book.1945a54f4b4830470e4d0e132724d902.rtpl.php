<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<h1>Criar novo Livro</h1>
	<hr>
	
	<div class="col-xs-5">
	<form action="/painel/add-book" method="post">
	      <div class="form-group has-feedback">
	        <input type="text" class="form-control" placeholder="Nome do Livro" name="nome">
	        <span class="glyphicon glyphicon-book form-control-feedback"></span>
	      </div>
	      
	      <div class="form-group has-feedback">
	        <select name="categoria" class="form-control">
	        	<option value="" selected>--Selecione a Categoria--</option>
	        	<?php $counter1=-1;  if( isset($categories) && ( is_array($categories) || $categories instanceof Traversable ) && sizeof($categories) ) foreach( $categories as $key1 => $value1 ){ $counter1++; ?>
	        	<option value="<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
	        	<?php } ?>
	        </select>
	       </div>	      
	        <!-- /.col -->
	        <div class="form-group has-feedback">
	          <button type="submit" class="btn btn-primary btn-block btn-flat">Criar</button>
	        </div>
	        <!-- /.col -->
	      </div>
	</form>
</div>

</div>