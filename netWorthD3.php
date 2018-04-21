<?php
/*
 *Template Name: NetWorthD3
 *Template Post Type: post
 */
 
 get_header(); ?>
 <html>
<head>
<script src="http://d3js.org/d3.v4.min.js"></script>
<script src="https://d3js.org/d3-scale-chromatic.v1.min.js"></script>
<style>
@import url('https://fonts.googleapis.com/css?family=Droid+Serif|Raleway');

a {
	text-decoration: none;
	color: purple;
}

body {
	color: black;
}

h1 {
text-align: center;
font-size: 56px;
margin-bottom: 0px;
margin-top: 50px;
font-family: 'Droid Serif', serif;
}

h2,h3, h4, h5, h6 {
text-align: center;
margin-bottom: 15px;
margin-top: 15px;
font-family: 'Raleway', sans-serif;
}

#subTitle {
text-align: center;
margin-bottom: 60px;
}

label {
  display: block;
  font-family: 'Raleway', sans-serif;
  margin-bottom: 5px;
}

select {
  padding: 3px;
  font-family: 'Raleway', sans-serif;
  border-radius: 5px;
  text-align: center;
  cursor: pointer;
}

select:focus {
outline: none;
}

#intro {
  text-align: center;
  width: 80%;
  margin: 0 auto;
}

div.tooltip {	
    position: absolute;					
    padding: 6px;				
    font: 12px sans-serif;		
    background: #f9f9f9;	
    border: 0px;		
    border-radius: 8px;			
    pointer-events: none;
    line-height: 1.5;	
    font-weight: 600;
	width: 200px;
}

#dropdown {
	width: 15%;
}

svg {
	display: block;
	margin: auto;
}

rect:hover {
opacity: 0.7;
}

.rect3:hover {
opacity: 0.9;
}

p {
	text-align: left
	color: black;
}

.words {
    width: 100%;
}

.LabLabel {
    font-family: sans-serif;
	font-size: 11px;
	fill: #777;
}

.intro_p p {
	text-align: center;
}

</style>
</head>

<body>

<div id='intro'><!--start of intro-->
				    <h1><span style="color: #347633">Money</span>, <span style="color: #7dcc7c">Money</span>, <span style="color: #8fec8d">Money</span></h1>
				    <h3 id='subTitle'>Visualizing the Net Worth of Rockstar Finance Blogs</h3>
				  
				    <div class='words'>
				    <p style='text-align: left'><a href='http://rockstarfinance.com/' target='_blank'>Rockstar Finance</a> currently tracks the net worth of 423 bloggers. Here's a visual of each blogger's net worth, broken down by age. Hover over the bars in the chart below to see the blog name and the exact net worth.</p> 
				    <p style='text-align: left'>As noted in the <a href='http://directory.rockstarfinance.com/blogger-net-worth-tracker' target='_blank'>Net Worth Tracker</a>, some of these net worth numbers are based on <i>family</i> net worth while others are only individual net worth. Some bloggers
					are also more anonymous than others, so they may leave some things out of their net worth calculation.</p>
					<p style='text-align: left'><i>Note</i>: These numbers are current as of October 13th, 2017. Any blogger who had an <i>unspecified</i> age bracket bracket was left out of this visual.</p>
					<p>&nbsp;</p>
				    </div>	  
		  
				    <label for="dropdown">Age Group</label>
		              <select name="dropdown" id="dropdown">
						<option value="data1">20's</option>
						<option value="data2">30's</option>
	                    <option value="data3">40's</option>
						<option value="data4">50 +</option>
		              </select>
		              	        		
</div><!--end of intro-->				
			
<svg id="chart1_svg" width="950" height="500"></svg>


<div id="intro"><!--start of intro 3-->	
	<div class='words'>
    </div>	
</div>
<script>

//GRAPH 1 STUFF

