<div class="d-flex flex-column p-5 products-container">
	<div class="d-flex justify-content-between mb-5 search-bar">
		<h3>NEW PRODUCT</h3>
	</div>

	<div class="table-panel panel2 d-flex flex-column">
		<?php
			$p_list = ($data == 'l_active') ? 'active' : '';
			$a_new = ($data == 'a_active') ? 'active' : '';
		?>
		<div class="d-flex tabs">
			<a href="<?=URL?>products/list" class="p-3 text-decoration-none <?=$p_list?>">Products</a>
			<a href="<?=URL?>products/add" class="p-3 text-decoration-none <?=$a_new?>">Add new <i class="fas fa-plus ms-2"></i></a>
		</div>
		<div class="d-flex justify-content-between p-5 content">

			<form class="d-flex flex-column pt-4 left-panel me-5" id="add-product-form">
				<div class="d-flex align-items-center mb-3">
					<label>Container Type</label>
					<input type="text" name="container_type" class="form-control me-1 text-field required can-clear" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Ex. 3 Gallons Container">
				</div>
				<div class="d-flex align-items-center mb-3">
					<label>Price</label>
					<input type="text" name="price" class="form-control me-1 text-field required can-clear" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="PHP 00.00">
				</div>
				<div class="d-flex align-items-center mb-3">
					<label>Upload Image</label>
					<input type="file" name="image" class="form-control me-1 text-field required can-clear" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
				</div>

				<button class="btn mt-5 align-self-end" id="add-new-product">Submit</button>
			</form>

		<!-- 	<div class="d-flex flex-column pt-4 right-panel">
				<div class="image-preview d-flex align-self-end align-items-center justify-content-center mb-5">
					<h4>IMAGE PREVIEW</h4>
				</div>
				<button class="btn mt-5 align-self-end">Submit</button>
			</div> -->
		</div>
	</div>
</div>