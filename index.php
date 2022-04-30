<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Prueba Teced!</title>
  </head>
  <body>
   <script>
   function validador(){
	   nombre = document.getElementById("exampleInput1").value;
	   valor_hora = document.getElementById("exampleInput2").value;
	   horas_contrato = document.getElementById("exampleInput3").value;
	   dias_trabajados = document.getElementById("exampleInput4").value;
	   horas_ausencia = document.getElementById("exampleInput5").value;
	   minutos_ausencia = document.getElementById("exampleInput6").value;
	   var cont = 0;
	   if(nombre=="" || nombre==null){
		   alert("Error!! : Debe ingresar el nombre!");
	   }else{
		   cont++;
	   }
	   if(valor_hora > 100000 || valor_hora < 15000){
		   alert("ERROR!! : El campo valor hora debe estar entre 15.000 y 100.000");
	   }else{
		   cont++;
	   }
	   if(horas_contrato > 44 || horas_contrato < 20){
		  alert("ERROR!! : El campo horas contrato debe estar entre 20 y 44"); 
	   }else{
		   cont++;
	   }
	   if(dias_trabajados < 0 || dias_trabajados > 30){
		  alert("ERROR!! : El campo dias trabajados debe estar entre 0 y 30"); 
	   }else{
		   cont++;
	   }
	   if(horas_ausencia < 0 || horas_ausencia > 24){
		  alert("ERROR!! : El campo horas ausencia debe estar entre 0 y 24"); 
	   }
	   if(minutos_ausencia < 0 || minutos_ausencia > 60){
		  alert("ERROR!! : El campo minutos ausencia debe estar entre 0 y 60"); 
	   }
	   if(cont==4){
		   document.form1.submit();
	   }else{
		   alert("Debe completar los campos del formulario (Los 4 primeros son obligatorios)");
	   }
	   
   }
   </script>
<form name="form1" method="POST">
	<div class="container px-4">
      <div class="row gx-5">
	   <h1 class="text-primary">Ejercicio Calculo de Sueldo Base!</h1>
	   <hr>
	   <label>Autor: Sebastian Valdebenito Jofre</label>
	   <hr>
	   
	   <div class="container">
       <div class="row">
         <div class="col">
           <div class="mb-3">
		     <label for="exampleInput1" class="form-label">Nombre</label>
		     <input type="text"  class="form-control" id="exampleInput1" name="nombre" placeholder="Ingrese nombre trabajador" >
	       </div>
         </div>
	     <div class="col">
            <div class="mb-3">
			<label for="exampleInput2"  class="form-label">Valor Hora</label>
			<input type="number"  class="form-control" id="exampleInput2" name="valor_hora" placeholder="Ingrese valor hora">
		  </div>
         </div>
	  </div>
	  </div>
	  <div class="container">
       <div class="row">
	    <div class="col">
		   <div class="mb-3">
		     <label for="exampleInput3" class="form-label">Horas de contrato</label>
		     <input type="number"  class="form-control" id="exampleInput3" name="horas_contrato" placeholder="Ingrese horas contrato">
	       </div>
		</div>
		<div class="col">
		 <div class="mb-3">
		   <label for="exampleInput4" class="form-label">Dias Trabajados</label>
		   <input type="number"  class="form-control" id="exampleInput4" name="dias_trabajados" placeholder="Ingrese dias trabajados">
	     </div>
		</div>
	   </div>
	  </div>
	   <div class="container">
       <div class="row">
	    <div class="col">
		    <div class="mb-3">
		     <label for="exampleInput5" class="form-label">Horas Ausencia</label>
		     <input type="number" class="form-control" id="exampleInput5" name="horas_ausencia" placeholder="Ingrese horas ausencia">
	       </div>
		</div>
		<div class="col">
		   <div class="mb-3">
		    <label for="exampleInput6" class="form-label">Minutos Ausencia</label>
		    <input type="number" class="form-control" id="exampleInput6" name="min_ausencia" placeholder="Ingrese minutos ausencia">
	       </div>
		</div>
	   </div>
	  </div>
	     <div class="container">
           <div class="row">
	       <div class="col">
		     <button type="button" OnClick="validador();" class="btn btn-primary">Calcular</button>
		   </div>
		   </div>
		 </div>
	  </div>
	  </div>
