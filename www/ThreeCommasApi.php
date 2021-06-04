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

        if(!empty($userRequestData)) {
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_POSTFIELDS, $requestData);
            curl_setopt($curl, CURLOPT_URL, 'https://api.3commas.io/public/api');
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_VERBOSE, true);
            $output = curl_exec($curl);
            curl_close($curl);
            return $output;
        }

        return FALSE;
    }
}