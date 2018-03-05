var listar = function() {
var tabla = $('#tbllistado').DataTable(
  {
    "aProcessing": true, //Activamos el procesamiento del datables
    "aServerSide": true, //Paginación y filtrado realizados por el servidor
    dom: 'Bfrtip', //Definimos los elementos del control de tabla
    buttons: [
              'copyHtml5',
              { extend: 'excelHtml5', title: 'Listado' },
              'csvHtml5',
              {extend: 'pdf', title: 'Listado'}
          ],
    select: true,
    "ajax":
        {
          url: "index/listar",
          type: "post",
          dataType: "json",
          error: function(e){
            console.log(e.responseText);
          }
        },
    "bDestroy": true,
    "iDisplayLength": 8, //Paginación
    "order": [[0, "desc"]]  //Ordenar (columna, orden)
  }
);
}
listar();
