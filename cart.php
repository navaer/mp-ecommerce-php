<?php

require_once 'vendor/autoload.php';

MercadoPago\SDK::setAccessToken("APP_USR-1159009372558727-072921-8d0b9980c7494985a5abd19fbe921a3d-617633181");
MercadoPago\SDK::setIntegratorId("dev_24c65fb163bf11ea96500242ac130004");

// Crea un objeto de preferencia
$preference = new MercadoPago\Preference();

$payer = new MercadoPago\Payer();
$payer->name = "Charles";
$payer->surname = "Luevano";
$payer->email = "charles@hotmail.com";
$payer->date_created = "2018-06-02T12:58:41.425-04:00";
$payer->phone = array(
    "area_code" => "",
    "number" => "949 128 866"
);

$payer->address = array(
    "street_name" => "Cuesta Miguel Armendáriz",
    "street_number" => 1004,
    "zip_code" => "11020"
);


// Crea un ítem en la preferencia
$item = new MercadoPago\Item();
$item->id = "1234";
$item->title = "Heavy Duty Plastic Table";
$item->description = "Table is made of heavy duty white plastic and is 96 inches wide and 29 inches tall";
$item->category_id = "home";
$item->quantity = 7;
$item->currency_id = "MXN";
$item->unit_price = 75.56;



$preference->back_urls = array(
    "success" => "https://www.tu-sitio/success",
    "failure" => "http://www.tu-sitio/failure",
    "pending" => "http://www.tu-sitio/pending"
);
$preference->auto_return = "approved";

$preference->items = array($item);
$preference->save();

//var_dump($preference);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Pagar</title>
</head>
<body>

<a href="<?php echo $preference->init_point; ?>">Pagar con Mercado Pago</a>


</body>
</html>