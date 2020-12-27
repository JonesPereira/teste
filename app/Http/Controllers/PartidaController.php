<?php

namespace App\Http\Controllers;

use App\Models\Partida;
use App\Repositories\RepositoryJogador;
use App\Repositories\RepositoryPartida;
use App\Repositories\RepositoryTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PartidaController extends ControllerAPI
{
    protected $model;

    /**
     * Injeta o Repository na classe.
     */
    public function __construct(Partida $partida)
    {
        $this->model = new RepositoryPartida($partida);
    }

    /**
     * Lista todas as partidas.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->model->all();
    }

    /**
     * Cria uma nova partida.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'data_partida' => 'required|date_format:d/m/Y',
            'id_time_mandante' => 'required|exists:times,id',
            'id_time_visitante' => 'required|exists:times,id'
        ]);

        if ($validator->fails()) {
            return $this->toJsonError($validator->errors());
        }

        $inputData =$request->all();
        $inputData['data_partida'] = implode("-",array_reverse(explode("/",$inputData['data_partida'])));

        $partida = $this->model->create($inputData);

        return $this->toJson($partida);
    }

/**
     * Cria uma nova partida e escala os times.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function criarPartidaEscalandoTimes(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'data_partida' => 'required|date_format:d/m/Y',
            'id_time_mandante' => 'required|exists:times,id',
            'id_time_visitante' => 'required|exists:times,id'
        ]);

        if ($validator->fails()) {
            return $this->toJsonError($validator->errors());
        }

        $inputData =$request->all();
        $inputData['data_partida'] = implode("-",array_reverse(explode("/",$inputData['data_partida'])));

        $partida = $this->model->create($inputData);

        return $this->toJson($partida);
    }

    /**
     * Retorna a partida do id consultado.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function partidasEscalacoes()
    {
        return $this->model->partidasEscalacoes()->groupBy('data_partida')->all();
    }

    /**
     * Retorna a partida do id consultado.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        return $this->model->show($id);
    }

    /**
     * Atualiza os dados da partida
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        return $this->toJsonSuccess($this->model->update($request->all(), $id));
    }

    /**
     * Remove o id da partida enviada
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        return $this->toJsonSuccess($this->model->delete($id));
    }
}
