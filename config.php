<?php

try {
	global $pdo;
	$pdo = new PDO("mysql:dbname=projeto_multilinguagem;host=localhost", "mateus", "");
} catch(PDOException $e) {
	echo "Erro: ".$e->getMessage();
	exit;
}
?>