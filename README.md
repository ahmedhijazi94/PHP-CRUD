################################
	Código por Ahmed Hijazi
################################

#CONFIGURAÇÃO:
	Configuração inicial do projeto: 
		-Vá até a pasta sistema.
		-Abra o arquivo "config.php".
			- Siga as instruções dos comentários

#INICIALIZAÇÃO
	Inicialização do projeto:
		-Na pasta raíz, crie um arquivo "index.php" com toda a estrutura HTML;
		-Antes da abertura da TAG inicial do html, importe o arquivo inicialize.php sendo assim:
			<?php include 'sistema/inicialize.php'; ?>
			<HTML>
			....
			#Prontinho ;D

#CRUD
	Vamos aos comandos básicos do CRUD:
		- CREATE:
			Para gravar os campos em uma tabela:
				1- Setar os valores dos campos em um array, EX:

				$cliente = array(
				 	'nome' 	  => 'Ahmed',
				 	'email'   => 'ahmedhijazi94@gmail.com',
				 	'status'  => '1'
				);

				2- Executar a função para gravar na tabela:

				DBCreate('NomeDaTabela', $cliente);

					- Primeiro parâmetro: Nome da tabela,
					- Segundo parâmetro : varíavel contendo o array com os valores a serem inseridos.

				SIMPLES NÉ?!

		- READ:
			Para listar os resultados de uma tabela:
				1-Crie uma variável contendo o comando de consulta:

				$clientes = DBRead('NomeDaTabela',  "WHERE status = 1", 'nome, email');

					- Primeiro parâmetro : Nome da tabela.
					- Segundo parâmetro  : Condições da consulta, neste ex: as linhas onde o status = 1.
					- Terceiro parâmetro : Os campos que deseja resgatar.

				2- Crie uma estrutura de repetição para listar todas as linhas da consulta:

					foreach ($clientes as $cliente) {
						echo $cliente['nome'];
						echo $cliente['email'];
					}

			- LER DADOS DE UMA LINHA:
				Se precisar ler dados especificos de uma linha na tabela, por exemplo, resgatar o nome e email do usúario com o id = 1, basta executar o comando DBReadOne:

				$cliente = DBReadOne('NomeDaTabela',  "WHERE id = 7", 'nome, email');
				$nome  = $cliente[0];
				$email = $cliente[1];

		- UPDATE:
			Para atualizar uma linha na tabela:
				1- Setar os valores dos campos que serão alterados em um array, EX:

				$cliente = array(
				 	'nome' 	  => 'Ahmed Hijazi',
				 	'email'   => 'ahmed@gmail.com',
				 	'status'  => '0'
				);

				2- Executar a função para alteração na tabela:

				DBUpdate('NomeDaTabela', $cliente, 'id = 1');

				- Primeiro parâmetro : Nome da tabela.
				- Segundo parâmetro  : Varíavel setada em cima (array com os campos de alteração).
				- Terceiro parâmetro : Identificação da linha.

		- DELETE:
			Para excluir uma linha da tabela:
				Execute o comando DBDelete da seguinte forma:

				DBDelete('NomeDaTabela', 'id = 3');

				- Primeiro parâmetro : Nome da tabela.
				- Segundo parâmetro  : Identificação da linha.

			###ATENÇÃO###
			Para excluir todas as linhas da tabela:
				Execute o comando DBDelete da seguinte forma:

				DBDelete('NomeDaTabela');

				- Primeiro parâmetro : Nome da tabela.

		- BÔNUS:
			Para contar o número de linhas contendo um certo parâmetro:

			$numeroDeLinhas = DBCount('NomeDaTabela', "WHERE nome = 'Ahmed'");
			echo $numeroDeLinhas;

			- Primeiro parâmetro : Nome da tabela.
			- Segundo parâmetro  : Condições da consulta, neste ex: as linhas onde o nome = Ahmed.


#AGORA É SÓ USAR SUA CRIATIVIDADES E CRIAR SISTEMAS ;D
E-mail: ahmedhijazi94@gmail.com

 







