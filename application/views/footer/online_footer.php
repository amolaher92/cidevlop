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
		$('#submit').click(function(e) {
			e.preventDefault();
			let did = $('#did').val();
			let cid = $('#cid').val();
			let sid = $('#sid').val();

			$('#meraTable').DataTable({
				"destroy": true,
				"processing": true,
				"dom": 'frtilp',
				"lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
				"scrollX": true,
				"ajax": {
					url: "<?= base_url('online/applicationsGet');?>",
					type: "POST",
					data: {did: did, cid: cid, sid: sid}
				},
				'language': {
					'emptyTable': 'No found',
					'processing': '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'
				}
			});
		})
	});
</script>

</body>
</html>
