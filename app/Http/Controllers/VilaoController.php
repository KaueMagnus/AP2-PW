<?php

namespace App\Http\Controllers;

use App\Models\VilaoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VilaoController extends Controller
{
    public function exibirViloes()
    {
        $viloes = VilaoModel::all();
        return response()->json([
            'status' => true,
            'message' => 'Vilões exibidos com sucesso!',
            'data' => $viloes
        ], 200);
    }

    public function buscarVilaoPorId($id)
    {
        $vilao = VilaoModel::findOrFail($id);
        return response()->json([
            'status' => true,
            'message' => 'Vilão encontrado!',
            'data' => $vilao
        ], 200);
    }

    public function criarVilao(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:200',
            'universo' => 'required|string|max:100',
            'poder' => 'required|integer|'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Erro de validação',
                'errors' => $validator->errors()
            ], 422);
        }

        $vilao = VilaoModel::create($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Vilão criado com sucesso!',
            'data' => $vilao
        ], 201);
    }

    public function editarVilao(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:200',
            'universo' => 'required|string|max:100',
            'poder' => 'required|integer|'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Erro de validação',
                'errors' => $validator->errors()
            ], 422);
        }

        $vilao = VilaoModel::findOrFail($id);
        $vilao->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Vilão editado com sucesso!',
            'data' => $vilao
        ], 200);
    }

    public function deletarVilao($id)
    {
        $vilao = VilaoModel::findOrFail($id);
        $vilao->delete();
        
        return response()->json([
            'status' => true,
            'message' => 'Vilão deletado com sucesso'
        ], 204);
    }
}
