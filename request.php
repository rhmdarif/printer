<?php
/*
    bold : 0 if no, 1 if yes
    align : 0 if left, 1 if center, 2 if right
    format : 0 if normal, 1 if double Height, 2 if double Height + Width, 3 if double Width, 4 if small
*/
$data = json_encode([
        [
            'type' => 'text',
            'content' => 'ABCDE',
            'option' => [
                'bold' => 1,
                'align' => 2,
                'format' => 3,
            ]
        ],
        [
            'type' => 'image',
            'path' => 'https://',
            'option' => [
                'align' => 2,
            ]
        ],
        [
            'type' => 'barcode',
            'value' => 'ABCDE',
            'option' => [
                'width' => 1,
                'height' => 2,
                'align' => 3,
            ]
        ],
        [
            'type' => 'qr',
            'value' => 'ABCDE',
            'option' => [
                'align' => 2,
                'size' => 3,
            ]
        ],
        [
            'type' => 'emptyline',
            'content' => '',
            'option' => [
                'bold' => 1,
                'align' => 2,
            ]
        ],
        [
            'type' => 'multiline',
            'content' => 'This text has<br />two lines',
            'option' => [
                'bold' => 1,
                'align' => 2,
            ]
        ],
    ]);

    echo $data;
    // echo http($data);


    /*
        FORMATTER JSON -- JANGAN DIUBAH !!!
    */
    function http($payload)
    {
        // API URL
        $url = 'https://printer-format.herokuapp.com/';

        // Create a new cURL resource
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        // Attach encoded JSON string to the POST fields
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        // Set the content type to application/json
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        // Return response instead of outputting
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // Execute the POST request
        $result = curl_exec($ch);
        // Close cURL resource
        curl_close($ch);

        return $result;
    }

    /* CARA PENGGUNAAN 
        - PADA HALAMAN USER SEDIAKAN TOMBOL CETAK
        - TOMBOL DIBUNGKUS DENGAN ELEMENT LINK ( <a> ... </a> )
        - BERIKAN ATTRIBUT HREF PADA ELEMENT A DENGAN FORMAT : my.bluetoothprint.scheme://<url>
        - GANTI <url> PADA FORMAT DIATAS DENGAN LINK FILE DATA YANG AKAN DI PRINT --- FILE : request.php

        CONTOH PENGGUNAAN :

            <a href="my.bluetoothprint.scheme:http://localhost/request.php">
                <button type="button">CETAK</button>
            </a>
    */