
</div>
	</div>

	<script> let server = "<?=URL?>";</script>
	<script src="<?=ASSETS_PATH?>js/jquery-production.js"></script>
	<script src="<?=JS_PATH?>libs/serialize.js"></script>
	<script src="<?=JS_PATH?>libs/validate.js"></script>
	<?php foreach($data['js_path'] as $key=>$value): ?>
	<script src="<?= $value; ?>"></script>
	<?php endforeach; ?>
	<script src="<?=JS_PATH?>main.js"></script>
</body>
</html>