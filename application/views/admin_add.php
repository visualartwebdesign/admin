<div class="container">
  <div class="row clearfix">

	<ol class="breadcrumb">
	  <li><a href=<?= base_url('index.php/admin/view/' . $nombre) ?>> Home</a></li>
	  <li><a href=<?= base_url('index.php/admin/view/' . $nombre) ?> ><?= ucwords($nombre); ?></a></li>
      <li class="active">Agregar <?= ucwords($nombre); ?></li>
	</ol>

  <h1><strong> Agregar <?= ucwords($nombre); ?> </strong></h1>
  
  <hr>
  </div>

    <div class="row clearfix">

<form class="form-horizontal" role="form" action=<?= base_url('index.php/admin/addValues/'); ?> method="post">
<div class="col-lg-5">

<?php
$posicion=0;

foreach($formulario as $pos=>$fila){
$comentarios=explode('-', $fila['COLUMN_COMMENT']);
$name=$fila['COLUMN_NAME'];

/*---1) Tipo de input
-----2) Nombre del label       
-----3) Validacion - cantidad de valores permitidos
-----
*/

    switch ($comentarios[0]) {
        case '1':
echo<<<HTML
           
                    <div class="form-group">
                        <label for="ejemplo_email_1">$comentarios[1]:</label>
                        <input type="text" class="form-control" id="ejemplo_email_1" maxlength=$comentarios[2] name=$pos>
                    </div>
HTML;
            break;

        case '2':
echo<<<HTML
           
                    <div class="form-group">
                        <label for="ejemplo_email_1">$comentarios[1]:</label>
                        <input type="number" class="form-control" id="ejemplo_email_1" maxlength=$comentarios[2] name=$pos>
                    </div>
HTML;
            break;

        case '3':
echo<<<HTML
           
                    <div class="form-group">
                        <label for="ejemplo_email_1">$comentarios[1]:</label>
                        <select class="form-control">
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                          name=$name
                        </select>
                    </div>
HTML;
            break;

        case '4':
echo<<<HTML
           
                    <div class="form-group">
                        <label for="ejemplo_email_1">$comentarios[1]:</label>
                        <textarea class="form-control" rows="5" name=$pos></textarea>
                    </div>
HTML;
            break;

        case '5':
echo<<<HTML
            
                    <div class="form-group">
                        <label for="ejemplo_email_1">$comentarios[1]:</label>
                        <label class="checkbox-inline" name=$pos>
                          <input type="checkbox" id="checkboxEnLinea1" value="opcion_1"> 1
                        </label>
                        <label class="checkbox-inline">
                          <input type="checkbox" id="checkboxEnLinea2" value="opcion_2"> 2
                        </label>
                        <label class="checkbox-inline">
                          <input type="checkbox" id="checkboxEnLinea3" value="opcion_3"> 3
                        </label>
                    </div>
HTML;
            break;

        
        default:
            # code...
            break;
    }
    $posicion=$pos;
}


?>
<input type="hidden" name="tabla" value=<?= $nombre ?>>

  <button type="submit" class="btn btn-primary">Aceptar</button>
</form>


 </div>
 <div class="row clearfix">

 </div>

</div>

</body>

<footer>