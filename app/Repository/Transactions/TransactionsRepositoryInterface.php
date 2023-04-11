<?php

namespace App\Repository\Transactions;

use App\Http\Resources\TransactionsCollection;
use App\Http\Resources\TransactionsResource;

interface TransactionsRepositoryInterface {

    /**
     * Cria uma nova transação
     *
     * @param array $data
     * @return TransactionsResource
     */
    public function store(array $data): TransactionsResource;

    /**
     * Retorna todas as transações salvas
     *
     * @return TransactionsCollection
     */
    public function get(): TransactionsCollection;

    /**
     * Retorna uma transação com base no ID da transação
     *
     * @param integer $transactionId
     * @return TransactionsResource
     */
    public function find(int $transactionId): TransactionsResource;

    /**
     * Atualiza os dados de uma transação com base no ID
     *
     * @param integer $transactionId
     * @param array $data
     * @return boolean
     */
    public function update(int $transactionId, array $data): bool;

    /**
     * Deleta uma transação com base no ID
     *
     * @param integer $transactionId
     * @return boolean
     */
    public function destroy(int $transactionId): bool;
}