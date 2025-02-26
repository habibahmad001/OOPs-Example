<?php
class DoAPICall {
    public function callApi($url) {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            curl_close($ch);
            throw new Exception("Curl Error: " . curl_error($ch));
        }

        curl_close($ch);

        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if ($httpCode >= 400) {
            throw new Exception("HTTP Error: Received response code " . $httpCode);
        }

        return $response;
    }
}
?>