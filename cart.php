<?php

require_once 'vendor/autoload.php';

MercadoPago\SDK::setAccessToken("APP_USR-1159009372558727-072921-8d0b9980c7494985a5abd19fbe921a3d-617633181");
MercadoPago\SDK::setIntegratorId("dev_24c65fb163bf11ea96500242ac130004");

// Crea un objeto de preferencia
$preference = new MercadoPago\Preference();

// Crea un ítem en la preferencia
$item = new MercadoPago\Item();
$item->id = '1234';
$item->title = 'Producto grande';
$item->description = 'Dispositivo móvil de Tienda e-commerce';
$item->quantity = 1;
$item->unit_price = 75.56;
$item->external_reference = 'erick.i.nava.h@gmail.com';

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