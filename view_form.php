<?php

use bot\functions;

session_start();

/**
 * @return string Message
 */
function sessionMessage()
{
    $value = null;
    if (isset($_SESSION['success'])) {
        $value = $_SESSION['success'];
        unset($_SESSION['success']);
    } else if (isset($_SESSION['error'])) {
        $value = $_SESSION['error'];
        unset($_SESSION['error']);
    }

    return $value;
}

require_once 'ee/info.php';

if (isset($_COOKIE["raznicaBuy"])) {
    $raznicaBuy = $_COOKIE["raznicaBuy"];
}
//$orderId = 70209973;
//$order = functions\getOrderInfo($orderId);

//var_dump($orders);
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="theme-color" content="green">
    <link href="data:image/x-icon;base64,AAABAAEAEBAAAAAAAABoBQAAFgAAACgAAAAQAAAAIAAAAAEACAAAAAAAAAEAAAAAAAAAAAAAAAEAAAAAAAAAAAAAAP//AAAAgABAQEAAYGBgAAD/AACAgIAAoKCgAMDAwADg4OAAAICAAAAA/wAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABwYABgcGCgYCAgYHBgAGBwQDAAYHBgEGCwsGBwYAAwQHBgAGBwYKBgICBgcGAAYHBAMABgcGAQYLCwYHBgADBAgGAwYHBgYGBgYGBwYDBggABwMGBwcHBwcHBwcGAwcAAAAEBwYGBgYGBgYGBwQAAAAAAAgICAcHBwcICAgAAAAAAAAAAAQDAwMDBAAAAAAAAAAAAAcGBgYGBgYHAAAAAAAAAAAHBgQJCQQGBwAAAAAAAAADBwYGBgYGBgcDAAAAAAAABAcGBQYGBQYHBAAAAAAAAAQIBgYGBgYGCAQAAAAAAAAEAAgICAgICAAEAAAAAAAAAwAAAAAAAAAAAwAAACAEAAAgBAAAIAQAACAEAAAAAAAAgAEAAMADAADgBwAA+B8AAPAPAADwDwAA4AcAAOAHAADgBwAA6BcAAO/3AAA="
          rel="icon" type="image/png"/>
    <title>BTC-E Bot ISV</title>
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
    <link href="/fonts/css/open-iconic-bootstrap.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Expand at sm</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample03"
            aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample03">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown03" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">Dropdown</a>
                <div class="dropdown-menu" aria-labelledby="dropdown03">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-md-0">
            <input class="form-control" type="text" placeholder="Search">
        </form>
    </div>
</nav>
<header class="container">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12">
            <div class="page-header" id="header">
                <h1>Binance.Bot
                    <small>Всем бабла! :)</small>
                </h1>
                <canvas id="myCanvas" width="375" height="10">Your browser does not support the HTML5 canvas tag.
                </canvas>
            </div>
        </div>
    </div>
