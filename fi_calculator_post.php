<?php
/*
 *Template Name: FI Calculator Post
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
    
    #expValue::-webkit-slider-runnable-track {
      background: #f36969;
    }
    
    #expValue:focus::-webkit-slider-runnable-track {
      background: #f36969;
    }
    
    #expValue::-moz-range-track {
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
    <p id="appName">FINANCIAL INDEPENDENCE CALCULATOR</p>
  <hr id="title-bottom-line">  
  </div>
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
    <input type='button' id='button' value="Change Assumptions" />
  </div>

  <div style='display: none;' id='assumptions'>
    <p class="assumptions">Current Net Worth ($)</p>
    <input type="number" step="1000" id="starting" value="0" oninput="myFunction()" />
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
  <div class="socialheader">
  <div class="addthis_toolbox addthis_default_style">
  <a class="addthis_button_tweet"></a>
  </div>
  </div>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-513375c7395449c1"></script>
<!-- AddThis Button END -->
  <script>
    //massive function to calculate years to F.I.
    function myFunction() {
      var income = document.getElementById("incValue").value;
      var expenses = document.getElementById("expValue").value;
      var startingPortfolio = document.getElementById("starting").value;
      var i = document.getElementById("interest").value / 100;
      var withdraw = document.getElementById("withdraw").value;
      var moneyNeeded = expenses * (1 / (withdraw / 100));
      var annSavings = income - expenses;
      var time = ((1 / Math.log(1 + i)) * (Math.log(annSavings + (moneyNeeded * i)) - (Math.log(annSavings + (startingPortfolio * i))))).toFixed(1);
      document.getElementById("incOut").innerHTML = income.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      document.getElementById("expOut").innerHTML = expenses.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      document.getElementById("timeOut").innerHTML = "You can be financially independent in"
      document.getElementById("timeOut2").innerHTML = time + " years";

      //if income less than expenses, output message
      if (Number(income) <= Number(expenses)) {
        document.getElementById("timeOut").innerHTML = "Your income must exceed your expenses to achieve financial independence.";
        document.getElementById("timeOut2").innerHTML = " ";
        }
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

<?php do_action( 'addthis_widget' ); ?>
<?php get_footer();?>