<?php
class ResponseGenrator {
    private $productName;
    private $responseData;

    public function __construct($productName, $jsonResponse) {
        $this->productName = $productName;
        $this->setResponseData($jsonResponse);
    }

    private function setResponseData($jsonResponse) {
        $decodedData = json_decode($jsonResponse, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new Exception("Invalid JSON response: " . json_last_error_msg());
        }

        $this->responseData = $decodedData;
    }

    public function parse() {
        if (!$this->responseData) {
            throw new Exception("No data to parse.");
        }

        $parsedData = "<h3>Parsed Response:</h3><ul class='list-group'>";
        foreach ($this->responseData as $key => $value) {
            $parsedData .= "<li class='list-group-item'>{$this->productName}-{$key}: ";
            $parsedData .= $this->formatValue($value);
            $parsedData .= "</li>";
        }
        $parsedData .= "</ul>";

        return $parsedData;
    }

    private function formatValue($value) {
        if (is_array($value)) {
            $result = "<ul>";
            foreach ($value as $subKey => $subValue) {
                $result .= "<li>{$subKey}: " . $this->formatValue($subValue) . "</li>";
            }
            $result .= "</ul>";
            return $result;
        } else {
            return htmlspecialchars($value);
        }
    }
}
?>