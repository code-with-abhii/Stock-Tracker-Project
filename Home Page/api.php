<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>PORTFOLIO</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
  <form class="form-inline my-2 my-lg-0">
    <input class="form-control mt-2 mr-sm-2 mb-2 p-2" type="search" placeholder="Search stocks here" aria-label="Search">
    <button class="btn btn-outline-success my-5 my-sm-0 mb-2 p-2" type="submit">Search</button>
  </form>
</body>
<?php
$key = "demo";
$url = "https://www.alphavantage.co/query?function=TIME_SERIES_INTRADAY&symbol=IBM&interval=1min&apikey=" . $key;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
curl_close($ch);
$result = json_decode($result, true);
//echo "<pre>";
//print_r($result['Time Series (5min)']);
// $json = file_get_contents('https://www.alphavantage.co/query?function=TIME_SERIES_INTRADAY&symbol=IBM&interval=5min&apikey=demo');
//$data = json_decode($json,true);
//print_r($data);


if (isset($result['Time Series (1min)'])) {
  echo "<table  id='stock'><tr>
  <th>Time</th>
  <th>Open</th>
  <th>High</th>
  <th>Low</th>
  <th>Close</th>
  <th>Volume</th>
  </tr>";
  foreach ($result['Time Series (1min)'] as $key => $val) {
    echo "<tr><td>$key</td>
    <td>" . $val['1. open'] . "</td>
    <td>" . $val['2. high'] . "</td>
    <td>" . $val['3. low'] . "</td>
    <td>" . $val['4. close'] . "</td>
    <td>" . $val['5. volume'] . "</td>
    </tr>";
  }
  echo "</table>";
} else {
  echo "Something went wrong";
}
?>

<style>
  #stock {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }

  #stock td,
  #stock th {
    border: 1px solid #ddd;
    padding: 8px;
  }

  #stock tr:nth-child(even) {
    background-color: #f2f2f2;
  }

  #stock tr:hover {
    background-color: #ddd;
  }

  #stock th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #6610f2;
    color: white;
  }
</style>