<?php
	
	//protege conta sql injection
	function DBEscape($dados){
		$link = DBConnect();
		if(!is_array($dados)){
			$dados = mysqli_real_escape_string($link, $dados);
		}else{
			$arr = $dados;
			foreach ($arr as $key => $value) {
				$key = mysqli_real_escape_string($link, $key);
				$value = mysqli_real_escape_string($link, $value);

				$dados[$key] = $value;
			}
		}
		DBClose($link);
		return $dados;
	}


	//--------------------------------------------------------------------------//


	//funcão que fecha conexão com o banco
	function DBClose($link){
		@mysqli_close($link) or die(mysqli_error($link));
	}


	//--------------------------------------------------------------------------//


	//funcção de conexão com o banco
	function DBConnect(){
		$link = @mysqli_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE)or die(mysqli_connect_error());
		//setar utf 8 ao banco
		mysqli_set_charset($link, DB_CHARSET) or die(mysqli_error($link));
		return $link;
	}


	//--------------------------------------------------------------------------//