var data1 = d3.csvParse("percent,frequency\nRed Two Green,-532304\nGive. Earn. Live.,-145244.83\nBadass Budget Babe,-117000\nDebts To Riches,-81000\nI Vigilante,-54000\nJust Another Dollar,-50000\nMillennial Money Probs,-34927.23\nBroke Girl Rehab,-26756.99\nBurke Does,-3967\nFrugalStudent,13\nFinance Yo Self,1147\nNet Worth Goals,2697.31\nBest Life Katy,4000\nBroke Investor,5000\nGen Y to FI,5000\nThe Frugalist,7641\nRetire Lazy,8089.64\nThe Earnest Addiction,8891\nThe $500 Millionaire,10000\nThe Millennials Next Door,10000\nCentsToJoy,10419\nTiny Ambitions,12118\nThe Financial Tech,12885.13\nI The Corporate Slave,14996.2\nEarn Spend Live,15000\nDinero Pro,16000\nDialed In,16235.74\nMy Smarter Money,20000\nThe Millennial Budget,20000\nBuy Hold Long,22000\nFinding Wealthy,22000\nThe 99K Challenge,22765.18\nAchieving Freedom,22922.64\nBudgets & Beyond,25000\nDistilled Dollar,29790.92\n#MoneyGoals,30146\nA Tale of Finances,30472\nMoneyMow,32139\nFairly Frugal Fella,33059.65\nFrugal Mermaid,33736\nNo More Work,35899\nLife Well Hustled,36000\nThe Beta Post,37000\nFireball Finances,37034\nMillennial Dollar,38000\nAll She Saves,40000\nMillion Endeavour,40905\nCommon Sense on Finance,43768.22\nGet Money Got Money,44867\nLindsey Warren Coaching,47030.67\nfiredk,50000\nMillennial Money Diaries,50000\nModerate Money,50000\nMoney Hero,50000\nNerds Guide to Wellness,50000\nSmart Money Seed,50000\nthe melon deal,53658\nThe Savvy Couple,55000\nFour Pillar Freedom,55621\nbuybackfreedom,56000\nMy Alternate Life,56219.39\nProfessional Girl on the Go,67907\nFrugalFI,70000\nFrugalisten,70000\nStockles,75000\nTightwad Finance,75000\nFinancial Panther,76298\nDogged FI,80000\nTrail to FI,85000\nTis But A Moment,87500\nThe Wannabe Investor,94025.04\nNavigating Adulthood,100000\nThe Dividend Investor Blog,100000\nThe Millenniaires,100000\nStretching My Money,102000\nMarried with Money,110000\nHow We Do Money,116428\nThe Mastermind Within,125000\nCents of Knowledge,125196.67\nProject Two,130000\nSaving Sherpa,132000\nDebt Roundup,140000\nNinja Capitalist,142000\nZero Day Challenge,143000\nGet Rich Brothers,150000\nretirengineering,150000\nFiery Millennials,151000\nDoes That Make Cents,154000\nAccelerated FI,155000\nZero Day Finance,155000\nMy Money Wizard,158000\nFIRE by Thirty-Five,159500\nSave Retire Travel,161777\nApathy Ends,162000\nLife Growth Finance,180000\nSmart Provisions,180541.64\nMiss Personal Finance,199435.86\nBand Of Savers,201325\nEllie Mondelli,202000\nLife Long Shuffle,205000\nTraveling Wallet,211446\nThe Dad Wallet,223671\nShnugi Personal Finance,232217\nMillennial Boss,233000\nLisa Vs. The Loans,248940\nThe Grounded Engineer,258000\nFrom Cents To Retirement,266283.84\nMiss Millennial MD,269815.63\nAussie Firebug,271451\nKiwi and Keweenaw,290000\nAdventure Rich,296983.32\nFinancial Freedom Journey,310000\nAtypical Life,350000\nSavvy Financial Latina,392116\nSaving for a Living,400000\nTread Lightly Retire Early,429000\nFamVestor,450000\nFrugal Hackers,480272\nFreedom 35 Blog,500000\nGuy on FIRE,500000\nCash Flow to Heaven,510000\nUnplanned Finance,542000\nQuietly Crushing It,690360\nLeigh's Financial Journey,753000\nMoney Done Right,833588\nThe Frugal Gene,950238.27\nThe Money Habit,2250000");
var data2 = d3.csvParse("percent,frequency\nZJ Thorne,-145201\nThe Grown-Up Pkmn Trainer,-100717.53\nWhere My Soul Belongs,-65000\nLittle Brother Life Coach,-35108\nFuture Proof MD,-11842\nDream Passively,-4256\nDads Dollars Debts,3000\nFrugal African,3750\nKnowmomoney,4733.83\nDividend Portfolio,6000\nMom Finance Blog,14892.68\ndividendgeek,15000\nGrowing From a Seed,20000\nFinance For Geek,23650\nCan I get a Quick Word?,27353.38\nFinancially Drunk,28000\nNew Millennial Investor,29972.97\nBetter Us Blog,31732\nWant Less,37282\n20 Something Lawyer,37969.84\nPhysicianCouple.com,38511.89\nPoorer Than You,48215\nSmall stones,49000\nFinancialdemics,50000\nThe Debt Free Hustle,50000\nWallet Squirrel,50000\nValue Stock Geek,51408.33\nCareful Cents,55000\nDividend-cashflow,55775\nMoney Prowess,57943\nThe Single Dollar,60516\nFrom Where I Go,62722.62\nPersonal Finance Today,70000\nYour Money Worth,70000\nBudget Addict,74073\nFinancial Independence for the Millennial,74348.3\nbrokeGIRLrich,76298.21\nCompound Your Freedom,80000\nFinancial Serenity Blog,80482\nCait Flanders,82135.53\nThe Budget Boy,85000\nSuccess Pirate,90000\nI'm Trying Dammit,93000\nRental Mindset,96050\nDeath2Debt,100000\nMillennial Legacy,100000\nSaneCents,100000\nTechnicalCall,100000\nFarmhouse Finance,100439.14\nThe Road to One Million,100574.12\nMinimalism and Money,101028\nMilitaryFIRE,103000\nMake Wealth Simple,108000\nEyes on the Goal,110000\nKimGaleta.com,110000\nFrugal Turtle,112000\nStop Being Dumb,115000\nHotels and Money,115177.8\nDuit dan Hidup Diobrolin Santai,115529\nSavings Odyssey,117438\nMyFamilyOnABudget,119551.88\nNinja Budgeter,120000\nThe Friendly Russian,124365.22\nGeldschnurrbart,134710\nFinance Smiths,140900\nCredit Logon,150000\nTall Investing,150000\nCompounding Interests,152000\nDebt BLAG,165000\nThe DauvO,165888\nFinance Zombie,170000\nDoubling Dollars,186000\nBrian's Money Challenge,189854.02\nBudget Like a Lady,200000\nInvestingDoc,200000\nThe Hidden Green,200000\nMixed Money Arts,211691.2\nSummit of Coin,215000\nAction Economics,228000\nBeSmartRich,230000\nThe Shiny Dollar,230000\nOpen Mouths Get Fed,244000\nBudget On a Stick,244031.58\nBare Budget Guy,250000\nIncoming Assets,250000\ntheFIREstarter,255213\nMustachian Post,256396\nAverage Joe and Jane,257772.67\nEpic Quiver,262000\nFiscal Voyage,265000\nCashville Skyline,267259.64\nMoney by Dad,275000\nJoney Talks!,300000\nFrugal Asian Finance,300839\nMiss Mazuma,306453\nWorth Watchers,312757\nA Lean Purse,315748\nAccelerate Savings,324531\nSave Now Idiot!,325000\nMoney Can Buy Me Happiness,329623\nI Dream of FIRE,335000\nDividends 4 Future,348840\nThe Spreadsheet Dad,349000\nJessicaCoaches,350000\nthe bloggo,356027\nSouth County Girl,369056.6\ngetmad,380000\nSave. Spend. Splurge.,383800\nFIbythecommonguy,384798\nScaredyCatGuide,385000\nGoing for Flow,388000\nThe Frugal Vagabond,398906.31\nPersonal Profitability,415813\nFrugal Professor,418000\nMoney Ramblings of a Financial Underdog,419171.51\nMoney Maaster,420000\nMy Words and Stuff,434497\nMax Out Retire Early,435029\nNew Father Finance,438000\nDream2Retire,449450\nHomey Improvements,450000\nNest Egg Ninjas,450000\nTime in the market,450000\nDebt Free Geek,450223\nHer Every Cent Counts,468723\nPassive Income Pursuit,469800.76\nAnother Second Opinion,500000\nBlack Sheep Millionaire,500000\nLiveFrugaLee,502711.86\nCash Flow Diaries,505000\nTravel Travel & Retire,505000\nMonkey Free Me,510000\nGenYMoney.ca,521600\nBudgeting in the Fun Stuff,546320\nRetire29,546610\nSavings and Sangria,550000\nMontana Money Adventures,560000\nDimes & Dollars,570000\nYes I Am Cheap,580000\nGen Y Finance Guy,600108\nDIY Money Stuff,646721\nMarriage Kids and Money,650000\nBudgets Are Sexy,675681.17\nThe game of FIRE,700000\nAccumulating Money,706993\nCanadian Dream: Free at 45,707000\nMy Mattress Money,711147.15\nFrugal Paradise,730000\nRogue Dad M.D.,750000\nMy Wealth Manifesto,800000\nThree is Plenty,832231.94\nThe Expat Investor,856552\nBAMF Money,860000\nI saved $5K,873564\nA Journey to FI,900000\nThinkSaveRetire.com,935000\nPersonal Finance News,935288\nGet Money Wise,944641\nThe Dividend Pig,964879.95\nRemember To Water,980000\nMy Road to Wealth and Freedom,995859\nGood Financial Cents,1000000\nMillennial Revolution,1000000\nMillion Dollar Journey,1000000\nMoney Aint Funny,1000000\nTub of Cash,1000000\nFreedom With Bruno,1031000\nMinafi,1050000\nValkyrie Finance,1050000\nSo Over This,1111000\nFreedom 35,1250000\nThe Saverdinks,1260000\nThe Green Swan,1300000\nPlanting Our Pennies,1304300\nFreedom 40 Plan,1307146\nThe Feminist Financier,1343421\nMy Money Voyage,1350000\nMoney Sloths,1500000\n99to1percent.com,1515755\n2million's Personal Finance Blog,1586329\nMs. Financial Literacy,1687183\nFinancially Possible,1691000\nRoot of Good,1718000\nFinancially Alert,1842173\nHappy Frugaler,1858000\nExit Young,1916257.01\nMy Curiosity Lab,2465000\nMr. Tako Escapes,2515259\nSouthern Fried Finance,3432090\n");
var data3 = d3.csvParse("percent,frequency\nTight Fisted Miser,-79898\nDouble Debt Single Woman,-28298\nMendingPockets,2421.52\nCasual Investing,7928.02\nElite Personal Finance,10000\nEarly retirement in UK,20007\nThe Classy Simple Life,29034.28\nThe Broke Architect,35000\nRun Out of Debt,76937.36\nTable for One,128000\nMoneytalkng,135000\nThe Bearded Money Guy,194064\nLe Dividende,211711\nThe Tepid Tamale,250000\nThis Wife's Life,265551\nJumpStart from Scratch,270000\nQuietly Saving,277356\nReaching Our Balance,282000\nDollar Delight,300000\nTime and Pence,300000\nOrganised Redhead,307119\nDaily Successful Living,350000\nFinancial Freedom Sloth,350000\nSave Or Swim,363482.67\nDebt Discipline,384179.7\ntheweeklyinvestment,403639.49\nDividend Driven,411096\nGood Life. Better.,474521\nLearn to Be Great,500000\nMoneylogue.com,500000\nFinancial Velociraptor,503129\nBuilding Income,540000\nThe Money Sprout,578049.67\nDaily Grind Free,604713\nPenny and Rich,611731\nOne Cent at a Time,640000\nKindOdLost,650000\nA Frugal Family's Journey,691695\nMoneyPlan SOS,725000\nThe Canny Contractor,727000\nCentsibly Savvy,757535.46\nThe Jolly Ledger,771291\nRoad To A Tesla,809952\nFrugal Safari,840000\nCanadian Budget Binder,891887\nLife Zemplified,900000\nabandoned cubicle,1000000\nMy Grumpy Fund,1000000\nMy Own Advisor,1000000\nThe Financial Journeyman,1000000\nThe Divide by Zero,1045975\nThe Side Gig Guru,1050000\nactuary on FIRE,1100000\nCommon Core Money,1100000\nRoute To Retire,1101000\nMillionaire Before 50,1175548\nBK2FI,1250000\nThe Wise Squirrel,1300000\nThe FI Explorer,1300892\nThe Finance Patriot,1301346\nNaked Net Worth,1325000\nHigh Income Parents,1418000\nMoney Boss,1585000\nOthalaFehu,1625391\nMax Your Freedom,1738060\n1500 Days,1894455\nThe Blind Investor,2100000\nRetire by 40,2312987.63\nEarly Retirement Dude,2319855\nEarly Retirement Now,3064822\nThe Money Commando,4711782.71\nThe White Coat Investor,5000000");
var data4 = d3.csvParse("percent,frequency\nAlain Guillot,150000\nBoomer & Echo,410000\nRacing Towards Retirement,500000\nWorking Class Hero - Part One,580000\nDebt Files,950000\nThoughts On The Money,950000\nRich Habits,1000000\nThe Millionaire Educator,1047323\nSlack Investor,2000000\nDon't Mess With Taxes,2000000\nRethink Retired,2250000\nTen 2 Million,2521429\nNo Nonsense Landlord,4156344\nWealthy Accountant,12600200");

