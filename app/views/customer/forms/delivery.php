<div class="d-flex flex-column border p-3 mb-4" style="background: #eeeeee">
	<h6 style="font-weight: bold !important">DELIVERY DETAILS</h6>
	<div class="d-flex flex-column delivery-details">
		<label for="">Delivery Time</label>
		<input type="text" id="timepicker" name="deliveryTime" class="form-control c-pointer text-field required can-clear" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
	</div>
</div>

<script>
	$(document).ready(function(){
		$('#timepicker').timepicker({
		    timeFormat: 'hh:mm p',
		    interval: 60,
		    minTime: '8',
		    maxTime: '6:00pm',
		    defaultTime: '8',
		    startTime: '8:00',
		    dynamic: false,
		    dropdown: true,
		    scrollbar: true
		});
	})
</script>