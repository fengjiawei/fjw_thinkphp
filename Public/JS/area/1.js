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