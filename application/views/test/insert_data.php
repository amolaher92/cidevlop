<!--Section Start-->
<div class="container">
	<div class="row mt-5">
		<div class="col-md-6">
			<!--return meg if success or failure -->
			<?= $this->session->flashdata('msg') ?? '' ?>
			<form action="<?= base_url('home/signup') ?>"
				  method="post">
				<div class="form-group">
					<label for="name">User Name :</label>
					<input type="text"
						   class="form-control"
						   name="name"
						   id="name"
						   value="<?= set_value('name'); ?>"
						   aria-describedby="helpId"
						   placeholder="Enter your name" required>
					<small id="helpId" class="form-text text-muted">Enter your full name</small>
				</div>
				<div class="form-group">
					<label for="email">Email :</label>
					<input type="email"
						   class="form-control"
						   name="email"
						   id="email"
						   value="<?= set_value('email'); ?>"
						   aria-describedby="emailHelpId"
						   placeholder="Enter Your Email Here" required>
					<small id="emailHelpId" class="form-text text-muted">example@domain.com</small>
				</div>
				<div class="form-group">
					<label for="mobile">Mobile :</label>
					<input type="number"
						   class="form-control"
						   name="mobile"
						   id="mobile"
						   value="<?= set_value('mobile'); ?>"
						   aria-describedby="emailHelpId"
						   placeholder="Enter Your Mobile Here" required>
					<small id="emailHelpId" class="form-text text-muted">9874563210</small>
				</div>

				<button type="submit"
						name="submit"
						class="btn btn-lg btn-primary">Submit
				</button>
			</form>
		</div>
	</div>
</div>
<!--Section End-->
