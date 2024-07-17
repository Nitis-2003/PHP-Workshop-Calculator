<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Calculator</title>
</head>

<body>
    <h2>Calculator</h2>
    <!-- ฟอร์มรับค่าตัวเลขและเครื่องหมาย มีmethodเป็น post -->
    <form action="" method="POST">
        <!-- ช่องรับค่าตัวเลขทั้ง2ตัว เว้นว่างไม่ได้-->
        <input type="number" name="num1" placeholder="Enter Number 1" require><br><br>
        <input type="number" name="num2" placeholder="Enter Number 2" require><br><br>

        <!-- ช่องเลือกเครื่องหมาย บวก ลบ คูณ หาร -->
        <select name="operator">
            <option value="add">+</option>
            <option value="subtract">-</option>
            <option value="multiply">*</option>
            <option value="divide">/</option>
        </select><br><br>

        <!-- ปุ่ม submit เพื่อส่งค่าที่ป้อนกับเครื่องหมายไปคำนวน -->
        <button type="submit">Calculate</button>
    </form>

    <?php
    // เช็คค่าเมื่อมีการกดsubmit ว่าส่งมาเป็นmethod postหรือไม่
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // เช็คว่าค่าที่ส่งมาเป็นmethod postหรือไม่ถ้าใช่จะเอาค่าที่ส่งมาเก็บในตัวแปร ถ้าไม่ใช่จะเก็บค่าว่าง
        $num1 = $_SERVER["REQUEST_METHOD"] == "POST" ? $_POST["num1"] : "";
        $num2 = $_SERVER["REQUEST_METHOD"] == "POST" ? $_POST["num2"] : "";
        $operator = $_SERVER["REQUEST_METHOD"] == "POST" ? $_POST["operator"] : "";

        // เช็คเครื่องหมายที่ส่งเข้ามา
        if ($operator == "add") {
            // ถ้าเป็นบวกเอาตัวเลขสองตัวมาบวกกันเก็บผลลัพในresult
            $result = $num1 + $num2;
        } elseif ($operator == "subtract") {
            // ถ้าเป็นลบเอาตัวเลขสองตัวมาลบกันเก็บผลลัพในresult
            $result = $num1 - $num2;
        } elseif ($operator == "multiply") {
            // ถ้าเป็นลบเอาตัวเลขสองตัวมาลบกันเก็บผลลัพในresult
            $result = $num1 * $num2;
        } elseif ($operator == "divide") {
            // ถ้าเป็นหารจะเช็คค่าตัวเลขที่2ว่าเป็น0หรือป่าว
            if ($num2 == 0) {
                // ถ้าเป็น0จะแสดงข้อความว่าหารไม่ได้เก็บไว้ในresult
                $result = "Division by zero is not allowed.";
            } else {
                // ถ้าไม่ใช่0จะเอาเลข2ตัวมาหารกันเก็บในresult
                $result = $num1 / $num2;
            }
        }

        // เช็คว่าค่าในresultเป็นตัวเลขหรือป่าว
        if (is_numeric($result)) {
            // ถ้าเป็นตัวเลขให้แสดงค่าในresult
            echo "<p>Result: $result</p>";
        } else {
            // ถ้าไม่ใช่แสดงerror และค่าในresult
            echo "<p style='color: red'>Error $result</p>";
        }
    }

    echo "<h2>Multiplication Table for 1 to 12</h2>";
    // วนลูปตามแม่สูตรคูณ1ถึง12
    for ($number = 1; $number <= 12; $number++) {
        // วนลูปตามตัวคูณ1ถึง12
        for ($i = 1; $i <= 12; $i++) {
            // resultเก็บค่าแม่สูตรคูณแม่นั้นคูณกับตัวคูณไว้
            $result = $number * $i;
            // แสดงค่าที่กำลังคูณกันคณะที่วนรอบน้ันและผลคูณ
            echo "$number x $i = $result<br>";
        }
        echo "<br>";
    }
    ?>
</body>

</html>