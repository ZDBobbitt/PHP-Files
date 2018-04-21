<?php
/*
 *Template Name: Savings VS Investment Game
 *Template Post Type: post
 */
 
 get_header(); ?>
<html>
<head>
  <style>
  @import url(https://fonts.googleapis.com/css?family=Advent+Pro:500);
    @import url(https://fonts.googleapis.com/css?family=Work+Sans:500);
    @import url(https://fonts.googleapis.com/css?family=Nunito);
    @import url('https://fonts.googleapis.com/css?family=Lato');
    
	.socialheader a {
    float: none !important;
    }
	
    body {
      text-align: center;
    }
    p {
      font-family: 'Advent Pro', sans-serif;
      font-size: 20px;
    }
    
    span {
      font-family: 'Work Sans', sans-serif;
      font-size: 24px;
    }
	
	.assumptions {
		margin-bottom: 0px;
		padding-top: 10px;
	}
    
    #pillars {
      font-size: 24px;
    }
    
    #visuals {
      font-size: 14px;
      margin-top: -5px;
      margin-bottom: 20px;
    }
    
    #appName {
      color: #3c3c3c;
    }
    
    #timeOut2 {
      font-family: 'Lato', sans-serif;
      font-size: 65px;
      margin-top: -15px;
      margin-bottom: 15px;
      color: #008080;
    }
    
    #button {
      border: 1px solid;
      border-radius: 10px;
      margin-top: 20px;
      margin-bottom: 30px;
      padding: 10px 10px;
      cursor: pointer;
      outline: none;
      background-color: white;
      color: black;
      font-family: 'Work Sans', sans-serif;
      border: 1px solid grey;
      /* Green */
    }
    
    #button:hover {
      background-color: #f6f6f6;
      border: 1px solid black;
    }
    
    hr {
      width: 40%;
    }
    
    #title-bottom-line {
      margin-bottom: 30px;
    }
    
    input[type=range] {
      -webkit-appearance: none;
      margin: 18px 0;
      width: 60%;
    }
    
    input[type=range]:focus {
      outline: none;
    }
    
    input[type=number]:focus {
      outline: none;
    }
    
    input[type=number] {
      padding-left: 2px;
	  
    }
    
    #ageValue::-webkit-slider-runnable-track {
      background: #008080;
    }
    
    #ageValue:focus::-webkit-slider-runnable-track {
      background: #008080;
    }
    
    #ageValue::-moz-range-track {
      background: #008080;
    }
    
    #networthValue::-webkit-slider-runnable-track {
      background: #008080;
    }
    
    #networthValue:focus::-webkit-slider-runnable-track {
      background: #008080;
    }
    
    #networthValue::-moz-range-track {
      background: #008080;
    }
    
    #interestValue::-webkit-slider-runnable-track {
      background: #f36969;
    }
    
    #interestValue:focus::-webkit-slider-runnable-track {
      background: #f36969;
    }
    
    #interestValue::-moz-range-track {
      background: #f36969;
    }
    
    #investValue::-webkit-slider-runnable-track {
      background: #f36969;
    }
    
    #investValue:focus::-webkit-slider-runnable-track {
      background: #f36969;
    }
    
    #investValue::-moz-range-track {
      background: #f36969;
    }
    
    input[type=range]::-webkit-slider-runnable-track {
      width: 60%;
      height: 8.4px;
      cursor: pointer;
      box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
      background: #69f389;
      border-radius: 1.3px;
      border: 0.2px solid #010101;
    }
    
    input[type=range]::-webkit-slider-thumb {
      box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
      border: 1px solid #000000;
      height: 30px;
      width: 16px;
      border-radius: 3px;
      background: #ffffff;
      cursor: pointer;
      -webkit-appearance: none;
      margin-top: -14px;
    }
    
    input[type=range]:focus::-webkit-slider-runnable-track {
      background: #69f389;
    }
    
    input[type=range]::-moz-range-track {
      width: 100%;
      height: 8.4px;
      cursor: pointer;
      box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
      background: #69f389;
      border-radius: 1.3px;
      border: 0.2px solid #010101;
    }
    
    input[type=range]::-moz-range-thumb {
      box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
      border: 1px solid #000000;
      height: 30px;
      width: 16px;
      border-radius: 3px;
      background: #ffffff;
      cursor: pointer;
    }
    
    input[type=range]::-ms-track {
      width: 100%;
      height: 8.4px;
      cursor: pointer;
      background: transparent;
      border-color: transparent;
      border-width: 16px 0;
      color: transparent;
    }
    
    input[type=range]::-ms-thumb {
      box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
      border: 1px solid #000000;
      height: 30px;
      width: 16px;
      border-radius: 3px;
      background: #ffffff;
      cursor: pointer;
    }
    
    #button {
      border: 1px solid;
      border-radius: 10px;
      margin-top: 20px;
      padding: 10px 10px;
      cursor: pointer;
      outline: none;
      background-color: white;
      color: black;
      font-family: 'Work Sans', sans-serif;
      border: 1px solid grey;
      /* Green */
    }
    
    #button1, #button2 {
      border: 1px solid;
      border-radius: 10px;
      width: 150px;
      margin-top: 20px;
      padding: 10px 10px;
      cursor: pointer;
      outline: none;
      background-color: #d6bef4;
      color: black;
      font-family: 'Work Sans', sans-serif;
      border: 1px solid grey;
      /* Green */
    }
    
    .scenario {
      color: #8b45b2;
    }
    
    .words {
      font-size: 20px;
      color: black;
    }
    
    .wordsLarge {
      font-size: 22px;
      color: black;
    }
    
    #savingsRight, #savingsLeft, #investLeft, #investRight {
      font-size: 20px;
      color: black;
    }
    
    #netLeft, #netRight {
      font-size: 22px;
      color: black;
    }

  </style>
