<script>
  function lainnya() {
    const sumber_isu = $('#sumber_isu').val()

    if (sumber_isu == '99') {
      document.getElementById('lainnya').hidden = false;
      $('#lainnya_val').focus()
    } else {
      document.getElementById('lainnya').hidden = true;
    }
  }

  function simpan() {
    var jenis = $('#jenis').val()
    var pokok = $('#pokok').val()
    var sumber_isu = $('#sumber_isu').val()
    var lainnya = $('#lainnya_val').val()
    var kantor = $('#kantor').val()
    var latar = $('#latar').val()
    var dasar = $('#dasar').val()
    var uraian = $('#uraian').val()
    var analisis = $('#analisis').val()
    var dampak = $('#dampak').val()
    var usulan = $('#usulan').val()
    var lampiran = $('#lampiran').val()

    if (pokok == '') {
      $('#pokok').popover('show');
      $('#pokok').focus()
      document.querySelector('#pokok')
    } else if (sumber_isu == '') {
      $('#sumber_isu').popover('show');
      $('#sumber_isu').focus()
      document.querySelector('#sumber_isu')
    } else if (latar == '') {
      $('#latar').popover('show');
      $('#latar').focus()
      document.querySelector('#latar')
    } else if (dasar == '') {
      $('#dasar').popover('show');
      $('#dasar').focus()
      document.querySelector('#dasar')
    } else if (uraian == '') {
      $('#uraian').popover('show');
      $('#uraian').focus()
      document.querySelector('#uraian')
    } else if (analisis == '') {
      $('#analisis').popover('show');
      $('#analisis').focus()
      document.querySelector('#analisis')
    } else if (dampak == '') {
      $('#dampak').popover('show');
      $('#dampak').focus()
      document.querySelector('#dampak')
    } else if (usulan == '') {
      $('#usulan').popover('show');
      $('#usulan').focus()
      document.querySelector('#usulan')
    } else {
      if (sumber_isu == '99' && lainnya == '') {
        $('#lainnya_val').popover('show');
        $('#lainnya_val').focus()
        document.querySelector('#lainnya_val')
      } else {
        $.ajax({
          url: '<?= base_url('ajax/ajax_input')?>',
          type: 'post',
          data: {jenis:jenis,pokok:pokok,sumber_isu:sumber_isu,lainnya:lainnya,kantor:kantor,latar:latar,dasar:dasar,uraian:uraian,analisis:analisis,dampak:dampak,usulan:usulan,lampiran:lampiran},
          dataType: 'json',
          success: function(data) {
            $('.subbody').html(data.subbody);
            $('.message').html(data.alert);

            setTimeout(function() {
              $('.alert-success').fadeOut('fast');
            }, 2000);
          }
        });
      }
    }
  }
</script>