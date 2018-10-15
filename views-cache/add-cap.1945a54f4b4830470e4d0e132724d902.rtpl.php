<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Livro - <?php $counter1=-1;  if( isset($book) && ( is_array($book) || $book instanceof Traversable ) && sizeof($book) ) foreach( $book as $key1 => $value1 ){ $counter1++; ?><?php echo htmlspecialchars( $value1["nome_livro"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/painel"><i class="fa fa-dashboard"></i> Home</a>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-6">
  		<div class="box box-primary">
            
            <div class="box-header">
              Adcionar Capítulo
            </div>

            <div class="box-body no-padding">
              <div class="col-xs-12">
  <form action="/painel/my-books/add-cap" method="post">
        <div class="form-group has-feedback">
          <input type="text" class="form-control" placeholder="Título do capitulo" name="titulo_cap">
          <span class="glyphicon glyphicon-book form-control-feedback"></span>
        </div>

        <div class="form-group has-feedback">
          <input type="text" class="form-control" placeholder="Subtitulo do Capítulo -- Opcional" name="sub_cap" value="">
          <span class="glyphicon glyphicon-book form-control-feedback"></span>
        </div>

        <input type="hidden" name="id_book" value="<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
        
        
          <div class="form-group has-feedback">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Criar</button>
          </div>
          <!-- /.col -->
        </div>
  </form>
  <?php } ?>
</div>
              
            </div>
            <!-- /.box-body -->
          </div>
  	</div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->