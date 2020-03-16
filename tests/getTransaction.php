<?php require_once __DIR__ . '/../vendor/autoload.php';


use KryptonPay\Config\settings;
use KryptonPay\KryptonPay;

try {
    ini_set("display_errors", 1);
    ini_set("display_startup_erros", 1);
    error_reporting(E_ALL);

    $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vZ2F0ZXdheS1hcGktbG9jYWwvbG9naW4iLCJpYXQiOjE1NzkyODkyNjIsIm5iZiI6MTU3OTI4OTI2MiwianRpIjoiQkNMeUJIV2syamx6SmIwdyIsInN1YiI6MSwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyIsImxjbCI6InB0LWJyIiwidGtuIjpmYWxzZSwiZGF0ZXRpbWUiOiIyMDIwLTAxLTE3VDE5OjI3OjQyKzAwMDAifQ.XxuGyVZ9iMOq6cwaVuTh-4lTvBr1Xw7nsotV9v7eeSM';
    $environment = 'H';
    $settings = new Settings($token, $environment);

    $reference = 18885;
    $transactions = new KryptonPay($settings);
    $recompense = $transactions->getTransaction($reference);
} catch (\Exception $e) {
    echo($e->getMessage());
}
