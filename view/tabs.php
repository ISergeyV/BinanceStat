<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link <?= $currencyGet ==="BUSD"? "active" : ''; ?>" aria-current="page" href="?currency=busd">BUSD</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?= $currencyGet ==="USDT"? "active" : ''; ?>" href="?currency=usdt">USDT</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?= $currencyGet ==="BTC"? "active" : ''; ?>" href="?currency=btc">BTC</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
  </li>
</ul>