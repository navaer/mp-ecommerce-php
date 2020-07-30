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
$item->title = 'Mi producto';
$item->quantity = 1;
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
    <script src="https://www.mercadopago.com/v2/security.js" view="item"></script>
    <title>Pagar</title>
</head>
<body>

<form action="/procesar-pago" method="POST">
    <script
            src="https://www.mercadopago.com.mx/integrations/v1/web-payment-checkout.js"
            data-preference-id="<?php echo $preference->id; ?>">
    </script>
</form>

<a href="<?php echo $preference->init_point; ?>">Pagar con Mercado Pago</a>


</body>
</html>