</head>

<body style="text-align: center">
  <div>
    <p id="pillars"><b>| | | |</b></p>
  </div>
  <div>
    <p id="visuals">VISUALS</p>
  </div>
  <div>
  <hr>
    <p id="appName">COMPARING SAVING & INVESTMENT SCENARIOS</p>
  <hr id="title-bottom-line">  
  </div>
  <div>
    <p>Choose a time horizon</p>
    <input type="range" min="5" , max="50" step="1" id="timeValue" value="15" onchange="myFunction()" oninput="myFunction()" />
  </div>
  <span><span id="timeOut">15</span> years</span>

  <div>
    <input type='button' id='button' value="Generate Scenarios" />
  </div>
  
<div style="width: 100%;">
   <div style="float:left; width: 50%">
   	  <span><span class="scenario">Scenario 1</span></span>
   </div>
   <div style="float:left; width: 50%">
   	  <span><span class="scenario">Scenario 2</span></span>
   </div>
</div>
<div style="width: 100%; margin-top: 60px;">
   <div style="float:left; width: 50%">
   	  <span class='words'><span id="savingsLeft"></span></span>
   </div>
   <div style="float:left; width:50%">
   	  <span class='words'><span id="savingsRight"></span></span>
   </div>
</div>
<div style="clear:both"></div>

<div style="width: 100%; margin-top: 20px;">
   <div style="float:left; width: 50%;">
   	  <span class='words'><span id="investLeft"></span></span>
   </div>
   <div style="float:left; width: 50%">
   	  <span class='words'><span id="investRight"></span></span>
   </div>
</div>
<div style="clear:both"></div>

<div style='margin-top: 40px; margin-bottom: 15px;'>
  <p style='color: black; font-size: 22px;'>Which scenario will have a higher ending value?</p>
</div>

<div style="width: 100%;">
   <div style="float:left; width: 50%">
   	  <input type='button' id='button1' value="Scenario 1" />
   </div>
   <div style="float:left; width: 50%">
   	  <input type='button' id='button2' value="Scenario 2" />
   </div>
</div>
<div style="clear:both"></div>

<div style='margin-top: 40px; margin-bottom: 15px;'>
  <p id = 'answer_result' style='color: black; font-size: 40px;'></p>
</div>

<div style="width: 100%;">
   <div style="float:left; width: 50%">
   	  <span class='wordsLarge'><span id="netLeft"></span></span>
   </div>
   <div style="float:left; width: 50%">
   	  <span class='words'><span id="netRight"></span></span>
   </div>
