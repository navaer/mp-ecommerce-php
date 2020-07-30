<?php

require_once 'vendor/autoload.php';

MercadoPago\SDK::setAccessToken("APP_USR-1159009372558727-072921-8d0b9980c7494985a5abd19fbe921a3d-617633181");
MercadoPago\SDK::setIntegratorId("dev_24c65fb163bf11ea96500242ac130004");

// Crea un objeto de preferencia
$preference = new MercadoPago\Preference();

// Crea un ítem en la preferencia
$item = new MercadoPago\Item();
$item->title = 'Mi producto';
$item->quantity = 1;
$item->unit_price = 75.56;
$preference->items = array($item);
$preference->save();

var_dump($preference);
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