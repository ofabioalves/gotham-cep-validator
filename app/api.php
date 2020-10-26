<?php
$parsed_url = parse_url($_SERVER['REQUEST_URI']);
$path = (isset($parsed_url['path'])) ? str_replace("/gotham-cep-validator/api", "", $parsed_url['path']) : '/';

header('Content-type: application/json');

switch ($path) {
	case '/getLogin':
		$file = fopen('app/databases/users.json', 'r');
		$userData = json_decode(fread($file, filesize('app/databases/users.json')), 1);
		fclose($file);

		foreach($userData as $user){
			if($user['usuario'] == $_REQUEST['usuario']){
				if($user['senha'] == $_REQUEST['senha']){
					if($user['ativo']){
						echo json_encode(array_merge(array('error' => false, 'info' => 'Usuario Logado!'), $user));	
						die();
					}else{
						echo json_encode(array('error' => true, 'info' => 'Usuario inativo!'));
						die();
					}
				}else{
					echo json_encode(array('error' => true, 'info' => 'Senha nao confere!'));
					die();
				}
			}else{
				echo json_encode(array('error' => true, 'info' => 'Usuario nao encontrado!'));
				die();
			}
		}

	break;
	
	case '/addCep':
		if(@$_REQUEST['cep']=="" || @$_REQUEST['cidade']==""){
			echo json_encode(array('error' => true, 'info' => 'Campos nao informados!'));	
			die();
		}


		if(is_writable('app/databases/ceps.json')){
			if(is_file('app/databases/ceps.json') && filesize('app/databases/ceps.json')){
				$file = fopen('app/databases/ceps.json', 'r+');

				while(($buffer = fgetcsv($file, 1000)) !== false){
					if(explode(":", $buffer[0])[0] == $_REQUEST['cidade'] && explode(":", $buffer[0])[1] == $_REQUEST['cep']){
						echo json_encode(array('error' => true, 'info' => 'CEP Já existente na cidade informada!'));	
						die();
					}
				}

				fwrite($file, "\n".$_REQUEST['cidade'].":".$_REQUEST['cep']);
				echo json_encode(array('error' => false, 'info' => 'CEP e cidade cadastrados!'));
				fclose($file);
			}
		}else
			echo json_encode(array('error' => true, 'info' => 'Problemas ao gravar!'));
	break;

	case '/listaCep':
		if(is_file('app/databases/ceps.json') && filesize('app/databases/ceps.json')){
			$file = fopen('app/databases/ceps.json', 'r');
			$content = array();
			
			while(($buffer = fgetcsv($file, 1000)) !== false){
				$content = array_merge($content, array(array("cidade" => explode(":", $buffer[0])[0], "cep" => explode(":", $buffer[0])[1])));
			}
			fclose($file);

			echo count($content) ? json_encode(array('error' => false, 'ceps' => $content)) : json_encode(array('error' => true, 'info' => 'Nao foram encontrados CEPS!'));
		}else
			echo json_encode(array('error' => true, 'info' => 'Nao foram encontrados CEPS!'));
	break;
}
?>
