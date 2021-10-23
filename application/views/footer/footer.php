</main>
<footer>
</footer>
<!--jQuery-->
<script src="<?= base_url('assets/lib/js/jquery.min.js'); ?>"></script>

<!--Popper-->
<script src="<?= base_url('assets/lib/js/popper.min.js'); ?>"></script>

<!--Bootstrap v4.6-->
<script src="<?= base_url('assets/lib/js/bootstrap.min.js'); ?>"></script>

<!--jQuery UI-->
<script src="<?= base_url('assets/lib/js/jquery-ui.min.js') ?>"></script>

<!-- owl-carousel min js  -->
<script src="<?= base_url('assets/lib/js/owl.carousel.min.js') ?>"></script>

<!--Pace master progressive -->
<script src="<?= base_url('assets/lib/js/pace.min.js') ?>"></script>

<!--Data Tables-->
<script src="<?= base_url('assets/lib/js/dataTables.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/lib/js/jquery.dataTables.js') ?>"></script>

<!--FontAwesome-->
<script src="<?= base_url('assets/lib/js/all.min.js') ?>"></script>
<script src="<?= base_url('assets/lib/js/ie7.js') ?>"></script>

<!--Chart-->
<script src="<?= base_url('assets/lib/js/chart.min.js') ?>"></script>

<!--Reveal-->
<script src="<?= base_url('assets/lib/js/reveal.js') ?>"></script>

<!--Custom JS-->
<script src="<?= base_url('assets/js/main.js') ?>"></script>
<script>
	$(document).ready(function () {
		$('a.refresh-captcha').on('click', function(){
			$.get('<?php print base_url().'online/refresh-captcha'; ?>', function(data) {
				$('p#captcha-img').html(data);
			});
		});
	});
</script>

</body>
</html>
