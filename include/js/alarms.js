var isDOM=document.getElementById?1:0,isIE=document.all?1:0,isNS4=navigator.appName=='Netscape'&&!isDOM?1:0,isOp=self.opera?1:0,isDyn=isDOM||isIE||isNS4;function getRef(i,p){p=!p?document:p.navigator?p.document:p;return isIE?p.all[i]:isDOM?(p.getElementById?p:p.ownerDocument).getElementById(i):isNS4?p.layers[i]:null};function getSty(i,p){var r=getRef(i,p);return r?isNS4?r:r.style:null};if(!self.LayerObj)var LayerObj=new Function('i','p','this.ref=getRef(i,p);this.sty=getSty(i,p);return this');function getLyr(i,p){return new LayerObj(i,p)};function LyrFn(n,f){LayerObj.prototype[n]=new Function('var a=arguments,p=a[0],px=isNS4||isOp?0:"px";with(this){'+f+'}')};LyrFn('x','if(!isNaN(p))sty.left=p+px;else return parseInt(sty.left)');LyrFn('y','if(!isNaN(p))sty.top=p+px;else return parseInt(sty.top)');var aeOL=[];function addEvent(o,n,f,l){var a='addEventListener',h='on'+n,b='',s='';if(o[a]&&!l)return o[a](n,f,false);o._c|=0;if(o[h]){b='_f'+o._c++;o[b]=o[h]}s='_f'+o._c++;o[s]=f;o[h]=function(e){e=e||window.event;var r=true;if(b)r=o[b](e)!=false&&r;r=o[s](e)!=false&&r;return r};aeOL[aeOL.length]={o:o,h:h}};addEvent(window,'unload',function(){for(var i=0;i<aeOL.length;i++)with(aeOL[i]){o[h]=null;for(var c=0;o['_f'+c];c++)o['_f'+c]=null}});function FSMenu(myName,nested,cssProp,cssVis,cssHid){this.myName=myName;this.nested=nested;this.cssProp=cssProp;this.cssVis=cssVis;this.cssHid=cssHid;this.cssLitClass='';this.menus={root:new FSMenuNode('root',true,this)};this.menuToShow=[];this.mtsTimer=null;this.showDelay=0;this.switchDelay=125;this.hideDelay=500;this.showOnClick=0;this.animations=[];this.animSpeed=100;if(isIE&&!isOp)addEvent(window,'unload',new Function(myName+'=null'))};FSMenu.prototype.show=function(mN){with(this){menuToShow.length=arguments.length;for(var i=0;i<arguments.length;i++)menuToShow[i]=arguments[i];clearTimeout(mtsTimer);if(!nested)mtsTimer=setTimeout(myName+'.menus.root.over()',10)}};FSMenu.prototype.hide=function(mN){with(this){clearTimeout(mtsTimer);if(menus[mN])menus[mN].out()}};function FSMenuNode(id,isRoot,obj){this.id=id;this.isRoot=isRoot;this.obj=obj;this.lyr=this.child=this.par=this.timer=this.visible=null;this.args=[];var node=this;this.over=function(evt){with(node)with(obj){if(isNS4&&evt&&lyr.ref)lyr.ref.routeEvent(evt);clearTimeout(timer);clearTimeout(mtsTimer);if(!isRoot&&!visible)node.show();if(menuToShow.length){var a=menuToShow,m=a[0];if(!menus[m]||!menus[m].lyr.ref)menus[m]=new FSMenuNode(m,false,obj);var c=menus[m];if(c==node){menuToShow.length=0;return}clearTimeout(c.timer);if(c!=child&&c.lyr.ref){c.args.length=a.length;for(var i=0;i<a.length;i++)c.args[i]=a[i];var delay=child?switchDelay:showDelay;c.timer=setTimeout('with('+myName+'){menus["'+c.id+'"].par=menus["'+node.id+'"];menus["'+c.id+'"].show()}',delay?delay:1)}menuToShow.length=0}if(!nested&&par)par.over()}};this.out=function(evt){with(node)with(obj){if(isNS4&&evt&&lyr&&lyr.ref)lyr.ref.routeEvent(evt);clearTimeout(timer);if(!isRoot){timer=setTimeout(myName+'.menus["'+id+'"].hide()',hideDelay);if(!nested&&par)par.out()}}};if(this.id!='root')with(this)with(lyr=getLyr(id))if(ref){if(isNS4)ref.captureEvents(Event.MOUSEOVER|Event.MOUSEOUT);addEvent(ref,'mouseover',this.over);addEvent(ref,'mouseout',this.out);if(obj.nested){addEvent(ref,'focus',this.over);addEvent(ref,'click',this.over);addEvent(ref,'blur',this.out)}}};FSMenuNode.prototype.show=function(){with(this)with(obj){if(!lyr||!lyr.ref)return;if(par){if(par.child&&par.child!=this)par.child.hide();par.child=this}var offR=args[1],offX=args[2],offY=args[3],lX=0,lY=0,doX=''+offX!='undefined',doY=''+offY!='undefined';if(self.page&&offR&&(doX||doY)){with(page.elmPos(offR,par.lyr?par.lyr.ref:0))lX=x,lY=y;if(doX)lyr.x(lX+eval(offX));if(doY)lyr.y(lY+eval(offY))}if(offR)lightParent(offR,1);visible=1;if(obj.onshow)obj.onshow(id);setVis(1)}};FSMenuNode.prototype.hide=function(){with(this)with(obj){if(!lyr||!lyr.ref)return;if(isNS4&&self.isMouseIn&&isMouseIn(lyr.ref))return show();if(args[1])lightParent(args[1],0);if(child)child.hide();if(par&&par.child==this)par.child=null;if(lyr){visible=0;if(obj.onhide)obj.onhide(id);setVis(0)}}};FSMenuNode.prototype.lightParent=function(elm,lit){with(this)with(obj){if(!cssLitClass||isNS4)return;if(lit)elm.className+=(elm.className?' ':'')+cssLitClass;else elm.className=elm.className.replace(new RegExp('(\\s*'+cssLitClass+')+$'),'')}};FSMenuNode.prototype.setVis=function(sh){with(this)with(obj){lyr.timer|=0;lyr.counter|=0;with(lyr){clearTimeout(timer);if(sh&&!counter)sty[cssProp]=cssVis;if(isDOM&&animSpeed<100)for(var a=0;a<animations.length;a++)animations[a](ref,counter);counter+=animSpeed*(sh?1:-1);if(counter>100){counter=100}else if(counter<=0){counter=0;sty[cssProp]=cssHid}else if(isDOM)timer=setTimeout(myName+'.menus["'+id+'"].setVis('+sh+')',50)}}};FSMenu.prototype.activateMenu=function(id,subInd){with(this){if(!isDOM||!document.documentElement)return;var a,ul,li,parUL,mRoot=getRef(id),nodes,count=1;if(isIE){var aNodes=mRoot.getElementsByTagName('a');for(var i=0;i<aNodes.length;i++){addEvent(aNodes[i],'focus',new Function('e','var node=this.parentNode;while(node){if(node.onfocus)setTimeout(node.onfocus,1,e);node=node.parentNode}'));addEvent(aNodes[i],'blur',new Function('e','var node=this.parentNode;while(node){if(node.onblur)node.onblur(e);node=node.parentNode}'))}}var lists=mRoot.getElementsByTagName('ul');for(var i=0;i<lists.length;i++){li=ul=lists[i];while(li){if(li.nodeName.toLowerCase()=='li')break;li=li.parentNode}if(!li)continue;parUL=li;while(parUL){if(parUL.nodeName.toLowerCase()=='ul')break;parUL=parUL.parentNode}a=null;for(var j=0;j<li.childNodes.length;j++)if(li.childNodes[j].nodeName.toLowerCase()=='a')a=li.childNodes[j];if(!a)continue;var menuID=myName+'-id-'+count++;if(ul.id)menuID=ul.id;else ul.setAttribute('id',menuID);var sOC=(showOnClick==1&&li.parentNode==mRoot)||(showOnClick==2);var eShow=new Function('with('+myName+'){var m=menus["'+menuID+'"],pM=menus["'+parUL.id+'"];'+(sOC?'if((pM&&pM.child)||(m&&m.visible))':'')+' show("'+menuID+'",this)}');var eHide=new Function(myName+'.hide("'+menuID+'")');addEvent(a,'mouseover',eShow);addEvent(a,'focus',eShow);addEvent(a,'mouseout',eHide);addEvent(a,'blur',eHide);if(sOC)addEvent(a,'click',new Function('e',myName+'.show("'+menuID+'",this);if(e.cancelable&&e.preventDefault)e.preventDefault();e.returnValue=false;return false'));if(subInd)a.insertBefore(subInd.cloneNode(true),a.firstChild)}menus[id]=new FSMenuNode(id,true,this)}};if(!self.page)var page={win:self,minW:0,minH:0,MS:isIE&&!isOp};page.elmPos=function(e,p){var x=0,y=0,w=p?p:this.win;e=e?(e.substr?(isNS4?w.document.anchors[e]:getRef(e,w)):e):p;if(isNS4){if(e&&(e!=p)){x=e.x;y=e.y};if(p){x+=p.pageX;y+=p.pageY}}if(e&&this.MS&&navigator.platform.indexOf('Mac')>-1&&e.tagName=='A'){e.onfocus=new Function('with(event){self.tmpX=clientX-offsetX;self.tmpY=clientY-offsetY}');e.focus();x=tmpX;y=tmpY;e.blur()}else while(e){x+=e.offsetLeft;y+=e.offsetTop;e=e.offsetParent}return{x:x,y:y}};if(isNS4){var fsmMouseX,fsmMouseY,fsmOR=self.onresize,nsWinW=innerWidth,nsWinH=innerHeight;document.fsmMM=document.onmousemove;self.onresize=function(){if(fsmOR)fsmOR();if(nsWinW!=innerWidth||nsWinH!=innerHeight)location.reload()};document.captureEvents(Event.MOUSEMOVE);document.onmousemove=function(e){fsmMouseX=e.pageX;fsmMouseY=e.pageY;return document.fsmMM?document.fsmMM(e):document.routeEvent(e)};function isMouseIn(sty){with(sty)return((fsmMouseX>left)&&(fsmMouseX<left+clip.width)&&(fsmMouseY>top)&&(fsmMouseY<top+clip.height))}}

