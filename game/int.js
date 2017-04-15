window.onkeydown = function(event){keyPress(event);}
window.setInterval('timer()',1000);

var map = document.getElementById('map');
var character = document.getElementById('character');
character.style.top='0px';
character.style.left='0px';

var pos = 0;

generatelevel('1');

function timer()
{
	//console.log('loading...');
	load();
}

function load()
{
	//console.log('...loaded');
}

function keyPress(event)
{
	switch(event.keyCode)
	{
		case 87:
		move('w');
		return;
		
		case 65:
		move('a');
		return;
		
		case 83:
		move('s');
		return;
		
		case 68:
		move('d');
		return;
	}
}

function move(d)
{
	if(d=='w')
	{
		y = getpos('y');
		x = getpos('x');
		newy = (+y) - 25;
		temppos = pos - 28;
		if(newy < '0'||checkmove(temppos))
		{
			console.log('derp');
		}
		else
		{
			pos = pos - 28;
			character.style.top = newy;
			console.log('div# ' + pos + ' | curpos ' + x + ',' + newy);
		}
	}
	if(d=='a')
	{
		y = getpos('y');
		x = getpos('x');
		newx = (+x) - 25;
		temppos = pos - 1;
		if(newx < '0'||checkmove(temppos))
		{
			console.log('derp');
		}
		else
		{
			pos = pos - 1;
			character.style.left = newx;
			console.log('div# ' + pos + ' | curpos ' + newx + ',' + y);
		}
	}
	if(d=='s')
	{
		y = getpos('y');
		x = getpos('x');
		newy = (+y) + 25;
		temppos = pos + 28;
		if(newy > '675'||checkmove(temppos))
		{
			console.log('derp');
		}
		else
		{
			pos = pos + 28;
			character.style.top = newy;
			console.log('div# ' + pos + ' | curpos ' + x + ',' + newy);
		}
	}
	if(d=='d')
	{
		y = getpos('y');
		x = getpos('x');
		newx = (+x) + 25;
		temppos = pos + 1;
		if(newx > '675'||checkmove(temppos))
		{
			console.log('derp');
		}
		else
		{
			pos = pos + 1;
			character.style.left = newx;
			console.log('div# ' + pos + ' | curpos ' + newx + ',' + y);
		}
	}
	
}

function getpos(d)
{
	if(d=='x')
	{
		x = character.style.left;
		x = x.substring(0, x.length - 2);
		return x;
	}
	if(d=='y')
	{
		y = character.style.top;
		y = y.substring(0, y.length - 2);
		return y;
	}
}

function generatelevel(maplevel)
{
	if(maplevel=='1')
	{
		for(var i=0;i<=783;i++)
		{
			mapitem = document.createElement('div');
			mapitem.className='mapitem';
			mapitem.id='mapitem'+i;
			map.appendChild(mapitem);
			if(i==783)
			{
				addmap("0","top_1001","1");
				addmap("1","wall_1010","1");
				addmap("2","wall_1010","1");
				addmap("3","wall_1010","1");
				addmap("4","top_1100","1");
				addmap("28","top_0101","1");
				addmap("29","floor1","0");
				addmap("30","floor1","0");
				addmap("31","floor1","0");
				addmap("32","top_0101","1");
				addmap("56","wall_0011","1");
				addmap("57","wall_1110","1");
				addmap("58","floor1","0");
				addmap("59","wall_1011","1");
				addmap("60","wall_0110","1");
				addmap("84","path1","0");
				addmap("85","path1","0");
				addmap("86","path2","0");
				addmap("87","path1","0");
				addmap("88","path1","0");
				addmap("112","path1","0");
				addmap("113","path1","0");
				addmap("114","path2","0");
				addmap("115","path1","0");
				addmap("116","path1","0");
				addmap("140","path3","0");
				addmap("141","path3","0");
				addmap("142","path4","0");
				addmap("143","path3","0");
				addmap("144","path3","0");
				addmap("168","path1","0");
				addmap("169","path1","0");
				addmap("170","path1","0");
				addmap("171","path1","0");
				addmap("172","path1","0");
				addmap("196","path1","0");
				addmap("197","path1","0");
				addmap("198","path1","0");
				addmap("199","path1","0");
				addmap("200","path1","0");
			}
		}
		character.style.top='25px';
		character.style.left='50px';
		window.pos=30;
	}
}
function checkmove(pos)
{
	if(document.getElementById("mapitem"+pos).dataset.passive=="1")
	{
		return true
	}
	else
	{
		return false
	}
}
function addmap(elm,item,passive)
{
	document.getElementById('mapitem'+elm).className += ' '+item;
	if(passive=="1")
	{
		document.getElementById('mapitem'+elm).setAttribute('data-passive','1');
	}
}