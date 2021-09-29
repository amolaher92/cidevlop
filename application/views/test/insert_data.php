<!--Section Start-->
<div class="container">
	<div class="row mt-5">
		<div class="col-md-6">
			<!--return meg if success or failure -->
			<?= $this->session->flashdata('msg') ?? '' ?>
			<form action="<?= base_url('home/signup'); ?>"
				  method="post">
				<div class="form-group">
					<label for="user_name">User Name :</label>
					<input type="text"
						   class="form-control"
						   name="user_name"
						   id="user_name"
						   value="<?= set_value('user_name'); ?>"
						   aria-describedby="helpId"
						   placeholder="Enter your name" required>
					<small id="helpId" class="form-text text-muted">Enter your full name</small>
				</div>
				<div class="form-group">
					<label for="user_email">Email :</label>
					<input type="email"
						   class="form-control"
						   name="user_email"
						   id="user_email"
						   value="<?= set_value('user_email'); ?>"
						   aria-describedby="emailHelpId"
						   placeholder="Enter Your Email Here" required>
					<small id="emailHelpId" class="form-text text-muted">example@domain.com</small>
				</div>
				<button type="submit"
						name="submit"
						class="btn btn-lg btn-primary">Submit</button>
			</form>
		</div>
	</div>
</div>
<!--Section End-->