/*

FREESTYLE MENUS v1.0 RC (c) 2001-2005 Angus Turnbull, http://www.twinhelix.com
Altering this notice or redistributing this file is prohibited.

*/

// For each menu you create, you must create a matching "FSMenu" JavaScript object to represent
// it and manage its behaviour. You don't have to edit this script at all if you don't want to;
// these comments are just here for completeness. Also, feel free to paste this script into the
// external .JS file to make including it in your pages easier!

// Here's a menu object to control the above list of menu data:
var listMenu = new FSMenu('listMenu', true, 'visibility', 'visible', 'hidden');

// The parameters of the FSMenu object are:
//  1) Its own name in quotes.
//  2) Whether this is a nested list menu or not (in this case, true means yes).
//  3) The CSS property name to change when menus are shown and hidden.
//  4) The visible value of that CSS property.
//  5) The hidden value of that CSS property.
//
// Next, here's some optional settings for delays and highlighting:
//  * showDelay is the time (in milliseconds) to display a new child menu.
//  * switchDelay is the time to switch from one child menu to another child menu.
//    Set this higher and point at 2 neighbouring items to see what it does.
//  * hideDelay is the time it takes for a menu to hide after mouseout.
//  * cssLitClass is the CSS classname applied to parent items of active menus.
//  * showOnClick will, suprisingly, set the menus to show on click. Pick one of 3 values:
//    0 = all mouseover, 1 = first level click, sublevels mouseover, 2 = all click.

