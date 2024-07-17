<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Calculator</title>
</head>

<body>
    <h2>Calculator</h2>
    <form action="" method="POST">
        <input type="number" name="num1" placeholder="Enter Number 1" require><br><br>
        <input type="number" name="num2" placeholder="Enter Number 2" require><br><br>

        <select name="operator">
            <option value="add">+</option>
            <option value="subtract">-</option>
            <option value="multiply">*</option>
            <option value="divide">/</option>
        </select><br><br>

        <button type="submit">Calculate</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num1 = $_SERVER["REQUEST_METHOD"] == "POST" ? $_POST["num1"] : "";
        $num2 = $_SERVER["REQUEST_METHOD"] == "POST" ? $_POST["num2"] : "";
        $operator = $_SERVER["REQUEST_METHOD"] == "POST" ? $_POST["operator"] : "";

        if ($operator == "add") {
            $result = $num1 + $num2;
        } elseif ($operator == "subtract") {
            $result = $num1 - $num2;
        } elseif ($operator == "multiply") {
            $result = $num1 * $num2;
        } elseif ($operator == "divide") {
            if ($num2 == 0) {
                $result = "Division by zero is not allowed.";
            } else {
                $result = $num1 / $num2;
            }
        }

        if (is_numeric($result)) {
            echo "<p>Result: $result</p>";
        } else {
            echo "<p style='color: red'>Error $result</p>";
        }
    }

    echo "<h2>Multiplication Table for 1 to 12</h2>";
    for ($number = 1; $number <= 12; $number++) {
        for ($i = 1; $i <= 12; $i++) {
            $result = $number * $i;
            echo "$number x $i = $result<br>";
        }
        echo "<br>";
    }
    ?>
</body>

</html>