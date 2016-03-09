<?php
session_start();
include("../server/functions/ov_constants.php");

if(check_admin_login()) { 
	header("location:seguir.php");
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>SER COFRADE 2015 - Guía Semana Santa - Cadena SER Ciudad Real</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, maximum-scale=3.0, minimum-scale=1.0, initial-scale=1.0, user-scalable=yes">
<meta name="robots" content="NOINDEX,NOFOLLOW,NOARCHIVE,NOODP,NOSNIPPET">
<meta name="description" content="SER COFRADE 2015, La guía de información para la Semana Santa Ciudad Real 2015. Procesiones, Cofradías, Horarios, Recorridos, Información...">
<META name="CACHE-CONTROL" content="NO-CACHE">
<META name="EXPIRES" content="-1">
<link id="ov_style_link_01" href="../styles/styles_01_complete.css" rel="stylesheet" type="text/css">	
<script src="../js/jquery.js"></script>
<script src="../js/jqueryui.js"></script>
<script src="../js/general.js"></script>

<script type="text/javascript">
function ov_login()
{	
	var pass=$("#ov_passw").val();
	
	if($.trim(pass)=="")
	{
		alert("Contraseña obligatoria");
		return false;
	}
	
	$("#ov_load_access_01").show();
	
	var values=$("#ov_form_acc_01").serialize();
	
	if(!ajax_operation(values,"acceso"))
	{
		alert("Contraseña incorrecta");
		$("#ov_load_access_01").hide();
		return false;
	}
	
	$("#ov_load_access_01").hide();
	
	window.location.href="seguir.php";
}
</script>
</head>

<body class="ov_body_01" style="background-color:#eee">
	
	<div class="ov_zone_08">">&nbsp;</div>
	
	<div class="ov_view_container_01" style="display:block">

		<div class="ov_zone_15">
			<div class="ov_vertical_space_05">&nbsp;</div>
			<!-- decorative -->
			<div id="ov_zone_03_1" class="ov_zone_03">
			</div>
			<div class="ov_vertical_space_01">&nbsp;</div>
			<div id="ov_zone_04_1" class="ov_zone_04">
			</div>
			<div class="ov_vertical_space_01">&nbsp;</div>
			<!-- fin decorative -->
			
			<div class="ov_text_02" style="width: 90%; max-width:400px; height: 100px; margin:auto;background-color:#fff">
						
				<div class="ov_box_04">
					<div id="ov_text_03_1" class="ov_text_03"><br>SEGUIMIENTO EN TIEMPO REAL</div>
				</div>
				
				<div class="ov_box_05">
					<img src="../styles/images/movil.png" id="ov_image_05_1" class="ov_image_05" alt="decorative_02">
					<div class="ov_clear_floats_01">&nbsp;</div>
				</div>
				<div class="ov_clear_floats_01">&nbsp;</div>
			</div>
			
			<div class="ov_text_02" style="width: 180px; margin:auto;">
				<p>Introduce la clave de acceso</p>
				<form id="ov_form_acc_01" name="form_acc_01" >
					<input type="password" id="ov_passw" name="passw" style="width: 175px; padding: 5px 0px;" value="" onkeyup="if(event.keyCode == 13){ov_login();}"/>
					<p><input type="button" class="ov_button_01" value="ENTRAR" onclick="ov_login();"/></p>
					
					<img src="../styles/images/loader_02.gif" id="ov_load_access_01" class="ov_image_06" alt="arrow_02" style="display:none" />
					
				</form>	
			</div>
		</div>
	</div>
	<div id="ov_view_container_02" class="ov_view_container_02">&nbsp;</div>	
</body>
</html>
