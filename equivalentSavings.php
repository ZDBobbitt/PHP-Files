<?php
/*
 *Template Name: Equivalent Savings
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
      font-size: 22px;
    }
    
    #yearsOut {
      font-family: 'Advent Pro', sans-serif;
      font-size: 22px;
    }
    
    span {
      font-family: 'Advent Pro', sans-serif;
      font-size: 22px;
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
      font-family: 'Advent Pro', sans-serif;
      font-size: 26px;
      margin-top: 45px;
    }
    
    #timeOut2 {
      font-family: 'Raleway', sans-serif;
      font-size: 38px;
      margin-top: -15px;
      margin-bottom: 25px;
      color: teal;
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
    
    #savingsValue::-webkit-slider-runnable-track {
      background: #4e729c;
    }
    
    #savingsValue:focus::-webkit-slider-runnable-track {
      background: #4e729c;
    }
    
    #savingsValue::-moz-range-track {
      background: #4e729c;
    }
	
	#interestValue::-webkit-slider-runnable-track {
      background: #ff6c6e;
    }
    
    #interestValue:focus::-webkit-slider-runnable-track {
      background: #ff6c6e;
    }
    
    #interestValue::-moz-range-track {
      background: #ff6c6e;
    }
    
    input[type=range]::-webkit-slider-runnable-track {
      width: 60%;
      height: 8.4px;
      cursor: pointer;
      box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
      background: #ac74bd;
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
      background: #ac74bd;
    }
    
    input[type=range]::-moz-range-track {
      width: 100%;
      height: 8.4px;
      cursor: pointer;
      box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
      background: #ac74bd;
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
	
		input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    margin: 0; 
}
	
	#savingsValue {
	outline: none;
	border: none;
	border-bottom: 3px teal solid;
	border-radius: 0px;
	padding-bottom: 0px;
	font-size: 20px;
	font-family: 'Raleway', sans-serif;	
	font-weight: 300;
	max-width: 100px;
	}


#interestValue {
	outline: none;
	border: none;
	border-bottom: 3px teal solid;
	border-radius: 0px;
	padding-bottom: 0px;
	padding-right: 0px;
	font-size: 20px;
	font-family: 'Raleway', sans-serif;	
	font-weight: 300;
	max-width: 50px;
	}
	
	#yearsValue {
	outline: none;
	border: none;
	border-bottom: 3px teal solid;
	border-radius: 0px;
	padding-bottom: 0px;
	font-size: 20px;
	font-family: 'Raleway', sans-serif;	
	font-weight: 300;
	max-width: 50px;
	}
	
	#savingsValue2 {
	outline: none;
	border: none;
	border-radius: 0px;
	padding-bottom: 0px;
	font-size: 20px;
	font-family: 'Raleway', sans-serif;	
	font-weight: 300;
	max-width: 100px;
	}
	
	#interestValue2 {
	outline: none;
	border: none;
	border-bottom: 3px teal solid;
	border-radius: 0px;
	padding-bottom: 0px;
	padding-right: 0px;
	font-size: 20px;
	font-family: 'Raleway', sans-serif;	
	font-weight: 300;
	max-width: 50px;
	}
	
	#yearValue2 {
	outline: none;
	border: none;
	border-radius: 0px;
	padding-bottom: 0px;
	font-size: 20px;
	font-family: 'Raleway', sans-serif;	
	font-weight: 300;
	max-width: 50px;
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
    <p id="appName">Finding Equivalent Savings Plans</p>
  <hr id="title-bottom-line">  
  </div>
  
  <div>
    <p>Investing $
    <input type="number" min="1" , max="5000000" step="1" id="savingsValue" value="10000" onchange="myFunction()" oninput="myFunction()" />
    per year at a
    <input type="number" min="1" , max="12" step=".01" id="interestValue" value="7.5" onchange="myFunction()" oninput="myFunction()" />
    % interest rate for 
    <input type="number" min="1" , max="100" step="1" id="yearsValue" value="10" onchange="myFunction()" oninput="myFunction()" />
    years</p>
  </div>
  
  <div>
  <p style='margin: 35px 10px;'><b>is equivalent to</b></p>
  </div>
  
  <div>
    <p>Investing
    <span>$<span id="savingsOut2">10,000</span></span>
    per year at a
    <input type="number" min="1" , max="12.00" step=".01" id="interestValue2" value="7.5" onchange="myFunction()" oninput="myFunction()" />
    % interest rate for 
    <span><span id="yearsOut">10</span> years</span>
    </p>
  </div>
  
  <div>
    <br>
    <p id="timeOut">Both result in an ending amount of</p>
    <p id="timeOut2">$132,068</p>
  </div>
  
  <script>
  
      var savings = document.getElementById("savingsValue").value;
      var years = document.getElementById("yearsValue").value;
      var interest = document.getElementById("interestValue").value / 100;
      var interestOut = interest * 100;
      var interest2 = document.getElementById("interestValue2").value / 100;
      var net =(savings*((Math.pow(1+interest, years)-1)/interest))*(1+interest);
  
    //massive function to calculate years to F.I.
    function myFunction() {
      savings = document.getElementById("savingsValue").value;
      years = document.getElementById("yearsValue").value;
      interest = document.getElementById("interestValue").value / 100 + .000000000000001;
      interestOut = interest * 100;
      interest2 = document.getElementById("interestValue2").value / 100 + .000000000000001;
      net =(savings*((Math.pow(1+interest, years)-1)/interest))*(1+interest);
      
      var calc =(1*((Math.pow(1+interest2, years)-1)/interest2))*(1+interest2);
      var savings2 = net / calc;
      
      document.getElementById("yearsOut").innerHTML = years.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      document.getElementById("timeOut2").innerHTML = "$ " + net.toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, ",")
      document.getElementById("savingsOut2").innerHTML = savings2.toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    };

</script>
</body>

</html>

<?php get_footer();?>
