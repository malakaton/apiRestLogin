<?php
namespace ApiBundle\Services;

class TokenJWT implements TokenJWTInterface {

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

    public function execute($idUser) {
        $this->payload = $this->buildPayload($idUser);
        $this->base64UrlHeader = $this->encodeToBase64($this->header);
        $this->base64UrlPayload = $this->encodeToBase64($this->payload);
        $this->signature = $this->buildSignature();
        $this->base64UrlSignature = $this->encodeToBase64($this->signature);
    }

    /**
     *  Generate JWT token
     *
     * @return string
     */
    public function returnToken(){
        return $this->base64UrlHeader . "." . $this->base64UrlPayload . "." . $this->base64UrlSignature;
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
     *
     * @return false|string
     */
    private function buildPayload($idUser) {
        // Create token payload as a JSON string
        return json_encode(array('user_id' => $idUser));
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

}