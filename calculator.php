<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="calcstyle.css" />
</head>
<body>
    <div class="container">
        <h1>Calculator</h1>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
            <div class="calc">
                <input type="number" name="num1" placeholder="number1">
                <select name="operator">
                    <option value="add">+</option>
                    <option value="subtract">-</option>
                    <option value="multiply">*</option>
                    <option value="divide">/</option>
                    <option value="remainder">%</option>
                </select>
                <br>
                <input type="number" name="num2" placeholder="number2">
                <br>
                <button>Calculate</button>
            </div>
        </form>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $num1 = $_POST["num1"];
                $num2 = $_POST["num2"];
                $operator = $_POST["operator"];
                $errors = false;

                if (empty($num1) || empty($num2) || empty($operator)) {
                    echo "Enter data properly, please.";
                    $errors = true;
                }
                if (!is_numeric($num1) || !is_numeric($num2)) {
                    $errors = true;
                } 
                if ($errors == false) {
                    $result = 0;
                    switch ($operator) {
                        case "add":
                            $result = $num1 + $num2;
                            break;
                        case "subtract":
                            $result = $num1 - $num2;
                            break;
                        case "multiply":
                            $result = $num1 * $num2;
                            break;
                            case "remainder":
                                $result=$num1 % $num2;
                                break;
                        case "divide":
                            if ($num2 != 0) {
                                $result = $num1 / $num2;
                            } else {
                                echo "Division by zero is not allowed.";
                                exit;
                            }
                            break;
                        default:
                            echo "Invalid operation.";
                            exit;
                    }
                    echo "The result = " . $result;
                }
            }
        ?>
    </div>
</body>
</html>
