<?php

namespace App\Http\Controllers;

use App\Models\Jogador;
use App\Repositories\RepositoryJogador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;
use Ramsey\Uuid\Type\Integer;

class JogadorController extends ControllerAPI
{

    protected $model;

    public function __construct(Jogador $jogador)
    {
        // set the model
        $this->model = new RepositoryJogador($jogador);
    }

    /**
     * Lista todos os jogadores.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->toJson($this->model->all());
    }

    /**
     * Cria um novo jogador.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'min:6',
            'numero' => 'numeric|min:1|max:999',
            'posisao' => 'in:GOLEIRO,LATERAL_ESQUERDO,LATERAL_DIREITO,ZAGUEIRO,VOLANTE,MEIA,ATACANTE'
        ]);

        if ($validator->fails()) {
            return $this->toJsonError($validator->errors());
        }

        $jogador = $this->model->create($request->all());

        return $this->toJson($jogador);
    }

    /**
     * Retorna o jogador do id enviado.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->model->show($id)->time;
    }

    /**
     * Atualiza os dados do jogador.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return $this->toJsonSuccess($this->model->update($request->all(), $id));
    }

    /**
     * Remove o jogador do id enviado.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        return $this->toJsonSuccess($this->model->delete($id));
    }
}
