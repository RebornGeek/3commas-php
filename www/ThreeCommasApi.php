<?php
/*
 * 3Commas.io API PHP wrapper class
 */

class ThreeCommasApi {
    public function __construct() {
        $this->credentials['api_key'] = 'vmPUZE6mv9SD5VNHk4HlWFsOr6aKE2zvsw0MuIgwCIPy6utIco14y7Ju91duEh8A'; // Enter apiKey here
        $this->credentials['secret'] = 'NhqPtmdSJYdKjVHjA7PZj4Mge3R5YNiP1e3UZjInClVN65XAbvqqM6A7H5fATj0j'; // Enter secretKey here
        $this->credentials['type'] = 'binance'; // Enter type here
        $this->credentials['name'] = 'binance_account'; // Enter name here
    }

    public function requestJson($userRequestData = []) {
        $requestData = array_merge($this->credentials, $userRequestData);

        $ch = curl_init('https://api.3commas.io/public/api/ver1/ping');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $requestData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, TRUE);
        $output = curl_exec($ch);

        if (curl_errno($ch)) {
            $output = curl_error($ch);
        }

        curl_close($ch);
        return $output;
    }
}