//listMenu.showDelay = 0;
//listMenu.switchDelay = 125;
//listMenu.hideDelay = 500;
listMenu.cssLitClass = 'highlighted';
//listMenu.showOnClick = 1;


// Now the fun part... animation! This script supports animation plugins you can add to each
// menu object you create. Here's two to get you started. To enable animation, add one or
// more functions to the menuObject.animations array, and set menuObject.animSpeed to the
// desired percentage of animation to be completed per frame.
// Animation functions are called with a reference to the menu element being animated,
// and a counter variable that changes from 0 to 100 depending on the animation progress.

function animClipDown(ref, counter)
{
 var cP = Math.pow(Math.sin(Math.PI*counter/200),0.75);
 ref.style.clip = (counter==100 ?
  ((window.opera || navigator.userAgent.indexOf('KHTML') > -1) ? '':
   'rect(auto, auto, auto, auto)') :
    'rect(0, ' + ref.offsetWidth + 'px, '+(ref.offsetHeight*cP)+'px, 0)');
};

function animFade(ref, counter)
{
 var f = ref.filters, done = (counter==100);
 if (f)
 {
  if (!done && ref.style.filter.indexOf("alpha") == -1)
   ref.style.filter += ' alpha(opacity=' + counter + ')';
  else if (f.length && f.alpha) with (f.alpha)
  {
   if (done) enabled = false;
   else { opacity = counter; enabled=true }
  }
 }
 else ref.style.opacity = ref.style.MozOpacity = counter/100.1;
};

