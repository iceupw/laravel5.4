<?php
/**
 * created by wuzhengzhong@doumi.com
 * User: wuzhengzhong
 * Date: 2016-10-17 11:27:34
 */

namespace App\Base\Queue\Rabbitmq;

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;
use Config;

class RabbitmqClient{
    protected $handler;
    protected $exchange = '';
    protected $queueKey = "";
    protected $queueConf = [];
    protected $arrCurrentConf = [];
    protected $consumerTag = "";
    /**
     * @var \PhpAmqpLib\Channel\AMQPChannel
     */
    public $channel;
    /**
     * @var \PhpAmqpLib\Connection\AMQPStreamConnection
     */
    public $connection;


    public function __construct($exchangeName, $conf = [], $durable = false)
    {
        if(empty($conf)) {
            $conf = Config::get('basecrmqueueconfig.rabbitmq');
        }
        $this->queueKey = $conf['info'][$exchangeName]['queueKey'];
        $this->exchange = $conf['info'][$exchangeName]['exchange'];
        $this->queueConf = $conf['server'];
        $this->getRandServer();
        $this->connection($durable);

    }
    public function connection($durable=false){
        $this->connection = new AMQPStreamConnection($this->arrCurrentConf['host'], $this->arrCurrentConf['port'],
            $this->arrCurrentConf['user'], $this->arrCurrentConf['pass'], $this->arrCurrentConf['vhost']);
        $this->channel = $this->connection->channel();
        $this->channel->exchange_declare($this->exchange, 'fanout', false, $durable, false);
    }
    public function close(){
        $this->channel->close();
        $this->connection->close();
    }
    public function addOne($arrContent){
        $messageBody = json_encode($arrContent);
        $message = new AMQPMessage($messageBody, array('content_type' => 'text/plain', 'delivery_mode' => AMQPMessage::DELIVERY_MODE_PERSISTENT));
        $this->channel->basic_publish($message, $this->exchange);
    }

    public function getOne($funcCallback, $queueName = '', $durable = true){
        $queueName = $queueName ? $queueName : $this->queueKey;
        $this->channel->queue_declare($queueName, false, $durable, false, false);
        $this->channel->queue_bind($queueName, $this->exchange);
        $this->channel->basic_consume($queueName, $this->consumerTag, false, false, false, false, $funcCallback);
    }
    public static function Ack($message){
        $message->delivery_info['channel']->basic_ack($message->delivery_info['delivery_tag']);
    }
    public static function Nack($message){
        $message->delivery_info['channel']->basic_nack($message->delivery_info['delivery_tag']);
    }
    public function getRandServer(){
        if(empty($this->queueConf)){
            $this->queueConf = Config::get('basecrmqueueconfig.rabbitmq.server');
        }
        shuffle($this->queueConf);
        $this->arrCurrentConf = $this->queueConf[0];
    }
}
