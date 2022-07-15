<div class="d-flex flex-column p-5 products-container">
	<div class="d-flex justify-content-between mb-5 search-bar">
		<h3>LIST OF PRODUCTS</h3>
	</div>

	<div class="table-panel panel1 d-flex flex-column">
		<?php
			$p_list = ($data == 'l_active') ? 'active' : '';
			$a_new = ($data == 'a_active') ? 'active' : '';
		?>
		<div class="d-flex tabs">
			<a href="<?=URL?>products/list" class="p-3 text-decoration-none <?=$p_list?>">Products</a>
			<a href="<?=URL?>products/add" class="p-3 text-decoration-none <?=$a_new?>">Add new <i class="fas fa-plus ms-2"></i></a>
		</div>
		<div class="d-flex flex-wrap pt-5" id="product-container">
		</div>
	</div>
</div>