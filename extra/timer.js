//global timeout references we can use to stop them
var timeouts = {};
//timer demo function with normal/self-adjusting argument
function timer(form, adjust, morework)
{
	//create the timer speed, a counter and a starting timestamp
	var speed = 50,
	counter = 0, 
	start = new Date().getTime();
	//timer instance function
	function instance()
	{
		//if the morework flag is true
		//do some calculations to create more work
		if(morework)
		{
			for(var x=1, i=0; i<1000000; i++) { x *= (i + 1); }
		}
		//work out the real and ideal elapsed time
		var real = (counter * speed),
		ideal = (new Date().getTime() - start);
		
		//increment the counter
		counter++;
			
		//display the values
		form.ideal.value = real;
		form.real.value = ideal;
			//calculate and display the difference
		var diff = (ideal - real);
		form.diff.value = diff;
			//if the adjust flag is true
		//delete the difference from the speed of the next instance
		if(adjust)
		{
			timeouts[form.id] = window.setTimeout(function() { instance(); }, (speed - diff));
		}
		//otherwise keep the speed normal
		else
		{
			timeouts[form.id] = window.setTimeout(function() { instance(); }, speed);
		}
	};
}
	
	
	
	