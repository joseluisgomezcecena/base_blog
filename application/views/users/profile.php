<!-- Breadcrumb -->

<section class="breadcrumb">
	<h1><?= $title ?></h1>
	<ul>
		<li><a href="#">Pages</a></li>
		<li class="divider la la-arrow-right"></li>
		<li><a href="#">Blog</a></li>
		<li class="divider la la-arrow-right"></li>
		<li>Add Post</li>
	</ul>
</section>

<div class="mb-2">
	<?php echo validation_errors(); ?>
</div>

<?php echo form_open_multipart('posts/create')?>

<div class="grid lg:grid-cols-4 gap-5">

	<!-- Content -->

	<div class="flex flex-col gap-y-5 lg:col-span-2 xl:col-span-1">

		<!-- Featured Image -->
		<div class="card p-5">
			<h3>Profile Picture</h3>
			<img class="image" src="" alt="">
			<input class="block
				w-full
				px-3
				py-1.5
				text-base
				font-normal
				text-gray-700
				bg-white bg-clip-padding
				border border-solid border-gray-300
				rounded
				transition
				ease-in-out
				m-0
				focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none rounded uppercase"
				   type="file" name="userfile" size="20">
		</div>
	</div>



	<div class="lg:col-span-2 xl:col-span-3">
		<div class="card p-5">





			<div class="row form_field_outer_row">
				<div class="grid lg:grid-cols-4 gap-5">

					<div class="lg:col-span-1 xl:col-span-1">
						<label for="ice-cream-choice">Name:</label>
						<input type="text" class="form-control w_90" name="name" id="" placeholder="Your name." />
					</div>

					<div class="lg:col-span-1 xl:col-span-1">
						<label for="ice-cream-choice">UserName:</label>
						<input type="text" class="form-control w_90" name="username" id="" placeholder="This will be displayed to other users." />
					</div>

					<div class="lg:col-span-1 xl:col-span-1">
						<label for="ice-cream-choice">Email:</label>
						<input type="text" class="form-control w_90" name="username" id="" placeholder="Email is wont be displayed to other users." />
					</div>


					<div class="lg:col-span-1 xl:col-span-1">
						<label for="ice-cream-choice">Phone:</label>
						<input type="text" class="form-control w_90" name="phone" id="" placeholder="Phone is wont be displayed to other users." />
					</div>


					<div class="lg:col-span-2 xl:col-span-2">
						<label for="ice-cream-choice">Password:</label>
						<label class="form-control-addon-within">
							<input id="password" type="password" name="password" class="form-control border-none" value="12345">
							<span class="flex items-center ltr:pr-4 rtl:pl-4">
                            <button type="button"
									class="btn btn-link text-gray-300 dark:text-gray-700 la la-eye text-xl leading-none"
									data-toggle="password-visibility"></button>
                        </span>
						</label>
					</div>


					<div class="lg:col-span-2 xl:col-span-2">
						<label for="ice-cream-choice">Password Confirm:</label>
						<label class="form-control-addon-within">
							<input id="password" type="password" name="password" class="form-control border-none" value="12345">
							<span class="flex items-center ltr:pr-4 rtl:pl-4">
                            <button type="button"
									class="btn btn-link text-gray-300 dark:text-gray-700 la la-eye text-xl leading-none"
									data-toggle="password-visibility"></button>
                        </span>
						</label>
					</div>



				</div>









			<div class="mb-5">
				<label class="label block mb-2" for="content">Bio</label>
				<textarea id="content" name="body" class="form-control" rows="16"></textarea>
			</div>
			<!--
			<div class="xl:w-1/2">
				<label class="label block mb-2" for="excerpt">Excerpt</label>
				<textarea id="excerpt" class="form-control" rows="8"></textarea>
			</div>
			-->
		</div>
	</div>
	</div>
</form>
