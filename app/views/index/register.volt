
{% extends "templates/index.volt" %}

{% block content %}

<div class="well row">
  <div class="col-md-6 col-md-offset-3">

    <h2 class="text-center text-muted">Formulario de registro</h2>

    {{ content() }}

    {{ form("class" : "form-login") }}
    <input type="hidden" id="token" name="{{ security.getTokenKey() }}" value="{{ security.getToken() }}">

    <div class="col-md-12">
      {{ form.label("username") }}
      {{ form.render("username") }}
    </div>

    <div class="col-md-12">
      {{ form.label("email") }}
      {{ form.render("email") }}
    </div>

    <div class="col-md-12">
      {{ form.label("password") }}
      {{ form.render("password") }}
    </div>

    <div class="col-md-12" style="margin-top : 20px">
      {{ form.render("Registro") }}
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
{% endblock %}

{% block scripts  %}
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
{% endblock %}
