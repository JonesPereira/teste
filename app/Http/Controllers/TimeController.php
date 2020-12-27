<?php

namespace App\Http\Controllers;

use App\Repositories\RepositoryTime;
use App\Models\Time;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TimeController extends ControllerAPI
{

    protected $model;

    public function __construct(Time $time)
    {
        $this->model = new RepositoryTime($time);
    }

    /**
     * Lista todos os times.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->toJson($this->model->all());
    }

    /**
     * Cria um novo time.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'min:6',
        ]);

        if ($validator->fails()) {
            return $this->toJsonError($validator->errors());
        }

        $time = $this->model->create($request->all());

        return $this->toJson($time);
    }

    /**
     * Retorna o time do id enviado.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        return $this->model->show($id);
    }

    /**
     * Retorna o time do id enviado.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function jogadores()
    {
        return $this->model->show(6)->jogadores;


    }

    /**
     * Atualiza os dados do time.
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
     * Remove o time do id enviado.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        return $this->toJsonSuccess($this->model->delete($id));
    }
}
