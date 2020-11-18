    <footer class="footer bg-transparent mt-5 mb-3">
      <div class="container">
        <div class="text-center">
          <span class="text-white">Copyright &copy; Dhon Studio <?= date('Y')?></span>
        </div>
      </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <script>
      setTimeout(function() {
	    $('.text-success').fadeOut('fast');
	  }, 2000);

      window.onload = function() {
        $('[value=""]:first').focus()
        $('[data-toggle="popover"]').popover('show')
      }

      $("input").on('keyup', function(){
	    if ($(this).val() != '') $(this).popover('hide');
	    else $(this).popover('show');
	  });
    </script>