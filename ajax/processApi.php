<?php
require_once '../classes/RequestHandler.php';
require_once '../classes/DoAPICall.php';
require_once '../classes/ResponseGenrator.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $selectedProduct = $_POST['product'] ?? '';

    try {
        if ($selectedProduct) {
            $productHandler = new RequestHandler($selectedProduct);
            $apiUrl = $productHandler->getApiUrl();

            if ($apiUrl) {
                $DoAPICall = new DoAPICall();
                $apiResponse = $DoAPICall->callApi($apiUrl);

                $parser = new ResponseGenrator($selectedProduct, $apiResponse);
                $parsedResponse = $parser->parse();

                echo json_encode([
                    'status' => 'success',
                    'message' => 'API call successful!',
                    'parsedData' => $parsedResponse
                ]);
            } else {
                throw new Exception('Invalid product selection.');
            }
        } else {
            throw new Exception('No product selected.');
        }
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}
?>