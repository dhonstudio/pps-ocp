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

  function acomplete(){
    $.ajax({
      url: '<?= base_url('ajax/ajax_kantor')?>',
      type: 'get',
      dataType: 'json',
      success: function(data) {
        availableTags = data;
      }
    });

    function split( val ) {
      return val.split( /,\s*/ );
    }
    function extractLast( term ) {
      return split( term ).pop();
    }

    $( "#unit" )
      // don't navigate away from the field on tab when selecting an item
      .on( "keydown", function( event ) {
        if ( event.keyCode === $.ui.keyCode.TAB &&
            $( this ).autocomplete( "instance" ).menu.active ) {
          event.preventDefault();
        }
      })
      .autocomplete({
        minLength: 0,
        source: function( request, response ) {
          // delegate back to autocomplete, but extract the last term
          response( $.ui.autocomplete.filter(
            availableTags, extractLast( request.term ) ) );
        },
        focus: function() {
          // prevent value inserted on focus
          return false;
        },
        select: function( event, ui ) {
          var terms = split( this.value );
          // remove the current input
          terms.pop();
          // add the selected item
          terms.push( ui.item.value );
          // add placeholder to get the comma-and-space at the end
          terms.push( "" );
          this.value = terms.join( ", " );
          return false;
        }
      });
  }

  $( document ).ajaxSuccess(function() {
    acomplete()
  })

  $(function () {
    acomplete()
  });

  function proses() {
    var id_iks = $('#id_iks').val()
    var pokok = $('#pokok').val()
    var latar = $('#latar').val()
    var dasar = $('#dasar').val()
    var obyek_isu = $('#obyek_isu').val()
    var analisis = $('#analisis').val()
    var legal = $('#legal').val()
    var filosofi = $('#filosofi').val()
    var operasional = $('#operasional').val()
    var sosek = $('#sosek').val()
    var lainnya = $('#lainnya').val()
    var kinerja = $('#kinerja').val()
    var penerimaan = $('#penerimaan').val()
    var pelayanan = $('#pelayanan').val()
    var fasilitasi = $('#fasilitasi').val()
    var pengawasan = $('#pengawasan').val()
    var kelembagaan = $('#kelembagaan').val()
    var citra = $('#citra').val()
    var usulan = $('#usulan').val()
    var unit = $('#unit').val()

    if (pokok == '') {
      $('#pokok').popover('show');
      $('#pokok').focus()
      document.querySelector('#pokok')
    } else if (latar == '') {
      $('#latar').popover('show');
      $('#latar').focus()
      document.querySelector('#latar')
    } else if (dasar == '') {
      $('#dasar').popover('show');
      $('#dasar').focus()
      document.querySelector('#dasar')
    } else if (analisis == '') {
      $('#analisis').popover('show');
      $('#analisis').focus()
      document.querySelector('#analisis')
    } else if (legal == '') {
      $('#legal').popover('show');
      $('#legal').focus()
      document.querySelector('#legal')
    } else if (filosofi == '') {
      $('#filosofi').popover('show');
      $('#filosofi').focus()
      document.querySelector('#filosofi')
    } else if (operasional == '') {
      $('#operasional').popover('show');
      $('#operasional').focus()
      document.querySelector('#operasional')
    } else if (sosek == '') {
      $('#sosek').popover('show');
      $('#sosek').focus()
      document.querySelector('#sosek')
    } else if (kinerja == '') {
      $('#kinerja').popover('show');
      $('#kinerja').focus()
      document.querySelector('#kinerja')
    } else if (penerimaan == '') {
      $('#penerimaan').popover('show');
      $('#penerimaan').focus()
      document.querySelector('#penerimaan')
    } else if (pelayanan == '') {
      $('#pelayanan').popover('show');
      $('#pelayanan').focus()
      document.querySelector('#pelayanan')
    } else if (fasilitasi == '') {
      $('#fasilitasi').popover('show');
      $('#fasilitasi').focus()
      document.querySelector('#fasilitasi')
    } else if (pengawasan == '') {
      $('#pengawasan').popover('show');
      $('#pengawasan').focus()
      document.querySelector('#pengawasan')
    } else if (kelembagaan == '') {
      $('#kelembagaan').popover('show');
      $('#kelembagaan').focus()
      document.querySelector('#kelembagaan')
    } else if (citra == '') {
      $('#citra').popover('show');
      $('#citra').focus()
      document.querySelector('#citra')
    } else if (usulan == '') {
      $('#usulan').popover('show');
      $('#usulan').focus()
      document.querySelector('#usulan')
    } else if (unit == '') {
      $('#unit').popover('show');
      $('#unit').focus()
      document.querySelector('#unit')
    } else {
      $.ajax({
        url: '<?= base_url('ajax/ajax_proses')?>',
        type: 'post',
        data: {id_iks:id_iks,pokok:pokok,latar:latar,dasar:dasar,obyek_isu:obyek_isu,analisis:analisis,legal:legal,filosofi:filosofi,operasional:operasional,sosek:sosek,lainnya:lainnya,kinerja:kinerja,penerimaan:penerimaan,pelayanan:pelayanan,fasilitasi:fasilitasi,pengawasan:pengawasan,kelembagaan:kelembagaan,citra:citra,usulan:usulan,unit:unit},
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
</script>