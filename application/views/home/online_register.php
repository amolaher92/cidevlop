<div class="container">
	<?= $this->session->flashdata('msg') ?>
	<form method="post" action="<?= base_url('home/register') ?>"
	<div class="row mt-5 border rounded shadow">
		<div class="col-md-4 p-3">
			<div class="form-group">
				<label for="firstName"></label>
				<input type="text"
					   class="form-control"
					   name="firstName"
					   id="firstName"
					   value="<?= set_value('firstName') ?>"
					   placeholder="First Name" required>
			</div>
			<div class="form-group">
				<label for="middleName"></label>
				<input type="text"
					   class="form-control"
					   name="middleName"
					   id="middleName"
					   value="<?= set_value('middleName') ?>"
					   placeholder="Middle Name" required>
			</div>
			<div class="form-group">
				<label for="lastName"></label>
				<input type="text"
					   class="form-control"
					   name="lastName"
					   id="lastName"
					   value="<?= set_value('lastName') ?>"
					   placeholder="Last Name" required>
			</div>
		</div>
		<div class="col-md-4 p-3">
			<div class="form-group">
				<label for="mobile"></label>
				<input type="tel"
					   class="form-control"
					   name="mobile"
					   id="mobile"
					   value="<?= set_value('mobile') ?>"
					   placeholder="Mobile" maxlength="10" minlength="10" required>
			</div>
			<div class="form-group">
				<label for="email"></label>
				<input type="email"
					   class="form-control"
					   name="email"
					   id="email"
					   value="<?= set_value('email') ?>"
					   placeholder="Email" required>
			</div>
			<div class="form-group row">
				<label for="captcha"
					   class="col-sm-4 col-form-label text-black control-label">Captcha</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" name="captcha" id="captcha" required/>
					<?php echo form_error('captcha'); ?>
					<br>
					<p id="captcha-img"><?php echo $captchaImg; ?></p>
					<p>Can't read the image? click <a href="javascript:void(0);" class="refresh-captcha">
							<span class="link-indigo">here</span></a>
						to refresh.</p>
				</div>
			</div>
			<div class="form-group">
				<button class="btn btn-primary form-control mt-4">Submit</button>
			</div>
		</div>
	</div>
	</form>
</div>
<div class="container my-5">
	<div class="row">
		<div class="col-md-12 border rounded shadow">
			<table class="table table-striped table-bordered" id="userTable">
				<thead class="thead-dark">
				<tr>
					<th>id</th>
					<th>First Name</th>
					<th>Middle Name</th>
					<th>Last Name</th>
					<th>Mobile</th>
					<th>Email</th>
					<th>DOP</th>
				</tr>
				</thead>
			</table>
		</div>
	</div>
</div>
