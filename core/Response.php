<?php

namespace app\core;

class Response
{
    public $statuslist = [
        'STATUS_CONTINUE' => '100',
        'STATUS_SWITCHING_PROTOCOLS' => '101',
        'STATUS_PROCESSING' => '102',
        'STATUS_EARLY_HINTS' => '103',
        'STATUS_OK' => '200',
        'STATUS_CREATED' => '201',
        'STATUS_ACCEPTED' => '202',
        'STATUS_NON_AUTHORITATIVE_INFORMATION' => '203',
        'STATUS_NO_CONTENT' => '204',
        'STATUS_RESET_CONTENT' => '205',
        'STATUS_PARTIAL_CONTENT' => '206',
        'STATUS_MULTI_STATUS' => '207',
        'STATUS_ALREADY_REPORTED' => '208',
        'STATUS_IM_USED' => '226',
        'STATUS_MULTIPLE_CHOICES' => '300',
        'STATUS_MOVED_PERMANENTLY' => '301',
        'STATUS_FOUND' => '302',
        'STATUS_SEE_OTHER' => '303',
        'STATUS_NOT_MODIFIED' => '304',
        'STATUS_USE_PROXY' => '305',
        'STATUS_RESERVED' => '306',
        'STATUS_TEMPORARY_REDIRECT' => '307',
        'STATUS_PERMANENT_REDIRECT' => '308',
        'STATUS_BAD_REQUEST' => '400',
        'STATUS_UNAUTHORIZED' => '401',
        'STATUS_PAYMENT_REQUIRED' => '402',
        'STATUS_FORBIDDEN' => '403',
        'STATUS_NOT_FOUND' => '404',
        'STATUS_METHOD_NOT_ALLOWED' => '405',
        'STATUS_NOT_ACCEPTABLE' => '406',
        'STATUS_PROXY_AUTHENTICATION_REQUIRED' => '407',
        'STATUS_REQUEST_TIMEOUT' => '408',
        'STATUS_CONFLICT' => '409',
        'STATUS_GONE' => '410',
        'STATUS_LENGTH_REQUIRED' => '411',
        'STATUS_PRECONDITION_FAILED' => '412',
        'STATUS_PAYLOAD_TOO_LARGE' => '413',
        'STATUS_URI_TOO_LONG' => '414',
        'STATUS_UNSUPPORTED_MEDIA_TYPE' => '415',
        'STATUS_RANGE_NOT_SATISFIABLE' => '416',
        'STATUS_EXPECTATION_FAILED' => '417',
        'STATUS_IM_A_TEAPOT' => '418',
        'STATUS_MISDIRECTED_REQUEST' => '421',
        'STATUS_UNPROCESSABLE_ENTITY' => '422',
        'STATUS_LOCKED' => '423',
        'STATUS_FAILED_DEPENDENCY' => '424',
        'STATUS_TOO_EARLY' => '425',
        'STATUS_UPGRADE_REQUIRED' => '426',
        'STATUS_PRECONDITION_REQUIRED' => '428',
        'STATUS_TOO_MANY_REQUESTS' => '429',
        'STATUS_REQUEST_HEADER_FIELDS_TOO_LARGE' => '431',
        'STATUS_UNAVAILABLE_FOR_LEGAL_REASONS' => '451',
        'STATUS_INTERNAL_SERVER_ERROR' => '500',
        'STATUS_NOT_IMPLEMENTED' => '501',
        'STATUS_BAD_GATEWAY' => '502',
        'STATUS_SERVICE_UNAVAILABLE' => '503',
        'STATUS_GATEWAY_TIMEOUT' => '504',
        'STATUS_VERSION_NOT_SUPPORTED' => '505',
        'STATUS_VARIANT_ALSO_NEGOTIATES' => '506',
        'STATUS_INSUFFICIENT_STORAGE' => '507',
        'STATUS_LOOP_DETECTED' => '508',
        'STATUS_NOT_EXTENDED' => '510',
        'STATUS_NETWORK_AUTHENTICATION_REQUIRED' => '511'
    ];
    public function statusCode($code)
    {
        http_response_code($code);
    }
    public function render(int $code, array|object $data = null, $status = null, $message = null)
    {
        $temp = new class
        {
        };
        $this->statusCode($code);

        if (!is_null($status)) {
            $temp->status = $status;
        } else {
            switch (((string) $code)[0]) {
                case '1':
                    $temp->status = 'Information';
                    break;
                case '2':
                    $temp->status = 'Successful';
                    break;
                case '3':
                    $temp->status = 'Redirection';
                    break;
                case '4':
                    $temp->status = 'Client error';
                    break;
                case '5':
                    $temp->status = 'Server error';
                    break;
            }
        }
        if (!is_null($message)) {
            $temp->message = $message;
        } else {
            $temp->message = array_search($code, $this->statuslist);
        }
        if (!is_null($data)) {
            $temp->data =  $data;
        }
        die(json_encode($temp));
    }
    public function apikey($length = 20)
    {
        //gen api key
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
