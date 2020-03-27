<head>
    <script src="https://smtpjs.com/v3/smtp.js"></script>  
</head>
<?php 
$p = PostData::getById($_GET["product_id"]);

 ?>


<section>
  <div class="container">

  <div class="row">
  <div class="col-md-3">




<?php if(count($cats)>0):?>
<div class="list-group">
<?php foreach($cats as $cat):?>

  <a href="index.php?view=products&cat=<?php echo $cat->short_name; ?>" class="list-group-item"><i class="fa fa-chevron-right"></i>  <?php echo $cat->name; ?></a>
<?php endforeach; ?>
</div>
<?php endif; ?>
  </div>
  <div class="col-md-9">

              <h2 class="entry-title"><span><?php echo $p->name; ?></span></h2>

<!--
              <div class="breadcrumb">
                <span></span>
                <a href="./">Inicio</a>
                <span class="crumbs-spacer"><i class="fa fa-angle-double-right"></i></span>
                <span class="current"><?php echo $p->name; ?></span>
              </div>
              -->
<br>
<?php if($p!=null):
$img = "admin/storage/products/".$p->image;
if($p->image==""){
  $img=$img_default;
}
?>
  <div class="row">
  <div class="col-md-12">
 <center>   <img src="<?php echo $img; ?>"  class="img-responsive"  ></center>

  </div>

  </div>
  <br><br>
  <div class="row">
  <div class="col-md-12">
  <hr>
  <h4>Codigo: <?php echo $p->code; ?></h4>
  <p><?php echo $p->description; ?></p>
  
  <div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Cotiza</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
        <i class="fa fa-chevron-right"></i>
          <input type="text" id="name" class="form-control validate">
          <label data-error="wrong" data-success="right" for="form34">Nombre</label>
        </div>

        <div class="md-form mb-5">
        <i class="fa fa-chevron-right"></i>
          <input type="email" id="mail" class="form-control validate">
          <label data-error="wrong" data-success="right" for="form29">Correo</label>
        </div>

        <div class="md-form mb-5">
  
        <i class="fa fa-chevron-right"></i>

	<input  type="text" id="codigo" class="form-control validate" disabled  value= "<?php echo $p->code?>" >

          <label data-error="wrong" data-success="right" for="form29">Codigo Articulo</label>


        </div>



        <div class="md-form">
        <i class="fa fa-chevron-right"></i>
          <textarea type="text" id="cotizacion" class="md-textarea form-control" rows="4"></textarea>
	  <label data-error="wrong" data-success="right" for="form8">Mensaje de cotizacion</label>
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button  onclick="sendMail(document.getElementById('name').value,document.getElementById('mail').value,document.getElementById('cotizacion').value,document.getElementById('codigo').value)" class="btn btn-unique">Enviar <i class="fa fa-chevron-right"></i></button>
      </div>
    </div>
  </div>
</div>

<div class="text-center">
  <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalContactForm">COTIZA</a>
</div>



<script>
function sendMail(name,mail,cotizacion,codigo) {
	Email.send({
	Host: "smtp.gmail.com",
	Username : "acarrasco@excel.mx",
	Password : "Perseo2#kimera",
	To : 'acarrasco@excel.mx',
	From : "ecommerce@excel.mx",//No acepta espacion en blanco
	Subject : "Cotizacion Portal ecommerce Excel",
	Body : "Nombre del contacto:"+" "+name+"<br>"+"Correo:"+" "+mail+"<br>"+"Mensaje de contizacion: "+" "+cotizacion+"<br>"+"Codigo del producto seleccionado: "+codigo,
	}).then(
		message => alert("El mensaje se mando correctamente"),
	);      

window.setTimeout(function(){

        // Move to a new location or you can do something else
        window.location.href = "http://ecommerce.excel.mx";

    }, 5000);
}
</script>
<?php endif; ?>



  </div>
  </div>


  </div>
  </section>
<br>
