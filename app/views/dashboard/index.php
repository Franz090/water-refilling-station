<div class="d-flex p-4 dashboard-container">
	<div class="d-flex flex-column pe-5 left-panel">
		<div class="d-flex justify-content-between">
			<div class="d-flex flex-column charts chart1">
				<label class="mb-4">Product sales comparison for this month</label>
				<div id="piechart_3d"></div>
			</div>

			<div class="d-flex flex-column charts chart2">
				<label class="mb-4">Product sales comparison for the past 5 months</label>
				<div id="top_x_div"></div>
			</div>
		</div>

		<h4>SCHEDULES TODAY</h4>
		<div class="table-panel d-flex" id="table-panel"></div>
	</div>

	<div class="d-flex flex-column right-panel">
		<div class="deliveries-status mb-4">
			<h4>DELIVERIES</h4>
			<div class="d-flex justify-content-between border mb-2 counts p-3 align-items-center">
				<div class="d-flex flex-column">
					<span class="mb-2">Pending</span>
					<i class="far fa-clipboard me-2"></i>
				</div>
				<span class="align-self-center" id="d-pending">0</span>
			</div>
			<div class="d-flex justify-content-between border mb-2 counts p-3 align-items-center">
				<div class="d-flex flex-column">
					<span class="mb-2">On Process</span>
					<i class="fas fa-truck-moving"></i>
				</div>
				<span class="align-self-center" id="d-on-process">0</span>
			</div>
			<div class="d-flex justify-content-between border mb-2 counts p-3 align-items-center">
				<div class="d-flex flex-column">
					<span class="mb-2">Completed</span>
					<i class="far fa-list-alt"></i>
				</div>
				<span class="align-self-center" id="d-completed">0</span>
			</div>
		</div>
		<div class="deliveries-status mb-4">
			<h4>RESERVATIONS</h4>
			<div class="d-flex justify-content-between border mb-2 counts p-3 align-items-center">
				<div class="d-flex flex-column">
					<span class="mb-2">Pending</span>
					<i class="far fa-clipboard me-2"></i>
				</div>
				<span class="align-self-center" id="r-pending">0</span>
			</div>
			<div class="d-flex justify-content-between border mb-2 counts p-3 align-items-center">
				<div class="d-flex flex-column">
					<span class="mb-2">On Process</span>
					<i class="fas fa-truck-moving"></i>
				</div>
				<span class="align-self-center" id="r-on-process">0</span>
			</div>
			<div class="d-flex justify-content-between border mb-2 counts p-3 align-items-center">
				<div class="d-flex flex-column">
					<span class="mb-2">Completed</span>
					<i class="far fa-list-alt"></i>
				</div>
				<span class="align-self-center" id="r-completed">0</span>
			</div>
		</div>
	</div>
</div>