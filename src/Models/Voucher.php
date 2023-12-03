<?php

namespace Piggy\Api\Models;

use DateTime;
use Piggy\Api\ApiClient;
use Piggy\Api\Http\Responses\Response;
use Piggy\Api\Model;
use Piggy\Api\Models\Contacts\Contact;
use Piggy\Api\Models\Promotion;

class Voucher extends Model
{
    /**
     * @var string
     */
    protected $uuid;

    /**
     * @var string
     */
    protected $code;

    /**
     * @var string
     */
    protected $status;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var DateTime
     */
    protected $expiration_date;

    /**
     * @var DateTime|null
     */
    protected $activation_date;

    /**
     * @var DateTime|null
     */
    protected $redeemed_at;

    /**
     * @var bool
     */
    protected $is_redeemed;

    /**
     * @var Promotion
     */
    protected $promotion;

    /**
     * @var Contact|null
     */
    protected $contact;


    protected static $resourceUri = "/api/v3/oauth/clients/vouchers";

    public static function create(array $body): Response
    {
        return ApiClient::post(self::$resourceUri, $body);
    }

    public static function find(array $params): Voucher
    {
        $response = ApiClient::get(self::$resourceUri . "/find", $params);

        $voucher = Model::createTypedClassFromStdClass($response->getData(), self::class, Promotion::class);


//        var_dump($voucher);


//        $promotionStdClass = $responseData->promotion;
//        $promotion = Model::createFromStdClass($promotionStdClass, Promotion::class);

//        return Promotion::createFromStdClass($promotionStdClass);
        return $voucher;
    }

//    private function _get($type, $class, $subTypes = array(), $dependantTypes = array())
//    {
//        if(!array_key_exists($type, $this->_response))
//        {
//            return null;
//        }
//        if(!array_key_exists($type, $this->_responseObj))
//        {
//            $this->_responseObj[$type] = new $class($this->_response[$type], $subTypes, $dependantTypes);
//        }
//        return $this->_responseObj[$type];
//    }

}