<?php
/*
 *Template Name: Active Income In Retirement
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
	
    body {
      text-align: center;
	  color: black;
    }
    p {
      font-family: 'Advent Pro', sans-serif;
      font-size: 20px;
      margin-bottom: 0px;
    }
    
    span {
      font-family: 'Work Sans', sans-serif;
      font-size: 24px;
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
      color: black;
    }
    
    #timeOut {
      font-family: 'Nunito', sans-serif;
    }
    
    #timeOut2 {
      font-family: 'Lato', sans-serif;
      font-size: 42px;
      margin-top: 15px;
      margin-bottom: 15px;
    }
    
    hr {
      width: 40%;
    }
    
    #title-bottom-line {
      margin-bottom: 30px;
      margin-top: 15px;
    }
    
    #title-top-line {
     margin-bottom: 15px;
    }
    
    input[type=range] {
      -webkit-appearance: none;
      margin: 18px 0;
      width: 60%;
    }
    
    input[type=range]:focus {
      outline: none;
    }
    
    #spendingValue::-webkit-slider-runnable-track {
      background: #ff6c6e;
    }
    
    #spendingValue:focus::-webkit-slider-runnable-track {
      background: #ff6c6e;
    }
    
    #spendingValue::-moz-range-track {
      background: #ff6c6e;
    }
	
    #earningYearsValue::-webkit-slider-runnable-track {
      background: #e9ee9b;
    }
    
    #earningYearsValue:focus::-webkit-slider-runnable-track {
      background: #e9ee9b;
    }
    
    #earningYearsValue::-moz-range-track {
      background: #e9ee9b;
    }
    
    #startingValue::-webkit-slider-runnable-track {
      background: #4e729c;
    }
    
    #startingValue::-webkit-slider-runnable-track {
      background: #4e729c;
    }
    
    #startingValue::-moz-range-track {
      background: #4e729c;
    }
    
    #retirementYearsValue::-webkit-slider-runnable-track {
      background: #c39bee;
    }
    
    #retirementYearsValue::-webkit-slider-runnable-track {
      background: #c39bee;
    }
    
    #retirementYearsValue::-moz-range-track {
      background: #c39bee;
    }
    
    input[type=range]::-webkit-slider-runnable-track {
      width: 60%;
      height: 8.4px;
      cursor: pointer;
      box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
      background: #aeee9b;
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
      background: #8ce371;
    }
    
    input[type=range]::-moz-range-track {
      width: 100%;
      height: 8.4px;
      cursor: pointer;
      box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
      background: #8ce371;
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
	
	pre {
	display: none;
	}
	
	.slidingBar {
	padding-top: 40px;
	}
	
	#timesAnnualExpenses {
	font-family: 'Advent Pro', sans-serif;
        font-size: 19px;
	}
	
	#annExpenses {
	font-family: 'Advent Pro', sans-serif;
        font-size: 19px;
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
    }
    
    #button:hover {
      background-color: #f6f6f6;
      border: 1px solid black;
    }
    
    .assumptions {
		margin-bottom: 0px;
		padding-top: 10px;
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
  <hr id="title-top-line">
    <p id="appName">Active Income in Retirement Calculator</p>
  <hr id="title-bottom-line">  
  </div>
  
  <div class='slidingBar'>
    <p>How much will you spend each year in retirement?</p>
    <input type="range" min="1000" , max="200000" step="1000" id="spendingValue" value="40000" onchange="myFunction()" oninput="myFunction()" />
  </div>
  <span>$<span id="spendingOut">40,000</span></span>

  <div class='slidingBar'>
    <p>How much (post-tax) active income will you earn in retirement?</p>
    <input type="range" min="1000" , max="200000" step="1000" id="earningValue" value="20000" onchange="myFunction()" oninput="myFunction()" />
  </div>
  <span>$<span id="earningOut">20,000</span></span>
  
  <div class='slidingBar'>
    <p>How many years will you earn this active income?</p>
    <input type="range" min="1" step="1" max="70" id="earningYearsValue" value="10" oninput="myFunction()" />
  </div>
  <span><span id="earningYearsOut">10</span> years</span>
  
  <div class='slidingBar'>
    <p>How much will your portfolio be worth when you decide to retire?</p>
    <input type="range" min="5000" step="5000" max="3000000" id="startingValue" value="400000" oninput="myFunction()" />
  </div>
  <span>$<span id="startingOut">400,000</span></span>
  <span id='timesAnnualExpenses'>(<span id='annExpenses'>5.0</span> times annual expenses)</span>
  
  <div class='slidingBar'>
    <p>How many years will your retirement last?</p>
    <input type="range" min="1" step="1" max="70" id="retirementYearsValue" value="20" oninput="myFunction()" />
  </div>
  <span><span id="retirementYearsOut">20</span> years</span>
  
  <div>
    <input type='button' id='button' value="Change Assumptions" />
  </div>

  <div style='display: none;' id='assumptions'>
    <p class="assumptions">Annual Inflation Rate (%)</p>
    <input type="number" min = "1" step="0.1" id="inflationRate" value="3" oninput="myFunction()" />
    <p class="assumptions">Annual Interest Rate (%)</p>
    <input type="number" min="1" step="0.1" id="interestRate" value="6" oninput="myFunction()" />
  </div>
  
  <div>
    <br>
    <p id="timeOut">Your ending portfolio value after <span id='retirementYearsOut'>20</span> years will be</p>
    <p id="timeOut2">$27,341</p>
  </div>
  
  <script>
  
      var spending = document.getElementById("spendingValue").value;
      var earning = document.getElementById("earningValue").value;
      var earningYears = document.getElementById("earningYearsValue").value;
      var starting = document.getElementById("startingValue").value;
      var retirementYears = document.getElementById("retirementYearsValue").value;
      var interest = document.getElementById("interestRate").value / 100;
      var inflation = document.getElementById("inflationRate").value / 100;
      var noIncomeYears = retirementYears - earningYears;
      var inflationUse = ((1+interest) / (1+inflation)) - 1;
      
      var net = (starting)*(Math.pow(1+interest, earningYears)) - ((((earning-spending)*((Math.pow(1+interest, earningYears)-1)/interest))*(1+interest)) *-1); 
	  
      var net2 = (net)*(Math.pow(1+interest, noIncomeYears)) - ((((-1*spending)*((Math.pow(1+interest, noIncomeYears)-1)/interest))*(1+interest)) *-1);
      var netInflation2 = net2 * (Math.pow(1-inflation, (noIncomeYears-1)));
    //function to update sliding bars and calculate portfolio ending value
    function myFunction() {
      
      //define variable from slider bars
      spending = document.getElementById("spendingValue").value;
      earning = document.getElementById("earningValue").value;
      earningYears = document.getElementById("earningYearsValue").value;
      starting = document.getElementById("startingValue").value;
      retirementYears = document.getElementById("retirementYearsValue").value;
      interest = document.getElementById("interestRate").value / 100;
      inflation = document.getElementById("inflationRate").value / 100;
      noIncomeYears = retirementYears - earningYears;
      inflationUse = ((1+interest) / (1+inflation)) - 1;	  
      annExpensesMultiple = (Math.round( (starting/spending)*10 )/ 10).toFixed(1);

      net = (starting)*(Math.pow(1+interest, earningYears)) - ((((earning-spending)*((Math.pow(1+interest, earningYears)-1)/interest))*(1+interest)) *-1);
      
      net2 = (net)*(Math.pow(1+interest, noIncomeYears)) - (((-1*(spending*Math.pow(1+inflationUse, ((earningYears-(retirementYears*-2))/3)))*((Math.pow(1+interest, noIncomeYears)-1)/interest))*(1+interest)) *-1);
      netInflation2 = net2 * (Math.pow(1-inflationUse, (retirementYears)));

      //update slider bars  
      document.getElementById("spendingOut").innerHTML = spending.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      document.getElementById("earningOut").innerHTML = earning.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      document.getElementById("earningYearsOut").innerHTML = earningYears.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      document.getElementById("startingOut").innerHTML = starting.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      document.getElementById("retirementYearsOut").innerHTML = retirementYears.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");   
      document.getElementById("annExpenses").innerHTML = annExpensesMultiple.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      document.getElementById("timeOut").innerHTML = "Your ending portfolio value after " + retirementYears + " years will be";
      
      if (netInflation2 >= 0) {
      document.getElementById("timeOut2").innerHTML = "$ " + netInflation2.toFixed(0).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      } else {
      document.getElementById("timeOut2").innerHTML = "$0";
      }
   
};   

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
