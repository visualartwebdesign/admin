<!DOCTYPE html> 
<html lang="en-US">
<head>
  <title>ADMIN</title>

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="<?= base_url('assets/css/bootstrap-responsive.css') ?>" rel="stylesheet"> 
  <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet" media="all">
  <script type="text/javascript" language="javascript" src="<?= base_url('assets/datatables/js/jquery-1.11.1.min.js') ?>"> </script>
  <script type="text/javascript" language="javascript" src="<?= base_url('assets/js/bootstrapValidator.js') ?>"> </script>

  
  <link href="<?= base_url() . "assets/css/admin/global.css" ?>" rel="stylesheet" type="text/css">
 
</head>
<body>

<nav class="navbar navbar-inverse" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="">Administrador</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      <?php
#print_r($nav);
      for($i=0;$i<count($nav);$i++){
     		$nav[$i]=array_values($nav[$i]);
     		}
      	foreach($nav as $cat){
      	$direccion=base_url('index.php/admin/view/' .  $cat[0]);
        echo"<li><a href=$direccion>" . ucwords($cat[0]) . "</a></li>";
    	}
      ?>  
      </ul>
      	}
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


<?= $body; ?>


		<hr>
		<div class="inner">
			<div class="container">
				<p align="right"><a href="#">Volver inicio</a></p>
				<p>
				</p>
			</div>
		</div>
	</footer>

	</html>