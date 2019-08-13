<?php
/**
 * @brief Handler http such as curl
 * @author hepeng
 *
 */



namespace App\Base\Http;

class HttpHandler
{

     /**
     * @brief curl opts
     * @var array
     */
    private $DEFAULT_CURLOPTS = array(
        CURLOPT_CONNECTTIMEOUT    => 3,
        CURLOPT_TIMEOUT           => 5,
        CURLOPT_USERAGENT         => 'ganji-php-1.0',
        CURLOPT_HTTP_VERSION      => CURL_HTTP_VERSION_1_1,
        CURLOPT_RETURNTRANSFER    => true,
        CURLOPT_HEADER            => false,
        CURLOPT_FOLLOWLOCATION    => false,
    );

    //curl post
    public function curlPost($url, $params, $timeout=2) {
        $timeout = (int) $timeout;
        try {
            return $this->execCurlHttpRequest($url, $params, 'POST', array(CURLOPT_TIMEOUT => $timeout));
        } catch (Exception $e) {
            throw $e;
        }

    }

    //curl get
    public function curlGet($url, $params, $timeout=2) {
        $timeout = (int) $timeout;
        try {
            return $this->execCurlHttpRequest($url, $params, 'GET', array(CURLOPT_TIMEOUT => $timeout));
        } catch (Exception $e) {
            throw $e;
        }

    }

    /**
     * @brief curl
     * @param $url
     * @param array $params
     * @param string HTTP POST, GET
     * @param array $curlOpts curl ????, ????
     * @return mix
     */
    private function execCurlHttpRequest($url, $param = array(), $httpMethod = 'POST', $curlOpts = null) {
        if (!is_array($curlOpts) || !$curlOpts) {
            $curlOpts = $this->DEFAULT_CURLOPTS;
        } else {
            $curlOpts = (array)$curlOpts + (array) $this->DEFAULT_CURLOPTS;
        }

        $_useHttps = false;
        if (stripos($url, 'https://') === 0) {
            $_useHttps = true;
        }
        $ch = curl_init();

        if ($_useHttps) {
            $curlOpts[CURLOPT_SSL_VERIFYPEER] = false;
        }

        if ($httpMethod == 'POST') {
            $curlOpts[CURLOPT_URL] = $url;
            $curlOpts[CURLOPT_POSTFIELDS] = $param;
        } else {
            $postData = http_build_query($param, '', '&');
            $delimiter = strpos($url, '?') === false ? '?' : '&';
            $curlOpts[CURLOPT_URL] = $url . $delimiter . $postData;
            $curlOpts[CURLOPT_POST] = false;
        }
        curl_setopt_array($ch, $curlOpts);
        $result = curl_exec($ch);
        if ($result === false) {
            $msg = sprintf('curl_errno=%s, curl_error=%s', curl_errno($ch), curl_error($ch));
            curl_close($ch);
            throw new \Exception($msg);
        } elseif (empty($result)) {
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            if ($httpCode != 200) {
                $msg = sprintf('http response status code: %s', $httpCode);
                curl_close($ch);
                throw new \Exception($msg);
            }
        }

        curl_close($ch);
        return $result;
    }

    public function postJson($url, $parm)
    {
        //curl验证成功
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS,$parm);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($parm)
        ));

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            print curl_error($ch);
        }
        curl_close($ch);
        return $result;
    }
}
