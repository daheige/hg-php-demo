<?php
namespace Logic;

/**
 * Logic 基类
 * @author heige
 */
class BaseLogic
{
    protected $errorCode         = 0;
    protected $errorMessages     = ['0' => ''];
    protected $errorMessage      = '';
    protected static $_instances = [];

    public static function getInstance()
    {
        $class = get_called_class();
        if (!isset(self::$_instances[$class])) {
            self::$_instances[$class] = new $class();
        }
        return self::$_instances[$class];
    }

    public function getInterfaceData($epi_curl_manager)
    {
        $response = $epi_curl_manager->getResponse();
        $temp     = false;
        if ($response['code'] == 200) {
            $response_data = json_decode($response['data'], true);
            if ($response_data['code'] === 0) {
                $temp = isset($response_data['data']) ? $response_data['data'] : '';
                if ($response['time'] > 0.2) {
                    // 记录慢查询接口
                    Log::notice("CURL REQUEST ERROR : HTTP_CODE=" . $response['code'] . '; TOTAL_TIME=' . $response['time'] . "; EFFECTIVE_URL=" . $response['url'] . '; Data :' . $response['data']);
                }
            } else {
                // 记录接口返回错误数据
                $this->errorCode        = $response_data['code'];
                $this->serviceErrorInfo = $response_data;
                Log::warn("CURL REQUEST ERROR : HTTP_CODE=" . $response['code'] . '; TOTAL_TIME=' . $response['time'] . "; EFFECTIVE_URL=" . $response['url'] . '; Data :' . $response['data']);
                return false;
            }
        } else {
            // 记录接口请求错误
            Log::error("CURL REQUEST ERROR : HTTP_CODE=" . $response['code'] . '; TOTAL_TIME=' . $response['time'] . "; EFFECTIVE_URL=" . $response['url'] . '; Data :' . $response['data']);
            return false;
        }
        return $temp;
    }

    public function getErrorMessage()
    {
        return empty($this->errorMessage) ? (isset($this->errorMessages[$this->errorCode]) ? $this->errorMessages[$this->errorCode] : '') : $this->errorMessage;
    }

    public function getErrorCode()
    {
        return $this->errorCode;
    }

    public function setErrorInfo($code = 200, $msg = 'ok')
    {
        $this->errorCode    = $code;
        $this->errorMessage = $msg;
    }
}
