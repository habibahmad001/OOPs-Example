<?php
class RequestHandler {
    private $product;
    private $apiUrl;

    public function __construct($product) {
        $this->product = $product;
        $this->setApiUrl();
    }

    private function setApiUrl() {
        $urls = [
            "Validifiv3-fi-risk-index" => "https://de20dc0b-4015-431e-ae42-0dbc6260eee3.mock.pstmn.io/validifiv3-fi-risk-index",
            "Validifiv3-account-validation" => "https://de20dc0b-4015-431e-ae42-0dbc6260eee3.mock.pstmn.io/validifiv3-account-validation",
            "Validifiv3-pi-risk4-individual" => "https://de20dc0b-4015-431e-ae42-0dbc6260eee3.mock.pstmn.io/validifiv3-pi-risk4-individual"
        ];

        if (array_key_exists($this->product, $urls)) {
            $this->apiUrl = $urls[$this->product];
        } else {
            throw new Exception('Invalid product selection.');
        }
    }

    public function getApiUrl() {
        return $this->apiUrl;
    }

    public function getProduct() {
        return $this->product;
    }
}
?>