</header>
<div class="container">
    <?php if (isset($_SESSION['success']) || isset($_SESSION['error'])): ?>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12">
                <div id="alert-message"
                     class="alert <?= (isset($_SESSION['success']) ? 'alert-success' : 'alert-danger') ?> alert-dismissible fade show"
                     role="alert">
                    <p id="message">
                        <?php
                        echo sessionMessage();
                        ?>
                    </p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-md-12 col-12">
            <!-- Авторизация -->
            <h4>API keys</h4>
            <div class="form-group row">
                <label class="col-sm-1 col-form-label" for="key">Key</label>
                <div class="col-sm-11">
                    <input name="key" form="formBuy formSell" id="key" type="text" class="form-control" required
                           placeholder="Key">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-1 col-form-label" for="secret">Secret</label>
                <div class="col-sm-11">
                    <input name="secret" form="formBuy formSell" id="secret" type="text" class="form-control" required
                           placeholder="Secret">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-12  ">
            <div class="alert" role="alert">
                <span class="glyphicon glyphicon-piggy-bank" aria-hidden="true"></span>
                <span class="sr-only">Balance:</span>
                Balance:
                <?php
                //$number = "1000002.000666";
                //echo str_replace(',','.',$number);
                //echo number_format($number, 8, '.', ' ');
                const BAL = '<br><p class="text-success" style="display: inline;">Balance: </p>';
                //if($_SERVER['REQUEST_METHOD']=='POST'){
                if (array_key_exists('data', $balance)) {
                    $balanceInfo = json_decode($balance['data'], true);
                    if ($balanceInfo['success']) {
                        foreach ($balanceInfo["return"]["funds"] as $key => $val) {
                            if ($val) {
                                echo "<strong>{$key}</strong>: <span class=\"btn btn-success btn-sm balance\">" . sprintf('%f', $val) . '</span> ';
                            }
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php
if (isset($orders['count'])) {
    echo "Order(count) = " . $orders['count'];
}
?>
<div class="container">
    <div class="row">
        <!-- Модуль Buy  -->
        <div class="col-md-6 col-sm-12 col-12" id="buy">
            <form action="ee/SetFirstOrder.php" method="post" id="formBuy">
                <div class="card">
                    <div class="card-header bg-success"><h5 class="card-title">Купить LTC</h5></div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <label for="raznicaBuy">Разница</label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-btn" data-type="cursBuy">
                                            <button type="button" class="btn btn-default active" name="raznicaType"
                                                    value="1" title="Разница между курсом покупки и курсом продожи">
                                                Разница
                                            </button>
                                            <button type="button" data-percent="1" class="btn btn-default"
                                                    title="% от курса">1%
                                            </button>
                                            <button type="button" data-percent="1.5" class="btn btn-default"
                                                    title="% от курса">1.5%
                                            </button>
                                            <button type="button" data-percent="2" class="btn btn-default"
                                                    title="% от курса">2%
                                            </button>
                                            <button type="button" data-kurs="" class="btn btn-default"
                                                    title="Укажите курс по которому ходите продать">Курс
                                            </button>
                                        </div>
                                        <input tabindex="1" name="raznica" id="raznicaBuy" type="text"
                                               class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="doBuy">Кол.итераций</label>
                                    <input disabled tabindex="2" placeholder="Кол. итераций" name="do" id="doBuy"
                                           value="0"
                                           class="form-control" type="number" step="1" min="0" max="1000">
                                    <label for="cursBuy">Курс</label>
                                    <input tabindex="3" placeholder="Курс" name="curs" id="cursBuy"
                                           value="0"
                                           data-decimal-places=""
                                           type="text"
                                           class="form-control" maxlength="8">
                                    <label for="amountBuy">Количество</label>
                                    <input placeholder="Количество" tabindex="4" name="amount" id="amountBuy"
                                           type="text"
                                           min="0" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="pairBuy">Пара</label>
                                    <select size="11" name="tiker" id="pairBuy" data-curs="cursBuy"
                                            class="form-control"></select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="hidden" name="order" value="buy">
                        <input type="submit" tabindex="5" value="Купить" name="buy" class="btn btn-success btn-block">
                    </div>
                </div>
            </form>
        </div>
        <!--        <div class="col-md-2 col-12">-->
        <!--            <div class="card">-->
        <!--                <div class="card-header bg-info">-->
        <!--                    <h6 class="card-title" id="price">Balance:</h6>-->
        <!--                </div>-->
        <!--                <div class="card-body info">-->
        <!--                    <table class="table table-sm">-->
        <!--                        --><?php
        //                        //$number = "1000002.000666";
        //                        //echo str_replace(',','.',$number);
        //                        //echo number_format($number, 8, '.', ' ');
        //                        if (array_key_exists('data', $balance)) {
        //                            $balanceInfo = json_decode($balance['data'], true);
        //                            if ($balanceInfo['success']) {
        //                                foreach ($balanceInfo["return"]["funds"] as $key => $val) {
        //                                    if ($val) {
        //                                        echo "<tr><th>" . strtoupper($key)
        //                                            . ":</th><td><span class=\"btn btn-success btn-sm balance\">" . sprintf('%f', $val) . '</span></td></tr>';
        //                                    }
        //                                }
        //                            }
        //                        }
        //                        ?>
        <!--                    </table>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!-- Модуль Sell  -->
        <div class="col-md-6 col-sm-12 col-12" id="sell">
            <form action="ee/SetFirstOrder.php" method="post" id="formBuy">
                <div class="card">
                    <div class="card-header bg-danger"><h5 class="card-title">Продать LTC</h5></div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <label for="raznicaBuy">Разница</label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-btn" data-type="cursSell">
                                            <button type="button" class="btn btn-default active" name="raznicaType"
                                                    value="1" title="Разница между курсом покупки и курсом продожи">
                                                Разница
                                            </button>
                                            <button type="button" data-percent="1" class="btn btn-default"
                                                    title="% от курса">1%
                                            </button>
                                            <button type="button" data-percent="1.5" class="btn btn-default"
                                                    title="% от курса">1.5%
                                            </button>
                                            <button type="button" data-percent="2" class="btn btn-default"
                                                    title="% от курса">2%
                                            </button>
                                            <button type="button" data-kurs="" class="btn btn-default"
                                                    title="Укажите курс по которому ходите продать">Курс
                                            </button>
                                        </div>
                                        <input tabindex="6" name="raznica" id="raznicaSell" type="text"
                                               class="form-control" min="0">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="doSell">Кол.итераций</label>
                                    <input disabled tabindex="7" placeholder="Кол. итераций" name="do" id="doSell"
                                           value="0"
                                           class="form-control" type="number" min="0" max="1000" step="1">
                                    <label for="cursSell">Курс</label>
                                    <input tabindex="8" placeholder="Курс" name="curs" id="cursSell"
                                           data-decimal-places="0"
                                           class="form-control"
                                           type="text" maxlength="8">
                                    <label for="amountSell">Количество</label>
                                    <input tabindex="9" placeholder="Количество" name="amount" id="amountSell"
                                           min="0.1002"
                                           class="form-control" type="text" maxlength="25">
                                    <!-- value="<?php // printf("%F", $balance[$tiker1]);                                ?>"  -->
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="pairSell">Пара</label>
                                    <select size="11" name="tiker" id="pairSell" data-curs="cursSell"
                                            class="form-control"></select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="hidden" name="order" value="sell">
                        <input type="submit" tabindex="10" value="Продать" name="sell" class="btn btn-danger btn-block">
                    </div>
                </div>
            </form>
        </div>
        <!--        <div class="col-md-4  col-12">-->
        <!--            <div class="card card-info">-->
        <!--                <div class="card-header">-->
        <!--                    <h3 class="card-title" id="price">Максимальное и минимальное значения</h3>-->
        <!--                </div>-->
        <!--                <div class="card-body info" style="overflow-y:auto;"></div>-->
        <!--            </div>-->
        <!--        </div>-->
    </div>
</div>
<!--ERRORs-->
<div class="container">
    <div class="row">
        <div class="col-12 col-md-12">
            <?php
            if ($errors) {
                echo '<table class="table"><tr>';
                foreach ($errors as $key => $value) {
                    echo "<td class=\"text-danger\"><span class=\"glyphicon glyphicon-remove-sign\"></span> $value</td>";
                }
                echo "</tr></table>";
            }
            //echo "DBConnect - " . $DBConnect;
            ?>
        </div>
    </div>
</div>
<!--ORDERs-->
<div class="container">
    <div class="row">
        <div class="col-12 col-md-12">
            <form action="ee/deleteAll.php">
                <table class="table table-sm table-responsive-sm">
                    <thead>
                    <tr>
                        <th>Order id</th>
                        <th>Pair</th>
                        <th>Type</th>
                        <th>Amount</th>
                        <th>Price</th>
                        <th>Time</th>
                        <th>
                            <button class="btn btn-danger btn-sm pull-right" title="deletAll">
                                <span class="oi oi-trash"></span>
                            </button>
                        </th>
                    </tr>
                    </thead>
                    <tbody><?php
                    //                            var_dump($trades);
                    //                    $allOrders = json_decode($orders['data'], true);
                    if (isset($orders['return'])) {
                        foreach ($orders['return'] as $key => $value) {
                            echo "<tr class=\"" . ($value['type'] == "sell" ? 'bg-danger' : 'bg-success') . " text-white\"><td>$key</td><td>" . strtoupper($value['pair']) . "</td>";
                            echo '<td class="up">' . $value['type'];
                            echo "</td><td>$value[amount]</td><td>$value[rate]</td><td>" . date("d.m.y H:i", $value['timestamp_created']) . '</td><td class="text-center"><input name="check[]" value="' . $key . '" id="del-' . $key . '" type="checkbox" ></td></tr>';
                        }
                    }
                    //closeoid("58535421");
                    //echo $success;
                    ?></tbody>
                    <tfoot>
                    <tr>
                        <td colspan="6"></td>
                        <td class="text-center">
                            <button class="btn btn-danger btn-sm pull-right" title="deletAll">
                                <span class="oi oi-trash"></span>
                            </button>
                        </td>
                    </tr>
                    </tfoot>
                </table>
            </form>
        </div>
    </div>
</div>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
        integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
        integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
        crossorigin="anonymous"></script>
<script src="js/main-02.js"></script>
<script>
    $('#pairSell, #pairBuy').on('change', function () {
            var tic = this.value;
            var anObjectName = $(this).data('curs');
            var postData = {'pair': tic};
            $.getJSON('../php/getCourse.php', postData, function (data) {
                if (data.error) {
                    console.log(data.error);
                    return;
                }
                //можно добавить    last: цена последней сделки.
                //buy: цена покупки.
                //sell: цена продажи.
                var tiker = data[tic]['last'];
                // this[anObjectName].value = tiker;
                $("#" + anObjectName).val(tiker);
                // console.log(tiker);
            });

            $.getJSON('../php/getInfo.php', postData, function (data) {

                if (data.error) {
                    console.log(data.error);
                    return;
                }
                $("#" + anObjectName).data("decimalPlaces", data.decimal_places);
                console.dir($("#" + anObjectName).data());
            });

        }
    );
</script>
</body>
</html>