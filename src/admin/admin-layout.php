<?php 
function admin_header($stylePath, $breadcrumb = null) 
{  
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<title><?= admin_tag_title($breadcrumb); ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= $stylePath; ?>/assets/components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= $stylePath; ?>/assets/components/bootstrap/dist/css/bootstrap-select.css">
  <link rel="stylesheet" href="<?= $stylePath; ?>/assets/components/bootstrap/dist/css/bootstrap-tagsinput.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= $stylePath; ?>/assets/components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= $stylePath; ?>/assets/components/Ionicons/css/ionicons.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?= $stylePath; ?>/assets/components/iCheck/all.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= $stylePath; ?>/assets/components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="<?= $stylePath; ?>/assets/components/datatables.net/css/responsive.bootstrap.min.css">
  <link rel="stylesheet" href="<?= $stylePath; ?>/assets/components/datatables.net/css/responsive.dataTables.min.css">
  <!-- Datetimepicker -->
  <link rel="stylesheet" href="<?= $stylePath; ?>/assets/components/datetimepicker/css/datetimepicker.css">
  <!-- select2 -->
  <link rel="stylesheet" href="<?= $stylePath; ?>/assets/components/select2/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= $stylePath; ?>/assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?= $stylePath; ?>/assets/dist/css/skins/scriptlog-skin.css">
  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <link rel="stylesheet" href="<?= $stylePath; ?>/assets/dist/css/ie10-viewport-bug-workaround.css">
  <!-- Image Preview -->
  <link rel="stylesheet" href="<?= $stylePath; ?>/assets/dist/css/imagePreview.css">
  <!-- Audio Preview -->
  <link rel="stylesheet" href="<?= $stylePath; ?>/assets/dist/css/audioPreview.css"> 
  <!-- img-radio -->
  <link rel="stylesheet" href="<?= $stylePath; ?>/assets/dist/css/img-radio.css">
  <!-- Jquery TagsInput -->
  <link rel="stylesheet" href="<?= $stylePath; ?>/assets/dist/css/jquery.tagsinput.min.css">
  <!-- wysiwyg editor-->
  <link href="<?= $stylePath; ?>/wysiwyg/summernote/summernote.min.css" rel="stylesheet">
  <!-- Jquery UI -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" integrity="sha512-aOG0c6nPNzGk+5zjwyJaoRUgCdOrfSDhmMID2u4+OIslr0GjpLKo7Xm0Ao3xmpM4T8AmIouRkqwj1nrdVsLKEQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.structure.min.css" integrity="sha512-oM24YOsgj1yCDHwW895ZtK7zoDQgscnwkCLXcPUNsTRwoW1T1nDIuwkZq/O6oLYjpuz4DfEDr02Pguu68r4/3w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.theme.min.css" integrity="sha512-9h7XRlUeUwcHUf9bNiWSTO9ovOWFELxTlViP801e5BbwNJ5ir9ua6L20tEroWZdm+HFBAWBLx2qH4l4QHHlRyg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="apple-touch-icon" sizes="57x57" href="<?= $stylePath; ?>/assets/dist/img/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="<?= $stylePath; ?>/assets/dist/img/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="<?= $stylePath; ?>/assets/dist/img/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="<?= $stylePath; ?>/assets/dist/img/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="<?= $stylePath; ?>/assets/dist/img/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="<?= $stylePath; ?>/assets/dist/img/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="<?= $stylePath; ?>/assets/dist/img/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="<?= $stylePath; ?>/assets/dist/img/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="<?= $stylePath; ?>/assets/dist/img/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="<?= $stylePath; ?>/assets/dist/img/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="144x144"  href="<?= $stylePath; ?>/assets/dist/img/android-icon-144x144.png">
<link rel="icon" type="image/png" sizes="96x96"  href="<?= $stylePath; ?>/assets/dist/img/android-icon-96x96.png">
<link rel="icon" type="image/png" sizes="72x72"  href="<?= $stylePath; ?>/assets/dist/img/android-icon-72x72.png">
<link rel="icon" type="image/png" sizes="48x48"  href="<?= $stylePath; ?>/assets/dist/img/android-icon-48x48.png">
<link rel="icon" type="image/png" sizes="36x36"  href="<?= $stylePath; ?>/assets/dist/img/android-icon-36x36.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?= $stylePath; ?>/assets/dist/img/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="<?= $stylePath; ?>/assets/dist/img/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?= $stylePath; ?>/assets/dist/img/favicon-16x16.png">
<link rel="manifest" href="<?= $stylePath; ?>/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="<?= $stylePath; ?>/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="<?= $stylePath; ?>/assets/dist/js/html5shiv.js"></script>
<script src="<?= $stylePath; ?>/assets/dist/js/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<!-- Icon -->
<link href="<?= $stylePath; ?>/favicon.ico" rel="Shortcut Icon">
<style>
  .avatar {
  vertical-align: middle;
  width: 50px;
  height: 50px;
  border-radius: 50%;
}
</style>

</head>

<body class="hold-transition skin-scriptlog sidebar-mini">
<div class="wrapper">

<?php 
}

