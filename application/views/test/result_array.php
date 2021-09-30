<!--start section-->
<div class="container">
	<h1>Data get in Array</h1>
	<div class="row mt-5">
		<div class="col-md-8">
			<table class="table table-striped table-bordered table-hover" id="myTable">
				<caption class="cpation">Query Builder With Multiple Results (Array Version)</caption>
				<thead>
				<tr>
					<th>#</th>
					<th>User Name</th>
					<th>Email</th>
					<th>Mobile</th>
				</tr>
				</thead>
				<tbody>
				<?php
				/**
				 * @description Get data in object form
				 * @return array $querybuilds
				 * @var array $users associative array
				 */
				foreach ($querybuilds as $user) : ?>
					<tr>
						<td><?= $user['id'] ?></td>
						<td><?= $user['name'] ?></td>
						<td><?= $user['email'] ?></td>
						<td><?= $user['mobile'] ?></td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		</div>
		<div class="col-md-4">
		</div>
	</div>
</div>
<!--end section-->

