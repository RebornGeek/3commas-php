<?php
/*
 * 3Commas API Client for PHP (Version 1)
 */

class ThreeCommasApi {
    private $baseUrl = 'https://api.3commas.io/public/api';

    public function __construct() {
        $this->credentials['api_key'] = 'vmPUZE6mv9SD5VNHk4HlWFsOr6aKE2zvsw0MuIgwCIPy6utIco14y7Ju91duEh8A'; // Enter apiKey here
        $this->credentials['secret'] = 'NhqPtmdSJYdKjVHjA7PZj4Mge3R5YNiP1e3UZjInClVN65XAbvqqM6A7H5fATj0j'; // Enter secretKey here
        $this->credentials['type'] = 'binance'; // Enter type here
        $this->credentials['name'] = 'binance_account'; // Enter name here
    }

    public function ping() {
        return $this->requestJson('/ver1/ping', [], 'get');
    }

    public function time() {
        return $this->requestJson('/ver1/time', [], 'get');
    }

    // Bots api
    public function botsStrategyList() {
        return $this->requestJson('/ver1/bots/strategy_list', ['signed' => TRUE], 'get');
    }

    private function requestJson($endPoint, $data, $method = 'post') {
        return json_encode($this->request($endPoint, $data, $method));
    }

    private function request($endPoint, $data, $method = 'post') {
        if (is_array($data)) {
            $url = $this->baseUrl . $endPoint;
            $ch = curl_init();
            $httpHeader['Content-Type'] = 'application/json';

            if(isset($data['signed']) && $data['signed'] === TRUE) {
                $httpHeader['Signature'] = $this->getSignature();
            }

            $curlOptions = [
                CURLOPT_HTTPHEADER => $httpHeader,
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true
            ];

            if ($method === 'post') {
                $curlOptions[CURLOPT_POST] = true;
                $curlOptions[CURLOPT_POSTFIELDS] = json_encode($data);
                self::$requestJsonData = $curlOptions[CURLOPT_POSTFIELDS];
            } else {
                $curlOptions[CURLOPT_URL] .= '?' . http_build_query($data);
            }

            curl_setopt_array($ch, $curlOptions);

            $responseBody = curl_exec($ch);
            $curlInfo = curl_getinfo($ch);
            $curlError = curl_error($ch);
            $curlErrno = curl_errno($ch);

            $return = [
                'body' => (strlen($responseBody) > 0 ? json_decode($responseBody) : ''),
                'httpCode' => $curlInfo['http_code'],
                'curlError' => $curlError,
                'curlErrno' => $curlErrno,
                'curlInfo' => $curlInfo
            ];

            return $return;
        }

        return FALSE;
    }

    private function getSignature() {
        return hash_hmac('sha256', 'uri?totalParams', $this->credentials['secret']);
    }
}
