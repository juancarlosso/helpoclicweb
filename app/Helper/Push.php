<?php

namespace App\Helper;


class Push
{

    /*
   *
   * @brief
   * @author Gustavo Ramirez Yahuaca
   * @param string
   * @return
   *
   */
    static function Enviar($para, $titulo, $mensaje, $tipo, $info)
    {

        //  :::: /topics/default
        $llave = "AAAAkfIqS1Q:APA91bFwoZm0JmLvzhuzyXA7tGPWL1e9c3CUwtxz9ofB21bA3Q5zl3FqoKPM3H1IP9uRDDz22GE3VXtHuXzfqmTaVUd5LT-nVWnBr4qJtArfQ4dEgD4ThOfrB76WKE49kAQM_9YQFatZ";

        $url = 'https://fcm.googleapis.com/fcm/send';
        $fields = [
            'to' => $para,
            'notification' => [
                'title' => $titulo,
                'body' => $mensaje,
            ],
            'data' => [
                'tipo'   => $tipo,
                'info'   => $info,
                'texto'  => $mensaje,
                'titulo' => $titulo,
            ]
        ];
        $headers = [
            "Authorization: key={$llave}", 'Content-Type: application/json'
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);

        curl_close($ch);
    }
}
