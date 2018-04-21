<?php
/*
 *Template Name: Employment By Industry By State
 *Template Post Type: post
 */
 
 get_header(); ?>
<html>
<head>
<script src="https://d3js.org/d3.v4.min.js"></script>
<style>
@import url('https://fonts.googleapis.com/css?family=Droid+Serif|Raleway');


.axis--y .domain {
  display: none;
}

h1 {
text-align: center;
font-size: 50px;
margin-bottom: 0px;
font-family: 'Droid Serif', serif;
}

h3, h4, h5, h6 {
text-align: center;
margin-bottom: 15px;
margin-top: 15px;
font-family: 'Raleway', sans-serif;
}

p {
color: black;
}

#words {
color: black;
font-family: Raleway;
max-width: 550px;
margin: 25px auto;
line-height: 1.75;
padding-left: 45px;
}

#end_notes{
color: black;
font-family: Raleway;
max-width: 550px;
margin: 25px auto;
line-height: 1.75;
padding-left: 45px;
font-size: 14px;
}

#words_last {
color: black;
font-family: Raleway;
max-width: 550px;
margin: 25px auto;
line-height: 1.75;
padding-left: 45px;
margin-bottom: 50px;
}

.medianPrice {
font-family: Raleway;
font-size: 14px;
}

.usa_label {
font-family: Raleway;
font-size: 11px;
font-weight: bold;
}

#intro{
width: 80%;
margin: 0 auto;
}

#subTitle {
width: 75%;
margin: 15px auto;
color: black;
margin-bottom: 50px;
}

#table_custom {
border-top: 2px solid white;
}

th {
font-size: 14px;
color: black;
font-weight: bold;
border-bottom: 2px solid black;
}

tr {
height: 10px;
}

td {
font-size: 14px;
color: black;
}

.td_percent {
text-align: center;
background-color: #7fdee1;
}

#three_dots {
color: black;
font-family: Raleway;
max-width: 550px;
margin: 25px auto;
line-height: 1.75;
padding-left: 45px;
text-align: center;
font-size: 26px;
}

@font-face {font-family: "sw-icon-font";src:url("http://www.fourpillarfreedom.com/wp-content/plugins/social-warfare/fonts/sw-icon-font.eot?ver=2.3.5");src:url("http://www.fourpillarfreedom.com/wp-content/plugins/social-warfare/fonts/sw-icon-font.eot?ver=2.3.5#iefix") format("embedded-opentype"),url("http://www.fourpillarfreedom.com/wp-content/plugins/social-warfare/fonts/sw-icon-font.woff?ver=2.3.5") format("woff"), url("http://www.fourpillarfreedom.com/wp-content/plugins/social-warfare/fonts/sw-icon-font.ttf?ver=2.3.5") format("truetype"),url("http://www.fourpillarfreedom.com/wp-content/plugins/social-warfare/fonts/sw-icon-font.svg?ver=2.3.5#1445203416") format("svg");font-weight: normal;font-style: normal;}

</style>
</head>

<body>

<div id='intro'><!--start of title-->
	  <h1 style='color: #1B685B; font-size: 66px;'>The Income Spread</h1>
            <h3 id='subTitle'><strong>Visualizing Household Income Distributions in all 50 U.S. States</strong></h3>
</div> <!-- end of title-->

<div id='svg_cover'></div> <!--COVER PHOTO-->

<div id='intro'><!--start of intro paragraph-->
            <p id='words'>The median annual household income in the U.S is about $55,000 per year. This means roughly half of all U.S. households earn more than $55k each year and half earn less.</p>
            <p id='words'><b>Related</b>: I track my own income for free using <a href="http://fxo.co/4D5i" target="_blank">Personal Capital</a>.</p>
            <p id='words'> While this is useful to know, what's even more interesting is the actual <i>distribution</i> of household incomes. How many households bring in between $40k and $50k? How many earn more than $100k? More than $200k?</p>
            <p id='words_last'> To answer these questions, we can analyze some data from the <a href='https://factfinder.census.gov/faces/tableservices/jsf/pages/productview.xhtml?pid=ACS_16_5YR_DP02&src=pt' target='_blank'>2012-2016 American Community Survey</a>, which provides estimates on annual incomes for households across the U.S. The following chart shows the distribution of these incomes.</p>
</div> <!-- end of intro paragaph-->

<div id='svg_usa'></div>

<div id='intro'><!--start of intro paragraph-->
            <p id='words'>This gives us a more complete view of exactly how much households across the U.S earn each year. For example, we see that just over one-fourth of all households earn more than $100k per year and about 6% earn more than $200k. Keep in mind that we're talking about houshold incomes, not individual incomes. One household could consist of two income earners.</p>
            <p id='words'>On the flip side, about one-fourth of all U.S. households earn less than $30k each year and one in six earn less than $20k. So, although $55k is the median, very few families actually bring home that much each year.</p>
            
            <p id='words_last'>To get an even better idea of how incomes are distributed, check out the fifty charts below that show the household income distributions for each state. The dashed line in each chart indicates the median household income for that state.</p>
</div> <!-- end of intro paragaph-->


<div class="nc_socialPanel swp_flatFresh swp_d_fullColor swp_i_fullColor swp_o_fullColor scale-100 scale-fullWidth" data-position="below" data-float="floatBottom" data-count="5" data-floatColor="#ffffff" data-emphasize="0">
<div class="nc_tweetContainer twitter" data-id="2" data-network="twitter"><a rel="nofollow" target="_blank" href="https://twitter.com/share?original_referer=/&text=Visualizing  Household Income Distribution By State&url=http://www.fourpillarfreedom.com/visualizing-household-income-distribution-by-state/&via=4PillarFreedom" data-link="https://twitter.com/share?original_referer=/&text=Visualizing  Household Income Distribution By State&url=http://www.fourpillarfreedom.com/visualizing-household-income-distribution-by-state/&via=4PillarFreedom" class="nc_tweet"><span class="swp_count swp_hide"><span class="iconFiller"><span class="spaceManWilly"><i class="sw sw-twitter"></i><span class="swp_share"> Tweet</span></span></span></span></a></div>
<div class="nc_tweetContainer swp_fb" data-id="3" data-network="facebook"><a rel="nofollow" target="_blank" href="https://www.facebook.com/share.php?u=http%3A%2F%2Fwww.fourpillarfreedom.com%2Fvisualizing-household-income-distribution-by-state%2F" data-link="http://www.facebook.com/share.php?u=http%3A%2F%2Fwww.fourpillarfreedom.com%2Fvisualizing-household-income-distribution-by-state%2F" class="nc_tweet"><span class="iconFiller"><span class="spaceManWilly"><i class="sw sw-facebook"></i><span class="swp_share"> Share</span></span></span><span class="swp_count">1</span></a></div>
<div class="nc_tweetContainer totes totesalt" data-id="6" ><span class="swp_count"><span class="swp_label">Shares</span> 1</span></div>
</div>

<script>

</script>
</body>
</html>
<?php get_footer();?>