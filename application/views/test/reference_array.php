<!--start section-->
<div class="container">
	<h1>Data get in Array</h1>
	<div class="row mt-5">
		<div class="col-md-6">
			<table class="table table-striped table-bordered table-hover" id="myTable">
				<caption class="caption">Standard Query With Multiple Results (Array Version)</caption>
				<thead>
				<tr>
					<th>#</th>
					<th>User Name</th>
					<th>Email</th>
				</tr>
				</thead>
				<tbody>
				<?php
				/**
				 * @description Get data in object form
				 * @return array $users
				 * @var array $users associative array
				 */
				foreach ($users as $user) : ?>
					<tr>
						<td><?= $user['id'] ?></td>
						<td><?= $user['user_name'] ?></td>
						<td><?= $user['user_email'] ?></td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		</div>
		<div class="col-md-6">
			<p class="border p-2 bg-warning">This is single use name using Array : <strong
					class="font-italic"><?= $single['user_name'] ?></strong>
			</p>
		</div>
	</div>
</div>
<!--end section-->
<!--start section-->
<div class="container">
	<h1>Data get in Array</h1>
	<div class="row mt-5">
		<div class="col-md-8">
			<table class="table table-striped table-bordered table-hover" id="myTable">
				<caption class="caption">Query Builder With Multiple Results (Array Version)</caption>
				<thead>
				<tr>
					<th>#</th>
					<th>User Name</th>
					<th>Email</th>
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
						<td><?= $user['user_name'] ?></td>
						<td><?= $user['user_email'] ?></td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<!--end section-->
<!--start section-->
<div class="container">
	<div class="row mt-5">

	</div>
</div>}
<!--end section-->
<!--start section-->
<div class="container">
	<div class="row mt-5">

	</div>
</div>}
<!--end section-->
<!--start section-->
<div class="container">
	<div class="row mt-5">

	</div>
</div>}
<!--end section-->
<!--start section-->
<div class="container">
	<div class="row mt-5">

	</div>
</div>}
<!--end section-->
<!--start section-->
<div class="container">
	<div class="row mt-5">

	</div>
</div>}
<!--end section-->
<!--start section-->
<div class="container">
	<div class="row mt-5">

	</div>
</div>}
<!--end section-->
<!--start section-->
<div class="container">
	<div class="row mt-5">

	</div>
</div>}
<!--end section-->
<!--start section-->
<div class="container">
	<div class="row mt-5">

	</div>
</div>}
<!--end section-->
<!--start section-->
<div class="container">
	<div class="row mt-5">

	</div>
</div>}
<!--end section-->
<!--start section-->
<div class="container">
	<div class="row mt-5">

	</div>
</div>}
<!--end section-->
<!--start section-->
<div class="container">
	<div class="row mt-5">

	</div>
</div>}
<!--end section-->


