<?php 

//clases
include_once 'clases/Usuario.php';
include_once 'clases/Postulacion.php';
include_once 'clases/UserSession.php';
include_once 'clases/Convocatoria.php';

//Control
include_once 'Control/UsuarioControl.php';
include_once 'Control/PostulacionControl.php';
include_once 'Control/ConvocatoriaControl.php';
include_once 'Control/TicketControl.php';

//Librerias
include_once 'resources/librerias/fpdf/fpdf.php';
include_once 'resources/librerias/phpqrcode/qrlib.php';


$userSession = new UserSession();
$user = new Usuario();
$userControl = new UsuarioControl();
$conpust = new Convocatoria();
$conControl = new ConvocatoriaControl();


if(isset($_SESSION['user'])){
	//echo "Hay session";
	$user->setUserLogin($userSession->getCurrentUser());
	if(isset($_POST['registroUsuario'])){

		$userCrear = new Usuario();
		$userControl = new UsuarioControl();

		$identificacion = $_POST['identificacion'];
		$nombre = $_POST['nombre'];			   		
		$apellido = $_POST['apellido'];
		$codigoestudiante = $_POST['codigoestudiante'];
		$correo = $_POST['correo'];
		$contrasena = $_POST['contrasena'];
		$idRol = $_POST['rol'];
		$saldo = 0;


		if($userControl->buscarPorEmail($correo) !=true){
			if(preg_match('/^([a-z0-9_\.-]+)*@correounivalle\.edu.co$/', $correo)){
				if(is_numeric($identificacion)){
					if(!((strlen($identificacion) > 12) || (strlen($identificacion) < 8))){
						if(!((strlen($contrasena) > 8) || (strlen($identificacion) < 6))){
							$userCrear->setIdentifacion($identificacion);
							$userCrear->setNombre($nombre);
							$userCrear->setApellido($apellido);
							$userCrear->setCodigoEst($codigoestudiante);
							$userCrear->setCorreo($correo);
							$userCrear->setContrasena($contrasena);
							$userCrear->setSaldo($saldo);
							$userCrear->setIdRol($idRol);

							if($userControl->crearUsuario($userCrear)){
								$registroExitosovar = "Registro exitoso";
								include_once 'Interfaces/registroUsuario.php';

							}else{
								$registroErrsovar = "El usuario con esa identificacion ya existe";
								include_once 'Interfaces/registroUsuario.php';
							}
						}else{
							$registroErrsovar = "La contraseña no debe ser mayor a 8 caracteres y no menor a 6 numeros";
							include_once 'Interfaces/registroUsuario.php';
						}
					}else{
						$registroErrsovar = "La identificacion no debe ser mayor a 12 numeros y no menor a 8 numeros";
						include_once 'Interfaces/registroUsuario.php';
					}
				}else{
					$registroErrsovar = "La identificacion debe tener formato numerico";
					include_once 'Interfaces/registroUsuario.php';
				}
			}else{
				$registroErrsovar = "El correo ingresado no tiene el formato adecuado ejem: ejem.plo@correounivalle.edu.co";
				include_once 'Interfaces/registroUsuario.php';
			}

		}else{
			$registroErrsovar = "El usuario ingresado con ese correo, ya existe";
			include_once 'Interfaces/registroUsuario.php';
		}





	}else if(isset($_POST['registropostulacion'])){
		$postulacionCrear = new Postulacion();
		$postulacionControl = new PostulacionControl();

		$identificacion=$user->getIdentifacion();
		$idconvocatoria = $_POST['idConvocatoria'];
		$fechapostulacion = date('Y-m-d');
		$promedioacum = $_POST['promedioacumulado'];
		$idestado_postulacion=2;




		if(!($postulacionControl->buscarPostulacionPorIdentiConvo($identificacion,$idconvocatoria))){
			$postulacionCrear->setidentfiicacion($identificacion);
			$postulacionCrear->setidconvocatoria($idconvocatoria);
			$postulacionCrear->setfechapostulacion($fechapostulacion);
			$postulacionCrear->setestadopostulacion	($idestado_postulacion);
			$postulacionCrear->setpromedio($promedioacum);
			if($postulacionControl->registrarPostulacion($postulacionCrear)){
				$exitosoPostRegis = "Postulacion realizada con exito";
				include_once 'Interfaces/PostulacionUI.php';
			}else{
				echo "<script>alert('LLEGUE AQUIFALSE');</script>";
			}	
		}else{
			$errorPostRegis = "La Postulacion a esa convocatoria ya fue realizada";
			include_once 'Interfaces/PostulacionUI.php';
		}




	}else if(isset($_POST['registroticketgenerar'])){
		include_once 'clases/Tickets.php';


		$tick = new Ticket();
		$ticketControl = new TicketControl();
		$tick->setfechacompra(date('Y-m-d'));
		$tick->setidentificacion($user->getIdentifacion());


		if($user->getSaldo() >= 1500){
			if(!($ticketControl->buscarTicketFechaIdenti(date('Y-m-d'),$user->getIdentifacion()))){
				if($ticketControl->registrarTicket($tick)){
					$idTicket = $ticketControl->buscarUltimoTicketUsuario($user->getIdentifacion());
					$saActual = $user->getSaldo();
					$user->setSaldo($saActual - 1500);
					if($userControl->actualizarSaldoTicketUser($user->getCodigoEst(), $user->getSaldo())){
						
						//Generar QR
						$dir = 'resources/Images/';
						if(!file_exists($dir)){
							mkdir($dir);
						}
						$filename= $dir.'test.png';
						$tamanio = 5;
						$level = 'H';
						$framesize=1;
						$contenido = (int)$idTicket[0];
						QRcode::png($contenido,$filename,$level,$tamanio,$framesize);


						//Generar PDF
						$pdf = new FPDF('P','mm',array(50,50));
						$pdf->AddPage();
						$pdf->SetFont('Arial','B',9);
						$pdf->Image('resources/Images/test.png',10,6,30);
						$pdf->Image('resources/Images/test.png',10,6,30);
						$pdf->Output();
						
						include_once 'Interfaces/generarTicketUI.php';
					}				

				}else{
					$ticketGeneradoErrorvar = "Error al generar";
					include_once 'Interfaces/generarTicketUI.php';
				}
			}else{
				$ticketGeneradoErrorvar = "Error al generar, hoy ya se genero el ticket";
				include_once 'Interfaces/generarTicketUI.php';
			}

		}else{
			$ticketGeneradoErrorvar = "No tiene saldo suficiente";
			include_once 'Interfaces/generarTicketUI.php';
		}
	}else if(isset($_POST['registroConvocatoria'])){

		$convocatoriaCrear = new Convocatoria();
		$convocatoriaControl = new ConvocatoriaControl();

		$fechahora_inicio = $_POST['fechaInicio'];
		$fechahora_final = $_POST['fechaFinal'];			   		
		$idestadoConvocatoria = $_POST['estado'];
		$idBeca = $_POST['beca'];
		$idperiodoAcademico = $_POST['periodo'];
		$cupos = $_POST['cupos'];

		$fechainicom = strtotime($fechahora_inicio);
		$fechafincom = strtotime($fechahora_final);


		if(is_numeric($cupos)){
			if(!($cupos < 0)){
				if(!($fechafincom < $fechainicom)){
					if(!($convocatoriaControl->buscarConvoBecaPeriodo($idBeca,$idperiodoAcademico))){
						$convocatoriaCrear->setfechahora_inicio($fechahora_inicio);
						$convocatoriaCrear->setfechahora_final($fechahora_final);
						$convocatoriaCrear->setestado_convocatoria($idestadoConvocatoria);
						$convocatoriaCrear->setidBeca($idBeca);
						$convocatoriaCrear->setidperiodoAcademico($idperiodoAcademico);
						$convocatoriaCrear->setcupos($cupos);

						if($convocatoriaControl->registrarConvocatoria($convocatoriaCrear)){
							$registroConvoexivar = "Registro exitoso";
							include_once 'Interfaces/ConvocatoriaUI.php';
						}else{
							$registroConvoerrvar = "Fallo en el registro";
							include_once 'Interfaces/ConvocatoriaUI.php';
						}
					}else{
						$registroConvoerrvar = "La convocatoria ya fue registrada con esa beca y periodo";
						include_once 'Interfaces/ConvocatoriaUI.php';
					}
				}else{
					$registroConvoerrvar = "Las fechas deben ser configuradas adecuadamente";
					include_once 'Interfaces/ConvocatoriaUI.php';
				}
			}else{
				$registroConvoerrvar = "El campo cupo debe ser mayor a 0";
				include_once 'Interfaces/ConvocatoriaUI.php';
			}
		}else{
			$registroConvoerrvar = "El campo cupos debe ser solo numeros";
			include_once 'Interfaces/ConvocatoriaUI.php';
		}

	}else {
		if(isset($_POST['mpostulaciones'])){
			include_once 'Interfaces/visualizarPostulaciones.php';
		}else if(isset($_POST['registerpostu'])){
			include_once 'Interfaces/PostulacionUI.php';
		}else if(isset($_POST['ticketAlmuerzo'])){
			include_once 'Interfaces/generarTicketUI.php';
		}else if(isset($_POST['registroConvo'])){
			include_once 'Interfaces/ConvocatoriaUI.php';
		}else if(isset($_POST['visualizarTickets'])){
			include_once 'Interfaces/visualizarTickets.php';
		}else if(isset($_POST['mostrarConvo'])){
			include_once 'Interfaces/visualizarConvocatorias.php';
		}else if(isset($_POST['registroUsers'])){
			include_once 'Interfaces/registroUsuario.php';
		}else if(isset($_POST['mostrarUsers'])){
			include_once 'Interfaces/visualizarUsuarios.php';
		}else if(isset($_POST['actualizacionSaldo'])){
			if(!(($_POST['nuevoSaldo']) < -($_POST['saldoActualEst']))){
				if($userControl->actualizarSaldoUsuario($_POST['codigoestudiante'],$_POST['nuevoSaldo'])){
					$mensajeUpdate = "Actualizacion de saldo exitosa";
					include_once 'Interfaces/registrarSaldo.php';		
				}else{
					$actualizarErroSaldo = "Error al actualizar el saldo";
					include_once 'Interfaces/registrarSaldo.php';
				}
			}else{
				$actualizarErroSaldo = "El saldo ingresado es menor que el saldo actual";
				include_once 'Interfaces/registrarSaldo.php';
			}
		}else if(isset($_POST['ventanaPostuConvo'])){
			$convoBuscar = new Convocatoria();
			$convoControl = new ConvocatoriaControl();
			$ConEncontrada = $convoControl->buscarConvoPorConsecutivo($_POST['idConvocatoriainput']);
			$conpust->setIdConvocatoria($_POST['idConvocatoriainput']);
			include_once 'Interfaces/visualizarPostulacionesConvocatoria.php';
		}else if(isset($_POST['ventanaAprobarPostu'])){
			$postActu = new Postulacion();
			$postControl = new PostulacionControl();


			if($postControl->actualizarEstadoPostulacion($_POST['idPostulacionInput'],$_POST['idestadopostulacionescogido'],$_POST['estadoactual'],$_POST['idconvocatoriaPost'],$_POST['cuposactuales'])){
				$exitoAprobacion = 'Actualizacion realizada.';
				include_once 'Interfaces/visualizarConvocatorias.php';
			}else{
				$errorAprobacion = 'Error al actualizar';
				include_once 'Interfaces/visualizarConvocatorias.php';
			}





		}else if(isset($_POST['registroSaldo'])){
			include_once 'Interfaces/registrarSaldo.php';
		}else if(isset($_POST['buscarEst'])){
			$buscarEst = new Usuario();
			$estudianteEncontrando = $userControl->buscarEstudiantePorCodigo($_POST['codigoest']);
			$listEstudiante = $estudianteEncontrando->fetch();
			$buscarEst->setSaldo($listEstudiante['saldo']);
			$buscarEst->setNombre($listEstudiante['nombre']);
			$buscarEst->setApellido($listEstudiante['apellido']);
			$buscarEst->setIdentifacion($listEstudiante['identificacion']);
			$buscarEst->setCodigoEst($listEstudiante['codigoestudiante']);
			include_once 'Interfaces/registrarSaldo.php';
		}else{
			if($user->getIdRol() == 1){
				include_once 'Interfaces/homeEstudiante.php';

			}else if($user->getIdRol() == 2){
				include_once 'Interfaces/homeBienestar.php';	
			}else{
				include_once 'Interfaces/homeAdministrador.php';
			}
		}
	}

}else if (isset($_POST['email']) && isset($_POST['password'])){
	//echo "Validacion login";
	$emailForm = $_POST['email'];
	$passForm = $_POST['password'];

	if($userControl->usuarioExistente($emailForm,$passForm)){
		//echo 'usuario valido';
		$user->setUserLogin($emailForm,$passForm);
		$userSession->setCurrentUser($emailForm);

		if($user->getIdRol() == 1){
			include_once 'Interfaces/homeEstudiante.php';									
		}else if($user->getIdRol() == 2){
			include_once 'Interfaces/homeBienestar.php';	
		}else if($user->getIdRol() == 3){
			include_once 'Interfaces/homeAdministrador.php';	
		}



	}else{
		$errorLogin = 'Usuario y/o contrasena incorrecta';
		include_once 'Interfaces/iniciarsesion.php';
	}
}else if(isset($_POST['registro'])){

	$userCrear = new Usuario();

	$identificacion = $_POST['identificacion'];
	$nombre = $_POST['nombre'];			   		
	$apellido = $_POST['apellido'];
	$codigoestudiante = $_POST['codigoestudiante'];
	$correo = $_POST['correo'];
	$contrasena = $_POST['contrasena'];
	$saldo = 0;
	$idRol = 1;

	if($userControl->buscarPorEmail($correo) !=true){
		if(preg_match('/^([a-z0-9_\.-]+)*@correounivalle\.edu.co$/', $correo)){
			if(is_numeric($identificacion)){
				if(is_numeric($codigoestudiante)){
					if(!((strlen($identificacion) > 12) || (strlen($identificacion) < 8))){
						if(!((strlen($codigoestudiante) > 7) || (strlen($codigoestudiante) < 7))){
							if(!((strlen($contrasena) > 8) || (strlen($contrasena) < 6))){
								$userCrear->setIdentifacion($identificacion);
								$userCrear->setNombre($nombre);
								$userCrear->setApellido($apellido);
								$userCrear->setCodigoEst($codigoestudiante);
								$userCrear->setCorreo($correo);
								$userCrear->setContrasena($contrasena);
								$userCrear->setSaldo($saldo);
								$userCrear->setIdRol($idRol);

								if($userControl->crearUsuario($userCrear)){
									$registroExitosovar = "Registro exitoso";
									include_once 'Interfaces/iniciarsesion.php';

								}else{
									$registroErrorvar = "El usuario ya existe con esa identificacion";
									include_once 'Interfaces/iniciarsesion.php';
								}
							}else{
								$registroErrorvar = "La contrasena debe tener maximo 8 caracteres y minimo 6";
								include_once 'Interfaces/iniciarsesion.php';
							}

						}else{
							$registroErrorvar = "El codigoestudiante debe ser con formato 1911111";
							include_once 'Interfaces/iniciarsesion.php';
						}
					}else{
						$registroErrorvar = "La identificacion debe contener la cantidad adecuada";
						include_once 'Interfaces/iniciarsesion.php';
					}
				}else{
					$registroErrorvar = "El codigo del estudiante debe ser un numero";
					include_once 'Interfaces/iniciarsesion.php';

				}

			}else{
				$registroErrorvar = "Identificacion debe ser un numero";
				include_once 'Interfaces/iniciarsesion.php';
			}

		}else{
			$registroErrorvar = "Correo incorrecto.";
			include_once 'Interfaces/iniciarsesion.php';
		}
	}else{
		$registroErrorvar = "El usuario ya existe con ese correo.";
		include_once 'Interfaces/iniciarsesion.php';

	}
}
else{
	include_once 'Interfaces/iniciarsesion.php';
}






?>