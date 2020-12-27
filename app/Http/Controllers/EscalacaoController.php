<?php

namespace App\Http\Controllers;

use App\Models\Escalacao;
use App\Repositories\RepositoryEscalacao;
use Illuminate\Http\Request;

class EscalacaoController extends ControllerAPI
{
    protected $model;

    /**
     * Injeta o Repository na classe.
     */
    public function __construct(Escalacao $escalacao)
    {
        $this->model = new RepositoryEscalacao($escalacao);
    }

    /**
     * Retorna o número de escalações por partida
     * que o jogador foi escalado
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->model->escalacoesDeJogadores();
    }
}
