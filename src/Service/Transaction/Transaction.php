<?php namespace KryptonPay\Service\Transaction;

use Carbon\Carbon;
use KryptonPay\Helpers\Util;
use KryptonPay\Models\Transaction\Transacao;
use KryptonPay\Models\Transaction\Itens;

class Transaction
{
    protected $transaction;
    protected $data;

    const SLIPBANK = 1;
    const CARD = 2;
    const PAYER_TYPE_CPF = 1;
    const PAYER_TYPE_CNPJ = 2;

    public function __construct(array $data)
    {
        $this->data = $data;
        $this->transacao = new Transacao();
        $this->setModels();
    }

    protected function setModels(): void
    {
        $this->transacao->tipoPagamento = (!empty($this->data['tipoPagamento'])) ? (int) $this->data['tipoPagamento'] : null;
        $this->transacao->referencia = (!empty($this->data['referencia'])) ? (string) $this->data['referencia'] : null;
        $this->setModelPayer();
        $this->setModelAddress();
        $this->setModelItens();
        $this->setModelSplit();
    }

    protected function setModelPayer(): void
    {
        $this->transacao->pagador->tipo = (!empty($this->data['pagador']['tipo'])) ? (int) $this->data['pagador']['tipo'] : null;
        $this->transacao->pagador->nome = (!empty($this->data['pagador']['nome'])) ? (string) $this->data['pagador']['nome'] : null;
        $this->transacao->pagador->dataNascimento = (!empty($this->data['pagador']['dataNascimento'])) ? (string) Carbon::createFromFormat('d/m/Y', $this->data['pagador']['dataNascimento'])->format('Y-m-d') : null;
        $this->transacao->pagador->email = (!empty($this->data['pagador']['email'])) ? (string) $this->data['pagador']['email'] : null;
        $this->transacao->pagador->celular = (!empty($this->data['pagador']['celular'])) ? (string) Util::removerMaskTel($this->data['pagador']['celular']) : null;
        if (!empty($this->data['pagador']['tipo']) && $this->data['pagador']['tipo'] == self::PAYER_TYPE_CPF) {
            $this->transacao->pagador->cpf = (!empty($this->data['pagador']['cpf'])) ? Util::removerMaskCpfCnpj($this->data['pagador']['cpf']) : null;
        } else {
            $this->transacao->pagador->cnpj = (!empty($this->data['pagador']['cnpj'])) ? Util::removerMaskCpfCnpj($this->data['pagador']['cnpj']) : null;
        }
    }

    protected function setModelAddress(): void
    {
        $this->transacao->pagador->endereco->logradouro = (!empty($this->data['pagador']['endereco']['logradouro'])) ? (string) $this->data['pagador']['endereco']['logradouro'] : null;
        $this->transacao->pagador->endereco->numero = (!empty($this->data['pagador']['endereco']['numero'])) ? (string) $this->data['pagador']['endereco']['numero'] : null;
        $this->transacao->pagador->endereco->bairro = (!empty($this->data['pagador']['endereco']['bairro'])) ? (string) $this->data['pagador']['endereco']['bairro'] : null;
        $this->transacao->pagador->endereco->cep = (!empty($this->data['pagador']['endereco']['cep'])) ? (string) Util::removerMaskCep($this->data['pagador']['endereco']['cep']) : null;
        $this->transacao->pagador->endereco->complemento = (!empty($this->data['pagador']['endereco']['complemento'])) ? (string) $this->data['pagador']['endereco']['complemento'] : null;
        $this->transacao->pagador->endereco->cidade = (!empty($this->data['pagador']['endereco']['cidade'])) ? (string) $this->data['pagador']['endereco']['cidade'] : null;
        $this->transacao->pagador->endereco->uf = (!empty($this->data['pagador']['endereco']['uf'])) ? (string) $this->data['pagador']['endereco']['uf'] : null;
        $this->transacao->pagador->endereco->pais = (!empty($this->data['pagador']['endereco']['pais'])) ? (string) $this->data['pagador']['endereco']['pais'] : null;
    }

    protected function setModelItens(): void
    {
        if (isset($this->data['itens']) && is_array($this->data['itens'])) {
            foreach ($this->data['itens'] as $key => $item) {
                $mdlItem[$key] = new Itens();
                $mdlItem[$key]->codigo = (!empty($item['codigo'])) ? (string) $item['codigo'] : null;
                $mdlItem[$key]->descricao = (!empty($item['descricao'])) ? (string) $item['descricao'] : null;
                $mdlItem[$key]->valorUnitario = (!empty($item['valorUnitario'])) ? (int) Util::numberFormat($item['valorUnitario']) : null;
                $mdlItem[$key]->quantidade = (!empty($item['quantidade'])) ? (int) $item['quantidade'] : null;
            }
            $this->transacao->itens = $mdlItem;
        }
    }

    protected function setModelSplit(): void
    {
        if (isset($this->data['split']) && is_array($this->data['split'])) {
            foreach ($this->data['split'] as $key => $split) {
                $this->transacao->split[$key]['documento'] = (!empty($split['documento'])) ? (string) Util::removerMaskCpfCnpj($split['documento']) : null;
                $this->transacao->split[$key]['valor'] = (!empty($split['valor'])) ? (int) Util::numberFormat($split['valor']) : null;
            }
        }
    }
}
