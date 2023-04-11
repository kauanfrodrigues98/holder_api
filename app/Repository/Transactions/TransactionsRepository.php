<?php

namespace App\Repository\Transactions;

use App\Http\Resources\TransactionsCollection;
use App\Http\Resources\TransactionsResource;
use App\Repository\Transactions\TransactionsRepositoryInterface;
use App\Models\Transactions;

class TransactionsRepository implements TransactionsRepositoryInterface {
    public function __construct(
        private Transactions $model
    ) {}

    /**
     * Cria uma nova transação
     *
     * @param array $data
     * @return TransactionsResource
     */
    public function store(array $data): TransactionsResource
    {
        return new TransactionsResource(
            $this->model->create($data)
        );
    }

    /**
     * Retorna todas as transações salvas.
     *
     * @return TransactionsCollection
     */
    public function get():TransactionsCollection
    {
        return new TransactionsCollection(
            $this->model->get()
        );
    }

    /**
     * Retorna uma transação com base no ID da transação
     *
     * @param integer $transactionId
     * @return TransactionsResource
     */
    public function find(int $transactionId): TransactionsResource
    {
        return new TransactionsResource(
            $this->model->find($transactionId)
        );
    }

    /**
     * Atualiza os dados de uma transação com base no ID
     *
     * @param integer $transactionId
     * @param array $data
     * @return boolean
     */
    public function update(int $transactionId, array $data): bool
    {
        return $this->model->find($transactionId)->update($data);
    }

    /**
     * Deleta uma transação com base no ID
     *
     * @param integer $transactionId
     * @return boolean
     */
    public function destroy(int $transactionId): bool
    {
        return $this->model->find($transactionId)->delete();
    }
}