<?php
namespace ApiBundle\Services;

use Symfony\Component\Config\Definition\Exception\Exception;

/**
 * Generate a JWT Token for the user, where the payload is the userId and userName.
 * Also have a method to decode jwt token to check if jwt token is correct to be accepted in the api
 *
 * Class TokenJWT
 * @package ApiBundle\Services
 */
class TokenJWT implements TokenJWTInterface {

    const _EXPIRATION_TIME = "+12 hours";
    const _MYSQL_FORMAT_DATETIME = 'Y-m-d H:i:s';
    const _SECRET_KEY = 'd1c43247cc5c6e47274210f446b9644f9';

    private $secretKey;
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
     * @param $secretKey
     *
     * @param $idUser
     */
    public function __construct() {
        $this->secretKey = self::_SECRET_KEY;
        $this->header = $this->buildHeader();
    }

    /**
     * Will return a jwt token
     */
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
     * Check if the jwt token passed in the argument is valid
     *
     * @param $tokenJwt
     *
     * @return bool
     */
    public function verifiyToken($tokenJwt) {
        //Dividimos el token a partir del punto
        $jwtValues = explode('.', $tokenJwt);

        // extraemos la firma, header, payload a partir del jwt original
        $this->base64UrlHeader = $jwtValues[0];
        $this->base64UrlPayload = $jwtValues[1];
        $this->signature = $jwtValues[2];

        //Decodificamos la firma del token
        $this->base64UrlSignature = $this->decodeSignature();

        // Verificamos si el token es correcto
        if($this->base64UrlSignature == $this->signature) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Receive a token like an argument and will be decode to have the payload info, if the token is valid
     * will be return a userid, username and expiration date
     *
     * @param $tokenJwt
     *
     * @return mixed
     */
    public function getPayloadFromToken($tokenJwt) {
        //Dividimos el token a partir del punto
        $jwtValues = explode('.', $tokenJwt);

        $this->base64UrlPayload = $jwtValues[1];

        return json_decode($this->decodeToBase64($this->base64UrlPayload));
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
     * @throws \Exception
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
     * @param $value
     *
     * @return mixed
     */
    private function decodeToBase64($value) {
        // Encode value to Base64Url String
        return str_replace(
            array('+', '/', '='),
            array('-', '_', ''),
            base64_decode($value)
        );
    }

    private function decodeSignature() {
        return $this->encodeToBase64($this->buildSignature());
    }

    /**
     * @return string
     */
    private function buildSignature() {
        // Create Signature Hash
        return hash_hmac(
            'sha256',
            $this->base64UrlHeader . "." . $this->base64UrlPayload,
            $this->secretKey,
            true
        );
    }

    /**
     * Calculate the expiration date, add +12 hours on current system date
     *
     * @return false|int
     * @throws \Exception
     */
    public function getExpirationDate() {
        $date = new \DateTime();
        $date->modify(self::_EXPIRATION_TIME);

        return strtotime($date->format(self::_MYSQL_FORMAT_DATETIME));
    }

}