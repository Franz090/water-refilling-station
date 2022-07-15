<div class="d-flex flex-column border p-3 mb-4" style="background: #eeeeee">
	<h6 style="font-weight: bold !important">RESERVATION DETAILS</h6>
	<div class="d-flex justify-content-between reservation-details">
		<div class="d-flex flex-column">
			<label for="">Delivery Date</label>
			<input type="text" id="datepicker" name="deliveryDate" class="form-control c-pointer text-field required can-clear" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="yyyy-mm-dd" style="background: white;">
		</div>
		<div class="d-flex flex-column">
			<label for="">Delivery Time</label>
			<input type="text" id="timepicker" name="deliveryTime" class="form-control c-pointer text-field required can-clear" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
		</div>
	</div>
</div>

<script>
	$(document).ready(function(){
		$('#datepicker').flatpickr();

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