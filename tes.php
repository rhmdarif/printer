<html>
<head>
</head>    
<body>
<a href="my.bluetoothprint.scheme://http://192.168.43.160/response.php">localhost print</a>
<a href="my.bluetoothprint.scheme://https://www.matetech.in/myfiles/temp/response.php">webpage print</a>
</body>
</html>

<!------------------------ Below is sample response file program in PHP (response.php) --------------------------->
<?php
//you can print text, image, barcode and QR code by sending request from your website. You just need to send data in JSON format
$a = array();
//sending text entry
$obj1 = (object) $a;	
$obj1->type = 0;//text
$obj1->content = 'My Title';//any string	
$obj1->bold = 1;//0 if no, 1 if yes
$obj1->align =2;//0 if left, 1 if center, 2 if right
$obj1->format = 3;//0 if normal, 1 if double Height, 2 if double Height + Width, 3 if double Width, 4 if small
array_push($a,$obj1);
//sending image entry
$obj2 = (object) $a;			
$obj2->type = 1;//image
$obj2->path = 'https://www.mydomain.com/myimage.jpg';//complete filepath on your web server; make sure that it is not big size
$obj2->align = 2;//0 if left, 1 if center, 2 if right; set left align for big size images
array_push($a,$obj2);
//sending barcode entry	
$obj3 = (object) $a;		
$obj3->type = 2;//barcode
$obj3->value = '1234567890123';//valid barcode value
$obj3->width = 100;//valid barcode width
$obj3->height = 50;//valid barcode height
$obj3->align = 0;//0 if left, 1 if center, 2 if right
array_push($a,$obj3);
//sending QR entry
$obj4 = (object) $a;			
$obj4->type = 3;//QR code
$obj4->value = 'sample qr text';//valid QR code value
$obj4->size = 40;//valid QR code size in mm
$obj4->align = 2;//0 if left, 1 if center, 2 if right
array_push($a,$obj4);

$obj5 = (object) $a;
$obj5->type = 0;//text
$obj5->content = ' ';//empty line
$obj5->bold = 0;
$obj5->align = 0;
array_push($a,$obj5);

$obj6 = (object) $a;
$obj6->type = 0;//text
$obj6->content = 'This text has<br />two lines';//multiple lines text
$obj6->bold = 0;
$obj6->align = 0;
array_push($a,$obj6);

echo json_encode($a,JSON_FORCE_OBJECT);
//Note that same sequence will be used for printing content
?>