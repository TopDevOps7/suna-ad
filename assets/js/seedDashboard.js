$( document ).ready(function() {
  exchanger();
  getLivePrice();
  document.getElementById("totalTokenResult").innerHTML = ("= " + "0" + " REDUX");
});

var usdtLivePrice ;
var btcLivePrice;
var bnbLivePrice;
var ethLivePrice;
var liveprice = {
    "async": true,
    "scroosDomain": true,
    "url": "https://api.coingecko.com/api/v3/simple/price?ids=bitcoin%2Cethereum%2Ctether%2Cbinancecoin&vs_currencies=usd",

    "method": "GET",
    "headers": {}
};

function getLivePrice() {
  $.ajax(liveprice).done(function (response) {
    usdtLivePrice = response.tether.usd;
    btcLivePrice = response.bitcoin.usd;
    bnbLivePrice = response.binancecoin.usd;
    ethLivePrice = response.ethereum.usd;
  });

}

function exchanger() {
  var SelectedCurrency = $("#currencybtn").text();
  var currentTokenPrice = $("#currentprice").text();
  var toBeConvertedValue = $("#totalCoinValue").val();
  var bnbValue = 0;
  if (SelectedCurrency == "USDT") {
    bnbValue = Math.round(parseFloat((usdtLivePrice * toBeConvertedValue) / currentTokenPrice));
    console.log(usdtLivePrice);
  } else if (SelectedCurrency == "BNB") {
    bnbValue = Math.round(parseFloat((bnbLivePrice * toBeConvertedValue) / currentTokenPrice));
  } else if (SelectedCurrency == "ETH") {
    bnbValue = Math.round(parseFloat((ethLivePrice * toBeConvertedValue) / currentTokenPrice));
  } else if (SelectedCurrency == "BTC") {
    bnbValue = Math.round(parseFloat((btcLivePrice * toBeConvertedValue) / currentTokenPrice));
  } else {
    bnbValue = 0;
  }
  var parts = bnbValue.toString().split(".");
  console.log(usdtLivePrice, usdtLivePrice,toBeConvertedValue, currentTokenPrice, bnbValue);
  parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, "'");

  document.getElementById("totalTokenResult").innerHTML = ("= " +  parts.join(".") + " REDUX");
}
$('.dropdown-menu span').click(function() {
$('#currencybtn').text($(this).text());
exchanger();
getLivePrice();

});

$('input#totalCoinValue').on('input', function() {
exchanger();
getLivePrice();
});

$('#currencybtn').text("USDT");

$('input#totalCoinValue').keydown(function(e) {
  if(e.which == 13) { return false; }
});
