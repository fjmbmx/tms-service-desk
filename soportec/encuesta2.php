<?php	
$id=$_GET['a'];
echo "$id";
?>

<!doctype html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<title>Encuesta de satisfacción CRS</title>
	
	<!--CSS-->
	<style>
		/*Los apartados de html y body hacen que manejar los tamaños rem sean facil--> 1rem=10px*/
		html{
			font-size: 62.5%; 
			box-sizing: border-box;
			scroll-snap-type: y mandatory;
		}
		*, *:before, *:after{
			box-sizing: inherit;
		}
		
		/*FORMULARIO*/
		body{
			height: auto;
		}
		.tabla{
			width: auto;
			background-color: #FFFFFF;
			border-radius: 1rem;
			padding: 4rem;
			-webkit-box-shadow: 9px 5px 84px 39px rgba(186,227,250,1);
			-moz-box-shadow: 9px 5px 84px 39px rgba(186,227,250,1);
			box-shadow: 9px 5px 84px 39px rgba(186,227,250,1);
		}
		.espacio{
			align-content: center;
			background-color: #BAE3FA;
		}
        .barra {
            height: 2.5rem;
            align-content: center;
            border-radius: 0.5rem;
            background: rgba(146,172,206,1);
            background: -moz-linear-gradient(left, rgba(146,172,206,1) 0%, rgba(244,243,251,1) 100%);
            background: -webkit-gradient(left top, right top, color-stop(0%, rgba(146,172,206,1)), color-stop(100%, rgba(244,243,251,1)));
            background: -webkit-linear-gradient(left, rgba(146,172,206,1) 0%, rgba(244,243,251,1) 100%);
            background: -o-linear-gradient(left, rgba(146,172,206,1) 0%, rgba(244,243,251,1) 100%);
            background: -ms-linear-gradient(left, rgba(146,172,206,1) 0%, rgba(244,243,251,1) 100%);
            background: linear-gradient(to right, rgba(146,172,206,1) 0%, rgba(244,243,251,1) 100%);
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#92acce', endColorstr='#f4f3fb', GradientType=1 );
        }
		.preguntas{
			font-size: 4rem;
			line-height: 1,5; /*Interlineado*/
			color: #00008B;
			text-align: center;
			font-family: Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", "serif";
		}
        .imagen {
            width: 40rem;
            height: 18rem;
        }
		.cro{
			width: 13rem;
			border-radius: 0.5rem;
		}
		.lbfolio{
			font-size: 4rem;
			color: orange;
		}
		.areaTexto{
			border-radius: 1rem;
			font-size: 3.5rem;
		}
		.btnEnviar{
			cursor: pointer;
			border-radius: 0.5rem;
			font-size: 4rem;
			padding: 0.5rem;
			width: 40%;
			background-color: lightblue;
		}
		.btnEnviar:hover{
			background-color: orange;
			color: white;
			font-weight: bold;
		}
		a{
			font-size: 4.25rem;
		}
		input{
				font-size: 4rem;
			}
		.pie{
			text-align: center;
			font-size: 1.5rem;
			padding-bottom: 0.5rem;
			margin-top: 4rem;
		} 
		
		/*ESTRELLAS*/
		input[type="radio"]{
	  		display: none;
		}
		label {
  			color: gray;
			font-size: 6rem;
		}
		.calificacion{
  			direction: rtl;
  			unicode-bidi: bidi-override;
			text-align:center;
		}
		label:hover, label:hover ~ label{
  			color: orange;
			cursor: pointer;
		}
		input[type="radio"]:checked ~ label{
			color: orange;
		}
		
		/*SELECCIÓN DE RESPUESTA*/
		.seleccion{
			display: inline-block;
			padding: 0.5rem;
			font-size: 3.75rem;
			border-radius: 1rem;
			cursor: pointer;
			text-align-last: center;
		}
		.seleccion:focus, .seleccion:hover{
			outline: none;
			background-color: lightblue;
			border: 0.2rem solid dodgerblue; 
		}
		.seleccion option{
			background-color: aliceblue;
		}
		
		/*RESPONSIVE WEB DESIGN: Cuando la pantalla mida más de 1100px*/
		@media(min-width:1100px){ 	
			.tabla{
				width: 80rem;
			}
			.imagen{
			width: 40rem;
			height: 17.5rem;
			}
			.preguntas, .lbfolio, .areaTexto{
				font-size: 2rem;
			}
			input, .seleccion{
				font-size: 1.25rem;
			}
			a, .btnEnviar{
				font-size: 1.5rem;
			}
			.cro{
				width: 5rem;
			}
			label {
			font-size: 3rem;
			}
            .dos--columnas1 {
                display: grid;
                grid-template-columns: 25% 75%;				
            }
            .dos--columnas3 {
                display: grid;
                grid-template-columns: 35% 65%;
            }
            .dos--columnas2 {
                display: grid;
                grid-template-columns: 37.5% 62.5%;
            }
            .calificacion1 {
                text-align: left;
            }
		}
	</style>	
