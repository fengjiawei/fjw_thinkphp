function showLocation(province , city , town) {
	
	var loc	= new Location();
	var title	= ['省份' , '地级市' , '市、县、区'];
	$.each(title , function(k , v) {
		title[k]	= '<option value="">'+v+'</option>';
	})
	
	$('#loc_province').append(title[0]);
	$('#loc_city').append(title[1]);
	$('#loc_town').append(title[2]);
	
	
	$('#loc_province').change(function() {
		$('#loc_city').empty();
		$('#loc_city').append(title[1]);
		loc.fillOption('loc_city' , '0,'+$('#loc_province').val());
		$('#loc_town').empty();
		$('#loc_town').append(title[2]);
		//$('input[@name=location_id]').val($(this).val());
	})
	
	$('#loc_city').change(function() {
		$('#loc_town').empty();
		$('#loc_town').append(title[2]);
		loc.fillOption('loc_town' , '0,' + $('#loc_province').val() + ',' + $('#loc_city').val());
		//$('input[@name=location_id]').val($(this).val());
	})
	
	$('#loc_town').change(function() {
		$('input[name=location_id]').val($(this).val());
	})
	
	if (province) {
		loc.fillOption('loc_province' , '0' , province);
		
		if (city) {
			loc.fillOption('loc_city' , '0,'+province , city);
			
			if (town) {
				loc.fillOption('loc_town' , '0,'+province+','+city , town);
			}
		}
		
	} else {
		loc.fillOption('loc_province' , '0');
	}
		
}

function showLocation1(province , city , town) {

	var loc	= new Location();
	var title	= ['省份' , '地级市' , '市、县、区'];
	$.each(title , function(k , v) {
		title[k]	= '<option value="">'+v+'</option>';
	})

	$('#loc_province1').append(title[0]);
	$('#loc_city1').append(title[1]);
	$('#loc_town1').append(title[2]);


	$('#loc_province1').change(function() {
		$('#loc_city1').empty();
		$('#loc_city1').append(title[1]);
		loc.fillOption('loc_city1' , '0,'+$('#loc_province1').val());
		$('#loc_town1').empty();
		$('#loc_town1').append(title[2]);
		//$('input[@name=location_id]').val($(this).val());
	})

	$('#loc_city1').change(function() {
		$('#loc_town1').empty();
		$('#loc_town1').append(title[2]);
		loc.fillOption('loc_town1' , '0,' + $('#loc_province1').val() + ',' + $('#loc_city1').val());
		//$('input[@name=location_id]').val($(this).val());
	})

	$('#loc_town1').change(function() {
		$('input[name=location_id]').val($(this).val());
	})

	if (province) {
		loc.fillOption('loc_province1' , '0' , province);

		if (city) {
			loc.fillOption('loc_city1' , '0,'+province , city);

			if (town) {
				loc.fillOption('loc_town1' , '0,'+province+','+city , town);
			}
		}

	} else {
		loc.fillOption('loc_province1' , '0');
	}

}
function showLocation3(province , city , town) {

	var loc	= new Location();
	var title	= ['省份' , '地级市' , '市、县、区'];
	$.each(title , function(k , v) {
		title[k]	= '<option value="">'+v+'</option>';
	})

	$('#loc_province3').append(title[0]);
	$('#loc_city3').append(title[1]);
	$('#loc_town3').append(title[2]);


	$('#loc_province3').change(function() {
		$('#loc_city3').empty();
		$('#loc_city3').append(title[1]);
		loc.fillOption('loc_city3' , '0,'+$('#loc_province3').val());
		$('#loc_town3').empty();
		$('#loc_town3').append(title[2]);
		//$('input[@name=location_id]').val($(this).val());
	})

	$('#loc_city3').change(function() {
		$('#loc_town3').empty();
		$('#loc_town3').append(title[2]);
		loc.fillOption('loc_town3' , '0,' + $('#loc_province3').val() + ',' + $('#loc_city3').val());
		//$('input[@name=location_id]').val($(this).val());
	})

	$('#loc_town3').change(function() {
		$('input[name=location_id]').val($(this).val());
	})

	if (province) {
		loc.fillOption('loc_province3' , '0' , province);

		if (city) {
			loc.fillOption('loc_city3' , '0,'+province , city);

			if (town) {
				loc.fillOption('loc_town3' , '0,'+province+','+city , town);
			}
		}

	} else {
		loc.fillOption('loc_province3' , '0');
	}

}

function showLocation4(province , city , town) {

	var loc	= new Location();
	var title	= ['省份' , '地级市' , '市、县、区'];
	$.each(title , function(k , v) {
		title[k]	= '<option value="">'+v+'</option>';
	})

	$('#loc_province4').append(title[0]);
	$('#loc_city4').append(title[1]);
	$('#loc_town4').append(title[2]);


	$('#loc_province4').change(function() {
		$('#loc_city4').empty();
		$('#loc_city4').append(title[1]);
		loc.fillOption('loc_city4' , '0,'+$('#loc_province4').val());
		$('#loc_town4').empty();
		$('#loc_town4').append(title[2]);
		//$('input[@name=location_id]').val($(this).val());
	})

	$('#loc_city4').change(function() {
		$('#loc_town4').empty();
		$('#loc_town4').append(title[2]);
		loc.fillOption('loc_town4' , '0,' + $('#loc_province4').val() + ',' + $('#loc_city4').val());
		//$('input[@name=location_id]').val($(this).val());
	})

	$('#loc_town4').change(function() {
		$('input[name=location_id]').val($(this).val());
	})

	if (province) {
		loc.fillOption('loc_province4' , '0' , province);

		if (city) {
			loc.fillOption('loc_city4' , '0,'+province , city);

			if (town) {
				loc.fillOption('loc_town4' , '0,'+province+','+city , town);
			}
		}

	} else {
		loc.fillOption('loc_province4' , '0');
	}

}