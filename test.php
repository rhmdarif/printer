<?php
$a = array();

//sending text entry
$obj1 = new \stdClass();
$obj1->type = 0;//text
$obj1->content = 'My Title';//any string	
$obj1->bold = 1;//0 if no, 1 if yes
$obj1->align =2;//0 if left, 1 if center, 2 if right
$obj1->format = 3;//0 if normal, 1 if double Height, 2 if double Height + Width, 3 if double Width, 4 if small
array_push($a,$obj1);

//sending image entry	
$obj2 = new \stdClass();	
$obj2->type = 1;//image
$obj2->path = 'https://www.mydomain.com/image.jpg';//complete filepath on your web server; make sure that it is not big size
$obj2->align = 2;//0 if left, 1 if center, 2 if right; set left align for big size images
array_push($a,$obj2);

//sending barcode entry	
$obj3 = new \stdClass();	
$obj3->type = 2;//barcode
$obj3->value = '1234567890123';//valid barcode value
$obj3->width = 100;//valid barcode width
$obj3->height = 50;//valid barcode height
$obj3->align = 0;//0 if left, 1 if center, 2 if right
array_push($a,$obj3);

//sending QR entry		
$obj4 = new \stdClass();
$obj4->type = 3;//QR code
$obj4->value = 'sample qr text';//valid QR code value
$obj4->size = 40;//valid QR code size in mm
$obj4->align = 2;//0 if left, 1 if center, 2 if right
array_push($a,$obj4);

//sending empty line
$obj5 = new \stdClass();
$obj5->type = 0;//text
$obj5->content = ' ';//empty line
$obj5->bold = 0;
$obj5->align = 0;
array_push($a,$obj5);

//sending multi lines text
$obj6 = new \stdClass();
$obj6->type = 0;//text
$obj6->content = 'This text has<br />two lines';//multiple lines text
$obj6->bold = 0;
$obj6->align = 0;
array_push($a,$obj6);

echo json_encode($a,JSON_FORCE_OBJECT);
echo "<br><br>";
echo json_encode([
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