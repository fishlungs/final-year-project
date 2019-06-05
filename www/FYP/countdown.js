document.getElementById('timer').innerHTML = 10 + ":" + 00;
startTimer();

function startTimer() {
	var presentTime = document.getElementById('timer').innerHTML;
	var timeArray = presentTime.split(/[:]+/);
	var min = timeArray[0];
	var s = checkSecond((timeArray[1] - 1));
	if(s==59){min=min-1}
	
	document.getElementById('timer').innerHTML = min + ":" + s;
	setTimeout(startTimer, 1000);
}

function checkSecond(sec) {
	if(sec < 10 && sec >=0) {sec = "0" + sec};
	if(sec < 0) {sec = "59"};
	return sec;
}



