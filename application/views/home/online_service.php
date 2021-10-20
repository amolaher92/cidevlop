<div class="container mt-5">
	<form action="" method="POST" enctype="multipart/form-data" class="row">
		<div class="col-md-3 p-3 border rounded shadow mx-auto" style="background-color:#CFEDFF;">
			<div class="form-group">
				<label for="did" class="label">Department</label>
				<select class="custom-select" name="did" id="did">
					<?php foreach ($departments as $department) : ?>
						<option value="<?= $department['did'] ?>"><?= $department['dname'] ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group">
				<label for="cid" class="label">Class</label>
				<select class="custom-select" name="cid" id="cid">
					<?php foreach ($classes as $class) : ?>
						<option value="<?= $class['cid'] ?>"><?= $class['cname'] ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group">
				<label for="sid" class="label">Service</label>
				<select class="custom-select" name="sid" id="sid">
					<?php foreach ($services as $service) : ?>
						<option value="<?= $service['sid'] ?>"><?= $service['stype'] ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group">
				<label for="fromDate">From Date</label>
				<input type="date"
					   class="form-control" name="fromDate" id="fromDate">
			</div>
			<div class="form-group">
				<label for="toDate">To Date</label>
				<input type="date"
					   class="form-control" name="toDate" id="toDate">
			</div>
			<button type="submit"  id="submit" class="btn btn-primary">View</button>
		</div>
		<div class="col-md-8 p-2 border rounded shadow" style="background-color:#CFEDFF;">
			<button onclick="refresh();" class="btn btn-primary">Refresh</button>
			<table class="table" id="meraTable">
				<thead>
				<tr>
					<th>#</th>
					<th>Department</th>
					<th>Class</th>
					<th>Service</th>
					<th>Name</th>
					<th>Email</th>
					<th>DOA</th>
				</tr>
				</thead>
				<tbody>

				</tbody>
			</table>
		</div>
	</form>
</div>
