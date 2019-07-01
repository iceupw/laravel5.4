<?php
namespace App\Base\Http;

use Google\Protobuf\Internal\DescriptorPool;
use Grpc\BaseStub;


class GrpcHandler extends BaseStub{

    //用于发送request的实例，通过setRespnse设置
    private $request;

    //请求接口返回的response的实例，可以通过getResponse获取
    //simpleCallApi如果请求成功，返回的也是该实例
    private $response;

    //请求接口返回的状态实例，可以通过getStatus获取
    private $status;
    /**
     * 构造方法
     * GrpcHandler constructor.
     * @param string $hostname   接口地址
     * @param array $opts
     * @param Channel|null $channel
     */
    public function __construct($hostname, $opts = [], Channel $channel = null){
        if(empty($opts)){
            $opts = [
                'credentials' => \Grpc\ChannelCredentials::createInsecure()
            ];
        }
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * 设置接口request  这个request是通过protoc自动生成的对应的request
     * @param $requestPath  是这个request的包名和类名，就是这个类的绝对位置
     * @param $args        需要设置的request的参数名，要和request里的方法保持一致
     * 例如  request 里有方法 getTypeid   传递参数的时候要写成 typeid=>1,会自动调用getTypeid设置参数
     */
    public function setRequest($requestPath, $args){
        $request = new $requestPath();
        if(!empty($args) && is_array($args)){
            foreach($args as $key => $value){
                $func = 'set';
                //构造方法，把下划线装成驼峰
                $str = explode('_' , $key);
                foreach($str as $val){
                    $func .= ucfirst($val);
                }
                $request->$func($value);
            }
        }
        $this->request = $request;
    }

    /**
     * 调用接口
     * @param $apiName          接口名称(java的服务器，要包括包名，类名和方法名，如/com.doumi.account.CpaAccountService/getAccountRecord)
     * @param $responsePath     回复类的绝对位置，包名+类名
     * @param array $metadata
     * @param array $options
     * @return \Grpc\SimpleSurfaceActiveCall
     */
    public function simpleCallApi($apiName, $responsePath, $metadata=[], $options=[]){
        if(empty($this->request)){
            throw new \Exception('请先调用setRequest方法，设置request和参数');
        }
        $re = $this->_simpleRequest($apiName,  //接口名称  proto文件定义的
            $this->request,                    //上面设置的request
            [$responsePath, 'decode'],         //返回数据，proto文件定义的response 要带上包名
            $metadata, $options)->wait();
        list($reply, $status) = $re;
        $this->status = $status;
        if($status->code == '0'){//返回成功
            $this->response = $reply;
            return $reply;
        }else{//返回失败的情况
            $this->response = [];
            return false;
        }
    }
    /**
     * 调用接口
     * @param $apiName          接口名称(java的服务器，要包括包名，类名和方法名，如/com.doumi.account.CpaAccountService/getAccountRecord)
     * @param $responsePath     回复类的绝对位置，包名+类名
     * @param array $metadata
     * @param array $options
     * @return \Grpc\SimpleSurfaceActiveCall
     */
    public function getSimpleGrpcRespone($apiName, $responsePath, $metadata=[], $options=[]){
        if(empty($this->request)){
            throw new \Exception('请先调用setRequest方法，设置request和参数');
        }
        $re = $this->_simpleRequest($apiName,  //接口名称  proto文件定义的
            $this->request,                    //上面设置的request
            [$responsePath, 'encode'],         //返回数据，proto文件定义的response 要带上包名
            $metadata, $options)->wait();
        try{
            if($re[0]) {
                $reply = json_decode($re[0]->getResInfo(),true);
            } else {
                throw new \Exception('返回失败');
            }
        } catch(\Exception $e) {
            \Log::info('attr get from grpc:'.$e->getMessage());

        }
        if($reply['code'] == 10000){//返回成功
            $this->response = $reply['response'];
            return $reply['response'];
        }else{//返回失败的情况
            $this->response = [];
            return false;
        }
    }
    public function setRequestSimple($requestPath,$args=[]){
        $request = new $requestPath();
        foreach($args as $key=>$value){
            $curKey='set'.$key;
            $request->$curKey($value);
        }
        $this->request = $request;
    }

    /**
     * 获取请求接口后返回的for grpc
     * @return mixed
     */
    public function setRequestForGrpc($requestPath,$args=[]){
        $request = new $requestPath();
        $request->setReqInfo($args);
        $this->request = $request;
    }

    /**
     * 获取请求接口后返回的response实例(接口请求成功了才会有实例)
     * @return mixed
     */
    public function getResponse(){
        return $this->response;
    }

    /**
     * 请求接口后，返回接口返回的状态
     * @return mixed
     */
    public function getStatus(){
        return $this->status;
    }


}
