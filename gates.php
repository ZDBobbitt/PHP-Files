<?php
/*
 *Template Name: gates
 *Template Post Type: post
 */
 
 get_header(); ?>
<html>
  <head>

    <style type="text/css">
      circle {
        stroke: white;
        stroke-width: 1px;
        opacity: .8;
      }
      .btn-group {
        margin-left: 26%;
		color: black;
      }
	  p {
		  color: black;
		  text-align: center;	
		  padding-bottom: 20px;
	  }
      .label {
        fill: black;
        font-size: 16px;
      }
	  pre {
		display: none;
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
			color: black;
	  }
	label {
	  margin-left: 10px;
	  padding: 10px 15px 10px 10px;
	  border-radius: 3px;
	  border: 1px solid black;
	  cursor: pointer;
	  background-color: #a8f482;
	}
	input {
		visibility:hidden;
    }
	label:hover {
		background-color: #eaeaea;
	}

    </style>
    <script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-45101494-1']);
    _gaq.push(['_setDomainName', 'delimited.io']);
    _gaq.push(['_trackPageview']);
    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
    </script>
  </head>
  <body>
  
<pre id='data'>
grant_title,total_amount,start_year
Chipotle,4.50,January
Speedway,22.77,January
Groceries,15.60,January
Bowling,12,January
Chipotle,7.50,February
Speedway,19.49,February
Go Mart,2.49,February
Nutritional Services,4.61,February
Jackie's Pub,3,February
Goodfellas,5,February
Sunrise Coffee,2.25,February
Chipotle,7.50,February
Speedway,18.90,February
Godaddy Domain Services,18.34,February
Chipotle,7.50,February
Best Buy,32.16,February
Chipotle,7.50,February
Chipotle,6.50,February
Speedway,22,February
Eye Mart,85,February
Thai 9 Restuarant,12.12,February
BP Gas,17.09,February
Rapid Fire Pizza,20.49,March
Rave Cinemas,18.50,March
Marathon Gas,25.27,March
El Rancho Grande,29.57,March
Chipotle,7.50,March
Chipotle,9.65,March
Speedway,21.90,March
Chipotle,7.50,March
Jimmy Johns,7.20,March
Buffalo Wild Wings,28.88,March
Chipotle,8.01,March
Doc visit,30,March
Kroger,2.84,March
Speedway,23.79,March
BD Mongolian Grill,36.58,March
Oil change,44.58,March
Chipotle,14,March
Thai 9,11.12,March
Speedway,25.21,April
Chipotle,7.50,April
Wendy's,6.99,April
Chipotle,16.15,April
Speedway,26.25,April
Chipotle,7.5,April
TING Phone Bill,25.84,April
Speedway,25.13,April
Cap & Gown,96.08,April
Chipotle,7.50,April
Kroger,16.60,April
Kohl's,38.57,May
Rover setup,10,May
Coffee,2.50,May
Speedway,23.68,May
Coffee,2.50,May
Speedway,25.39,May
Coffee,2.25,May
United Dairy Farmers, 25,May
United Dairy Farmers,25,May
Chipotle,7.50,May
The Pet Bowl,3.15,May
Burger King,4.30,May
Chipotle,3.50,May
TING Phone Bill,25.84,May
Chipotle,7.50,May
Chipotle,4,May
Speedway,24.45,May
Chipotle,7.50,June
Oil change,47.58,June
Coffee,2.50,June
Coffee,2.50,June
Canoe rental,25.80,June
Marathon gas,25.03,June
Chipotle,8.04,June
McDonald's,1.89,June
Coffee,2.25,June
Marathon gas,23.49,June
Chipotle,7.50,June
Coffee,2.10,June
TING Phone bill,25.84,June
Chipotle,7.5,June
Chipotle,6.97,June
Coffee,2.25,June
Speedway,22.44,June
Chipotle,7.50,July
Bed Bath & Beyond,29.99,July
Chipotle,6.94,July
The Beach Waterpark,24.49,July
The Beach lockers,12,July
Coffee,2.25,July
Coffee,2.25,July
Dublin Pub,14.51,July
Chipotle,6.5,July
Speedway,21.91,July
Jade's Restaurant,11.62,July
TING Phone bill,18.82,July
Marathon gas,23.17,July
GoDaddy domain services,20.17,July
Icecream,7.56,July
Chipotle,9.95,July
Marathon gas,23.97,July
Coffee,2.25,July
Christine's restaurant,7.41,July
Starbucks,6.75,August
Kroger,6.26,August
El Jinete restaurant,11.36,August
Dairy Queen,2.99,August
Buffalo Wings & Rings,12.66,August
Salvation Army,3.98,August
Sears,46.4,August
Shoe Department,69.98,August
United Dairy Farmer's,50,August
Doc visit,30,August
Kroger,2.03,August
Chick-fil-a,6.62,August
Thornton's gas,22.18,August
Chipotle,6.5,August
Old Navy,53.04,August
The Wandering Grill & Bar,47.5,August
Marathon gas,22.76,August
Coffee,2.25,August
TING Phone bill,25.82,August
Madtree Brewery,5,August
Madtree Brewery,5,August
Pro-rated Rent,218.92,August
U-Haul company,114.85,August
Shell gas,1.59,August
Ron's Roost Chicken,12.69,August
Kroger,7.26,August
Kroger,19.16,August
Rec Center Annual Pass,170,August
Kroger,17.65,August
Pilot gas,3.49,August
Burger King,7.42,August
Chipotle,6.96,August
Panera Bread,1.99,August
Marathon gas,21.87,August
Utilities,80,September
Aldi,32.62,September
Marathon gas,23.34,September
Skyline Chili,10.77,September
Kroger,34.28,September
GoDaddy Domain Services,27.34,September
Subway,5.69,September
Kroger,17.81,September
Kroger,15.20,September
TING Phone bill,18.33,September
Uber,10,September
United Dairy Farmer's,20.67,September
Gamestop,38.5,September
Starbucks,2.45,September
XBOX Live,59.99,September
Starbucks,2.09,September
Buffalo Wild Wings,8.48,September
Chipotle,6.50,September
MOD Pizza,16.63,September
Groceries,48.96,September
Smashburger,8.55,September
Kroger,5.14,September
Kroger,11.82,September
United Dairy Farmer's,23.69,September
Chipotle,8.03,September
Aldi,31.28,September
Uber,12.53,September
Subway,6.09,September
Marathon gas,23.29,September
Subway,5.99,September
Aldi,24.81,September
Rent,611,September
Thornton's gas,22.99,October
Chipotle,7.50,October
Teranga Restaurant,13.77,October
Starbucks,2.25,October
Chipotle,7.50,October
Subway,5.69,October
Starbucks,2.45,October
Subway,5.69,October
Chipotle,6.50,October
Coffee,2.25,October
Chipotle,6.96,October
Jade's restaurant,11.15,October
Chipotle,15,October
Chipotle,6.50,October
Kroger,2.14,October
Best Buy,85.39,October
Marathon gas,24.45,October
Marathon gas,25.32,October
Marathon gas,25.37,October
Kroger,16.42,October
Aldi,11.41,October
Kroger,12.54,October
Kroger,35.65,October
Kroger,11.63,October
Kroger,44.19,October
Kroger,29.99,October
Kroger,14.95,October
Internet,25,October
Wal Mart,32.05,October
GoDaddy Domain Services,12.17,October
TING Phone bill,25.74,October
Rent,611,October
Utilities,43,October
New car tires,538.44,November
Oil change,49.94,November
Chipotle,7.85,November
Chipotle,7.85,November
Chipotle,6.85,November
Chipotle,1.5,November
Coffee,2.25,November
Coffee,2.25,November
Starbucks,2.25,November
Starbucks,2.25,November
Starbucks,2.25,November
Bowling,10,November
Shell gas,26.12,November
Shell gas,25.45,November
Marathon gas,24.76,November
Marthon gas,25.12,November
Kroger,48.40,November
Kroger,6.04,November
Kroger,49.53,November
Aldi,5.89,November
Kroger,11.17,November
Aldi,12.90,November
Kroger,20.80,November
Internet,25,November
TING Phone bill,32.74,November
Utilities,42,November
Rent,611,November
Chipotle,1.85,December
Chipotle,7.85,December
Coffee,2.25,December
Coffee,3.21,December
Coffee,2.25,December
Coffee,2.20,December
Coffee,1.50,December
Coffee,2.25,December
Coffee,2.25,December
Coffee,2.25,December
Coffee,2.25,December
Thai Restaurant,7.99,December
Subway,5.69,December
Skyline Chili,8.94,December
Subway,5.99,December
Thai Restaurant,7.99,December
Sushi Restaurant,12.9,December
FINCON ticket,249,December
Gas,24.17,December
Gas,25.13,December
Gas,27.04,December
Gas,26.1,December
Gas,25.45,December
Gas,30,December
Kroger,27.77,December
Gift,25,December
Gift,25,December
Kroger,7.19,December
Kroger,21.47,December
Kroger,47.11,December
Kroger,5.48,December
TING Phone bill,23.01,December
Internet,25,December
Utilities,42,December
Rent,611,December</pre>

