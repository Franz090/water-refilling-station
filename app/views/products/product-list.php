

<?php foreach($data as $value): ?>

	<div class="d-flex list me-3 mb-5">
		<img src="<?=UPLOADS_PATH.$value['image']?>" alt="" class="me-3">
		<div class="d-flex flex-column">
			<span class="mt-3 mb-2">Container type: <?=$value['containerType']?></span>
			<span class="mb-3">Price: Php <?=$value['price']?></span>
			<div class="d-flex">
				<button class="btn btn2 remove-product" value="<?=$value['productID']?>">Remove</button>
			</div>
		</div>
	</div>

<?php endforeach; ?>