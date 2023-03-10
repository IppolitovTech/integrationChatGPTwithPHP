<?php
//To work with ChatGPT API integrations with PHP, you need to install "Composer" on your PC. After that enter, the command "composer install" and use it.

require __DIR__ . '/vendor/autoload.php';

use GuzzleHttp\Client;

$apiKey = "sk-1111111111111111111111111111111"; // Your API Key from https://platform.openai.com/account/api-keys
$model = "text-davinci-003"; // the Codex API model you want to use
$prompt = "What is the capital Republic of Kazakhstan?"; // Question (request)

$client = new Client([
    'headers' => [
        'Content-Type' => 'application/json',
        'Authorization' => 'Bearer ' . $apiKey,
    ],
]);

$response = $client->post("https://api.openai.com/v1/completions", [
    'json' => [
        'prompt' => $prompt,
        'model' => $model,
        'max_tokens' => 200
    ],
]);

$data = $response->getBody();
$data = json_decode($data);
$text = $data->choices[0]->text;
echo $text; //Answer
