<?php
		
	//ler registro de uma linha
	function DBReadOne($table, $params= null, $fields = '*'){
		$table = DB_PREFIX.'_'.$table;
		$params = ($params) ? " {$params}" : null;
		$query = "SELECT {$fields} FROM {$table}{$params}";
		$result = DBExecute($query);
		$array = mysqli_fetch_row($result);
		return $array;
	}

	//--------------------------------------------------------------------------//

	//ler registro de uma linha
	function DBCount($table, $params= null, $fields = '*'){
		$table = DB_PREFIX.'_'.$table;
		$params = ($params) ? " {$params}" : null;
		$query = "SELECT {$fields} FROM {$table}{$params}";
		$result = DBExecute($query);
		$count = mysqli_num_rows($result);
		return $count;
	}

	//--------------------------------------------------------------------------//

	//deleta registros banco
	function DBDelete($table, $where = null){
		$table = DB_PREFIX.'_'.$table;
		$where = ($where) ? " WHERE {$where}" : null;
		$query = "DELETE FROM {$table}{$where}";
		return DBExecute($query);
	}

	//--------------------------------------------------------------------------//
	
	//alterar os dados
	function DBUpdate($table, array $data, $where = null){
		foreach ($data as $key => $value) {
			$fields[] = "{$key} = '{$value}'";
		}
		$fields = implode(', ', $fields);
		$table = DB_PREFIX.'_'.$table;
		$where = ($where) ? " WHERE {$where}" : null;
		$query = "UPDATE {$table} SET {$fields}{$where}";

		return DBExecute($query);
	}

	//--------------------------------------------------------------------------//

	//Ler registros banco
	function DBRead($table, $params = null, $fields = '*'){
		$table = DB_PREFIX.'_'.$table;
		//definir espaço se existir parametros
		$params = ($params) ? " {$params}" : null;
		$query = "SELECT {$fields} FROM {$table}{$params}";
		$result = DBExecute($query);
		if(!mysqli_num_rows($result)){
			return false;
		}else{
			while($res = mysqli_fetch_assoc($result)){
				$data[] = $res;
			}
			return $data;
		}
	}

	//--------------------------------------------------------------------------//

	//Insere no banco
	function DBCreate($table, array $data){
		$table = DB_PREFIX.'_'.$table;
		$data = DBEscape($data);
		$fields = implode(', ', array_keys($data));
		$values = "'".implode("', '", $data)."'";
		$query  = "INSERT INTO {$table} ({$fields}) VALUES ({$values})";
		//executa a função que executa as querys
		return DBExecute($query);
	}

	//--------------------------------------------------------------------------//

	//Executa as querys
	function DBExecute($query){
		$link = DBConnect();
		$result = @mysqli_query($link, $query) or die(mysqli_error($link));
		DBClose($link);
		return $result;
	}