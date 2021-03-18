<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/*
1. Создаем ордер
2. Если ордер создан, записываем информацию в базу
 */
require __DIR__ . '/vendor/autoload.php';
// 1. config in home directory
//$api = new Binance\API();
// 2. config in specified file
//$api = new Binance\API( "somefile.json" );
// 3. config by specifying api key and secret
$key = include __DIR__ . "key.php";
$api = new Binance\API($key[0], $key[1]);
$currencyGet = 'BUSD';
if (isset($_GET["currency"])) {
    $currencyGet = strtoupper(htmlspecialchars($_GET["currency"]));
}

/**
 * @param $params array
 * @return array containing the response
 */
function getCurrencyPair($api, string $currency)
{
    $ticker = $api->prevDay();
    foreach ($ticker as $key => $value) {
        if (($a = strpos(substr($value['symbol'], -4), $currency)) === false) {
            unset($ticker[$key]);
        }
    }
    return $ticker;
}

switch ($currencyGet) {
    case 'BUSD':
    case 'USDT':
    case 'BTC':
        $currencyPair = getCurrencyPair($api, $currencyGet);
        break;

    default:return;
}

// 4. Rate Limiting Support
//$api = new Binance\RateLimiter(new Binance\API());

//$tiker = $api->price("IOTAUSDT");
// $ticker = $api->prices();

/* Balances */
//print_r($tiker);
// $balances = $api->balances($ticker);
// print_r($balances);
include_once __DIR__ . '/view/header.php';
include __DIR__ . '/view/tabs.php';
// echo '<pre>Всего валютных пар: ' . count($ticker) . PHP_EOL;

// foreach ($ticker as $key => $value) {
//     if (($a = strpos(substr($key, -4), $currencyGet)) === false) {
//         unset($ticker[$key]);
//     }
// }
// echo '<strong>Price change since yesterday: </strong><br>' . PHP_EOL;
$plus=0;
$minus = 0;
$i=0;
echo '<table class="table  table-striped caption-top"><caption>Данные по каждой валюте, демонстрируют изменение курса в процентах за последние 24 часа.</caption><thead><tr><th scope="col">#</th><th scope="col">Монета</th><th scope="col">Процент</th><th title="назначенная цена">Volume ' . $currencyGet . '</th></tr></thead><tbody>' . PHP_EOL;
foreach ($currencyPair as $key => $value) {
    if ($value["priceChangePercent"] > 0) {
        $plus++;
    }else{
        $minus++;
    }
    echo '<tr class="' . ($value["priceChangePercent"] > 0 ? 'table-success' : 'table-danger')
        . '"><th scope="row">' . ++$i //$key
        . '</th><td>' . $value['symbol'] . ": </td><td>"
        . $value['priceChangePercent'] . "%</td><td>" . $value["quoteVolume"]
        . "</td></tr>" . PHP_EOL;
}
echo "</tbody>\n</table>";

echo '<ul><li>Всего валютных пар: <strong>' . count($currencyPair) . '</strong></li><li> из них в положительной зоне: <strong style="color:green">' . $plus .  '</strong></li><li> в отрицательной зоне: <strong style="color:red">' . $minus . '</strong></li></ul>';
// echo '<pre>';
// print_r($currencyPair);
// echo '</pre>';

// $t = $api->price("BTCUSDT");

// $api->miniTicker(function ($api, $t) {
//     print_r($t);
// });

// echo 'PrevDay' . PHP_EOL;
// print_r($prevDay);

// foreach ($ticker as $key => $value) {
//     // echo "<pre>";
//     if (sleep(2) === 0) {
//         print_r($key . ': ' . $api->prevDay($key)['priceChangePercent'] . PHP_EOL);
//     }
//     // print_r($key . PHP_EOL); //$api->prevDay($key)['priceChangePercent'] . PHP_EOL);
//     // echo "</pre>";

// }
// echo "BNB price change since yesterday: " . $prevDay['priceChangePercent'] . "%" . PHP_EOL;

// echo 'Only <span style="color:red">' . $currencyGet . '</span>: ' . count($ticker) . PHP_EOL;
// var_dump($ticker);

// $quantity = 1000;
// $price = 0.293;
//$order = $api->sell("IOTAUSDT", $quantity, $price);
//print_r($order);

include_once __DIR__ . '/view/footer.php';
