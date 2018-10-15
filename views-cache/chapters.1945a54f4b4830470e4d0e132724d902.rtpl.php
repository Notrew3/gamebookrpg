<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <?php echo htmlspecialchars( $chapters["0"]["nome_livro"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/painel"><i class="fa fa-dashboard"></i> Home</a>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-9">
  		<div class="box box-primary">
            
            <div class="box-header">
              <a href="/painel/add-book" class="btn btn-success">Cadastrar Livro</a>
            </div>

            <div class="box-body no-padding">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Nome do capitulo</th>
                    <th>Sub Titulo</th>
                    <th>Resumo</th>
                    <th>Ações</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $counter1=-1;  if( isset($chapters) && ( is_array($chapters) || $chapters instanceof Traversable ) && sizeof($chapters) ) foreach( $chapters as $key1 => $value1 ){ $counter1++; ?>
                  <tr>
                    <td><?php echo htmlspecialchars( $value1["titulo"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php echo htmlspecialchars( $value1["sub_titulo"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php echo htmlspecialchars( $value1["texto"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td>
                      <a href="/painel/my-books/<?php echo htmlspecialchars( $value1["id_livro"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/add_page" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Paginas</a>
                      <a href="#" onclick="return confirm('Deseja realmente excluir este registro?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Excluir</a>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
  	</div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->