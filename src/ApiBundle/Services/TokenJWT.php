<?php
namespace ApiBundle\Services;

use Symfony\Component\Config\Definition\Exception\Exception;

class TokenJWT implements TokenJWTInterface {

    const _EXPIRATION_TIME = "+12 hours";
    const _MYSQL_FORMAT_DATETIME = 'Y-m-d H:i:s';

    private $idUser;
    private $userName;
    private $header;
    private $base64UrlHeader;
    private $payload;
    private $base64UrlPayload;
    private $signature;
    private $base64UrlSignature;

    /**
     * TokenJWT constructor.
     *
     * @param $idUser
     */
    public function __construct() {
        $this->header = $this->buildHeader();
    }

    public function execute() {
        try {
            if ((is_null($this->idUser) && !is_numeric($this->idUser)) || (is_null($this->userName))) {
                throw new Exception('User info error');
            }
            $this->payload = $this->buildPayload($this->idUser, $this->userName);
            $this->base64UrlHeader = $this->encodeToBase64($this->header);
            $this->base64UrlPayload = $this->encodeToBase64($this->payload);
            $this->signature = $this->buildSignature();
            $this->base64UrlSignature = $this->encodeToBase64($this->signature);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function setIdUser($idUser) {
        $this->idUser = $idUser;
    }

    public function setUserName($userName) {
        $this->userName = $userName;
    }

    /**
     *  Generate JWT token
     *
     * @return string
     */
    public function returnToken(){
        if (is_null($this->base64UrlPayload)) {
            return false;
        } else {
            return $this->base64UrlHeader . "." . $this->base64UrlPayload . "." . $this->base64UrlSignature;
        }
    }

    /**
     * @return false|string
     */
    private function buildHeader() {
        // Create token header as a JSON string
       return json_encode(array('typ' => 'JWT', 'alg' => 'HS256'));
    }

    /**
     * @param $idUser
     * @param $userName
     *
     * @return false|string
     */
    private function buildPayload($idUser, $userName) {
        // Create token payload as a JSON string
        return json_encode(array('user_id' => $idUser, 'user_name' => $userName, 'exp' => $this->getExpirationDate()));
    }

    /**
     * @param $value
     *
     * @return mixed
     */
    private function encodeToBase64($value) {
        // Encode value to Base64Url String
        return str_replace(
            array('+', '/', '='),
            array('-', '_', ''),
            base64_encode($value)
        );
    }

    /**
     * @return string
     */
    private function buildSignature() {
        // Create Signature Hash
        return hash_hmac(
            'sha256',
            $this->base64UrlHeader . "." . $this->base64UrlPayload,
            'abC123!',
            true
        );
    }

    public function getExpirationDate() {
        $date = new \DateTime();
        $date->modify(self::_EXPIRATION_TIME);

        return strtotime($date->format(self::_MYSQL_FORMAT_DATETIME));
    }

}