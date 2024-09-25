<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JWT extends Controller
{
    private function base64UrlEncode($data)
    {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }

    public function createJwt($header, $payload, $secret)
    {
        $base64UrlHeader = $this->base64UrlEncode($header);
        $base64UrlPayload = $this->base64UrlEncode($payload);
        $signature = hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, $secret, true);
        $base64UrlSignature = $this->base64UrlEncode($signature);
        return $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;
    }

    public function verifyJwt($jwt, $secret)
    {
        $jwtParts = explode('.', $jwt);
        if (count($jwtParts) !== 3) {
            return false;
        }
        $header = base64_decode($jwtParts[0]);
        $payload = base64_decode($jwtParts[1]);
        $providedSignature = $jwtParts[2];
        $expectedSignature = $this->base64UrlEncode(hash_hmac('sha256', $jwtParts[0] . "." . $jwtParts[1], $secret, true));
        if ($providedSignature !== $expectedSignature) {
            return false;
        }
        $payloadArray = $this->json_decode($payload, true);
        if (isset($payloadArray['exp']) && $payloadArray['exp'] < time()) {
            return false;
        }
        return $payloadArray;
    }
}
