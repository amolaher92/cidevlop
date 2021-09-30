<!--start section-->
<div class="container">
	<h1>Data get in Object</h1>
	<div class="row mt-5">
		<div class="col-lg-8">
			<table class="table table-striped table-bordered table-hover" id="myTable">
				<caption class="caption">Query Builder With Multiple Results (Object Version)</caption>
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
				 * @description Get data in object form query builder
				 * @return object $querybuilds
				 * @var object $users
				 */
				foreach ($querybuilds as $user) : ?>
					<tr>
						<td><?= $user->id ?></td>
						<td><?= $user->name ?></td>
						<td><?= $user->email ?></td>
						<td><?= $user->mobile ?></td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		</div>
		<div class="col-lg-4"></div>
	</div>
</div>
<!--end section-->

