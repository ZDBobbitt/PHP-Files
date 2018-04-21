<?php
/*
 *Template Name: SP500 Future Returns
 *Template Post Type: post
 */
 
 get_header(); ?>
<html>
<head>
<title>Future S&P 500 Returns</title>
<script src="https://d3js.org/d3.v4.min.js"></script>

<style>

.graph3Label {
			font-family: sans-serif;
			font-size: 11px;
			color: gray;
			}
			
div.tooltip {	
			position: absolute;	 		
			text-align: center;							
			padding: 6px;				
			font: 12px sans-serif;		
			background: white;	
			border: 0px;		
			border-radius: 8px;			
			pointer-events: none;
			line-height: 1.5;	
}

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
    
    #startingPoint, #endingPoint, #totalAmount {
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
      color: black;
    }
    
    #visuals {
      font-size: 14px;
      margin-top: -5px;
      margin-bottom: 20px;
      color: black;
    }
    
    #appName {
      color: #075656;
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
    <p id="appName">VISUALIZING FUTURE S&P 500 RETURNS</p>
  <hr id="title-bottom-line">  
  </div>
  <div>
  <p style='width: 60%; margin: 25px auto; text-align: left; color: black; font-size: 18px;'>At the start of 2018, the S&P 500 stock market index was at $2,700. The chart below shows the potential price of the S&P 500 over the next 20 years. Move the circles up and down in each year to see how different paths impact overall returns.</p>
  </div>
<svg width="800" height="600"></svg>
  
  <div style='clear: both; width: 80%; margin: 10px auto; text-align: left; color: black; margin-left: 15%'>
  <span style='font-size: 18px'>Based on this path with a starting price of <b><span id='startingPoint'>$2,700</span></b> and an ending price of <b><span id='endingPoint'>$2,700</span></b>, if you invest the same amount of money each year, your total investments will earn <b><span id = 'totalAmount'>0</span>%</b> compounded annual returns.</span>
  <p style='width: 60%; text-align: left; color: black; font-size: 14px; margin-top: 10%; margin-bottom: -10%'><i>NOTE: This chart does not account for dividends.</i></p>
  </div>

<script>

var svg = d3.select("svg"),
    margin = {top: 20, right: 20, bottom: 30, left: 50},
    width = +svg.attr("width") - margin.left - margin.right,
    height = +svg.attr("height") - margin.top - margin.bottom;
    

//let points = d3.range(1, 10).map(function(i) {
//   return [i * width / 10, 50 + Math.random() * (height - 100)];
//});

var div = d3.select("body").append("div")	
    .attr("class", "tooltip")				
    .style("opacity", 0);

let points = [[2018,2700], [2020, 2700], [2022, 2700], [2024, 2700], [2026, 2700], [2028, 2700], [2030, 2700], [2032, 2700], [2034, 2700], [2036, 2700], [2038,2700]];

var x = d3.scaleLinear()
    .rangeRound([0, width]);

var y = d3.scaleLinear()
    .rangeRound([height, 0]);

var xAxis = d3.axisBottom(x),
    yAxis = d3.axisLeft(y);
	xAxis.tickValues(d3.range(2018, 2040, 2)).tickFormat(d3.format("d"));
	yAxis.tickFormat(d3.format("$,.0f"));

var line = d3.line()
    .x(function(d) { return x(d[0]); })
    .y(function(d) { return y(d[1]); });
    
let drag = d3.drag()
        .on('start', dragstarted)
        .on('drag', dragged)
        .on('end', dragended);
        
svg.append('rect')
    .attr('class', 'zoom')
    .attr('cursor', 'move')
    .attr('fill', 'none')
    .attr('pointer-events', 'all')
    .attr('width', width)
    .attr('height', height)
    .attr('transform', 'translate(' + margin.left + ',' + margin.top + ')')

 var focus = svg.append("g")
                .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

//x.domain(d3.extent(points, function(d) { return d[0]; }));
//y.domain(d3.extent(points, function(d) { return d[1]; }));
x.domain([2018, 2038]);
y.domain([0,15000]);