var svg = d3.select("#chart1_svg"),
    margin = {top: 20, right: 20, bottom: 30, left: 60},
    width = +svg.attr("width") - margin.left - margin.right,
    height = +svg.attr("height") - margin.top - margin.bottom;

var x = d3.scaleBand().rangeRound([0, width]).padding(0.2),
    y = d3.scaleLinear().rangeRound([height, 0]);

var g = svg.append("g")
    .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

//g.append("g")
 // .attr("class", "x axis")
  //.attr("transform", "translate(0," + height + ")")

//add y axis  
g.append("g")
  .attr("class", "y axis")

//add text to y axis
g.append("text")			
  .attr("class", "LabLabel")
  .attr("transform", "translate("+ (width-856) +","+(height-360)+")rotate(-90)")
  .text("Net Worth (dollars)"); 
  
//add text to x axis
//var xLab = g.append("text")			
	//	    .attr("class", "LabLabel")
		//    .attr("x", width-84)
		  //  .attr("y", 380)
		    //.text("Blogs");
 
// Define the div for the tooltip
var div = d3.select("#intro").append("div")	
    .attr("class", "tooltip")				
    .style("opacity", 0);

//get current dropdown age bracket
var e = document.getElementById("dropdown");
var ageBracket = e.options[e.selectedIndex].text;

