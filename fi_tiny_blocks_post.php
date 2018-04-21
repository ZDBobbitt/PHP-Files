<?php
/*
 *Template Name: FI Tiny Blocks
 *Template Post Type: post
 */
 
 get_header(); ?>
<html>
<head>
  <style>
  @import url(https://fonts.googleapis.com/css?family=Advent+Pro:500);
  @import url(https://fonts.googleapis.com/css?family=Work+Sans:500);
  @import url(https://fonts.googleapis.com/css?family=Nunito);
  
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
	
	#redGreenOne {
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
input[type=range]::-webkit-slider-runnable-track {
  width: 60%;
  height: 8.4px;
  cursor: pointer;
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
  background: #dbdbef;
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
  background: #dbdbef;
}
input[type=range]::-moz-range-track {
  width: 100%;
  height: 8.4px;
  cursor: pointer;
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
  background: #dbdbef;
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
  <script src="http://d3js.org/d3.v3.min.js" charset="utf-8"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/3.10.1/lodash.min.js" charset="utf-8"></script>
</head>

<body>
<div>
    <p id="pillars"><b>| | | |</b></p>
  </div>
  <div>
    <p id="visuals">VISUALS</p>
  </div>
  <div>
  <hr>
    <p id="appName">THE TINY BLOCKS OF FINANCIAL INDEPENDENCE</p>
  <hr id="title-bottom-line">  
  </div>
<p>This tiny red block represents $1,000 in yearly spending.</p>
<section id="redOne"></section>
<p>This tiny green block represents $1,000 in savings.</p>
<section id="greenOne"></section>
<p>For every tiny red block, you need 25 tiny green blocks to be financially independent.</p>
<section id="redGreenOne"></section>
<hr>
<div>
<p>If you spend <span id='yearlyExpenses'>$40,000</span> per year...</p>
<input type="range" min="1" max="300" value = "40" id="nRowz" oninput="myFunction()" />
</div>
<p>...You need $<span id='moneyNeeded'>1,000,000</span> to be financially independent.<p>
<p>Here's what that looks like :</p>
<section id='grid'></section>

<script>
//define svg height, width, square dimensions
var square = 15,
  w = 390,
  h = 4500,
  templateHeight = h/225;

//create first red block
var templateRed = d3.select('#redOne')
		.append('svg')
			.attr('width', w)
			.attr('height', templateHeight)
		.append('rect')
			.attr('width', square)
			.attr('height', square)
			.attr('x', w/2)
			.attr('fill', '#FF7373')
			.attr('stroke', 'black');

//create first green block
var templateGreen = d3.select('#greenOne')
		.append('svg')
			.attr('width', w)
			.attr('height', templateHeight)
		.append('rect')
			.attr('width', square)
			.attr('height', square)
			.attr('x', w/2)
			.attr('fill', '#98e590')
			.attr('stroke', 'black');

//create first red and green row example

var squaresRowGreen = _.round(w / square);
var squaresColumnGreen = 1;

//create svg element for redGreenOne HTML section
var base = d3.select('#redGreenOne')
		.append('svg')
			.attr('width', w)
			.attr('height', templateHeight);

// generate green blocks
_.times(squaresColumnGreen, function(n) {			
  var rows = base.selectAll('rect' + ' .row-' + (n + 1))
    .data(d3.range(squaresRowGreen))
    .enter().append('rect')
    .attr({
      width: square,
      height: square,
      x: function(d, i) {
        return i * square;
      },
      y: n * square,
      fill: '#98e590',
      stroke: 'black'
    });
});

//generate one single red block at beginning
var redSingle = base.append('rect')
    .attr({
      width: square,
      height: square,
      fill: '#FF7373',
      stroke: 'black'
    });

var svg = d3.select('#grid').append('svg')
  .attr({
    width: w,
    height: h
  });

// calculate number of rows and columns
var squaresRow = 26;
var squaresColumn = document.getElementById("nRowz").value;

// loop over number of columns
_.times(squaresColumn, function(n) {

  // create each set of rows
  var rows = svg.selectAll('rect' + ' .row-' + (n + 1))
    .data(d3.range(squaresRow))
    .enter().append('rect')
    .attr({
      width: square,
      height: square,
      x: function(d, i) {
        return i * square;
      },
      y: n * square,
      fill: '#98e590',
      stroke: 'black'
    });
});

//red squares
var squaresRowRed = 1;
var squaresColumnRed = document.getElementById("nRowz").value;
_.times(squaresColumnRed, function(n) {

  // create each set of rows
  var rows = svg.selectAll('rect' + ' .row-' + (n + 1))
    .data(d3.range(squaresRowRed))
    .enter().append('rect')
    .attr({
      width: square,
      height: square,
      x: function(d, i) {
        return i * square;
      },
      y: n * square,
      fill: '#FF7373',
      stroke: 'black'
    });

});	

//function to create massive grid based on user input
function myFunction() {
var spending = document.getElementById('nRowz').value;
document.getElementById('yearlyExpenses').innerHTML = "$" + spending + ",000";

var h = (spending * 15) + 150;

var fiMoney = spending * 25000;
document.getElementById('moneyNeeded').innerHTML = fiMoney.toLocaleString();

//remove current grid
d3.select("#grid").select("svg").remove();

// create the svg
var svg = d3.select('#grid').append('svg')
  .attr({
    width: w,
    height: h
  });

// calculate number of rows and columns
var squaresRow = 26;
var squaresColumn = document.getElementById("nRowz").value;

// loop over number of columns
_.times(squaresColumn, function(n) {

  // create each set of rows
  var rows = svg.selectAll('rect' + ' .row-' + (n + 1))
    .data(d3.range(squaresRow))
    .enter().append('rect')
    .attr({
      width: square,
      height: square,
      x: function(d, i) {
        return i * square;
      },
      y: n * square,
      fill: '#98e590',
      stroke: 'black'
    });
});

//red squares
var squaresRowRed = 1;
var squaresColumnRed = document.getElementById("nRowz").value;
_.times(squaresColumnRed, function(n) {

  // create each set of rows
  var rows = svg.selectAll('rect' + ' .row-' + (n + 1))
    .data(d3.range(squaresRowRed))
    .enter().append('rect')
    .attr({
      width: square,
      height: square,
      x: function(d, i) {
        return i * square;
      },
      y: n * square,
      fill: '#FF7373',
      stroke: 'black'
    });

});

}; //end of massive myFunction()
</script>
<body>
</html>

<?php get_footer();?>