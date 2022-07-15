
	<footer class="d-flex flex-wrap">
		<div class="d-flex flex-column f-panel pr-media mb-media">
			<h3 class="text-uppercase text-light mb-3">Contact us</h3>
			<span class="text-lighter mb-1"><i class="fa fa-envelope text-lighter me-2"></i> djkwatercavinti@gmail.com</span>
			<span class="text-lighter mb-1"><i class="fa fa-phone text-lighter me-2"></i>(0951) 452-3455</span>
			<span class="text-lighter"><i class="fa fa-phone text-lighter me-2"></i>(0936) 345-3825</span>
		</div>
		<div class="d-flex flex-column f-panel pr-media mb-media">
			<h3 class="text-uppercase text-light mb-3">Address</h3>
			<span class="text-lighter"><i class="fa fa-map-marker text-lighter me-2"></i>Lual Street, Cavinti, Laguna</span>
		</div>
		<div class="d-flex flex-column f-panel pr-media">
			<h3 class="text-uppercase text-light mb-3">Opening Hours</h3>
			<span class="text-lighter mb-1">Mon - Fri: 8am - 5pm</span>
			<span class="text-lighter mb-1">Sat - Sun: 9am - 6pm</span>
		</div>
		<div class="d-flex flex-column f-panel">
			<h3 class="text-uppercase text-light mb-3">Follow us</h3>
			<div class="d-flex">
				<i class="fab fa-facebook-square text-lighter me-3 social-media"></i>
				<i class="fab fa-instagram text-lighter me-3 social-media"></i>
				<i class="fab fa-twitter text-lighter me-3 social-media"></i>
			</div>
		</div>
	</footer>

	<script> let server = "<?=URL?>";</script>
	<script src="<?=ASSETS_PATH?>js/jquery-production.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
	<script src="<?=JS_PATH?>libs/serialize.js"></script>
	<script src="<?=JS_PATH?>libs/validate.js"></script>
	<?php foreach($data['js_path'] as $key=>$value): ?>
	<script src="<?= $value; ?>"></script>
	<?php endforeach; ?>
	<script src="<?=JS_PATH?>main.js"></script>

</body>
</html>