function admin_footer($stylePath, $ubench = null)
{
    
?>
 
<footer class="main-footer">
   
    <div class="pull-right hidden-xs">
      <?php 
        echo APP_CODENAME;
       ?>
    </div>
    
    <strong>Thank you for creating with 
    <a href="https://scriptlog.my.id" target="_blank" rel="noopener noreferrer" title="Personal Blogware Platform">Scriptlog</a>
     <?php echo APP_VERSION; ?></strong>
     <strong><?=((true === APP_DEVELOPMENT) && (isset($ubench))) ? " Page generated in: ". $ubench->getTime() . " Memory usage: ".$ubench->getMemoryUsage() : "" ?></strong>
</footer>
  
  <div class="control-sidebar-bg"></div>  
</div>

<script src="<?= $stylePath; ?>/assets/components/jquery/dist/jquery.min.js"></script>
<script src="<?= $stylePath; ?>/assets/components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?= $stylePath; ?>/assets/components/bootstrap/dist/js/bootstrap-select.js"></script>
<script src="<?= $stylePath; ?>/assets/components/bootstrap/dist/js/bootstrap-tagsinput.min.js"></script>
<script src="<?= $stylePath; ?>/assets/components/datetimepicker/js/datetimepicker.js"></script>
<script src="<?= $stylePath; ?>/assets/components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= $stylePath; ?>/assets/components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?= $stylePath; ?>/assets/components/datatables.net/js/responsive.bootstrap.min.js"></script>
<script src="<?= $stylePath; ?>/assets/components/datatables.net/js/responsive.dataTables.js"></script>
<script src="<?= $stylePath; ?>/assets/components/select2/js/select2.full.min.js"></script>
<script src="<?= $stylePath; ?>/assets/dist/js/adminlte.min.js"></script>
<script src="<?= $stylePath; ?>/assets/components/iCheck/icheck.min.js"></script>
<script src="<?= $stylePath; ?>/assets/dist/js/ie10-viewport-bug-workaround.js"></script>
<script src="<?= $stylePath; ?>/assets/components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?= $stylePath; ?>/assets/components/fastclick/lib/fastclick.js"></script>
<script src="<?= $stylePath; ?>/assets/dist/js/checkFormSetting.js"></script>
<script src="<?= $stylePath; ?>/assets/dist/js/mandatory-plugin-upload.js"></script>
<script src="<?= $stylePath; ?>/assets/dist/js/mandatory-theme-upload.js"></script>
<script src="<?= $stylePath; ?>/assets/dist/js/imagevalidation.js"></script>
<script src="<?= $stylePath; ?>/wysiwyg/summernote/summernote.min.js"></script>
<script type="text/javascript" src="<?= $stylePath; ?>/assets/dist/js/jquery.uploadPreview.min.js"></script>
<script src="<?= $stylePath; ?>/assets/dist/js/img-radio.js"></script>
<script src="<?= $stylePath; ?>/assets/dist/js/jquery.tagsinput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
$(document).ready(function(){
	$('#scriptlog-table').DataTable({
		"order": [],
		"columnDefs":[
			{
				"targets":[0, 4, 5],
				"orderable":false,
			},
		],

   });
});
</script>

<script type="text/javascript">
$(document).ready(function() {
  $.uploadPreview({
    input_field: "#image-upload",
    preview_box: "#image-preview",
    label_field: "#image-label"
  });
});
</script>

<script>
$(document).ready(function() {
  $('#summernote').summernote({
    height: 300,                 
    minHeight: null,             
    maxHeight: null,             
  });
});
</script>

<script>
$(function() {
    
    //Initialize Select2 Elements
    $('.select2').select2()

    //disable contextmenu
    $('img').bind('contextmenu',function(e){return false;}); 

    //datetimepicker
    jQuery('#datetimepicker').datetimepicker({
     timepicker: false,
     format: 'Y-m-d'
    });
    
    //icheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })
    
  })

</script>

<script>
  $('#tags').tagsInput({
        width: 'auto',
        autocomplete_url: 'fetch-tags.php',
        autocomplete:{selectFirst:true,width:'100px',autoFill:true}
    });
</script>

</html>
<?php 
}