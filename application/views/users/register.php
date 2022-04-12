<div class="container flex items-center justify-center mt-8 py-10">
	<div class="w-full md:w-1/2 xl:w-1/3">
		<div class="mx-5 md:mx-10">
			<h2 class="uppercase">Create Your Account</h2>
			<h4 class="uppercase">Let's Roll</h4>
		</div>

		<div class="mx-5 md:mx-10">
			<?php echo validation_errors() ?>
		</div>

		<?php echo form_open('users/register') ?>
			<div class="card mt-5 p-5 md:p-10">
				<div class="mb-5">
					<label class="label block mb-2" for="name">Name</label>
					<input id="name" type="text" name="name" class="form-control" placeholder="John Doe">
				</div>
				<div class="mb-5">
					<label class="label block mb-2" for="name">UserName</label>
					<input id="name" type="text" name="username" class="form-control" placeholder="John Doe">
				</div>
				<div class="mb-5">
					<label class="label block mb-2" for="email">Email</label>
					<input id="email" type="text" name="email" class="form-control" placeholder="example@example.com">
				</div>
				<div class="mb-5">
					<label class="label block mb-2" for="name">Phone</label>
					<input id="name" type="text" name="phone" class="form-control" placeholder="John Doe">
				</div>
				<div class="mb-5">
					<label class="label block mb-2" for="password">Password</label>
					<label class="form-control-addon-within">
						<input id="password" type="password" name="password" class="form-control border-none" value="12345">
						<span class="flex items-center ltr:pr-4 rtl:pl-4">
								<button type="button"
										class="btn btn-link la la-eye text-gray-300 dark:text-gray-700  text-xl leading-none"
										data-toggle="password-visibility"></button>
							</span>
					</label>
				</div>
				<div class="mb-5">
					<label class="label block mb-2" for="password">Confirm Password</label>
					<label class="form-control-addon-within">
						<input id="password" type="password" name="password2" class="form-control border-none" value="12345">
						<span class="flex items-center ltr:pr-4 rtl:pl-4">
								<button type="button"
										class="btn btn-link la la-eye text-gray-300 dark:text-gray-700  text-xl leading-none"
										data-toggle="password-visibility"></button>
							</span>
					</label>
				</div>
				<div class="mb-5">

				</div>
				<div class="flex">
					<button type="submit" class="btn btn_primary ltr:ml-auto rtl:mr-auto uppercase">Register</button>
				</div>
			</div>
		</form>
	</div>
</div>
