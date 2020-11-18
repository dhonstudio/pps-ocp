<div class="container">
	<img style="position:relative;top:90px;margin-bottom: 100px" src="<?= base_url('assets/img/logo.jpeg') ?>">
	<div style="background-color: Yellow; width: 600px; height: 220px;margin-bottom: 120px" class="pt-3">
		<div class="text-center">
			<h3 class="mx-auto" style="color:DarkBlue"><b>LOGIN</b></h3>
		</div>
		<div class="ml-5 mb-0"><?= $this->session->flashdata('message');?></div>
		<form method="post" action="<?= base_url()?>">

			<h6 class="ml-5" style="color:DarkBlue"><b>User Id:</b></h6>

			<input class="ml-5" type="text" id="username" name="username" placeholder="......................................" value="<?= set_value('username');?>" data-toggle="popover" data-html="true" data-placement="right" data-content="<?= form_error('username', '<div class=\'text-danger\'>', '</div>');?>" style="background: transparent;border:0px">

			<h6 class="ml-5 mt-2" style="color:DarkBlue"><b>Password:</b></h6>

			<input class="ml-5" type="password" id="password" name="password" placeholder="......................................" value="<?= set_value('password');?>" data-toggle="popover" data-html="true" data-placement="right" data-content="<?= form_error('password', '<div class=\'text-danger\'>', '</div>');?>" style="background: transparent;border:0px">

			<button type="submit" hidden class="btn btn-primary">
              Sign In
            </button>

            <div class="float-right mr-5">
              <a style="color:DarkBlue;" href="<?= base_url('auth/register')?>"><b>Create Account</b></a>
              <br>
              <a class="mt-3" style="color:DarkBlue" href="https://wa.me/6287700889913" target="_blank"><b>Contact Us</b></a>
            </div>

		</form>

		<img style="position:relative;top:50px;" src="<?= base_url('assets/img/foot.jpeg') ?>">
	</div>

	<div style="position:absolute;z-index:-1;right:0px;top:0px;">
		<img src="<?= base_url('assets/img/side-right.jpeg') ?>" height="650px">
	</div>
</div>