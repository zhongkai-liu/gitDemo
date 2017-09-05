<html>
   <head>
      <title>Tip Calculator</title>
      <link type="text/css" rel="stylesheet" href="css/structural.css"/>
      <link type="text/css" rel="stylesheet" href="css/form.css"/>
   </head>
   <body>
      <h1>Hello What's up!!!</h1>
      <div id="calculatorInterface" style="height: 500px">
        <form id="userForm" method="post" action="tipcalculated.php">
          <div style="position:relative; margin-top:20px">
            <div class="buttonBox">
              <input class="button" type="submit" value="Calculate">
            </div>
            <div class="center" style="height:120px; width:50%; float:left; padding-top:2px">
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
            <input type="text" name="billamount" id="billBox" value="0.00"></input>
          </div>
          <div class="section">
            <div class="container center" id="percentage">
              <h3>How much does your waiter/waitress deserve?</h3>
              <div class="boxCenter">
                <?php
                  $start=10;
                  while($start<=20){
                    echo "<input type=\"radio\" name=\"percentage\" checked value=\"".$start."\">".$start."%</input><br>";
                    $start+=5;
                  }
                 ?>
                <input type="radio" name="percentage" value="-1">or:</input>
                <input class="customNumber" type="text" name="newpercentage"></input>%<br>
              </div>
            </div>
            <div class="container center" id="split">
              <h3>How do you want to split the cost?</h3>
              <div class="boxCenter">
                <input type="radio" name="split" checked value="1">Me, meself, and I</input><br>
                <?php
                  $start=2;
                  while($start<=3){
                    echo "<input type=\"radio\" name=\"split\" value=\"".$start."\">".$start." people</input><br>";
                    $start++;
                  }
                 ?>
                <input type="radio" name="split" value="-1">or:</input>
                <input class="customNumber" type="text" name="newsplit"></input> people<br>
              </div>
            </div>
          </div>
        </form>
        <div class="section">
          <div id="result">

          </div>
        </div>
      </div>
   </body>
</html>
