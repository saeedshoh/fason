<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SMSController extends Controller
{
    public function send()
    {
        $config = array(
            'login' => 'fasontj',  // Ваш логин, который выдается администратором OsonSMS
            'hash' => '9c1891437739e62b0cd45d7c8e232739',  // Ваш хэш, который выдается администратором OsonSMS
            'sender' => 'Fason.tj', // 'Альфанумерик, СМС отправитель'
            'server' => 'http://api.osonsms.com/sendsms_v1.php' // 'Адрес сервера'
        );
        $dlm = ";";
        $phone_number = "501500535"; //номер телефона
        $txn_id = uniqid(); //ID сообщения в вашей базе данных, оно должно быть уникальным для каждого сообщения
        $str_hash = hash('sha256', $txn_id . $dlm . $config['login'] . $dlm . $config['sender'] . $dlm . $phone_number . $dlm . $config['hash']);
        $message = "fason.tj, Акаи Олим смс кор кадестай !";
        $params = array(
            "from" => $config['sender'],
            "phone_number" => $phone_number,
            "msg" => $message,
            "str_hash" => $str_hash,
            "txn_id" => $txn_id,
            "login" => $config['login'],
        );
        $result = $this->call_api($config['server'], "GET", $params);
        if ((isset($result['error']) && $result['error'] == 0)) {
            $response = json_decode($result['msg']);
            print_r($response);
            /* так выглядет ответ сервера
             * {
                    "status": "ok",
                    "timestamp": "2017-07-07 16:58:12",
                    "txn_id": "f890b43b964c2801f62b61a9662efff96dbaa82e007bc60c22ec41d9b22a3e0b",
                    "msg_id": 40127,
                    "smsc_msg_id": "45f22479",
                    "smsc_msg_status": "success",
                    "smsc_msg_parts": 1
                }
             */
            #echo "success: ".$response->msg_id; // id сообщения для проверки статуса сообщения в спорных случаях
        } else {
            print_r($result);
            #echo "error occured ".$result['msg'];
        }
    }
    public function call_api($url, $method, $params)
    {
        $curl = curl_init();
        $data = http_build_query($params);
        if ($method == "GET") {
            curl_setopt($curl, CURLOPT_URL, "$url?$data");
        } else if ($method == "POST") {
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        } else if ($method == "PUT") {
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded', 'Content-Length:' . strlen($data)));
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        } else if ($method == "DELETE") {
            curl_setopt($curl, CURLOPT_URL, "$url?$data");
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
        } else {
            dd("unkonwn method");
        }
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
        $arr = array();
        if ($err) {
            $arr['error'] = 1;
            $arr['msg'] = $err;
        } else {
            $res = json_decode($response);
            if (isset($res->error)) {
                $arr['error'] = 1;
                $arr['msg'] = "Error Code: " . $res->error->code . " Message: " . $res->error->msg;
            } else {
                $arr['error'] = 0;
                $arr['msg'] = $response;
            }
        }
        return $arr;
    }

    
}
