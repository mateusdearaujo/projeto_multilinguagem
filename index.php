<?php

session_start();

if(!empty($_GET['lang'])) {
	$_SESSION['lang'] = $_GET['lang'];
}

require 'config.php';
require 'language.class.php';

$lang = new Language();

?>

<a href="index.php?lang=en">English</a>
<a href="index.php?lang=pt-br">Português</a>
<a href="index.php?lang=es">Español</a>

<hr/>

Linguagem Definida: <?php echo $lang->getLanguage(); ?>
<br/>

<hr/>

<button><?php $lang->get('BUY'); ?></button><br/><br/>

<?php

$sql = $pdo->prepare("SELECT id, (SELECT valor FROM lang WHERE lang.lang = :lang AND lang.nome = categorias.lang_item) as nome FROM categorias");
$sql->bindValue(":lang", $lang->getLanguage());
$sql->execute();

if($sql->rowCount() > 0) {
	foreach($sql->fetchAll() as $categoria) {
		echo $categoria['nome'].'<br/>';
	}
}
?>