<?php

namespace App\Providers\Api;

class KeyCloakProvider
{
    public function KeyCloakLogin($data): mixed
    {
        $url = env('KEYCLOAK_BASE_URL', 'https://sso.o.kg:18443/auth') . '/realms/' . env('KEYCLOAK_REALM', 'DbContract') . '/protocol/openid-connect/token';

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'username=' . $data->username . '&password=' . urlencode($data->password) . '&client_id=' . env('KEYCLOAK_CLIENT_ID', 'web-dev-api-nest') . '&grant_type=password&client_secret=' . env('KEYCLOAK_SECRET', 'f5ae5005-b202-4368-bf74-184cfb40e38b'),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded',
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response);
    }

    public function CheckKeyCloakLogin($token): bool
    {
        $url = env('KEYCLOAK_BASE_URL', 'https://sso.o.kg:18443/auth') . '/realms/' . env('KEYCLOAK_REALM', 'DbContract') . '/protocol/openid-connect/userinfo';

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded',
                'Authorization: ' . $token,
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $response = json_decode($response);
        if (isset($response->error)) {
            return false;
        } else {
            return true;
        }
    }


}
