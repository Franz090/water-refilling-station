	
	<?php require_once 'nav.php'; ?>

	<div class="d-flex flex-column" id="create-order">
		<form id="order-form" class="d-flex flex-column p-5 border">
			<h2 class="text-center fw-bold mb-5">ORDER FORM</h2>
			<div class="d-flex justify-content-between mb-2 align-items-center main-details">
				<label for="" class="fw-bold lw-30">Name</label>
				<input name="name" type="text" class="form-control me-1 iw-70 text-field required" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="<?=$_SESSION['account_info']['fullname']?>" readonly style="background-color: white !important">
			</div>
			<div class="d-flex justify-content-between mb-3 align-items-center main-details">
				<label for="" class="fw-bold lw-30">Phone number</label>
				<input name="phone_number" type="text" class="form-control me-1 iw-70 text-field required can-clear" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
			</div>
			<label for="" class="fw-bold mb-2">Delivery Address</label>
			<div class="d-flex justify-content-between address-panel">
				<div class="d-flex flex-column mb-2 dw-50 pe-1">
					<label for="" class="mb-1 l-14">Region</label>
					<input name="region" type="text" class="form-control me-1 text-field required" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="REGION IV-A (CALABARZON)" readonly style="background-color: white !important">
				</div>
				<div class="d-flex flex-column mb-2 dw-50 ps-1">
					<label for="" class="mb-1 l-14">Province</label>
					<input name="province" type="text" class="form-control me-1 text-field required" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="Laguna" readonly style="background-color: white !important">
				</div>
			</div>
			<div class="d-flex justify-content-between address-panel">
				<div class="d-flex flex-column mb-2 dw-50 pe-1">
					<label for="" class="mb-1 l-14">City</label>
					<input name="city" type="text" class="form-control me-1 text-field required" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="Cavinti" readonly style="background-color: white !important">
				</div>
				<div class="d-flex flex-column mb-2 dw-50 ps-1">
					<label for="" class="mb-1 l-14">Barangay</label>
					<select name="barangay" class="form-select select-field me-1 required" aria-label="Default select example">
						<option default>--Select Barangay--</option>
						<option value="Anglas">Anglas</option>
						<option value="Bangco">Bangco</option>
						<option value="Bukal">Bukal</option>
						<option value="Bulajo">Bulajo</option>
						<option value="Cansuso">Cansuso</option>
						<option value="Duhat">Duhat</option>
						<option value="Inao-Awan">Inao-Awan</option>
						<option value="Kanluran Talaongan">Kanluran Talaongan</option>
						<option value="Labayo">Labayo</option>
						<option value="Layasin">Layasin</option>
						<option value="Layug">Layug</option>
						<option value="Mahipon">Mahipon</option>
						<option value="Paowin">Paowin</option>
						<option value="Poblacion">Poblacion</option>
						<option value="Silangan Talaongan">Silangan Talaongan</option>
						<option value="Sisilmin">Sisilmin</option>
						<option value="Sumucab">Sumucab</option>
						<option value="Tibatib">Tibatib</option>
						<option value="Udia">Udia</option>
					</select>
				</div>
			</div>
			<div class="d-flex flex-column mb-2">
				<label for="" class="mb-1 l-14">Detailed Address</label>
				<div class="form-floating">
				  	<textarea name="detailed_address" class="form-control ltex text-field required can-clear" placeholder="Unit number, house number, building, street name" id="floatingTextarea2" style="height: 100px"></textarea>
				  	<label for="floatingTextarea2" class="ltex l-14">Unit number, house number, building, street name</label>
				</div>
			</div>
			<label for="" class="mb-1 fw-bold">Order Details</label>
			<input type="hidden" id="product-id" name="productID" class="text-field required can-clear clear-order-val">
			<div class="d-flex justify-content-between align-items-center mb-2">
				<div class="d-flex flex-column dw-73">
					<label for="" class="mb-1 l-14 mb-1">Container Type</label>
					<input name="container_type" type="text" class="form-control me-1 l-14 fst-italic c-pointer text-field required can-clear clear-order-val" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="--Choose container--" data-bs-toggle="modal" data-bs-target="#staticBackdrop" id="container-type">
				</div>
				<div class="d-flex flex-column dw-20">
					<label for="" class="mb-1 l-14 mb-1">Quantity</label>
					<input name="quantity" type="text" value="1" class="form-control me-1 text-field required" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
				</div>
			</div>
			<div class="d-flex flex-column">
				<label for="" class="mb-1 l-14">Order Type</label>
				<div class="d-flex mb-2">
					<div class="form-check me-3">
					  	<input class="form-check-input c-pointer check-field required default-option" type="radio" name="order_type" id="flexRadioDefault1" value="for_delivery" checked>
					  	<label class="form-check-label l-14 c-pointer" for="flexRadioDefault1">
					    	For Delivery
					  	</label>
					</div>
					<div class="form-check">
					  	<input class="form-check-input c-pointer check-field required" type="radio" name="order_type" id="flexRadioDefault2" value="for_reservation">
					  	<label class="form-check-label l-14 c-pointer" for="flexRadioDefault2">
					    	For Reservation
					  	</label>
					</div>
				</div>
				<div class="" id="other-details"></div>
			</div>
			<div id="loading-form" class="d-flex justify-content-center"></div>
			<button class="btn" id="submit-order">Submit Order</button>
		</form>
	</div>

	<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="staticBackdropLabel">Product List</h5>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>
	      <div class="modal-body" id="modal-body"></div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
	        <button type="button" class="btn c-btn-primary confirm-product-btn">Confirm</button>
	      </div>
	    </div>
	  </div>
	</div>
