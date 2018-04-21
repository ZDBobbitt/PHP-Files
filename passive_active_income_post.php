<?php
/*
 *Template Name: Post-Retirement Income Calculator
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
	  color: black;
    }
    
    span {
      font-family: 'Work Sans', sans-serif;
      font-size: 24px;
	  color: black;
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
    
    #timeOut {
      font-family: 'Nunito', sans-serif;
    }
    
    #timeOut2 {
      font-family: 'Lato', sans-serif;
      font-size: 38px;
      margin-top: -15px;
	  margin-bottom: 25px;
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
	
	#netValue::-webkit-slider-runnable-track {
      background: #caa3ff;
    }
    
    #netValue:focus::-webkit-slider-runnable-track {
      background: #caa3ff;
    }
    
    #netValue::-moz-range-track {
      background: #caa3ff;
    }
    
    #expValue::-webkit-slider-runnable-track {
      background: #00ff7f;
    }
    
    #expValue:focus::-webkit-slider-runnable-track {
      background: #00ff7f;
    }
    
    #expValue::-moz-range-track {
      background: #00ff7f;
    }
	
    #hustleValue::-webkit-slider-runnable-track {
      background: #effb8d;
    }
    
    #hustleValue:focus::-webkit-slider-runnable-track {
      background: #effb8d;
    }
    
    #hustleValue::-moz-range-track {
      background: #effb8d;
    }
    
	#hustleMoreValue::-webkit-slider-runnable-track {
      background: #effb8d;
    }
    
    #hustleMoreValue:focus::-webkit-slider-runnable-track {
      background: #effb8d;
    }
    
    #hustleMoreValue::-moz-range-track {
      background: #effb8d;
    }
	
    input[type=range]::-webkit-slider-runnable-track {
      width: 60%;
      height: 8.4px;
      cursor: pointer;
      box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
      background: #389fa3;
      border-radius: 1.3px;
      border: 0.2px solid #010101;
    }
	
	input[type=range]::-moz-range-track {
      width: 100%;
      height: 8.4px;
      cursor: pointer;
      box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
      background: #389fa3;
      border-radius: 1.3px;
      border: 0.2px solid #010101;
    }
	
	input[type=range]:focus::-webkit-slider-runnable-track {
      background: #389fa3;
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
    <p id="appName">"QUIT YOUR DAY JOB" CALCULATOR</p>
  <hr id="title-bottom-line">  
  </div>
  <div>
    <p>What is your current net worth?</p>
    <input type="range" min="-200000" , max="2000000" step="5000" id="netValue" value="50000" onchange="myFunction()" oninput="myFunction()" />
  </div>
  <span>$<span id="netOut">50,000</span></span>
  
  <div>
    <p>What is your post-tax annual income?</p>
    <input type="range" min="0" , max="250000" step="1000" id="incValue" value="50000" onchange="myFunction()" oninput="myFunction()" />
  </div>
  <span>$<span id="incOut">50,000</span></span>

  <div>
    <p>What are your annual expenses?</p>
    <input type="range" min="0" , max="250000" step="1000" id="expValue" value="50000" onchange="myFunction()" oninput="myFunction()" />
  </div>
  <span>$<span id="expOut">50,000</span></span>
  
  <div>
    <p>How much do you plan on earning yearly once you quit your job?</p>
    <input type="range" min="0" , max="100000" step="1000" id="hustleValue" value="0" onchange="myFunction()" oninput="myFunction()" />
  </div>
  <span>$<span id="hustleOut">0</span></span>

  <div>
    <input type='button' id='button' value="Change Assumptions" />
  </div>

  <div style='display: none;' id='assumptions'>
    <p class="assumptions">Annual Interest Rate (%)</p>
    <input type="number" min="1" step="0.5" id="interest" value="5" oninput="myFunction()" />
    <p class="assumptions">Withdrawal Rate (%)</p>
    <input type="number" min="1" step="0.5" id="withdraw" value="4" oninput="myFunction()" />
  </div>

  <div>
    <br>
    <p id="timeOut"></p>
    <p id="timeOut2"></p>
  </div>
  
  <div style='display: none;' id="secondTimes">
  <div id='hustleMoreDiv'>
    <p id="timeOut3"></p>
    <input type="range" min="0" , max="100000" step="1000" id="hustleMoreValue" value="0" onchange="myFunction()" oninput="myFunction()" />
  </div>
  <span>$<span id="hustleMoreOut">0</span></span>
	
	<p id="timeOut4"></p>
   </div>
  <script>
    //massive function to calculate years to F.I.
    function myFunction() {
	  //display second time group
	  document.getElementById("secondTimes").style.display = "block";
	  
	  //perform calculations for time to FI maintenance
	  var netWorth = document.getElementById("netValue").value;
      var income = document.getElementById("incValue").value;
      var expenses = document.getElementById("expValue").value;
	  var hustle = document.getElementById("hustleValue").value;
      var i = document.getElementById("interest").value / 100;
      var withdraw = document.getElementById("withdraw").value;
      var moneyNeeded = (expenses-hustle) * (1 / (withdraw / 100));
      var annSavings = income - expenses;
      var time = ((1 / Math.log(1 + i)) * (Math.log(annSavings + (moneyNeeded * i)) - (Math.log(annSavings + (netWorth * i))))).toFixed(1);  
	  document.getElementById("netOut").innerHTML = netWorth.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	  document.getElementById("incOut").innerHTML = income.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      document.getElementById("expOut").innerHTML = expenses.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	  document.getElementById("hustleOut").innerHTML = hustle.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	  
	  //if income less than expenses, output message
	   if (isNaN(time)) {
        document.getElementById("timeOut").innerHTML = "It isn't possible to maintain this net worth with these values.";
        document.getElementById("timeOut2").innerHTML = " ";
		document.getElementById("secondTimes").style.display = "none";
        } else {
	      document.getElementById("timeOut").innerHTML = "You can quit your job and still maintain your net worth by working at your current job this much longer:"
		  document.getElementById("timeOut2").innerHTML = time + " years";
		}
	  
	    if (hustle==0) {
		document.getElementById("secondTimes").style.display = "none";
        }
	  
	  //perform calculations for time to FULL FI
	  var hustleMore = document.getElementById("hustleMoreValue").value;
	  var annSavingsNew = hustleMore - expenses;
	  var moneyNeededNew = (expenses) * (1 / (withdraw / 100));
	  var netWorthNew = moneyNeeded;
	  var time2 = ((1 / Math.log(1 + i)) * (Math.log(annSavingsNew + (moneyNeededNew * i)) - (Math.log(annSavingsNew + (netWorthNew * i))))).toFixed(1);
	  document.getElementById("hustleMoreOut").innerHTML = hustleMore.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	  document.getElementById("hustleMoreValue").min = Number(hustle) + Number(1000);
	  document.getElementById("timeOut3").innerHTML = "If you do quit your job in " + time + " years and instead earn this much yearly...";
	  document.getElementById("timeOut4").innerHTML = "You will achieve complete financial independence in " + time2 + " years";
	}

    //create function that shows or hides elements based on button click
    var button = document.getElementById('button');
    button.onclick = function() {
      var div = document.getElementById('assumptions');
      if (div.style.display !== 'none') {
        div.style.display = 'none';
      } else {
        div.style.display = 'block';
      }
    };

  </script>
</body>

</html>

<?php get_footer();?>