</div>
<div style="clear:both"></div>

  <script>
    
    //update time horizon
    function myFunction() {
    var timeline= document.getElementById("timeValue").value;
    document.getElementById("timeOut").innerHTML = timeline.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    };
    
    //create function that calculates net amounts
      var button = document.getElementById('button');
          button.onclick = function() {
          
      //enable scenario buttons
      document.getElementById('button1').disabled = false;
      document.getElementById('button2').disabled = false;
    
      var timeline= document.getElementById("timeValue").value;
      
      //var randomNumber = Math.floor(Math.random() * (max - min - (-1))) - (- min);
      var randomNumberSaveRight = Math.floor(Math.random() * (50 - 5 - (-1))) - (-5);
      var savingsRight = randomNumberSaveRight * 1000;     
      var randomLeftUse = Math.random() * (50 - 20 - (-1)) - (-20);
      var randomNumberSaveLeft = randomNumberSaveRight * (1 - ((-randomLeftUse/100)));
      var savingsLeftStart = randomNumberSaveLeft * 1000;
      var savingsLeft = Math.round(savingsLeftStart/1000)*1000;
      
      var randomNumberInvestRight = Math.floor(Math.random() * (10 - 5 - (-1))) - (-5);
      var i_right = randomNumberInvestRight / 100;
      
      var randomLeftInvestUse = Math.random() * (4 - 2 - (-1)) - (-2);
      var randomNumberInvestLeftUse = randomNumberInvestRight * (1 - (randomLeftInvestUse/10));
      var randomNumberInvestLeft = Math.round(randomNumberInvestLeftUse/1)*1;
      var i_left = randomNumberInvestLeft / 100;
      
      var netRight = ((savingsRight*((Math.pow(1-(-i_right), timeline)-1)/i_right))*(1- (-i_right))).toFixed(0);
      var netLeft = ((savingsLeft*((Math.pow(1-(-i_left ), timeline)-1)/i_left ))*(1- (-i_left ))).toFixed(0);

      document.getElementById("savingsRight").innerHTML = "Invest $" + savingsRight.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + " per year";
      document.getElementById("savingsLeft").innerHTML = "Invest $" + savingsLeft.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + " per year";
      document.getElementById("investLeft").innerHTML = "Earn " + randomNumberInvestLeft.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + "% annual returns";
      document.getElementById("investRight").innerHTML = "Earn " + randomNumberInvestRight.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + "% annual returns";
      document.getElementById("netLeft").innerHTML = "";
      document.getElementById("netRight").innerHTML = "";
      document.getElementById("answer_result").innerHTML = "";


    
    //create function that calculates net amounts
    var button1 = document.getElementById('button1');
    button1.onclick = function() {
      
      var result = 'Correct!'
      if (netRight < netLeft) {
        document.getElementById("answer_result").style.color = '#52ba54';
        result = 'Correct!';
      } else {
        document.getElementById("answer_result").style.color = '#e15050';
        result = 'Incorrect';
      }

      document.getElementById("answer_result").innerHTML = result;
      document.getElementById("netLeft").innerHTML = "Ending Amount: $" + netLeft.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      document.getElementById("netRight").innerHTML = "Ending Amount: $" + netRight.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      
      //disable buttons
      document.getElementById('button1').disabled = true;
      document.getElementById('button2').disabled = true;
    };
    
    //create function that calculates net amounts
    var button2 = document.getElementById('button2');
    button2.onclick = function() {
      
      var result = 'Correct!'
      if (netRight > netLeft) {
        document.getElementById("answer_result").style.color = '#52ba54';
        result = 'Correct!';
      } else {
        document.getElementById("answer_result").style.color = '#e15050';
        result = 'Incorrect';
      }

      document.getElementById("answer_result").innerHTML = result;
      document.getElementById("netLeft").innerHTML = "Ending Amount: $" + netLeft.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      document.getElementById("netRight").innerHTML = "Ending Amount: $" + netRight.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      
      //disable buttons
      document.getElementById('button1').disabled = true;
      document.getElementById('button2').disabled = true;
    };
    
};

  </script>
</body>

</html>
<?php get_footer();?>