<?php
/*
 *Template Name: Time to Millionaire
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
    
    #timeOut {
      font-family: 'Nunito', sans-serif;
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
    <p id="appName">MILLIONAIRE AGE CALCULATOR</p>
  <hr id="title-bottom-line">  
  </div>
  <div>
    <p>What is your current age?</p>
    <input type="range" min="5" , max="100" step="1" id="ageValue" value="24" onchange="myFunction()" oninput="myFunction()" />
  </div>
  <span><span id="ageOut">24</span> years old</span>
  <div>
    <p style = 'padding-top: 30px'>What is your current net worth?</p>
    <input type="range" min="-200000" , max="900000" step="1000" id="networthValue" value="0" onchange="myFunction()" oninput="myFunction()" />
  </div>
  <span>$<span id="networthOut">0</span></span>
  <div>
    <p style = 'padding-top: 30px'>If you invest this much each year...</p>
    <input type="range" min="1000" , max="250000" step="1000" id="investValue" value="20000" onchange="myFunction()" oninput="myFunction()" />
  </div>
  <span>$<span id="investOut">20,000</span></span>

  <div>
    <p style = 'padding-top: 30px'>...and earn this annual investment return</p>
    <input type="range" min="0.1" , max="12" step="0.1" id="interestValue" value="5" onchange="myFunction()" oninput="myFunction()" />
  </div>
  <span><span id="interestOut">5</span>%</span>

  <div>
    <br>
    <p id="timeOut">You will be a millionaire by age</p>
    <p id="timeOut2">50</p>
  </div>

  <script>
  
    //massive function to calculate years until millionaire
    function myFunction() {
    
      var age = document.getElementById("ageValue").value;
      var networth = document.getElementById("networthValue").value;
      var invest = document.getElementById("investValue").value;
      var interest = document.getElementById("interestValue").value;
      var i = document.getElementById("interestValue").value / 100;
      var moneyNeeded = 1000000;
      
      //calculate millionare age
      var time = ((1 / Math.log(1 - (-1*i))) * (Math.log(invest - (-1 * (moneyNeeded * i))) - (Math.log(invest - (-1 * (networth * i)))))).toFixed(1);
      
      //use this function to round final age up to nearest integer
      function roundUp(num, precision) {
  	precision = Math.pow(10, precision)
  	return Math.ceil(num * precision) / precision
		}
      
      finalAge = roundUp((time - (-1*age)), 0);
      
      document.getElementById("ageOut").innerHTML = age.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      document.getElementById("networthOut").innerHTML = networth.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      document.getElementById("investOut").innerHTML = invest.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      document.getElementById("interestOut").innerHTML = interest.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      document.getElementById("timeOut2").innerHTML = finalAge;

    };

  </script>
</body>

</html>
<?php get_footer();?>