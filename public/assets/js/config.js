function base_url(){
    var base_url = window.location.origin;
    return base_url;
}

function get_curdate(){
	var today = new Date();
	var dd = today.getDate();
	var mm = today.getMonth()+1;
	var yyyy = today.getFullYear();

	if(dd<10) {
	    dd='0'+dd
	}

	if(mm<10) {
	    mm='0'+mm
	}

	today = dd+'/'+mm+'/'+yyyy;
	return today;
}

function get_ta(){

	var d = new Date();
	var currentYear = d.getFullYear();
	var nextYear = d.getFullYear()+1;

	return currentYear+'/'+nextYear;
}

function convertMysqlDateToHumanDate(date){

	var str   = date;
	var str   = str.split('-');
	var hasil = str[2]+'/'+str[1]+'/'+str[0];

	return hasil;
}