</form>
<?php 

  $conex = mysqli_connect("localhost","root","","esquemaprueba1");
    
  if($_POST){
	  
   echo "<script>alert('calculo realizado con exito!. Gire el cursor del mouse y baje en la ventana..');</script>";
	  
   $sueldo_base = $_POST["horas_contrato"] * $_POST["valor_hora"];
   echo "<br>";
   print_r("<div align='center' > <div class='d-inline p-2 bg-success text-white'>Sueldo Base: ".$sueldo_base."</div></div>");
   
   if($_POST["dias_trabajados"] < 30){
	   
	   echo "<br>";
	
	   $dias_ausencia = 30 - $_POST["dias_trabajados"];
   
       $sueldo_diario = $sueldo_base / 30;
   
       $factor1 = $sueldo_diario * 28;
   
       $factor_horas = $_POST["horas_contrato"] * 4;
   
       $valor_horas_diarias = $factor1 / $factor_horas;
   
       $cant_h_diarias = $_POST["horas_contrato"] / 30;
   
       $horas_ausencia_x_dias = $cant_h_diarias * $dias_ausencia;
   
       $horas_mes_desc = $_POST["horas_contrato"] - $horas_ausencia_x_dias;
   
       $valor_sueldo_base = $horas_mes_desc * $_POST["valor_hora"];
       //$valor_sueldo_base = $horas_mes_desc * $valor_horas_diarias;
   
       echo "<br>";
       print_r("<div align='center'> <div class='d-inline p-2 bg-success text-white'>Sueldo base con dias de ausencia: ".$valor_sueldo_base."</div></div>");
       echo "<br>";
	   if($_POST["horas_ausencia"] > 0 || $_POST["min_ausencia"] > 0){
	   
		$factor_h_ausencia = $_POST["horas_ausencia"] + ($_POST["min_ausencia"] / 60);
	    //
	     $sueldo_diario_desc = $valor_sueldo_base / 30;
   
         $factor1_desc = $sueldo_diario_desc * 28;
   
         $factor_horas_desc = $_POST["horas_contrato"] * 4;
   
         $valor_horas_diarias_desc = $factor1_desc / $factor_horas_desc;
	   
	     //
	     $desc_x_h_ausencia = $factor_h_ausencia * $valor_horas_diarias_desc;
		
		 $v_sueldo_h_m_desc = $valor_sueldo_base - $desc_x_h_ausencia;
		
		 print_r("<div align='center'> <div class='d-inline p-2 bg-success text-white'>Sueldo base con dias, minutos y segundos de ausencia: ".$v_sueldo_h_m_desc."</div></div>");
		
       }
	   
	   //insertamos
	   $sql = "INSERT INTO `tablaresultados` (`id_resultado`, `str_nombre`, `f_valorhora`, `i_horascontrato`, `i_diastrabajados`, `i_horasausencia`, `i_minutosausencia`, `i_valorsueldobase`, `dt_fecharegistro`) VALUES (NULL, '".$_POST["nombre"]."', '".$_POST["valor_hora"]."', '".$_POST["horas_contrato"]."', '".$_POST["dias_trabajados"]."', '".$_POST["horas_ausencia"]."', '".$_POST["min_ausencia"]."','".$sueldo_base."', NOW() );";
	   mysqli_query($conex,$sql);
	   
	   echo "<hr>";
	   
   }
   
  }	
       
	   echo '<div class="container">
           <div class="row">';
  
       echo "<br><hr>";
       $consulta = "SELECT * FROM tablaresultados;";
	   $resp=  mysqli_query($conex,$consulta);
	   
	   if(mysqli_num_rows($resp) > 0){
		   
		   echo "<table class='table table-bordered border-primary'>";
		   echo "<tr>
				 <td style='background-color:blue; color:white;'>Nombre</td>
				 <td style='background-color:blue; color:white;'>Valor Hora</td>
				 <td style='background-color:blue; color:white;'>Horas Contrato</td>
				 <td style='background-color:blue; color:white;'>Dias Trabajados</td>
				 <td style='background-color:blue; color:white;'>Horas Ausencia</td>
				 <td style='background-color:blue; color:white;'>Minutos Ausencia</td>
				 <td style='background-color:blue; color:white;'>Sueldo Base</td>
				 <td style='background-color:blue; color:white;'>Fecha registro</td>
				</tr>
		   ";
		   
		   while($row = mysqli_fetch_array($resp)){
			   echo "<tr>
				 <td>".$row["str_nombre"]."</td>
				 <td>".$row["f_valorhora"]."</td>
				 <td>".$row["i_horascontrato"]."</td>
				 <td>".$row["i_diastrabajados"]."</td>
				 <td>".$row["i_horasausencia"]."</td>
				 <td>".$row["i_minutosausencia"]."</td>
				 <td>".$row["i_valorsueldobase"]."</td>
				 <td>".$row["dt_fecharegistro"]."</td>
				</tr>
		   ";
		   }
		   
		   echo "</table>";
	   }else{
		   echo "<div align='center'><label>No existen registros en el sistema actualmente..</label></div>";
	   }
        
		echo "</div></div>";
?>

  </body>
</html>