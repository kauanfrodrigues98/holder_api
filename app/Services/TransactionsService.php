<?php

namespace App\Services;

use App\Http\Requests\StoreTransactionsRequest;
use App\Http\Requests\UpdateTransactionsRequest;
use App\Http\Resources\TransactionsCollection;
use App\Http\Resources\TransactionsResource;
use App\Repository\Transactions\TransactionsRepositoryInterface;
use App\Traits\HelperTrait;
use \Exception;

class TransactionsService {
    use HelperTrait;

    public function __construct(
        private TransactionsRepositoryInterface $transactionsRepository
    ) {}

    /**
     * Cria uma nova transação
     *
     * @access public
     * @param StoreTransactionsRequest $request
     * @return TransactionsResource $transaction
     */
    public function store(StoreTransactionsRequest $request):TransactionsResource
    {
        $data = $request->only([
            'description',
            'purchase_value',
            'sale_value',
            'initial_date',
            'final_date',
        ]);

        $duration = $this->getDuration($request->initial_date, $request->final_date);

        $data['duration'] = $duration->format('%h') . ' Hours ' . $duration->format('%i') . ' Minutes ' . $duration->format('%s') . ' Seconds';

        $data['result'] = $this->getResult($request->sale_value, $request->purchase_value);

        $transaction = $this->transactionsRepository->store($data);

        if(!$transaction) {
            throw new Exception('Não foi possível completar a transação.');
        }

        return $transaction;
    }

    /**
     * Retorna todas as transações
     *
     * @access public
     * @return TransactionsCollection
     */
    public function get(): TransactionsCollection
    {
        $transactions = $this->transactionsRepository->get();

        if(!$transactions) {
            throw new Exception('Não conseguimos concluir sua solicitação.');
        }

        return $transactions;
    }

    /**
     * Retorna uma transação com base no ID
     *
     * @access public
     * @param integer $transactionId
     * @return TransactionsResource
     */
    public function find(int $transactionId):TransactionsResource
    {
        $transaction = $this->transactionsRepository->find($transactionId);

        if(!$transaction) {
            throw new Exception('Não conseguimos encontrar a transação solicitada.');
        }

        return $transaction;
    }

    /**
     * Atualiza os dados de uma transação com base no ID
     *
     * @access public
     * @param integer $transactionId
     * @param array $data
     * @return boolean
     */
    public function update(int $transactionId, UpdateTransactionsRequest $request): bool
    {
        $data = $request->only([
            'description',
            'purchase_value',
            'sale_value',
            'initial_date',
            'final_date',
        ]);

        $duration = $this->getDuration($request->initial_date, $request->final_date);

        $data['duration'] = $duration->format('%h') . ' Hours ' . $duration->format('%i') . ' Minutes ' . $duration->format('%s') . ' Seconds';

        $data['result'] = $this->getResult($request->sale_value, $request->purchase_value);

        $transaction = $this->transactionsRepository->update($transactionId, $data);

        if(!$transaction) {
            throw new Exception('Não conseguimos concluir a atualização da transação que você solicitou.');
        }

        return $transaction;
    }

    /**
     * Remove uma transação com base no ID
     *
     * @access public
     * @param integer $transactionId
     * @return boolean
     */
    public function destroy(int $transactionId): bool
    {
        $transaction = $this->transactionsRepository->destroy($transactionId);

        if(!$transaction) {
            throw new Exception('Não conseguimos concluir a exclusão da transação que você solicitou.');
        }

        return $transaction;
    }
}