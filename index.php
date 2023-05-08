<?php
session_start();
require "config.php";
require "model/conexion.php";

if (!isset($_GET['c'])) {
	require_once "controller/inicio.controlador.php";
	$controlador = new InicioControlador();
	call_user_func(array($controlador, "Inicio"));
} else {
	$controlador = $_GET['c'];
	if ((($controlador != "registroResiduos" && $controlador != "login") || $_GET['a'] == "FormRegistroResiduos") && !isset($_SESSION['user'])) {
		echo "<SCRIPT >
            	alert('Primero debes iniciar sesión');
                document.location=('?c=login&a=FormLogin');
                </SCRIPT>";
	}else{
		require_once "controller/$controlador.controlador.php";
		$controlador = ucwords($controlador) . "Controlador";
		$controlador = new $controlador;
		$accion = isset($_GET['a']) ? $_GET['a'] : "Inicio";
		call_user_func(array($controlador, $accion));
	}
	
}