</head>

<body>
	<center>
		<!--FORMULARIO-->
		<form name="frmContacto" method="post" action="encuesta.php"> 
			<table class="tabla" cellspacing="2">
				<!--Tabla-->
				<tr>
					<!--Fila-->
					<td align="center">
						<!--Celda-->
						<font class="preguntas">
							<img class="imagen" src="calidad.png" alt="Imagen"> <img src="encuesta2.gif" width="225" height="170">
							<br></br>
						</font>
						</br></br>
					</td>
				</tr>

				<tr>
					<td class="barra"></td>
				</tr>

				<tr>
					<td align="center">
						</br></br>
						</br></br>
						Número de folio:
						<label class="lbfolio" for="folio">  
						<a>CRO-
							<?php	
							echo "$id";
							?>
							</a>
 						</label>
						</br></br>
						</br></br>
					</td>
				</tr>

				<tr>
					<td class="espacio"></td>
				</tr>

				<!--PREGUNTA 1:-->
				<tr>
					<td align="left">
						<font class="preguntas"> 1. ¿Después de la visita de servicio técnico su equipo funciona de manera correcta? </font>
					</td>
				</tr>
				<tr>
					<td align="center">
						</br></br>
						<select class="seleccion" name="p_1">
							<option value="">-Respuesta 1-</option>
							<option value="Si">Si</option>
							<option value="No">No</option>
							<option value="Fallo Intermitente">Presenta fallo intermitente</option>
						</select>
						</br></br>
						</br></br>
					</td>
				</tr>

				<tr>
					<td class="espacio"></td>
				</tr>

				<!--PREGUNTA 2:-->
				<tr>
					<td align="left">
						<font class="preguntas"> 2. ¿El ingeniero organizó su visita, acceso, así como el ingreso de herramientas y partes siguiendo los procedimientos establecidos por ustedes?</font>
					</td>
				</tr>
				<tr>
					<td align="center">
						</br></br>
						<select class="seleccion" name="p_2">
							<option value="">-Respuesta 2-</option>
							<option value="Si">Si</option>
							<option value="No">No</option>
							<option value="Falta comunicación">Faltó Comunicación</option>
						</select>
						</br></br>
						</br></br>
					</td>
				</tr>

				<tr>
					<td class="espacio"></td>
				</tr>

				<!--PREGUNTA 3-->
				<tr>
					<td align="left">
						<font class="preguntas"> 3. ¿El ingeniero le comunicó oportunamente?</font>
					</td>
				</tr>
				<tr>

					<td align="left">
						</br>
						<div class="dos--columnas1">
							<font class="preguntas" style="padding-top:1.75rem">3.1- Los hallazgos: </font>
							<p class="calificacion calificacion1">
								<input id="star311" type="radio" name="p_31" value="5 estrellas">
								<label for="star311">★</label>
								<input id="star312" type="radio" name="p_31" value="4 estrellas">
								<label for="star312">★</label>
								<input id="star313" type="radio" name="p_31" value="3 estrellas">
								<label for="star313">★</label>
								<input id="star314" type="radio" name="p_31" value="2 estrellas">
								<label for="star314">★</label>
								<input id="star315" type="radio" name="p_31" value="1 estrella">
								<label for="star315">★</label>
							</p>
						</div>
						<br>
						<div class="dos--columnas1">
							<font class="preguntas" style="padding-top:1.75rem">3.2- Posible causa: </font>
							<p class="calificacion calificacion1">
								<input id="star321" type="radio" name="p_32" value="5 estrellas">
								<label for="star321">★</label>
								<input id="star322" type="radio" name="p_32" value="4 estrellas">
								<label for="star322">★</label>
								<input id="star323" type="radio" name="p_32" value="3 estrellas">
								<label for="star323">★</label>
								<input id="star324" type="radio" name="p_32" value="2 estrellas">
								<label for="star324">★</label>
								<input id="star325" type="radio" name="p_32" value="1 estrella">
								<label for="star325">★</label>
							</p>
						</div>
							<br>
							<div class="dos--columnas3">
								<font class="preguntas" style="padding-top:1.75rem">3.3- Estatus de refacciones: </font>
								<p class="calificacion calificacion1">
									<input id="star331" type="radio" name="p_33" value="5 estrellas">
									<label for="star331">★</label>
									<input id="star332" type="radio" name="p_33" value="4 estrellas">
									<label for="star332">★</label>
									<input id="star333" type="radio" name="p_33" value="3 estrellas">
									<label for="star333">★</label>
									<input id="star334" type="radio" name="p_33" value="2 estrellas">
									<label for="star334">★</label>
									<input id="star335" type="radio" name="p_33" value="1 estrella">
									<label for="star335">★</label>
								</p>
							</div>
								<br>
							<div class="dos--columnas2">
								<font class="preguntas" style="padding-top:1.75rem">3.4- Resolución del problema: </font>
								<p class="calificacion calificacion1">
									<input id="star341" type="radio" name="p_34" value="5 estrellas">
									<label for="star341">★</label>
									<input id="star342" type="radio" name="p_34" value="4 estrellas">
									<label for="star342">★</label>
									<input id="star343" type="radio" name="p_34" value="3 estrellas">
									<label for="star343">★</label>
									<input id="star344" type="radio" name="p_34" value="2 estrellas">
									<label for="star344">★</label>
									<input id="star345" type="radio" name="p_34" value="1 estrella">
									<label for="star345">★</label>
								</p>
							</div>
							<br></br>
							<br></br>
							<br></br>
					</td>
				</tr>

				<tr>
					<td class="espacio"></td>
				</tr>

				<!--PREGUNTA 4:-->
				<tr>
					<td align="left">
						<font class="preguntas"> 4. ¿Cómo calificaría el tiempo de respuesta para la atención y solución de esta falla?</font>
					</td>
				</tr>
				<tr>
					<td align="center">
						<!--ESTRELLAS-->
						<p class="calificacion">
							<input id="star1" type="radio" name="p_4" value="5 estrellas">
							<label for="star1">★</label>
							<input id="star2" type="radio" name="p_4" value="4 estrellas">
							<label for="star2">★</label>
							<input id="star3" type="radio" name="p_4" value="3 estrellas">
							<label for="star3">★</label>
							<input id="star4" type="radio" name="p_4" value="2 estrellas">
							<label for="star4">★</label>
							<input id="star5" type="radio" name="p_4" value="1 estrella">
							<label for="star5">★</label>
						</p>
						</br></br>
						</br></br>
					</td>
				</tr>

				<tr>
					<td class="espacio"></td>
				</tr>

				<!--PREGUNTA 5:-->
				<tr>
					<td align="left">
						<font class="preguntas"> 5. ¿Cómo calificaría el servicio en general?</font>
					</td>
				</tr>
				<tr>
					<td align="center">
						<!--ESTRELLAS-->
						<p class="calificacion">
							<input id="estrella1" type="radio" name="p_5" value="5 estrellas">
							<label for="estrella1">★</label>
							<input id="estrella2" type="radio" name="p_5" value="4 estrellas">
							<label for="estrella2">★</label>
							<input id="estrella3" type="radio" name="p_5" value="3 estrellas">
							<label for="estrella3">★</label>
							<input id="estrella4" type="radio" name="p_5" value="2 estrellas">
							<label for="estrella4">★</label>
							<input id="estrella5" type="radio" name="p_5" value="1 estrella">
							<label for="estrella5">★</label>
						</p>
						</br></br>
						</br></br>
					</td>
				</tr>

				<tr>
					<td class="espacio"></td>
				</tr>

				<!--PREGUNTA 6:-->
				<tr>
					<td align="left">
						<font class="preguntas">6. ¿Tiene algún comentario, queja o sugerencia?</font>
						</br></br>
					</td>
				</tr>
				<tr>
					<td align="center">
						<textarea class="areaTexto" name="coment" maxlength="240" cols="34" rows="7" required></textarea>
						</br></br>
					</td>

				<tr>
					<td align="center">
						<input type="hidden" name="foli_o" value="<?php echo $id; ?>">
						
						
						
						
						
						<input class="btnEnviar" type="submit" value="Enviar" >
						</br></br>
					</td>
				</tr>

				</tr>
			</table>
		</form>
	</center>

	<footer class="pie">
		<p>Gracias por responder esta encuesta, su opinión es muy importante para nosotros.</p>
		<P style="font-style: italic">Cyber Robotic Solutions S.A. de C.V.</P>
	</footer>

</body>
</html>






