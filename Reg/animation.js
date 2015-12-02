$(document).ready(function(){
	//creats a new TimelineMax
	tl = new TimelineMax();
	//This does an animation of the object with the id success and the text with the id an1 at the same time.
	//the object with the id success will begin with the opacity 0 and rotate 1440 degrees over a time of 0.95seconds
	tl.appendMultiple([(TweenMax.from('#success', 0.95, {opacity:0, rotation:1440})), 
			//animats the text wirh the id an1 for 2seckonds from opacity 0, starts with a normal scale of 0 and it will bounce in.
			TweenMax.from('#an1', 2, {opacity:0, scale:0, ease:Bounce.easeOut})]);
	//animats the text with the id an2, the animation is for 2second and it start with 0 opacity rotats 360 degrees in the opesit direction and starts with a scale of 2 
	tl.append(TweenMax.from('#an2', 2, {opacity:0, rotation:-360, scale:2, }));
	//animats the text with the id an3, the animation is for 2seconds and it starts with 0 opacity, it starts with a scale of 4 and uses the SteppedEase.
	tl.append(TweenMax.from('#an3', 2, {opacity:0, scale:4, ease:SteppedEase.easeOut}));
	//makes all the selected ids fadeout under 2seconds to opacity 0, 5seconds after the animations above is done. When it is done it will call the function complete.
	tl.append(TweenMax.to('#an1, #an2, #an3, #success', 2, {opacity:0, delay:5, onComplete:complete}));
	//When the animations is done this function runs.
	function complete(){
		//an alert with the text all done ;) commes up.
		alert('all done ;)');
	}
	//When the buttom with the id play gets clicked it will run the tl.play() function.
	$('#play').click(function(){
		//will make it possible to play the animation if it has been paused.
		tl.play();
	});
	//When the buttom with the id pause gets clicked it will run the tl.pause() function.
	$('#pause').click(function(){
		//Will make it possible to pause the animation.
		tl.pause();
	});
	//When the buttom with the id reverse gets clicked it will run the tl.reverse() function.
	$('#reverse').click(function(){
		//will make it possible to reverse the animation. 
		tl.reverse();
	});
});