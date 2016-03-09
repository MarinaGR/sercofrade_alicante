<?php
session_start();
include("../server/functions/ov_constants.php");

if(!check_admin_login()) { 
	header("location:index.php");
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
function ov_close_session()
{	
	if(!ajax_operation("","cs"))
	{
		return false;
	}	
	window.location.href="index.php";
}
function ov_load_proce()
{	
	var procesion=$("#ov_select").val();
	var nom_procesion=$("#ov_select option:selected").text();
	
	if($.trim(procesion)=="")
	{
		alert("Elija una procesión");
		return false;
	}
	
	$("#ov_view_container_01").hide();
	
	$("#ov_zone_geoloc_01").html('<div class="ov_text_01"><br>'+nom_procesion+'</div>');
	$("#ov_zone_geoloc_02").html('');
	$("#ov_zona_volver_01").show();
	$("#ov_view_container_02").show();
}

function ov_update_loc()
{		
	$("#ov_zone_geoloc_02").html('');
	$("#ov_load_access_02").show();
	
	if (navigator.geolocation)
	{
		/*navigator.geolocation.getCurrentPosition(ov_update_position,error_position_3,{enableHighAccuracy:true, maximumAge:0, timeout:50000});*/
		
		var watchId=navigator.geolocation.watchPosition(ov_update_position,error_position_3,{enableHighAccuracy:true, timeout:50000});
		
		setTimeout(function(){
			navigator.geolocation.clearWatch(watchId);
		},10000);
						
		$("#ov_zone_geoloc_02").html('<div class="ov_text_02" style="font-size: 1.3em;"><br>Actualizando posición...</div>');
	}
	else
	{
		$("#ov_zone_geoloc_02").html('<div class="ov_text_02" style="font-size: 1.3em;"><br>Lo sentimos, pero tu dispositivo no permite geolocalización.</div>');			
	}
	
}
function ov_update_position(position)
{
	$("#ov_zone_geoloc_02").html('<div class="ov_text_02"><br>Actualizando...</div>');

	var latitude = position.coords.latitude;
	var longitude = position.coords.longitude;
	var latlong = latitude+","+longitude;
	
	var values="c1="+$("#ov_select").val()+"&c7="+latlong+"&table=h_tracking_events";
	
	var result=ajax_operation(values,"geoloc");
	if(!result)
	{
		$("#ov_load_access_02").hide();
		$("#ov_zone_geoloc_02").html('<div class="ov_text_02"><br>Se ha producido un error al actualizar la base de datos</div>');
		return false;
	}
	else
	{
		$("#ov_load_access_02").hide();
		$("#ov_zone_geoloc_02").html('<div class="ov_text_02" style="font-size: 1.3em;"><br>Posición actualizada correctamente '+result+'</div>');
	}
}
function error_position_3(error)
{
	$("#ov_load_access_02").hide();
	$("#ov_zone_geoloc_02").html('<div class="ov_text_02" style="font-size: 1.3em;"><br>La geolocalización de tu posición ha fallado.</div>');		
}
</script>

</head>

<body class="ov_body_01" style="background-color:#eee">

	<div class="ov_zone_08">">&nbsp;</div>
	
	<div class="ov_view_container_01" style="display:block">
		
		<div id="ov_zona_volver_01" class="ov_zone_11_b" style="display:none">
			<div id="ov_text_volver_01" class="ov_text_11">
				<img src="../styles/images/atras.png" id="ov_image_09_1" class="ov_image_09" alt="arrow_05"> volver
			</div>
			<script>
				$("#ov_text_volver_01").click(function(e){
					$("#ov_zona_volver_01").hide();
					$("#ov_view_container_01").show();
					$("#ov_view_container_02").hide();
				});
			</script>
		</div>
		
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
		</div>
	
		<div id="ov_view_container_01">		
			<div class="ov_zone_15">
				<div class="ov_text_02" style="width: 80%; min-width: 180px; margin:auto;">
					<p>Selecciona la procesión sobre la que se va realizar el seguimiento</p>
					<form id="ov_form_proce_01" name="form_proce_01">
						<select id="ov_select" style="width: 100%; padding: 5px 0px;">
							<option value=""></option>
							<option value="via_matris_event">VIA MATRIS</option>
							<option value="estudiantes_event">PROCESIÓN DE LOS ESTUDIANTES</option>
							<option value="palmas_event">LAS PALMAS</option>
							<option value="ilusion_event">PROCESIÓN DE LA ILUSIÓN</option>
							<option value="esperanza_event">PROCESIÓN DE LA ESPERANZA</option>
							<option value="estrella_event">PROCESIÓN DE LA ESTRELLA</option>
							<option value="medinaceli_event">PROCESIÓN DEL MEDINACELI</option>
							<option value="miserere_event">PROCESIÓN DEL MISERERE</option>
							<option value="silencio_event">PROCESIÓN DEL SILENCIO</option>
							<option value="batallas_event">CRISTO DE LAS BATALLAS</option>
							<option value="madrugada_event">PROCESIÓN DE LA MADRUGADA</option>
							<option value="pasos_event">PROCESIÓN DE LOS PASOS</option>
							<option value="via_crucis_event">VIA CRUCIS</option>
							<option value="pasion_event">PASIÓN Y SANTO ENTIERRO</option>
							<option value="soledad_event">PROCESIÓN DE LA SOLEDAD</option>
							<option value="resucitado_event">PROCESIÓN DEL RESUCITADO</option>
						</select>
						<br><br>
						<div class="ov_vertical_space_04">&nbsp;</div>
						<div class="ov_zone_07" onclick="ov_load_proce();">
							<div class="ov_text_05">
								OK&nbsp;&nbsp;<img src="../styles/images/flechas2.png" id="ov_image_06_1" class="ov_image_06" alt="arrow_02">
							</div>
						</div>
						
					</form>	
				</div>
			</div>
		</div>	
		  
		<div id="ov_view_container_02" style="display:none">
			<div class="ov_zone_15">
				<div style="width: 80%; min-width: 180px; text-align:center; margin: auto;">
					<div id="ov_zone_geoloc_01" class="ov_zone_15">
						&nbsp;
					</div>
					<div id="ov_zone_geoloc_02" class="ov_zone_15">
						&nbsp;
					</div>
				</div>
				<div style="width: 80%; min-width: 180px; margin:auto;">
				
				<img src="../styles/images/loader_02.gif" id="ov_load_access_02" class="ov_image_06" alt="arrow_02" style="display:none" />
				
					<div id="ov_zone_geoloc_03" class="ov_zone_15">
						
						<!--<input type="button" class="ov_button_01" value="ACTUALIZAR POSICIÓN" onclick="ov_update_loc();"/>	-->
						<div class="ov_vertical_space_05">&nbsp;</div>
						<div class="ov_zone_07" onclick="ov_update_loc();">
							<div class="ov_text_05">
								ACTUALIZAR POSICIÓN&nbsp;&nbsp;<img src="../styles/images/flechas2.png" id="ov_image_06_1" class="ov_image_06" alt="arrow_02">
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>	
	</div>

</body>
</html>
