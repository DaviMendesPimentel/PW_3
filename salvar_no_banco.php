<?php 

$xml = simplexml_load_file("book.xml") or die("erro na leitura do arquivo xml");
$cnx = new mysqli("localhost", "root", "", "Etec270819");


if($cnx->connect_error){
	die("erro ao conectar com o banco: " . $cnx->connect_error);
}

foreach($xml->children() as $livro){
	$sql = "INSERT INTO tb_livros (chave, nome, autor, preco, ano) VALUES('" . md5($livro->title) . "', 
																		  '$livro->title', 
																		  '$livro->author', 
																		  '$livro->price', 
																		  '$livro->year');";
	
	if($cnx->query($sql)){
		echo "$livro->title salvo com sucesso <br>";
	}
}

?>