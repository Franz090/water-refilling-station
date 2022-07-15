<div class="d-flex flex-column p-5 transactions-container">
	<h3 class="mb-5">LIST OF TRANSACTIONS</h3>
	<div class="d-flex justify-content-between mb-5 search-bar" id="wildcards">
		<div class="d-flex left-panel">
			<input type="text" name="keyword" class="form-control me-1 sort-key text-field" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Search by Customer Name...">
			<button type="button" class="btn" id="search-btn">Search</button>
		</div>

		<div class="d-flex right-panel">
			<select name="sort_status" id="" class="form-select me-1 sort-status sorting select-field" aria-label="Default select example">
				<option value="all">Show All</option>
				<option value="completed">List of Completed Orders</option>
				<option value="cancelled">List of Cancelled Orders</option>
			</select>

			<select name="sort_order" id="" class="form-select me-1 sort-order sorting select-field" aria-label="Default select example">
				<option value="ASC">Ascending order</option>
				<option value="DESC" selected>Descending order</option>
			</select>
			<select name="limit_per_page" id="" class="form-select me-1 sort-display sorting select-field" aria-label="Default select example">
				<option value="10">10 rows</option>
				<option value="20">20 rows</option>
				<option value="50">50 rows</option>
				<option value="100">100 rows</option>
			</select>
		</div>
	</div>

	<div class="table-panel d-flex" id="table-panel"></div>
</div>