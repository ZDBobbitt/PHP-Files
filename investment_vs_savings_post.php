<?php
/*
 *Template Name: Comparing Savings vs. Investment Returns
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
    <p id="appName">Comparing Savings vs. Investment Returns</p>
  <hr id="title-bottom-line">  
  </div>
  
  <div>
    <p>If you save this much per year :</p>
    <input type="range" min="0" , max="200000" step="1000" id="savingsValue" value="10000" onchange="myFunction()" oninput="myFunction()" />
  </div>
  <span>$<span id="savingsOut">10,000</span></span>

  <div>
    <p>For this many years :</p>
    <input type="range" min="1" , max="70" step="1" id="yearsValue" value="10" onchange="myFunction()" oninput="myFunction()" />
  </div>
  <span><span id="yearsOut">10</span> years</span>
  
  <div>
    <p>And invest your savings at this annual rate of return :</p>
    <input type="range" min="1" step="0.5" max="12" id="interestValue" value="5" oninput="myFunction()" />
  </div>
  <span><span id="interestOut">5</span>%</span>
  
  <div>
    <br>
    <p id="timeOut">You will have</p>
    <p id="timeOut2">$132,068</p>
	<p id="timeOut3">Here's what that $132,068 will be made of :</p>
  </div>
  
  <div id='donutChart'></div>
  
<pre id='data'>
age,population
<5,2704659
5-13,4499890
14-17,2159981
18-24,3853788
25-44,14106543
45-64,8819342
≥65,612463</pre>
  
  <script src="https://d3js.org/d3.v3.min.js"></script>
  <script>
  
      var savings = document.getElementById("savingsValue").value;
      var years = document.getElementById("yearsValue").value;
      var interest = document.getElementById("interestValue").value / 100;
	  var interestOut = interest * 100;
      var net =(savings*((Math.pow(1+interest, years)-1)/interest))*(1+interest);
	  var savingsPercent = ((savings * years) / net) * 100;
	  var interestPercent = 100 - savingsPercent
	  var newData = [savingsPercent, interestPercent];
  
    //massive function to calculate years to F.I.
    function myFunction() {
      savings = document.getElementById("savingsValue").value;
      years = document.getElementById("yearsValue").value;
      interest = document.getElementById("interestValue").value / 100;
	  interestOut = interest * 100;
      net =(savings*((Math.pow(1+interest, years)-1)/interest))*(1+interest);
	  savingsPercent = ((savings * years) / net) * 100;
	  interestPercent = 100 - savingsPercent
      document.getElementById("savingsOut").innerHTML = savings.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	  document.getElementById("yearsOut").innerHTML = years.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      document.getElementById("interestOut").innerHTML = interestOut.toLocaleString();
      document.getElementById("timeOut").innerHTML = "You will have";
      document.getElementById("timeOut2").innerHTML = "$ " + net.toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, ",")
	  document.getElementById("timeOut3").innerHTML = "Here's what that $" + net.toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, ",") + " will be made of :";
      
	  newData = [interestPercent, savingsPercent];
	  
	  d3.select("svg").remove();
	  
	  var svg = d3.select("#donutChart").append("svg")
    .attr("width", width)
    .attr("height", height)
  .append("g")
    .attr("transform", "translate(" + width / 2 + "," + height / 2.5 + ")");
	  
      var g = svg.selectAll(".arc")
      .data(pie(newData))
    .enter().append("g")
      .attr("class", "arc");
	  
	  g.append("path")
	  .attr("d", arc)
	  .style("fill", function(d, i) { return color(i); });
	  
	  var savingsText =  g.append("text")
				.attr("font-family", "Nunito")
				.attr("dx", "-13.5em")
				.attr("dy", "-3em")
				.attr("font-size", "26px")
				.attr("fill", "#e54c4e")
				.text("Savings (" + savingsPercent.toFixed(0) + "%)");
   
      var interestText =  g.append("text")
				.attr("font-family", "Nunito")
				.attr("dx", "6.5em")
				.attr("dy", "-3em")
				.attr("font-size", "26px")
				.attr("fill", "#365b87")
				.text("Interest (" + interestPercent.toFixed(0) + "%)");

    };
	
//TRYING TO ADD DONUT CHART (IF YOU DELETE ALL CODE BELOW THIS, THE CALC WILL WORK)
	
var width = 800,
    height = 500,
    radius = Math.min(width, height) / 3;

var color = d3.scale.ordinal()
    .range(["#4e729c", "#ff6c6e"]);

var arc = d3.svg.arc()
    .outerRadius(radius - 10)
    .innerRadius(radius - 80);

var pie = d3.layout.pie()
    .sort(null)
    .value(function(d) { return d; });

var svg = d3.select("#donutChart").append("svg")
    .attr("width", width)
    .attr("height", height)
  .append("g")
    .attr("transform", "translate(" + width / 2 + "," + height / 2.5 + ")");

//d3.select("#grid").select("svg").remove();

var data = [24, 76];

  var g = svg.selectAll(".arc")
      .data(pie(data))
    .enter().append("g")
      .attr("class", "arc");

    var path = g.append("path")
      .attr("d", arc)
      .style("fill", function(d, i) { return color(i); });
	  
 var savingsText =  g.append("text")
				.attr("font-family", "Nunito")
				.attr("dx", "-13.5em")
				.attr("dy", "-3em")
				.attr("font-size", "26px")
				.attr("fill", "#e54c4e")
				.text("Savings (" + savingsPercent.toFixed(0) + "%)");
   
  var interestText =  g.append("text")
				.attr("font-family", "Nunito")
				.attr("dx", "6.5em")
				.attr("dy", "-3em")
				.attr("font-size", "26px")
				.attr("fill", "#365b87")
				.text("Interest (" + interestPercent.toFixed(0) + "%)");
   
  </script>
</body>

</html>

<?php get_footer();?>
