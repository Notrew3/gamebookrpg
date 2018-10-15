<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <?php echo htmlspecialchars( $book["0"]["nome_livro"], ENT_COMPAT, 'UTF-8', FALSE ); ?>		
  </h1>
  <h4>
  	<?php echo htmlspecialchars( $book["0"]["titulo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
  </h4>
  <ol class="breadcrumb">
    <li><a href="/painel"><i class="fa fa-dashboard"></i> Home</a>
  </ol>
</section>

	<section class="content">
		

		<div class="row">
  	<div class="col-md-6">
  		<div class="box box-primary">
            
            <div class="box-header">
              Adcionar Página
            </div>

            <div class="box-body no-padding">
              <div class="col-xs-12">
  <form action="/painel/my-books/add-cap" method="post">
        <div class="form-group has-feedback">
          <textarea name="pagina">
          	
          </textarea>
        </div>

        <input type="hidden" name="id_chapter" value="<?php echo htmlspecialchars( $book["0"]["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
        
        
          <div class="form-group has-feedback">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Adicionar Página</button>
          </div>
          <!-- /.col -->
        </div>
  </form>
  
</div>
              
            </div>
            <!-- /.box-body -->
          </div>
  	</div>
  </div>

</div>
<!-- /.content-wrapper -->