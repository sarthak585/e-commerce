<?php
$homes =[
    [
        "h_id"=> "9",
        "city"=> "Dallas",
        "state"=> "TX",
        "zip"=> "75201",
        "price"=> "162500",
  "sort_order"=> 15
    ], [
        "h_id"=> "7",
        "city"=> "Bevery Hills",
        "state"=> "CA",
        "zip"=> "90210",
        "price"=> "319250",
  "sort_order"=> 7
    ], [
        "h_id"=> "2",
        "city"=> "New York",
        "state"=> "NY",
        "zip"=> "00010",
        "price"=> "962500",
  "sort_order"=> 2
    ], [
        "h_id"=> "4",
        "city"=> "New Jersey",
        "state"=> "NJ",
        "zip"=> "00010",
        "price"=> "962500",
  "sort_order"=> 10
    ], [
        "h_id"=> "1",
        "city"=> "Miami",
        "state"=> "FL",
        "zip"=> "00010",
        "price"=> "962500",
  "sort_order"=> 2
    ]
];

$new=array_column($homes,'h_id');
$result=array_combine($new, $homes);
print'<pre>';
// print_r($new);
// print_r($homes);
print_r($result);
uasort($result, function($a, $b) {
    return $a['sort_order'] > $b['sort_order'];
});
    
print_r($result);
print'</pre>';
?>