focus.append("path")
    .datum(points)
    .attr("fill", "none")
    .attr("stroke", "teal")
    .attr("stroke-linejoin", "round")
    .attr("stroke-linecap", "round")
    .attr("stroke-width", 2)
    .attr("d", line);

var circ = focus.selectAll('circle')
    .data(points)
    .enter()
    .append('circle')
    .attr('r', 7.0)
    .attr('cx', function(d) { return x(d[0]);  })
    .attr('cy', function(d) { return y(d[1]); })
    .style('cursor', 'pointer')
    .style('fill', '#dfdfdf')
	.style('stroke', 'teal')
	.style('stroke-width', 2);
	
circ.on("mouseover", function(d) {		
	div.transition()		
		.duration(200)		
		.style("opacity", .9)
	div	.html("$" + Math.round(d[1]).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","))	
		.style("left", (d3.event.pageX) + "px")		
		.style("top", (d3.event.pageY - 28) + "px");	
	})					
    .on("mouseout", function(d) {		
	div.transition()		
		.duration(500)		
		.style("opacity", 0);	
});

focus.selectAll('circle')
        .call(drag);

focus.append('g')
    .attr('class', 'axis axis--x')
    .attr('transform', 'translate(0,' + height + ')')
    .call(xAxis);
    
focus.append('g')
    .attr('class', 'axis axis--y')
    .call(yAxis);
	
svg.append("text")
	.attr("class", "graph3Label")
	.attr("transform", "translate("+ (755) + "," + (567)+")")
	.text("Year");
	
svg.append("text")
	.attr("class", "graph3Label")
	.attr("transform", "translate("+ (62) +","+(48)+")rotate(-90)")
	.text("Price");

focus.append("line").attr("x1", x(2018)).attr("x2", x(2038)).attr("y1", y(2000)).attr("y2", y(2000)).style("stroke", "#a7a7a7").style("stroke-width", .5);
focus.append("line").attr("x1", x(2018)).attr("x2", x(2038)).attr("y1", y(4000)).attr("y2", y(4000)).style("stroke", "#a7a7a7").style("stroke-width", .5);
focus.append("line").attr("x1", x(2018)).attr("x2", x(2038)).attr("y1", y(6000)).attr("y2", y(6000)).style("stroke", "#a7a7a7").style("stroke-width", .5);
focus.append("line").attr("x1", x(2018)).attr("x2", x(2038)).attr("y1", y(8000)).attr("y2", y(8000)).style("stroke", "#a7a7a7").style("stroke-width", .5);
focus.append("line").attr("x1", x(2018)).attr("x2", x(2038)).attr("y1", y(10000)).attr("y2", y(10000)).style("stroke", "#a7a7a7").style("stroke-width", .5);
focus.append("line").attr("x1", x(2018)).attr("x2", x(2038)).attr("y1", y(12000)).attr("y2", y(12000)).style("stroke", "#a7a7a7").style("stroke-width", .5);
focus.append("line").attr("x1", x(2018)).attr("x2", x(2038)).attr("y1", y(14000)).attr("y2", y(14000)).style("stroke", "#a7a7a7").style("stroke-width", .5);

focus.append("line").attr("x1", x(2020)).attr("x2", x(2020)).attr("y1", y(0)).attr("y2", y(14000)).style("stroke", "#a7a7a7").style("stroke-width", .5);
focus.append("line").attr("x1", x(2022)).attr("x2", x(2022)).attr("y1", y(0)).attr("y2", y(14000)).style("stroke", "#a7a7a7").style("stroke-width", .5);
focus.append("line").attr("x1", x(2024)).attr("x2", x(2024)).attr("y1", y(0)).attr("y2", y(14000)).style("stroke", "#a7a7a7").style("stroke-width", .5);
focus.append("line").attr("x1", x(2026)).attr("x2", x(2026)).attr("y1", y(0)).attr("y2", y(14000)).style("stroke", "#a7a7a7").style("stroke-width", .5);
focus.append("line").attr("x1", x(2028)).attr("x2", x(2028)).attr("y1", y(0)).attr("y2", y(14000)).style("stroke", "#a7a7a7").style("stroke-width", .5);
focus.append("line").attr("x1", x(2030)).attr("x2", x(2030)).attr("y1", y(0)).attr("y2", y(14000)).style("stroke", "#a7a7a7").style("stroke-width", .5);
focus.append("line").attr("x1", x(2032)).attr("x2", x(2032)).attr("y1", y(0)).attr("y2", y(14000)).style("stroke", "#a7a7a7").style("stroke-width", .5);
focus.append("line").attr("x1", x(2034)).attr("x2", x(2034)).attr("y1", y(0)).attr("y2", y(14000)).style("stroke", "#a7a7a7").style("stroke-width", .5);
focus.append("line").attr("x1", x(2036)).attr("x2", x(2036)).attr("y1", y(0)).attr("y2", y(14000)).style("stroke", "#a7a7a7").style("stroke-width", .5);
focus.append("line").attr("x1", x(2038)).attr("x2", x(2038)).attr("y1", y(0)).attr("y2", y(14000)).style("stroke", "#a7a7a7").style("stroke-width", .5);

