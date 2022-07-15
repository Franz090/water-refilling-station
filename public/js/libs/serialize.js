let Serialize = {
  	form: (container) => {
    	let parameter = new Object();

	    $("input, select, label, textarea, div", $(container)).each(function() {
	    	if ($(this).hasClass('text-field') || $(this).hasClass('select-field'))
	    	{
	    		if (!Validate.isEmpty($(this).val()))
		    		parameter[$(this).attr('name')] = $(this).val().trim();
	    		else if (!Validate.isEmpty($(this).text()))
		    		parameter[$(this).attr('name')] = $(this).text().trim();
		    }
	    	else if ($(this).hasClass('check-field'))
	    	{
	    		if ($(this).is(':checked'))
		    		parameter[$(this).attr('name')] = $(this).val();
	    	}
	    });
	    return parameter;
  	},
  	removeprop: (container) => {
    	$("input, select, label, textarea, div", $(container)).each(function() {
	    	if ($(this).hasClass('editable'))
	    	{
	    		$(this).prop("readonly", false);
	    		$(this).prop("disabled", false);

	    		if($(this).hasClass('text-field'))
	    			$(this).css('background', '#e6e6e6');
	    		else if($(this).hasClass('select-field'))
	    			$(this).addClass('select');
		    }
	    });
  	}
};
