    <footer class="footer bg-white mt-5 mb-3">
      <div class="container">
        <div class="text-center">
          <span class="text-muted">Copyright &copy; Dhon Studio <?= date('Y')?></span>
        </div>
      </div>
    </footer>

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="logoutModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Sign Out" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-danger logout" href="<?= base_url('auth/logout')?>">Sign Out</a>
          </div>
        </div>
      </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <script>
      setTimeout(function() {
        $('.alert-success').fadeOut('fast');
      }, 2000);

      function page_load(page) {
        const e = this

        $('[data-toggle=popover]').each(function () {
          if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
            $(this).popover('hide');
          }
        });

        $.ajax({
          url: '<?= base_url('ajax/ajax_page/')?>' + page,
          type: 'get',
          dataType: 'json',
          success: function(data) {
            $('.subbody').html(data.subbody);

            $("input, select, textarea").on('click', function(){
              
            });

            $("select").on('change', function(){
              if ($(this).val() != '') $(this).popover('hide');
              else $(this).popover('show');
            });

            $("input, textarea").on('keyup', function(){
              if ($(this).val() != '') $(this).popover('hide');
              else $(this).popover('show');
            });
          }
        });
      }
    </script>