var colorChart = d3.scaleQuantize()
  .domain([d3.min(data1, function(d) { return +d.frequency; }), d3.max(data1, function(d) { return +d.frequency; })])
  .range(d3.schemeReds[8]);

//change bar chart based on dropdown selection
   d3.select('#dropdown')
	  .on('change', function() {
	  var newData = eval(d3.select(this).property('value'));
	  waterfallChart(newData);
	  });

//create initial bar charts using 18-14 age bracket
waterfallChart(data1);

//function to update bar chart based on dropdown selection
function waterfallChart(newData) {
  
  //define color scale for barChart
  colorChart = d3.scaleQuantize()
  .domain([d3.min(newData, function(d) { return +d.frequency; }), d3.max(newData, function(d) { return +d.frequency; })])
  .range(d3.schemeReds[4]);
  
  var t = d3.transition().duration(750);

  e = document.getElementById("dropdown");
  ageBracket = e.options[e.selectedIndex].text;
  
  x.domain(newData.map(function(d) { return d.percent; }));
  y.domain([d3.min(newData, function(d) { return +d.frequency; }), d3.max(newData, function(d) { return +d.frequency; }) ]);

  var xAxis = d3.axisBottom(x).tickSizeOuter(0);
  var yAxis = d3.axisLeft(y).tickSizeOuter(0);
  
  d3.select('g.x').transition(t).call(xAxis);
  d3.select('g.y').transition(t).call(yAxis);

  var bar = g.selectAll("rect")
     .data(newData);
    
      bar.enter().append("rect")
	  .attr("x", function(d) { return x(d.percent); })
      .attr("y", function(d) { 
	     if (+d.frequency > 0){
		   return y(+d.frequency);
		   } else {
		   return y(0);
		    }
		   })
      .attr("width", x.bandwidth())
      .attr("height", function(d) { return Math.abs(y(+d.frequency) - y(0)) +1; })
      .style("fill", "lightgreen")
      .on("mouseover", function(d) {		
            div.transition()		
                .duration(200)		
                .style("opacity", .95);		
            div	.html("Blog: " + d.percent + "<br>" + "Net worth: $" + d.frequency.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","))	
                .style("left", (d3.event.pageX) + "px")		
                .style("top", (d3.event.pageY - 28) + "px");
            })					
        .on("mouseout", function(d) {		
            div.transition()		
                .duration(500)		
                .style("opacity", 0);	
        });
  
      bar.transition(t)
      .attr("x", function(d) { return x(d.percent); })
      .attr("y", function(d) { 
	     if (+d.frequency > 0){
		   return y(+d.frequency);
		   } else {
		   return y(0);
		    }
		   })
      .attr("width", x.bandwidth())
      .attr("height", function(d) { return Math.abs(y(+d.frequency) - y(0)) +1; });
      
  bar.exit().remove();
  
  //adjust the height of x label
  //xLab.transition(t)
   //.attr("y", function() {
    // if (ageBracket == "20's"){
	//	   return y(-80000);
	//	   } else if (ageBracket == "30's") {
	//	   return y(-120000);
	//	   } else if (ageBracket == "40's") {
    // 	   return y(-150000);
	//	    } else {
	//	   return y(-300000);
	//	   }
   //});
}
</script>

</body>

</html>

<?php get_footer();?>
