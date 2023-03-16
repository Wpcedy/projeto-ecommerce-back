<?php

namespace App\Http\Controllers;

use App\Http\Requests\PedidoRequest;
use App\Models\pedido as PedidoModel;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
  public function new(PedidoRequest $request)
  {
    $dataForm = $request->all();
    $produtos = $dataForm['produtos'];

    $valor = 0;

    foreach ($produtos as $key => $produto) {
      $valor += isset($produto['preco']) ?floatval( $produto['preco']) :floatval( $produto['price']);
    }

    $data = $this->createPedido($valor, json_encode($produtos));

    return response()->json($data, 200);
  }

  protected function createPedido($valor, $produtos)
  {
    return PedidoModel::create([
      'produtos' => $produtos,
      'valorpedido' => $valor,
      'datapedido' => new \DateTime(),
    ]);
  }
}
