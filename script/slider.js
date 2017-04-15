var startslide = 0;

var starttime = new Date().getTime();

var temp = window.setInterval("slider()",8000);

var slide1 = document.getElementById("s1");
var slide2 = document.getElementById("s2");
var slide3 = document.getElementById("s3");
var slide4 = document.getElementById("s4");
var slide5 = document.getElementById("s5");

var slist1 = document.getElementById("sl1");
var slist2 = document.getElementById("sl2");
var slist3 = document.getElementById("sl3");
var slist4 = document.getElementById("sl4");
var slist5 = document.getElementById("sl5");

console.log("action    | state |     extra information    |      time     |");
console.log("__________|_______|__________________________|_______________|");

slider();

function slider()
{
	if(startslide==0)
	{
		action("0","0",slist1,slide1);
		startslide = 2;
		return;
	}
	if(startslide==1)
	{
		console.log("slide1    | start | action started/completed | " + new Date().getTime() + ' |');
		action(slide5,slist5,slist1,slide1);
		startslide = 2;
		return;
	}
	if(startslide==2)
	{
		console.log("slide2    | start | action started/completed | " + new Date().getTime() + ' |');
		action(slide1,slist1,slist2,slide2);
		startslide = 3;
		return;
	}
	if(startslide==3)
	{
		console.log("slide3    | start | action started/completed | " + new Date().getTime() + ' |');
		action(slide2,slist2,slist3,slide3);
		startslide = 4;
		return;
	}
	if(startslide==4)
	{
		console.log("slide4    | start | action started/completed | " + new Date().getTime() + ' |');
		action(slide3,slist3,slist4,slide4);
		startslide = 5;
		return;
	}
	if(startslide==5)
	{
		console.log("slide5    | start | action started/completed | " + new Date().getTime() + ' |');
		action(slide4,slist4,slist5,slide5);
		startslide = 1;
		return;
	}
}
function action(a,b,c,d)
{
	if(a=="0" & b=="0") // starting up for the first time
	{
		d.style.height = '500px';
		c.style.backgroundColor='#6646AC';
		c.style.borderBottomColor='#6646AC';
		console.log('start+    | ended | action started/completed | ' + new Date().getTime() + ' |');		
		actionend(d);
		return;
	}
	
	// for contuining operation
	
	var op = 1;  // initial opacity
	var timer = setInterval(function()
	{
		if (op <= 0.01)
		{
			clearInterval(timer);
			a.style.height = '0px';
			d.style.height = '500px';
			
			b.style.removeProperty("background-color");
			b.style.removeProperty("border-bottom-color");
			
			c.style.backgroundColor='#6646AC';
			c.style.borderBottomColor='#6646AC';
			
			console.log('action    | ended | action started/completed | ' + new Date().getTime() + ' |');
			
			actionend(d);
		}
		a.style.opacity = op;
		a.style.filter = 'alpha(opacity=' + op * 100 + ")";
		op -= op * 0.1;
	}, 50);
}
function actionend(d)
{
	var op = 0.01;  // initial opacity
	var timer2 = setInterval(function()
	{
		if(op >= 1)
		{
			clearInterval(timer2);
			d.style.opacity = '1';
			console.log('actionend | ended | action started/completed | ' + new Date().getTime() + ' |');
		}
		d.style.opacity = op;
		d.style.filter = 'alpha(opacity=' + op * 100 + ")";
		op += op*0.1;
	}, 50);
}