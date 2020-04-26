SELECT
QueryTipoUsuario.id,
cadastros_gerais.nome AS status,
QueryTipoUsuario.nome,
QueryTipoUsuario.cpf,
DATE_FORMAT(QueryTipoUsuario.data_nascimento, "%d/%m/%Y") AS data_nascimento,
QueryTipoUsuario.ano_matricula,
QueryTipoUsuario.etnia,
QueryTipoUsuario.genero,
QueryTipoUsuario.escolaridade,
QueryTipoUsuario.cep,
QueryTipoUsuario.logradouro,
QueryTipoUsuario.numero,
QueryTipoUsuario.complemento,
QueryTipoUsuario.bairro,
QueryTipoUsuario.cidade,
QueryTipoUsuario.email,
QueryTipoUsuario.tipo_usuario,
QueryTipoUsuario.escola_ensino_medio,
QueryTipoUsuario.whatsapp
FROM
	(SELECT
	QueryEscolaridade.id,
	QueryEscolaridade.id_status,
	QueryEscolaridade.nome,
	QueryEscolaridade.cpf,
	QueryEscolaridade.data_nascimento,
	QueryEscolaridade.ano_matricula,
	QueryEscolaridade.etnia,
	QueryEscolaridade.genero,
	QueryEscolaridade.escolaridade,
	QueryEscolaridade.cep,
	QueryEscolaridade.logradouro,
	QueryEscolaridade.numero,
	QueryEscolaridade.complemento,
	QueryEscolaridade.bairro,
	QueryEscolaridade.cidade,
	QueryEscolaridade.email,
	cadastros_gerais.nome AS tipo_usuario,
	QueryEscolaridade.escola_ensino_medio,
	QueryEscolaridade.whatsapp
	FROM
		(SELECT
		QueryGenero.id,
		QueryGenero.id_status,
		QueryGenero.nome,
		QueryGenero.cpf,
		QueryGenero.data_nascimento,
		QueryGenero.ano_matricula,
		QueryGenero.etnia,
		QueryGenero.genero,
		cadastros_gerais.nome AS escolaridade,
		QueryGenero.cep,
		QueryGenero.logradouro,
		QueryGenero.numero,
		QueryGenero.complemento,
		QueryGenero.bairro,
		QueryGenero.cidade,
		QueryGenero.email,
		QueryGenero.id_tipo_usuario,
		QueryGenero.escola_ensino_medio,
		QueryGenero.whatsapp
		FROM
			(SELECT
			QueryEtnias.id,
			QueryEtnias.id_status,
			QueryEtnias.nome,
			QueryEtnias.cpf,
			QueryEtnias.data_nascimento,
			QueryEtnias.ano_matricula,
			QueryEtnias.etnia,
			cadastros_gerais.nome AS genero,
			QueryEtnias.id_escolaridade,
			QueryEtnias.cep,
			QueryEtnias.logradouro,
			QueryEtnias.numero,
			QueryEtnias.complemento,
			QueryEtnias.bairro,
			QueryEtnias.cidade,
			QueryEtnias.email,
			QueryEtnias.id_tipo_usuario,
			QueryEtnias.escola_ensino_medio,
			QueryEtnias.whatsapp
			FROM
				(SELECT 
				cadastros_usuarios.id,
				cadastros_usuarios.id_status,
				cadastros_usuarios.data_cadastro,
				cadastros_usuarios.nome,
				cadastros_usuarios.cpf,
				cadastros_usuarios.data_nascimento,
				cadastros_usuarios.ano_matricula,
				cadastros_gerais.nome AS etnia,
				cadastros_usuarios.id_genero,
				cadastros_usuarios.id_escolaridade,
				cadastros_usuarios.cep,
				cadastros_usuarios.logradouro,
				cadastros_usuarios.numero,
				cadastros_usuarios.complemento,
				cadastros_usuarios.bairro,
				cadastros_usuarios.cidade,
				cadastros_usuarios.email,
				cadastros_usuarios.id_tipo_usuario,
				cadastros_usuarios.escola_ensino_medio,
				cadastros_usuarios.whatsapp				
				FROM
					cadastros_usuarios INNER JOIN cadastros_gerais 
					ON cadastros_usuarios.id_etnia = cadastros_gerais.id
					ORDER BY data_cadastro)
			AS QueryEtnias INNER JOIN cadastros_gerais
			ON QueryEtnias.id_genero = cadastros_gerais.id)
		AS QueryGenero INNER JOIN cadastros_gerais
		ON QueryGenero.id_escolaridade = cadastros_gerais.id) 
	AS QueryEscolaridade INNER JOIN cadastros_gerais
	ON QueryEscolaridade.id_tipo_usuario = cadastros_gerais.id)
AS QueryTipoUsuario INNER JOIN cadastros_gerais
ON QueryTipoUsuario.id_status = cadastros_gerais.id;