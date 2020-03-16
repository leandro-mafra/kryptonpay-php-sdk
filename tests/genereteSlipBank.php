<?php require_once __DIR__ . '/../vendor/autoload.php';


use KryptonPay\Config\settings;
use KryptonPay\KryptonPay;

try {
    $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vZ2F0ZXdheS1hcGktbG9jYWwvbG9naW4iLCJpYXQiOjE1NzkyODkyNjIsIm5iZiI6MTU3OTI4OTI2MiwianRpIjoiQkNMeUJIV2syamx6SmIwdyIsInN1YiI6MSwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyIsImxjbCI6InB0LWJyIiwidGtuIjpmYWxzZSwiZGF0ZXRpbWUiOiIyMDIwLTAxLTE3VDE5OjI3OjQyKzAwMDAifQ.XxuGyVZ9iMOq6cwaVuTh-4lTvBr1Xw7nsotV9v7eeSM';
    $environment = 'H';
    $settings = new Settings($token, $environment);

    if ($environment == 'H') {
        ini_set("display_errors", 1);
        ini_set("display_startup_erros", 1);
        error_reporting(E_ALL);
    }

    $dataSlipBank = [
        "tipoPagamento" => 1,
        "referencia" => "18885",
        "pagador" => [
            "tipo" => 1,
            "nome" => "Josefa Luana Gabriela Rodrigues",
            "cpf" => "245.949.697-47",
            "dataNascimento" => "08/07/1957",
            "email" => "josefaluanagabrielarodrigues@allcor.com.br",
            "celular" => "(84) 3702-6870",
            "endereco" => [
                "logradouro" => "Rua Presidente Costa e Silva, s/n",
                "numero" => "222",
                "bairro" => "Centro",
                "cep" => "30.285-420",
                "complemento" => "CS",
                "uf" => "RN",
                "cidade" => "Caicara do Rio",
                "pais" => "Brasil",
            ],
        ],
        "itens" => [
            [
                "codigo" => "123456",
                "descricao" => "Produto teste",
                "valorUnitario" => "1.180,00",
                "quantidade" => 1,
            ],
            [
                "codigo" => "32140",
                "descricao" => "Produto teste2",
                "valorUnitario" => "999,00",
                "quantidade" => 2,
            ],
        ],
        "boleto" => [
            "valor" => '150,00',
            "dataVencimento" => "30/03/2020",
            "pagamentoParcial" => null,
            "cancelarAposVencimento" => null,
            "porcentagemMulta" => null,
            "porcentagemJuros" => null,
            "dataDesconto" => null,
            "valorDesconto" => null,
            "dataMulta" => null,
            "observacoes" => [
                "Observação 1",
                "Observação 2",
                "Observação 3",
                null,
            ],
            "instrucoes" => "Pagável em qualquer agência lotérica",
        ],
       /*  "split" => [
            [
                "documento" => "94058784687",
                "valor" => 75,
            ],
        ], */
    ];

    $transactions = new KryptonPay($settings);
    $recompense = $transactions->genereteSlipBank($dataSlipBank);
    dd($recompense);
} catch (\Exception $e) {
    echo($e->getMessage());
}
