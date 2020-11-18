<div class="container">

  <div class="row justify-content-center">

    <div class="col-lg-7">

      <div class="card o-hidden border-0 my-5">
        <div class="card-body p-0">

          <div class="row">
            <div class="col"></div>

            <div id="form-login" class="col-6">
              <div class="p-0">

                <div class="text-center mb-4">
                  <img src="<?= base_url('assets/img');?>" width="150" alt="Logo">
                  <div>ONLINE CRITICAL PAPER</div>
                  <div><small>SIGN UP</small></div>
                </div>

                <?= $this->session->flashdata('message');?>

                <form method="post" action="<?= base_url('auth/register')?>">
                  <div class="form-group">
                    <input type="text" class="form-control" id="username" name="username" placeholder="NIP" value="<?= set_value('username');?>" data-toggle="popover" data-html="true" data-placement="right" data-content="<?= form_error('username', '<div class=\'text-danger\'>', '</div>');?>">
                  </div>

                  <div class="form-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="<?= set_value('password');?>" data-toggle="popover" data-html="true" data-placement="right" data-content="<?= form_error('password', '<div class=\'text-danger\'>', '</div>');?>">
                  </div>

                  <div class="form-group">
                    <input type="password" class="form-control" id="password2" name="password2" placeholder="Ulangi Password" value="<?= set_value('password2');?>" data-toggle="popover" data-html="true" data-placement="right" data-content="<?= form_error('password2', '<div class=\'text-danger\'>', '</div>');?>">
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">
                      Sign Up
                    </button>
                  </div>
                </form>
                  
                <hr>

                <div class="text-center">
                  <a class="small register" href="<?= base_url('auth')?>">Sign In</a>
                </div>

                <div class="text-center mb-4">
                  <a class="small" href="https://wa.me/6287700889913">Contact Us</a>
                </div>

              </div>
            </div>

            <div class="col"></div>
          </div>

        </div>
      </div>

    </div>

  </div>
</div>

</div>
</div>