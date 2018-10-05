<?php

$number1 = 0;
$number2 = 0;
$operator = "";
$number3 = 0;
$result = false;


$mile = 1.609344;

//check if the form is submitted
if(isset($_POST['submit']))
{
   // get values of submitted items['getal1'];
    $number1 = $_POST['getal1'];
    $number2 = $_POST['getal2'];
    $operator = $_POST['operator'];
    $decimal = $_POST['decimal'];
   switch ($operator)
   {
        case "None":
            $number3 = "You need to select a method";
        break;
        case "+":
            $number3 = $number1 + $number2;
        break;
        case "-":
            $number3 = $number1 - $number2;
        break;
        case "x":
            $number3 = $number1 * $number2;
        break;
        case "/":
            if($number2 == 0)
            {
            $number3 = "Go back to school!";
            }
            else{
             $number3 = $number1 / $number2;
            }
        break;
        case "Power":
            $number3 = (pow($number1,$number2) . "<br>");
        break;
        case "Square Root":
            $number3 = (sqrt($number1) . "<br>");
        break;
        case "Kilometers to Miles":
            $number3 = $number1 / $mile;
        break;
        case "Miles to Kilometers":
            $number3 = $number1 * $mile;
        break;  
    }
    if($number3 == "Go back to school!"){
        $number3 = $result;
    }
    else{
       $result = round($number3, $decimal);
    } 
}

?>

<!DOCTYPE html>

<html>

    <head>
        <title>Vasco's Calculator</title>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width = device-width, initial-scale = 1,0">
        <link rel="stylesheet" type="text/css" href="css/style.css" />
    </head>
        <body>
        <div class="container">
            <header>
                <div class = "header">
                <h1>Vasco's Calculator</h1>
                </div>
            <div class = "result">
                <h1> <?php 
                if($operator == "Kilometers to Miles")
                {
                    echo $result . "Miles";
                }
                else if($operator == "Miles to Kilometers")
                {
                    echo $result . "km";
                }
                else 
                {
                 echo $result ; 
                }
                ?> 
                </h1>    
            </div>

     </header>
                <div class ="bottom-part" >
    <form method = "post" action = "index.php">
    <ul>
        <li>
                <label>Number 1:</label>
            <input type = "text" name = "getal1" autocomplete="off" placeholder = "Number 1" required>
        </li>
        <li id = "second-input">
               <label>Number 2:</label>
            <input type = "text" name = "getal2" autocomplete="off" placeholder = "Number 2" id = "number2">
        </li>
        <li>
            <select name = "operator" id = "operator-list">
                <option>None</option>
                <option value ="+">+</option>
                <option value = "x">x</option>
                <option value = "-">-</option>
                <option value = "/">/</option>
                <option value = "Power">Power</option>
                <option value = "sqrt" >Square Root</option>
                <option value = "Kilometers to Miles">Kilometers to Miles</option>
                <option value = "Miles to Kilometers">Miles to Kilometers</option>
            </select>
        </li>
        <li>
                <label>Decimalen:</label>
            <input id = "decimals-input" class = "input-numbers" type = "text" name = "sliderDecimals" placeholders = "How many decimals?" autocomplete = "off" disabled = "disabled"/>
            <input id = "decimals-slider" class = "range-slider" type = "range" name = "decimal" min = "0" max = "10" step = "1" value = "0" >
        </li>
        <li>
            <button type = "submit" name = "submit" value = "submit">Calculate</button>
            <button type = "reset" name = "reset" >Reset</button>
        </li>
    </ul>
    </form>    
</div>
    <footer>
        <p>Vasco Hooiveld, Copyright © 2018</p>
    </footer>
            </div>
            <script type = "text/javascript">
        //hide second input

        let operatorlist = document.getElementById("operator-list");
        operatorlist.onchange = function() {
        let secondInput = document.getElementById("number2");

            let selectedOperator = this.value;
            /*
            if(selectedOperator == "Square Root") {
                secondInput.style.display = "none";
            }
            else{
                if(selectedOperator == "Kilometers to Miles"){
                    secondInput.style.display = "none";
                }
                else{
                    if(selectedOperator == "Miles to Kilometers"){
                        secondInput.style.display = "none";
                    }
                    else{
                        secondInput.style.display = "block";
                    }
                }

            }
            */
            if(selectedOperator == "sqrt" || selectedOperator == "Kilometers to Miles" || selectedOperator == "Miles to Kilometers")
            {
                secondInput.disabled = true;
                secondInput.placeholder = "this filed is disabled";
            }
            else
            {
                secondInput.disabled = false;
                secondInput.placeholder = "Number 2";
            }
        }
          //changing decimals with slider
        let decimalSlider = document.getElementById("decimals-slider");
        let decimalIsInput = document.getElementById("decimals-input");

        decimalSlider.oninput = function(){
            decimalIsInput.value = this.value;
        }
        </script>
        
</body>

</html>