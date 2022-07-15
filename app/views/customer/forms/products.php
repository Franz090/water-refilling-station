<div class="d-flex justify-content-between flex-wrap product-list">
	<?php foreach ($data as $value):?>
	<div class="d-flex flex-column mb-5 product" data-id="<?=$value['productID']?>" data-name="<?=$value['containerType']?>">
		<img src="<?=UPLOADS_PATH.$value['image']?>" alt="Container Type" class="mb-2 align-self-center">
		<span><b>Container Type:</b> <?=$value['containerType']?></span>
		<span><b>Product Price:</b> PHP <?=$value['price']?></span>
	</div>
	<?php endforeach; ?>
</div>