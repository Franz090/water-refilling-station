let Validate = {
  	fields: (container) => {
    	let i_required= $(`${container} .required`);
	 	let is_empty = false;
	 	let array_empty = Array();

	 	$.each(i_required, function(){
	 		let curr_i = $(this);

	 		if( curr_i.val() == '' ||
	 			curr_i.val() == '--Select Region--' ||
	 			curr_i.val() == '--Select Province--' ||
	 			curr_i.val() == '--Select City--' ||
	 			curr_i.val() == '--Select Barangay--' ||
	 			curr_i.val() == '--Choose container--'){
	 			is_empty = true;
	 			array_empty.push(curr_i);
				curr_i.addClass("empty-fields");
	 		}else{
				is_empty = false;
	 			array_empty.push(curr_i);
	 			curr_i.removeClass("empty-fields");
			}
	 	});
  	},
  	clearFields: (container) => {
    	$("input, select, label, textarea, div, table", $(container)).each(function() {
	    	if ($(this).hasClass('can-clear'))
	    	{
	    		if ($(this).hasClass('check-field'))
	    			if ($(this).hasClass('default-option'))
	    			{
	    				$(this).prop('checked', true);
	    				return;
	    			}

			    if ($(this).is('input') || $(this).is('textarea'))
			        $(this).val('');
				else if ($(this).is('label') || $(this).is('div'))
			        $(this).text('');
				else if ($(this).is('select'))
					$(this).val($(this).find('.default-option').val());
				else if ($(this).is('table'))
					$(this).html('');

			    if ($(this).hasClass('required'))
			        $(this).removeClass('empty-fields');
	    	}
	    });
  	},
  	isEmpty: (value) => {
    	return (value === undefined || value == null) ? true : false;
  	},
  	notFocus: () => {
  		$('input,select,textarea').blur(function(){
			let curr_el = $(this);
			if(curr_el.val() != ''){
				curr_el.removeClass("empty-fields");
			}
		});
  	}
};
