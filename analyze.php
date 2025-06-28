<?php
$openrouter_api_key = "YOUR-OPENROUTER-API-KEY";
$model = "OPEN-ROUTER-AI-MODEL";
$data = json_decode(file_get_contents("php://input"), true);
$ingredients = $data['ingredients'] ?? '';
$n = $data['nutrition'] ?? [];

$prompt = <<<PROMPT
Give a short 1-2 sentence nutrition summary based on the following:

Ingredients: $ingredients

Nutrition:
- Calories: {$n['calories']} kcal
- Sugar: {$n['sugars']} g
- Saturated Fat: {$n['saturated_fat']} g
- Trans Fat: {$n['trans_fat']} g
- Salt: {$n['salt']} g
- Fiber: {$n['fiber']} g
- Protein: {$n['protein']} g
- Carbs: {$n['carbohydrates']} g
- Fruit/Veg/Nuts: {$n['fruits_pct']}%
- Vitamin A: {$n['vitamin_a']} µg
- Vitamin C: {$n['vitamin_c']} mg

Only reply with the summary. No extra text or formatting.
PROMPT;

$request_data = [
  "model" => $model,
  "temperature" => 0.3,
  "messages" => [["role" => "user", "content" => $prompt]]
];

$ch = curl_init();
curl_setopt_array($ch, [
  CURLOPT_URL => "https://openrouter.ai/api/v1/chat/completions",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_POST => true,
  CURLOPT_POSTFIELDS => json_encode($request_data),
  CURLOPT_HTTPHEADER => [
    "Authorization: Bearer $openrouter_api_key",
    "HTTP-Referer: https://example.com",
    "X-Title: Nutrition Summary",
    "Content-Type: application/json"
  ]
]);

$response = curl_exec($ch);
curl_close($ch);
$result = json_decode($response, true);

echo $result['choices'][0]['message']['content'] ?? '⚠️ AI returned nothing.';