// I'm applying them both to this menu and setting the speed to 20%. Delete this to disable.
listMenu.animations[listMenu.animations.length] = animFade;
listMenu.animations[listMenu.animations.length] = animClipDown;
listMenu.animSpeed = 20;


// Finally, on page load you have to activate the menu by calling its 'activateMenu()' method.
// I've provided an "addEvent" method that lets you easily run page events across browsers.
// You pass the activateMenu() function two parameters:
//  (1) The ID of the outermost <ul> list tag containing your menu data.
//  (2) A node containing your submenu popout arrow indicator.
// If none of that made sense, just cut and paste this next bit for each menu you create.

var arrow = null;
if (document.createElement && document.documentElement)
{
 arrow = document.createElement('span');
 arrow.appendChild(document.createTextNode('>'));
 // Feel free to replace the above two lines with these for a small arrow image...
 //arrow = document.createElement('img');
 //arrow.src = 'arrow.gif';
 //arrow.style.borderWidth = '0';

 arrow.className = 'subind';
}

addEvent(window, 'load', new Function('listMenu.activateMenu("listMenuRoot", arrow)'));


// You may wish to leave your menu as a visible list initially, then apply its style
// dynamically on activation for better accessibility. Screenreaders and older browsers will
// then see all your menu data, but there will be a 'flicker' of the raw list before the
// page has completely loaded. If you want to do this, remove the CLASS="..." attribute from
// the above outermost UL tag, and uncomment this line:
//addEvent(window, 'load', new Function('getRef("listMenuRoot").className="menulist"'));


// To create more menus, duplicate this section and make sure you rename your
// menu object to something different; also, activate another <ul> list with a
// different ID, of course :). You can hae as many menus as you want on a page.


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
    document.write("<option value='02'>Feb</option>");
    document.write("<option value='03'>Mar</option>");
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

var warncolorlow = '#EEEE66';
var warncolormed = '#FFBB44';
var warncolorhigh = '#FF4444';
var currentraincolor ='#CCFFFF';

var outtemp = 5.3;
var windchill = 5.3;
var windspeed = 5;
var hiwindspeed = 29;
var rainvalue = 5.6;
var stormvalue = 9.9;
var rainratevalue = 0.0;
var hirainratevalue = 4.1;
var barom = 1010.3;
var baromchghr = 0.2;
var baromchgday = 3.1;
var baromlow = 1007.4;

var outtempvar = document.getElementById('outtemp');
var windchillvar = document.getElementById('windchill');
var windvar = document.getElementById('wind');
var hiwindvar = document.getElementById('hiwind');
var rainvar = document.getElementById('rain');
var stormvar = document.getElementById('storm');
var rainratevar = document.getElementById('rainrate');
var hirainratevar = document.getElementById('hirainrate');
var baromvar = document.getElementById('barom');
var baromchghrvar = document.getElementById('baromchghr');
var baromchgdayvar = document.getElementById('baromchgday');
var baromlowvar = document.getElementById('baromlow');


//////////////Temperature Warning/////////////////////////
if ((outtemp >= 30 && outtemp < 35) || (outtemp <= -10 && outtemp > -20)) {
outtempvar.style.backgroundColor = warncolorlow;
}

if ((outtemp >= 35 && outtemp < 40) || (outtemp <= -20 && outtemp > -30)) {
outtempvar.style.backgroundColor = warncolormed;
}

if ((outtemp >= 40) || (outtemp <= -30)) {
outtempvar.style.backgroundColor = warncolorhigh;
}

//////////////WindChill Warning/////////////////////////
if (windchill <= -10 && windchill > 20) {
outtempvar.style.backgroundColor = warncolorlow;
}

