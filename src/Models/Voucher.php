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
    protected $allowed = [
        'uuid',
        'code',
        'status',
        'name',
        'description',
        'expiration_date',
        'activation_date',
        'redeemed_at',
        'is_redeemed'
    ];

    /**
     * @var Promotion
     */
    protected $promotion;

    /**
     * @var Contact|null
     */
    protected $contact;


    protected static $resourceUri = "/api/v3/oauth/clients/vouchers";

    /**
     * @return string|null
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return DateTime|null
     */
    public function getExpirationDate(): ?DateTime
    {
        return $this->expiration_date;
    }

    /**
     * @return string|null
     */
    public function getActivationDate(): ?string
    {
        return $this->activation_date;
    }

    /**
     * @return DateTime|null
     */
    public function getRedeemedAt(): ?DateTime
    {
        return $this->redeemed_at;
    }

    /**
     * @return bool|null
     */
    public function isRedeemed(): ?bool
    {
        return $this->is_redeemed;
    }


    public static function create(array $body): Response
    {
        return ApiClient::post(self::$resourceUri, $body);
    }

    public static function find(array $params)
    {
        $response = ApiClient::get(self::$resourceUri . "/find", $params);

        return Voucher::createTypedClassFromStdClass($response->getData(), self::class, Promotion::class);
    }


//    public static function find(array $params): Voucher
//    {
//        $response = ApiClient::get(self::$resourceUri . "/find", $params);
//
//        $voucher = Model::createTypedClassFromStdClass($response->getData(), self::class, Promotion::class);
//
////        var_dump($voucher->activation_date);
////        die;
////        $promotionStdClass = $responseData->promotion;
////        $promotion = Model::createFromStdClass($promotionStdClass, Promotion::class);
//
////        return Promotion::createFromStdClass($promotionStdClass);
//        return $voucher;
//    }

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