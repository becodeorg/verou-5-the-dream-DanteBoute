<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Dream</title>
    <?PHP echo '<link rel="stylesheet" type="text/css" href="style.css"></head>' ?>
</head>
<body>
    <main>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); 
        ?>" method="POST"><label for="currency">Enter amount in euros:</label><br>
        <input type="number" id="amount" name="amount" step="0.01" min="0"><br><br>
        <select name="currency">currency
            <option value="dollar">Dollar</option>
            <option value="peso">Peso</option>
            <option value="pound">Pound</option>
            <option value="pkr">Pakistani Rupee</option>
            <option value="pln">Zloty</option>
            <option value="lira">Lira</option>

        </select>
        <br>
        <hr>
        <input type="submit" name="submit" value="submit">
        </form>
        <?php
        if($_SERVER["REQUEST_METHOD"] === "POST") {
           
            // GRAB DATA FROM INPUTS
            $amount = filter_input(INPUT_POST, "amount", FILTER_SANITIZE_NUMBER_FLOAT);
            $currency = htmlspecialchars($_POST["currency"]);

            // ERROR HANDLERS
            $errors = false;

            if (empty($amount) || empty($currency)) {
                echo "<p class='calc-error'>Fill in all fields!</p>";
                $errors = true;
            }
            if(!is_numeric($amount)) {
                echo "<p class='calc-error'>Only numbers allowed!</p>";
                $errors = true;
            }
            // CALCULATE CURRENCY IF NO ERRORS
            if (!$errors) {
                $value = 0;
                switch($currency){
                    case "dollar":
                        $value = $amount*1.09;
                        break;
                    case "peso":
                        $value = $amount*18.64;
                        break;
                    case "pound":
                        $value = $amount*0.87;
                        break;
                    case "pkr":
                        $value = $amount*304.49;
                        break;
                    case "pln":
                        $value = $amount*4.37156;
                        break;
                    case "lira":
                        $value = $amount*32.54;
                        break;
                    default:
                    echo "<p class='calc-error'>Something went HORRIBLY wrong!</p>";
                }
                echo $amount . " euros" . "<p class='currency_output'> is equal to " . $value . " " . $currency . "s" . "</p>";
            } 
        }
        ?>
    </main>
</body>
</html>
