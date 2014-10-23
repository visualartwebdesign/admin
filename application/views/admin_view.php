<div class="container">
  <div class="row clearfix">

	<ol class="breadcrumb">
	  <li><a href="">Home</a></li>
	  <li class="active"><?= ucwords($nombre); ?></li>
	</ol>

	<?php $ube=base_url('/index.php/admin/add/'. $nombre ); ?>

  <h1><strong> <?= ucwords($nombre); ?> </strong> <a style="float:right" href="<?= $ube ?>" data-toggle="tooltip" data-placement="top" title="Agregar"> <button type="button" class="btn btn-success btn-sm col-lg-offset-1"> Agregar
              </button> </a></h1>
  
  <hr>
  </div>

    <div class="row clearfix">


<div class="info"></div>
<table class="table table-hover" width="100%" id="tabla">
        <thead>
		<tr>
			<?php
			foreach ($titulos as $key) {
				$key=array_values($key);
				$titulo=$str = str_replace("_", " ", $key[0]);
				echo "<td><strong>". $titulo . "</strong></td>";
			}
			?>
			<td><strong> Acciones </strong></td>
        </tr>
        </thead>

        <tbody>
        <?php

        foreach ($tabla as $fila){
        	#convierte array('indice'=>'valor','indice1'=>'valor') a array(0=>'valor',1=>'valor')
        	$fila=array_values($fila);
        	$largo=count($fila);
        	$borrar=base_url('index.php/admin/del/' . $nombre . "/" . $fila[0]);
        	$editar=base_url('index.php/admin/edit/' . $nombre . "/" . $fila[0]);

        	#muestra los valores de la tabla
		    echo "<tr>";
		    for($i=0;$i<$largo;$i++){
		        echo "<td>" . $fila[$i] . "</td>";
		        }
		         
		    #muestra los botones de edicion y borrado
		    echo<<<HTML
		          <td width="16%"><a href=$editar data-toggle="tooltip" data-placement="top" title="Editar"> <button type="button" class="btn btn-primary btn-sm col-lg-offset-1"><strong> Editar</strong>
		              </button> </a> <a href=$borrar title="Eliminar" onclick="return confirm('¿Esta seguro que desea eliminarlo?')" data-toggle="tooltip" data-placement="top"  > <button type="button" class="btn btn-danger btn-sm col-lg-offset-1"><strong> Borrar</strong>
		              </button>
		              </a>
		          </td>
		        </tr>
HTML;
    	}

        ?>


        </tbody>
        </table>
 </div>
 <div class="row clearfix">

 </div>

</div>

</body>

<footer>
<!-- DATATABLES -->

    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/datatables/css/jquery.dataTables.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/datatables/css/dataTables.fixedHeader.css') ?>">
    <link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/colvis/1.1.1/css/dataTables.colVis.css">
    <script type="text/javascript" language="javascript" src="<?= base_url('assets/datatables/js/jquery.dataTables.min.js') ?>"> </script>
    <script type="text/javascript" language="javascript" src="http://cdn.datatables.net/colvis/1.1.1/js/dataTables.colVis.min.js"> </script>
    <script type="text/javascript" language="javascript" src="<?= base_url('assets/datatables/js/dataTables.colVis.js') ?>"> </script>


   <script type="text/javascript" charset="utf-8"> 

$(document).ready(function() {
var table=$('#tabla').dataTable( {
	"language": {
        "sProcessing":    "Procesando...",
        "sLengthMenu":    "Mostrar _MENU_ registros",
        "sZeroRecords":   "No se encontraron resultados",
        "sEmptyTable":    "Ningún dato disponible en esta tabla",
        "sInfo":          "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":     "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":  "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":   "",
        "sSearch":        "Buscar:",
        "sUrl":           "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":    "Último",
            "sNext":    "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    },
"bPaginate": true ,
"bLengthChange": true,
"bFilter": true,
"bSort": true,
"bInfo": true,

        });


var colvis = new $.fn.dataTable.ColVis( table );
 
 $( colvis.button() ).insertAfter('div.info');



} );



/*
var tabla=	$('#tablaClientes').dataTable( {
"language": {
        "sProcessing":    "Procesando...",
        "sLengthMenu":    "Mostrar _MENU_ registros",
        "sZeroRecords":   "No se encontraron resultados",
        "sEmptyTable":    "Ningún dato disponible en esta tabla",
        "sInfo":          "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":     "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":  "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":   "",
        "sSearch":        "Buscar:",
        "sUrl":           "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":    "Último",
            "sNext":    "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    },
"bPaginate": true ,
"bLengthChange": true,
"bFilter": true,
"bSort": true,
"bInfo": true } );
} );
*/
</script> 

<!-- Fin Datetables -->