<div>
<b><p>Here is a visualization of every dollar I spent in 2017.<br> Each circle represents a transaction.</p></b>
</div>
    <div class="btn-group" data-toggle="buttons">
      <label class="btn btn-default active" id="all" style='cursor: pointer'>
        <input type="radio" name="options"> Total Spending
      </label>
      <label class="btn btn-default" id="start_year" style='cursor: pointer'>
        <input type="radio" name="options"> Spending by Month
      </label>
    </div>
    <div id="chart"></div>
    <script src="http://projects.delimited.io/experiments/force-bubbles/lib/d3.js"></script>
    <script src="http://projects.delimited.io/experiments/force-bubbles/lib/jquery.js"></script>
    <script src="http://projects.delimited.io/experiments/force-bubbles/lib/bootstrap.js"></script>
    <script src="http://projects.delimited.io/experiments/force-bubbles/lib/underscore.js"></script>
    <script>
	
		var data = d3.csv.parse(d3.select("pre#data").text() );
		var div = d3.select("body").append("div")	
			.attr("class", "tooltip")				
			.style("opacity", 0);
			
        var width = 1000, height = 650;
        var fill = d3.scale.ordinal()
          .domain(["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"])
          .range(["#b28d54", "#e54848", "#dce548", "#65e548", "#48e5a2", "#48d9e5", "#487ae5", "#9548e5", "#e548d6", "#3c959c", "#95f956", "#e58848"]);

        var svg = d3.select("#chart").append("svg")
            .attr("width", width)
            .attr("height", height);

        var max_amount = d3.max(data, function (d) { return parseInt(d.total_amount)});
        var radius_scale = d3.scale.pow().exponent(0.5).domain([0, max_amount]).range([2, 85]);

        _.each(data, function (elem) {
          elem.radius = radius_scale(elem.total_amount)*.55;
          elem.all = 'all';
          elem.x = _.random(0, width);
          elem.y = _.random(0, height);
        })

        var padding = 4;
        var maxRadius = d3.max(_.pluck(data, 'radius'));

        var year_centers = {
          "January": {name:"January", x: 30, y: 150},
          "July": {name:"July", x: 70, y: 450},
          "February": {name:"February", x: 140, y: 150},
		  "August": {name:"August", x: 155, y: 450},
          "March": {name:"March", x: 260, y: 150},
          "September": {name:"September", x: 260, y: 450},
		  "April": {name:"April", x: 380, y: 150},
          "October": {name:"October", x: 380, y: 450},
          "May": {name:"May", x: 540, y: 150},
		  "November": {name:"November", x: 540, y: 450},
          "June": {name:"June", x: 740, y: 150},
          "December": {name:"December", x: 740, y: 450}
        }

        var all_center = { "all": {name:"", x: 400, y: 300}};

        var nodes = svg.selectAll("circle")
          .data(data);

        nodes.enter().append("circle")
          .attr("class", "node")
          .attr("cx", function (d) { return d.x; })
          .attr("cy", function (d) { return d.y; })
          .attr("r", 1)
          .style("fill", function (d) { return fill(d.start_year); })
          .on("mouseover", function(d) {		
				div.transition()		
					.duration(200)		
					.style("opacity", .9)
				div	.html("Expense: " + d.grant_title + "<br/>Amount: $" + d.total_amount + "<br/>Month: " + d.start_year)	
					.style("left", (d3.event.pageX) + "px")		
					.style("top", (d3.event.pageY - 28) + "px");	
				})					
		  .on("mouseout", function(d) {		
				div.transition()		
					.duration(500)		
					.style("opacity", 0);	
			});

        nodes.transition().delay(300).duration(3000)
          .attr("r", function (d) { return d.radius; })

        var force = d3.layout.force();

        draw('all');

        $( ".btn" ).click(function() {
          draw(this.id);
        });

        function draw (varname) {
          var foci = varname === "all" ? all_center: year_centers;
          force.on("tick", tick(foci, varname));
          labels(foci)
          force.start();
        }

        function tick (foci, varname) {
          return function (e) {
            for (var i = 0; i < data.length; i++) {
              var o = data[i];
              var f = foci[o[varname]];
              o.y += (f.y - o.y) * e.alpha;
              o.x += (f.x - o.x) * e.alpha;
            }
            nodes
              .each(collide(.1))
              .attr("cx", function (d) { return d.x; })
              .attr("cy", function (d) { return d.y; });
          }
        }

        function labels (foci) {
          svg.selectAll(".label").remove();

          svg.selectAll(".label")
          .data(_.toArray(foci)).enter().append("text")
          .attr("class", "label")
          .text(function (d) { return d.name })
          .attr("transform", function (d) {
            return "translate(" + (d.x - ((d.name.length)*3)) + ", " + (d.y - 110) + ")";
          });
        }

        function removePopovers () {
          $('.popover').each(function() {
            $(this).remove();
          }); 
        }

        function showPopover (d) {
          $(this).popover({
            placement: 'auto top',
            container: 'body',
            trigger: 'manual',
            html : true,
            content: function() { 
              return "Title: " + d.grant_title + "<br/>Amount: $" + d3.format(",")(+d.total_amount) + 
                     "<br/>Year: " + d.start_year; }
          });
          $(this).popover('show')
        }

        function collide(alpha) {
          var quadtree = d3.geom.quadtree(data);
          return function(d) {
            var r = d.radius + maxRadius + padding,
                nx1 = d.x - r,
                nx2 = d.x + r,
                ny1 = d.y - r,
                ny2 = d.y + r;
            quadtree.visit(function(quad, x1, y1, x2, y2) {
              if (quad.point && (quad.point !== d)) {
                var x = d.x - quad.point.x,
                    y = d.y - quad.point.y,
                    l = Math.sqrt(x * x + y * y),
                    r = d.radius + quad.point.radius + padding;
                if (l < r) {
                  l = (l - r) / l * alpha;
                  d.x -= x *= l;
                  d.y -= y *= l;
                  quad.point.x += x;
                  quad.point.y += y;
                }
              }
              return x1 > nx2 || x2 < nx1 || y1 > ny2 || y2 < ny1;
            });
          };
        }

    </script>
  </body>
</html>