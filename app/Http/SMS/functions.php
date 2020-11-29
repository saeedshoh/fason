<?php

function call_api($url, $method, $params){
    $curl = curl_init();
    $data = http_build_query ($params);
    if ($method == "GET") {
        curl_setopt ($curl, CURLOPT_URL, "$url?$data");
    }else if($method == "POST"){
        curl_setopt ($curl, CURLOPT_URL, $url);
        curl_setopt ($curl, CURLOPT_POSTFIELDS, $data);
    }else if($method == "PUT"){
        curl_setopt ($curl, CURLOPT_URL, $url);
        curl_setopt ($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded','Content-Length:'.strlen($data)));
        curl_setopt ($curl, CURLOPT_POSTFIELDS, $data);
    }else if ($method == "DELETE"){
        curl_setopt ($curl, CURLOPT_URL, "$url?$data");
        curl_setopt ($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
    }else{
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
        if (isset($res->error)){
            $arr['error'] = 1;
            $arr['msg'] = "Error Code: ". $res->error->code . " Message: " . $res->error->msg;
        }else{
            $arr['error'] = 0;
            $arr['msg'] = $response;
        }
    }
    return $arr;
}