function dragstarted(d) {
    d3.select(this).raise().classed('active', true);
}

function dragged(d) {
    d[0] = x.invert(d3.event.x);
    d[1] = y.invert(d3.event.y);
    d3.select(this)
        .attr('cx', x(d[0]))
        .attr('cy', y(d[1]))
    focus.select('path').attr('d', line);
	
//find starting points
var return17Start = points[0][1];
var return19Start = points[1][1];
var return18Start = (return17Start + return19Start) / 2;

var return21Start = points[2][1];
var return23Start = points[3][1];
var return20Start = (return19Start + return21Start) / 2;
var return22Start = (return21Start + return23Start) / 2;

var return25Start = points[4][1];
var return27Start = points[5][1];
var return24Start = (return23Start + return25Start) / 2;
var return26Start = (return25Start + return27Start) / 2;

var return29Start = points[6][1];
var return31Start = points[7][1];
var return28Start = (return27Start + return29Start) / 2;
var return30Start = (return29Start + return31Start) / 2;

var return33Start = points[8][1];
var return35Start = points[9][1];
var return32Start = (return31Start + return33Start) / 2;
var return34Start = (return33Start + return35Start) / 2;

var return37 = points[10][1];
var return36Start = (return35Start + return37) / 2;

//calculate returns
var return17 = 1 + ((return37 - return17Start) / return17Start);
var return18 = 1 + ((return37 - return18Start) / return18Start);
var return19 = 1 + ((return37 - return19Start) / return19Start);
var return20 = 1 + ((return37 - return20Start) / return20Start);
var return21 = 1 + ((return37 - return21Start) / return21Start);
var return22 = 1 + ((return37 - return22Start) / return22Start);
var return23 = 1 + ((return37 - return23Start) / return23Start);
var return24 = 1 + ((return37 - return24Start) / return24Start);
var return25 = 1 + ((return37 - return25Start) / return25Start);
var return26 = 1 + ((return37 - return26Start) / return26Start);
var return27 = 1 + ((return37 - return27Start) / return27Start);
var return28 = 1 + ((return37 - return28Start) / return28Start);
var return29 = 1 + ((return37 - return29Start) / return29Start);
var return30 = 1 + ((return37 - return30Start) / return30Start);
var return31 = 1 + ((return37 - return31Start) / return31Start);
var return32 = 1 + ((return37 - return32Start) / return32Start);
var return33 = 1 + ((return37 - return33Start) / return33Start);
var return34 = 1 + ((return37 - return34Start) / return34Start);
var return35 = 1 + ((return37 - return35Start) / return35Start);
var return36 = 1 + ((return37 - return36Start) / return36Start);
var totalCalc = (return17+return18+return19+return20+return21+return22+return23+return24+return25+return26+return27+return28+return29+return30+return31+return32+return33+return34+return35+return36);
var total = (Math.pow((totalCalc/20), .05) - 1) * 100;
console.log(totalCalc);
//display output on screen
document.getElementById("startingPoint").innerHTML = "$" + Math.round(return17Start).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
document.getElementById("endingPoint").innerHTML = "$" + Math.round(return37).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
document.getElementById("totalAmount").innerHTML = total.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

function dragended(d) {
    d3.select(this).classed('active', false);
}



</script>
</body>
</html>