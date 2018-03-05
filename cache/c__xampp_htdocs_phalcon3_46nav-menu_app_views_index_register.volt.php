<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Phalcon PHP Framework</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" type="text/css"/>
         <!--Botones para exportar en datatable-->
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css" type="text/css"/>
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo $this->url->get('img/favicon.ico')?>"/>
    </head>
    <body>

        <nav class="navbar navbar-default navbar-inverse" role="navigation">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">Curso Phalcon 3</a>
            </div>
            <?= $this->elements->getMenu() ?>
          </div>
        </nav>

        <div class="container">
          

<div class="well row">
  <div class="col-md-6 col-md-offset-3">

    <h2 class="text-center text-muted">Formulario de registro</h2>

    <?= $this->getContent() ?>

    <?= $this->tag->form(['class' => 'form-login']) ?>
    <input type="hidden" id="token" name="<?= $this->security->getTokenKey() ?>" value="<?= $this->security->getToken() ?>">

    <div class="col-md-12">
      <?= $form->label('username') ?>
      <?= $form->render('username') ?>
    </div>

    <div class="col-md-12">
      <?= $form->label('email') ?>
      <?= $form->render('email') ?>
    </div>

    <div class="col-md-12">
      <?= $form->label('password') ?>
      <?= $form->render('password') ?>
    </div>

    <div class="col-md-12" style="margin-top : 20px">
      <?= $form->render('Registro') ?>
    </div>
  </div>
</div>

<div class="well row">
  <div class="col">

    <h2 class="text-center text-muted">Listado de Registrados</h2>

    <div class="col-md-12">
      <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
        <thead class="thead-dark">
          <tr>
            <th>Opciones</th>
            <th>id</th>
            <th>username</th>
            <th>email</th>
            <th>password</th>
        </tr>
        <thead>
        <tbody>
        </tbody>
      </table>
    </div>
  </div>

</div>

        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!--<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>-->
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <!--Botones para exportar en datatable-->
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
        <script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
        
        <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>

         
<script type="text/javascript">

$(document).ready(function() {
  var table = $('#tbllistado').DataTable({
    'serverSide': true,
    'ajax': {
      'url': "listar",
      'method': 'POST'
    },
    'dom': 'Bfrtip',
    'buttons': [
      {'extend': 'copyHtml5', 'text': 'Copiar'},
      { 'extend': 'excelHtml5', 'title': 'Listado' },
      'csvHtml5',
      {'extend': 'pdf', 'title': 'Listado'},

        ],

    "oLanguage": {
           "sSearch": "Buscar",
           "oPaginate" : { "sPrevious" : "Anterior", "sNext" : "Siguiente"},
           "sPaginationType" : "Pagina",
           "sInfo": "Listando _PAGE_ de _PAGES_",
           "sInfoEmpty": "No hay registros disponibles",
           "buttons" : { "copyTitle" : "Copiando a Portapapeles"}
         },

    'columns': [
      {      "targets": -1,
              "data": null,
              "defaultContent": "<button class='btn btn-warning' ><i class='fas fa-edit'></i></button> <button class='btn btn-danger' ><i class='fas fa-trash-alt'></i></button>"
          },
      {'data': "id", 'searchable': false},
      {'data': "username"},
      {'data': "email"},
      {'data': "password", 'searchable': false}
    ]
  });

    $('#tbllistado').on( 'click', '.btn-warning', function (e) {
      e.preventDefault();
      console.log("Editar " +  $(this).parents('tr')[0].childNodes[1].innerHTML);
    } );

    $('#tbllistado').on( 'click', '.btn-danger', function (e) {
      e.preventDefault();
      console.log("Eliminar " +  $(this).parents('tr')[0].childNodes[1].innerHTML);
    } );

});

</script>

    </body>
</html>
