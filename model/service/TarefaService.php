<?php

require("../model/dao/TarefaDao.php");

class TarefaService{

	public static function getTarefas($estado){

		switch ($estado) {
			case 'Andamento':
				return TarefaDao::getTarefasAndamento();

			case 'Falhou':
				return TarefaDao::getTarefasFalhou();

			case 'Sucesso':
				return TarefaDao::getTarefasSucesso();

			default:
				return TarefaDao::getTarefas();
		}

	}

	public static function inserir($descricao,$dataInicio,$prazo,$dataFim,$motivo,$estadoId){

		return TarefaDao::inserir($descricao,$dataInicio,$prazo,$dataFim,$motivo,$estadoId);
	}

	public static function deletar($id){

		return TarefaDao::deletar($id);
	}

	public static function alterar($id,$descricao,$dataInicio,$prazo,$dataFim,$motivo,$estadoId){

		return TarefaDao::alterar($id,$descricao,$dataInicio,$prazo,$dataFim,$motivo,$estadoId);
	}

	public static function existeId($id){

		$tar = TarefaDao::getById($id);

		if($tar != null){
			return true;
		}else{
			return false;
		}

	}

	public static function existeDescricao($descricao){

		$tar = TarefaDao::getByDescricao($descricao);

		if($tar != null){
			return true;
		}else if($descricao === ""){
			return true;
		}else{
			return false;
		}

	}

}

?>