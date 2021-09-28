<!--start section-->
<div class="container">
	<h1>Data get in Object</h1>
	<div class="row mt-5">
		<div class="col-md-6">
			<table class="table table-striped table-bordered" id="myTable">
				<thead>
				<tr>
					<th>#</th>
					<th>User Name</th>
					<th>Email</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach($users as $user) : ?>
				<tr>
					<td><?= $user->id ?></td>
					<td><?= $user->user_name ?></td>
					<td><?= $user->user_email ?></td>
				</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<!--end section-->

