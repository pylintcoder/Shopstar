<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Good thing about this is that I can combine html.</h1>
    <?php
    echo 'My first script.'; //Always remember to add the semi-colon
    $vardec = "This is how to declare a variable.<br>"; // The <br> means break.
    echo "The value of vardec is $vardec <br>";
    $num = 5 + 5;
    $sum = $num + 5;
    echo "Total is $sum <br>";
    echo $num + $sum;
    echo "<br>";
    var_dump($num);
    echo "<br>";
    function test() {
        static $call = 1;
        echo$call;
        $call++;
    }
    test();
    echo "<br>"; 
    test();
    echo "<br>";
    test();
    echo "<br>";
    test();
    echo "<br>";
    echo "<h1>$num</h1>";
    $declare = "This is a string";
    $declare = (boolean) $declare;
    var_dump($declare);
    echo "<br>"; 
    echo strlen ("$vardec");
    echo "<br>";
    $predict = "Triming this string into an array.";
    $start = explode(" ", $predict);
    print_r($start);
    $x = 3;
    $y = 5;
    $c = $x . $y;
    echo "\n $c";        
    ?>
</body>
</html>