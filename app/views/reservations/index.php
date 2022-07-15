<div class="d-flex flex-column p-5 reservations-container">
	<h3 class="mb-5">LIST OF RESERVATIONS</h3>
	<div class="d-flex justify-content-between mb-5 search-bar" id="wildcards">
		<div class="d-flex left-panel">
			<input type="text" name="keyword" class="form-control me-1 sort-key text-field" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Search by Customer Name...">
			<button type="button" class="btn" id="search-btn">Search</button>
		</div>

		<div class="d-flex right-panel">
			<select name="sort_by" id="" class="form-select me-1 sort-by sorting select-field" aria-label="Default select example">
				<option value="p.containerType">Sort by Container Type</option>
				<option value="c.deliveryAddress">Sort by Delivery Address</option>
				<option value="r.deliveryDate">Sort by Delivery Date</option>
			</select>
			<select name="sort_order" id="" class="form-select me-1 sort-order sorting select-field" aria-label="Default select example">
				<option value="ASC">Ascending order</option>
				<option value="DESC" selected>Descending order</option>
			</select>
			<select name="limit_per_page" id="" class="form-select me-1 sorting sort-display select-field" aria-label="Default select example">
				<option value="10">10 rows</option>
				<option value="20">20 rows</option>
				<option value="50">50 rows</option>
				<option value="100">100 rows</option>
			</select>
		</div>
	</div>

	<div class="table-panel d-flex" id="table-panel"></div>
</div>