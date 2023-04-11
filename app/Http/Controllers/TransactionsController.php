<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransactionsRequest;
use App\Http\Requests\UpdateTransactionsRequest;
use App\Models\Transactions;
use App\Services\TransactionsService;
use \Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class TransactionsController extends Controller
{
    protected TransactionsService $transactionsService;

    public function __construct(TransactionsService $transactionsService) {
        $this->transactionsService = $transactionsService;
    }

    /**
     * Retorna todos os registros.
     * 
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        try {
            $data = $this->transactionsService->get();

            $response = [
                'status' => 'success',
                'code' => 200,
                'message' => 'Transações encontradas.',
                'data' => $data 
            ];

            return response()->json($response);
        } catch(Exception $e) {
            $response = [
                'status' => 'error',
                'code' => $e->getCode(),
                'message' => $e->getMessage(),
                'data' => []
            ];

            return response()->json($response);
        }
    }

    /**
     * Cria um novo registro.
     * 
     * @param StoreTransactionsRequest $request
     * @return JsonResponse
     */
    public function store(StoreTransactionsRequest $request): JsonResponse
    {
        try {
            DB::beginTransaction();

            $data = $this->transactionsService->store($request);
            
            DB::commit();

            $response = [
                'status' => 'success',
                'code' => 200,
                'message' => 'Transação realizada com sucesso.',
                'data' => $data 
            ];

            return response()->json($response);
        } catch(Exception $e) {
            DB::rollBack();
            $response = [
                'status' => 'error',
                'code' => $e->getCode(),
                'message' => $e->getMessage(),
                'data' => []
            ];

            return response()->json($response);
        }
    }

    /**
     * Retorna um registro especifico com base no ID.
     * 
     * @param int $transactionId
     * @return JsonResponse
     */
    public function show(int $transactionId): JsonResponse
    {
        try {
            $data = $this->transactionsService->find($transactionId);

            $response = [
                'status' => 'success',
                'code' => 200,
                'message' => 'Transação encontrada.',
                'data' => $data 
            ];

            return response()->json($response);
        } catch(Exception $e) {
            $response = [
                'status' => 'error',
                'code' => $e->getCode(),
                'message' => $e->getMessage(),
                'data' => []
            ];

            return response()->json($response);
        }
    }

    /**
     * Atualiza um registro já existente.
     * 
     * @param int $transactionId
     * @param UpdateTransactionsRequest $request
     * @return JsonResponse
     */
    public function update(int $transactionId, UpdateTransactionsRequest $request): JsonResponse
    {
        try {
            DB::beginTransaction();

            $data = $this->transactionsService->update($transactionId, $request);
            
            DB::commit();

            $response = [
                'status' => 'success',
                'code' => 200,
                'message' => 'Transação realizada com sucesso.',
                'data' => $data 
            ];

            return response()->json($response);
        } catch(Exception $e) {
            DB::rollBack();
            $response = [
                'status' => 'error',
                'code' => $e->getCode(),
                'message' => $e->getMessage(),
                'data' => []
            ];

            return response()->json($response);
        }
    }

    /**
     * Deleta um registro com base no ID.
     * 
     * @param int $transactionId
     * @return JsonResponse
     */
    public function destroy(int $transactionId): JsonResponse
    {
        try {
            DB::beginTransaction();

            $data = $this->transactionsService->destroy($transactionId);
            
            DB::commit();

            $response = [
                'status' => 'success',
                'code' => 200,
                'message' => 'Transação excluída com sucesso.',
                'data' => $data 
            ];

            return response()->json($response);
        } catch(Exception $e) {
            DB::rollBack();
            $response = [
                'status' => 'error',
                'code' => $e->getCode(),
                'message' => $e->getMessage(),
                'data' => []
            ];

            return response()->json($response);
        }   
    }
}
