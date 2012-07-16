
function createDaySelect(name)
{
    document.write("<select name=" + name + " size='1'>");
    document.write("<option selected='selected' value='01'>01</option>");
    document.write("<option value='02'>02</option>");
    document.write("<option value='03'>03</option>");
    document.write("<option value='04'>04</option>");
    document.write("<option value='05'>05</option>");
    document.write("<option value='06'>06</option>");
    document.write("<option value='07'>07</option>");
    document.write("<option value='08'>08</option>");
    document.write("<option value='09'>09</option>");
    document.write("<option value='10'>10</option>");
    document.write("<option value='11'>11</option>");
    document.write("<option value='12'>12</option>");
    document.write("<option value='13'>13</option>");
    document.write("<option value='14'>14</option>");
    document.write("<option value='15'>15</option>");
    document.write("<option value='16'>16</option>");
    document.write("<option value='17'>17</option>");
    document.write("<option value='18'>18</option>");
    document.write("<option value='19'>19</option>");
    document.write("<option value='20'>20</option>");
    document.write("<option value='21'>21</option>");
    document.write("<option value='22'>22</option>");
    document.write("<option value='23'>23</option>");
    document.write("<option value='24'>24</option>");
    document.write("<option value='25'>25</option>");
    document.write("<option value='26'>26</option>");
    document.write("<option value='27'>27</option>");
    document.write("<option value='28'>28</option>");
    document.write("<option value='29'>29</option>");
    document.write("<option value='30'>30</option>");
    document.write("<option value='31'>31</option>");
    document.write("</select>");
}

function createMonthlySelect(name)
{
    document.write("<select name=" + name + " size='1'>");
    document.write("<option value='01' selected='selected'>Jan</option>");
    //document.write("<option value='02'>Feb</option>");
    //document.write("<option value='03'>Mar</option>");
    //document.write("<option value='04'>Apr</option>");
    //document.write("<option value='05'>May</option>");
    //document.write("<option value='06'>Jun</option>");
    //document.write("<option value='07'>Jul</option>");
    //document.write("<option value='08'>Aug</option>");
    //document.write("<option value='09'>Sep</option>");
    //document.write("<option value='10'>Oct</option>");
    document.write("<option value='11'>Nov</option>");
    document.write("<option value='12'>Dec</option>");
    document.write("</select>");
}

function createYearlySelect(name)
{
    document.write("<select name=" + name + " size='1'>");
    document.write("<option selected='selected' value='2005'>2005</option>");
    document.write("<option selected='selected' value='2006'>2006</option>");
    document.write("</select>");
}

function openNoaaFile(month, year)
{
    var url = "NOAA-";
    url = url + year;
    if (month != '')
    {
        url = url + "-";
        url = url + month;
    }

    url = url + ".txt";
    window.location=url;
}

function openARCFile(day, month, year)
{
    var url = "ARC-" + year + "-" + month + "-" + day + ".txt";
    window.location=url;
}

function openURL(urlname)
{
    window.location=urlname;
}



function changeColor() {
var windspeed = <!--windSpeed-->;
var hiwindspeed = <!--hiWindSpeed-->;
var rainvalue = <!--dailyRain-->;
var stormvalue = <!--stormRain-->;
var rainratevalue = <!--rainRate-->;
var hirainratevalue = <!--hiRainRate-->;

var windvar = document.getElementById('wind');
var hiwindvar = document.getElementById('hiwind');
var rainvar = document.getElementById('rain');
var stormvar = document.getElementById('storm');
var rainratevar = document.getElementById('rainrate');
var hirainratevar = document.getElementById('hirainrate');

//////////////WindSpeed Warning Check/////////////////////////
if (windspeed >= 35 && windspeed < 50) {
windvar.style.backgroundColor = '#F2EE68';
}

if (windspeed >= 50 && windspeed < 85) {
windvar.style.backgroundColor = '#FFBB48';
}

if (windspeed >= 85) {
windvar.style.backgroundColor = '#FF3B44';
}

//////////////High WindSpeed Warning Check/////////////////////////
if (hiwindspeed >= 35 && hiwindspeed < 50) {
hiwindvar.style.backgroundColor = '#F2EE68';
}

if (hiwindspeed >= 50 && hiwindspeed < 85) {
hiwindvar.style.backgroundColor = '#FFBB48';
}

if (hiwindspeed >= 85) {
hiwindvar.style.backgroundColor = '#FF3B44';
}

//////////////Rain Warning Check/////////////////////////

if (rainvalue >= 30 && rainvalue < 75) {
rainvar.style.backgroundColor = '#F2EE68';
}

if (rainvalue >= 75 && rainvalue < 100) {
rainvar.style.backgroundColor = '#FFBB48';
}

if (rainvalue >= 100) {
rainvar.style.backgroundColor = '#FF3B44';
}

//////////////Storm Rain Warning Check/////////////////////////

if (stormvalue >= 50 && stormvalue < 100) {
stormvar.style.backgroundColor = '#F2EE68';
}

if (stormvalue >= 100 && stormvalue < 150) {
stormvar.style.backgroundColor = '#FFBB48';
}

if (stormvalue >= 150) {
stormvar.style.backgroundColor = '#FF3B44';
}

//////////////Current Rain Rate Warning Check/////////////////////////

if (rainratevalue > 0 && rainratevalue < 15) {
rainratevar.style.backgroundColor = '#C9FFF6';
}

if (rainratevalue >= 15 && rainratevalue < 40) {
rainratevar.style.backgroundColor = '#F2EE68';
}

if (rainratevalue >= 40 && rainratevalue < 55) {
rainratevar.style.backgroundColor = '#FFBB48';
}

if (rainratevalue >= 55) {
rainratevar.style.backgroundColor = '#FF3B44';
}

//////////////High Rain Rate Warning Check/////////////////////////

if (hirainratevalue >= 15 && hirainratevalue < 40) {
hirainratevar.style.backgroundColor = '#F2EE68';
}

if (hirainratevalue >= 40 && hirainratevalue < 55) {
hirainratevar.style.backgroundColor = '#FFBB48';
}

if (hirainratevalue >= 55) {
hirainratevar.style.backgroundColor = '#FF3B44';
}


}
// -->

