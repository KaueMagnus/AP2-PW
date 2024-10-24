<?php

namespace App\Http\Controllers;

use App\Models\SuperHeroiModel;
use App\Responses\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SuperHeroiController extends Controller
{
    public function exibirSuperHerois()
    {
        $superherois = SuperHeroiModel::all();
        return response()->json([
            'status' => true,
            'message' => 'Super Herois exibidos com sucesso!',
            'data' => $superherois
        ], 200);
    }

    public function buscarSuperHeroiPorId($id)
    {
        $superheroi = SuperHeroiModel::findOrFail($id);
        return response()->json([
            'status' => true,
            'message' => 'Super Heroi encontrado com sucesso!',
            'data' => $superheroi
        ], 200);
    }

    public function criarSuperHeroi(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:200',
            'universo' => 'required|string|max:100',
            'poder' => 'required|integer|'
        ]);

        if ($validator->fails()) {
            return JsonResponse()->json([
                'status' => false,
                'message' => 'Erro de validação',
                'errors' => $validator->errors()
            ], 422);
        }

        $superheroi = SuperHeroiModel::create($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Super Heroi criado com sucesso!',
            'data' => $superheroi
        ], 201);
    }

    public function editarSuperHeroi(Request $request, $id)
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

        $superheroi = SuperHeroiModel::findOrFail($id);
        $superheroi->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Super Heroi editado com sucesso!',
            'data' => $superheroi
        ], 200);
    }

    public function deletarSuperHeroi($id)
    {
        $superheroi = SuperHeroiModel::findOrFail($id);
        $superheroi->delete();
        
        return response()->json([
            'status' => true,
            'message' => 'Super herói deletado com sucesso'
        ], 204);
    }
}