if (windchill <= -20 && windchill > -35) {
outtempvar.style.backgroundColor = warncolormed;
}

if (windchill <= -35) {
outtempvar.style.backgroundColor = warncolorhigh;
}


//////////////WindSpeed Warning Check/////////////////////////
if (windspeed >= 35 && windspeed < 50) {
windvar.style.backgroundColor = warncolorlow;
}

if (windspeed >= 50 && windspeed < 85) {
windvar.style.backgroundColor = warncolormed;
}

if (windspeed >= 85) {
windvar.style.backgroundColor = warncolorhigh;
}

//////////////High WindSpeed Warning Check/////////////////////////
if (hiwindspeed >= 35 && hiwindspeed < 50) {
hiwindvar.style.backgroundColor = warncolorlow;
}

if (hiwindspeed >= 50 && hiwindspeed < 85) {
hiwindvar.style.backgroundColor = warncolormed;
}

if (hiwindspeed >= 85) {
hiwindvar.style.backgroundColor = warncolorhigh;
}

//////////////Rain Warning Check/////////////////////////

if (rainvalue >= 30 && rainvalue < 75) {
rainvar.style.backgroundColor = warncolorlow;
}

if (rainvalue >= 75 && rainvalue < 100) {
rainvar.style.backgroundColor = warncolormed;
}

if (rainvalue >= 100) {
rainvar.style.backgroundColor = warncolorhigh;
}

//////////////Storm Rain Warning Check/////////////////////////

if (stormvalue >= 50 && stormvalue < 100) {
stormvar.style.backgroundColor = warncolorlow;
}

if (stormvalue >= 100 && stormvalue < 150) {
stormvar.style.backgroundColor = warncolormed;
}

if (stormvalue >= 150) {
stormvar.style.backgroundColor = warncolorhigh;
}

//////////////Current Rain Rate Warning Check/////////////////////////

if (rainratevalue > 0 && rainratevalue < 5) {
rainratevar.style.backgroundColor = currentraincolor;
}

if (rainratevalue >= 5 && rainratevalue < 15) {
rainratevar.style.backgroundColor = warncolorlow;
}

if (rainratevalue >= 15 && rainratevalue < 30) {
rainratevar.style.backgroundColor = warncolormed;
}

if (rainratevalue >= 30) {
rainratevar.style.backgroundColor = warncolorhigh;
}

//////////////High Rain Rate Warning Check/////////////////////////

if (hirainratevalue >= 10 && hirainratevalue < 20) {
hirainratevar.style.backgroundColor = warncolorlow;
}

if (hirainratevalue >= 20 && hirainratevalue < 40) {
hirainratevar.style.backgroundColor = warncolormed;
}

if (hirainratevalue >= 40) {
hirainratevar.style.backgroundColor = warncolorhigh;
}

//////////////Current Barometer Reading/////////////////////////

if (barom <= 999 && barom > 995) {
baromvar.style.backgroundColor = warncolorlow;
}

if (barom <= 995 && barom > 985) {
baromvar.style.backgroundColor = warncolormed;
}

if (barom <= 985) {
baromvar.style.backgroundColor = warncolorhigh;
}

//////////////Hour Barometer Change/////////////////////////

if ((baromchghr >= 1 && baromchghr < 1.5) || (baromchghr <= -1 && baromchghr > -1.5) ) {
baromchghrvar.style.backgroundColor = warncolorlow;
}

if ((baromchghr > 1.5) || (baromchghr < -1.5) ) {
baromchghrvar.style.backgroundColor = warncolorhigh;
}

//////////////Day Barometer Change/////////////////////////

if ((baromchgday >= 5 && baromchgday < 8.5) || (baromchgday <= -5 && baromchgday > -8.5) ) {
baromchgdayvar.style.backgroundColor = warncolorlow;
}

if ((baromchgday > 8.5) || (baromchgday < -8.5) ) {
baromchgdayvar.style.backgroundColor = warncolorhigh;
}

//////////////Day Barometer Low/////////////////////////

if (baromlow <= 987 && baromlow > 983) {
baromlowvar.style.backgroundColor = warncolorlow;
}

if (baromlow <= 983) {
baromlowvar.style.backgroundColor = warncolorhigh;
}


} //End Function

