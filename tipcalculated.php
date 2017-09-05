<html>
   <head>
      <title>Tip Calculator</title>
      <link type="text/css" rel="stylesheet" href="css/structural.css"/>
      <link type="text/css" rel="stylesheet" href="css/form.css"/>
   </head>
   <?php
   $Error_message = $Optional_message = "";
   $bill = $total = $totalTip = $individual = $individualTip = 0.0;
   $split = $percentage = 0;
   {
     $killBill = true;
     $bill = $_POST["billamount"];
     $percentage = $_POST["percentage"];
     if($percentage == -1){
        $percentage = $_POST["newpercentage"];
        if($_POST["newpercentage"] == ""){
          $percentage = 20;
        }
      }
     $split = $_POST["split"];
     if($split == -1){
      $split = $_POST["newsplit"];
      if($_POST["newsplit"] == ""){
       $split = 1;
     }
    }
   }
   {
     if($bill <= 0)
      $Error_message = $Error_message . "<p>Please enter a valid bill value.</p>";
      else if($bill > 9999999)
      $Error_message = $Error_message . "<p>Are you crazy?</p>";
     if($percentage <= 0 )
      $Error_message = $Error_message . "<p>tip percentage cannot be negative or zero.</p>";
     if($split <= 0)
      $Error_message = $Error_message . "<p>The number of people cannot be negative or zero.</p>";
   }
   {
     if($Error_message==""){
       $totalTip = $bill * $percentage / 100.0;
       $total = $totalTip + $bill;
       $individualTip = $totalTip / $split;
       $individual = $individualTip + $bill / $split;
     }
   }
   function roundUpDown($num){
     $num = $num * 100 + 0.5;
     $num = ((integer)$num) / 100.0;
     return $num;
   }

    ?>
   <body>
      <div id="calculatorInterface">
        <form id="userForm" method="post" action="tipcalculated.php">
          <div style="position:relative; margin-top:20px">
            <div class="buttonBox">
              <input class="button" type="submit" value="Calculate">
            </div>
            <div class="center" style="height:100px; width:50%; float:left; padding-top:2px">
              <p style="font-size: 30;"><b>$Tip Calculator$</b></p>
            </div>
            <div class="buttonBox">
              <div class="btn center" >
                <a class="btnlink" href="tipcalculator.php">Reset</a>
              </div>
            </div>
          </div>
          <div class="section center" id="billinput">
            <h1>Bill Total: $</hi>
            <input type="text" name="billamount" id="billBox" value=<?php echo "$bill"?>></input>
          </div>
          <div class="section">
            <div class="container center" id="percentage">
              <h3>How much does your waiter/waitress deserve?</h3>
              <div class="boxCenter">
                <?php
                  $start=10;
                  $set=false;
                  while($start<=20){
                    if($start==$percentage){
                      echo "<input type=\"radio\" name=\"percentage\" checked value=\"".$start."\">".$start."%</input><br>";
                      $set=true;
                    }
                    else
                      echo "<input type=\"radio\" name=\"percentage\" value=\"".$start."\">".$start."%</input><br>";
                    $start+=5;
                  }
                  if(!$set){
                    echo "<input type=\"radio\" name=\"percentage\" checked value=\"-1\">or:</input>";
                    echo "<input class=\"customNumber\" type=\"text\" name=\"newpercentage\" value=\"".$percentage."\"></input>%<br>";
                  }
                  else{
                    echo "<input type=\"radio\" name=\"percentage\" value=\"-1\">or:</input>";
                    echo "<input class=\"customNumber\" type=\"text\" name=\"newpercentage\"></input>%<br>";
                  }
                 ?>


              </div>
            </div>
            <div class="container center" id="split">
              <h3>How do you want to split the cost?</h3>
              <div class="boxCenter">
                <?php
                  $set=false;
                  if($split==1){
                    echo "<input type=\"radio\" name=\"split\" checked value=\"1\">Me, meself, and I</input><br>";
                    $set=true;
                  }
                  else
                    echo "<input type=\"radio\" name=\"split\" value=\"1\">Me, meself, and I</input><br>";
                  $start=2;
                  while($start<=3){
                    if($start==$split){
                      echo "<input type=\"radio\" name=\"split\" checked value=\"".$start."\">".$start." people</input><br>";
                      $set=true;
                    }
                    else
                      echo "<input type=\"radio\" name=\"split\" value=\"".$start."\">".$start." people</input><br>";
                    $start++;
                  }
                 if(!$set){
                   echo "<input type=\"radio\" name=\"split\" checked value=\"-1\">or:</input>";
                   echo "<input class=\"customNumber\" type=\"text\" name=\"newsplit\" value=\"".$split."\"></input> people<br>";
                 }
                 else{
                   echo "<input type=\"radio\" name=\"split\" value=\"-1\">or:</input>";
                   echo "<input class=\"customNumber\" type=\"text\" name=\"newsplit\" ></input> people<br>";
                 }
                 ?>
              </div>
            </div>
          </div>
        </form>
        <div class="section">
          <div id="result">
            <?php
            if($Error_message!=""){
              echo "<h3>Error from your form input: </h3><h3>".$Error_message."</h3>";
            }
            else{
              echo "<h3>Tip total: ".roundUpDown($totalTip)."</h3>";
              echo "<h3>Bill with tip total: ".roundUpDown($total)."</h3>";
              if($split!=1){
                echo "<h3>Tip share: ".roundUpDown($individualTip)."</h3>";
                echo "<h3>Bill with tip share: ".roundUpDown($individual)."</h3>";
              }
            }
             ?>
          </div>
        </div>
      </div>
   </body>
</html>
