<script>
  function detail_piap(elem) {
    const id = $(elem).data('id')

    $.ajax({
      url: '<?= base_url('ajax/ajax_detail_piap/')?>' + id,
      type: 'get',
      dataType: 'json',
      success: function(data) {
        $('#pokok').html(data.pokok);
        $('#latar').html(data.latar);
        $('#dasar').html(data.dasar);
        $('#obyek_isu').html(data.obyek_isu);
        $('#analisis').html(data.analisis);
        $('#legal').html(data.legal);
        $('#filosofi').html(data.filosofi);
        $('#operasional').html(data.operasional);
        $('#sosek').html(data.sosek);
        $('#lainnya').html(data.lainnya);
        $('#kinerja').html(data.kinerja);
        $('#penerimaan').html(data.penerimaan);
        $('#pelayanan').html(data.pelayanan);
        $('#fasilitasi').html(data.fasilitasi);
        $('#pengawasan').html(data.pengawasan);
        $('#kelembagaan').html(data.kelembagaan);
        $('#citra').html(data.citra);
        $('#usulan').html(data.usulan);
        $('#unit').html(data.unit);
        if (data.id_posisi < 0) {
          $('#posisi').html('<text class="text-danger">'+data.posisi+' (alasan: '+data.alasan+')</text>');
        } else {
          if (data.id_posisi == 7) {
            $('#posisi').html('Draft PIAP Pelaksana');
          } else if (data.id_posisi == 6) {
            $('#posisi').html('Draft PIAP Kepala Seksi');
          } else if (data.id_posisi == 5) {
            $('#posisi').html('Draft PIAP Kasubdit PSMT');
          } else if (data.id_posisi == 4) {
            $('#posisi').html('Draft PIAP Direktur PPS');
          } else if (data.id_posisi == -4) {
            $('#posisi').html('Penolakan Direktur PPS');
          }
        }
      }
    });
  }

  function ajukan_piap_pre(elem) {
    const id = $(elem).data('id')
    $('.ajukan').attr('data-id', id);

    $.ajax({
      url: '<?= base_url('ajax/ajax_detail_piap/')?>' + id,
      type: 'get',
      dataType: 'json',
      success: function(data) {
        $('#ajukanPIAPBodyLabel').html('Ajukan PIAP '+data.pokok+'?');
      }
    });
  }

  function ajukan_piap(elem) {
    const id = $(elem).data('id')

    $.ajax({
      url: '<?= base_url('ajax/ajax_ajukan_piap')?>',
      type: 'post',
      data: {id:id},
      dataType: 'json',
      success: function(data) {
        $('.modal-backdrop').remove();
        $("body").removeClass("modal-open")

        $('.subbody').html(data.subbody);
        $('.message').html(data.alert);

        setTimeout(function() {
          $('.alert-success').fadeOut('fast');
        }, 2000);
      }
    });
  }

  function tolak_piap_pre(elem) {
    const id = $(elem).data('id')
    $('.tolak').attr('data-id', id);

    $.ajax({
      url: '<?= base_url('ajax/ajax_detail_piap/')?>' + id,
      type: 'get',
      dataType: 'json',
      success: function(data) {
        $('#tolakPIAPBodyLabel').html('Tolak PIAP '+data.pokok+'?');
      }
    });
  }

  function tolak_piap(elem) {
    const id = $(elem).data('id')
    const alasan = $('#alasan').val()

    $.ajax({
      url: '<?= base_url('ajax/ajax_tolak_piap')?>',
      type: 'post',
      data: {id:id, alasan:alasan},
      dataType: 'json',
      success: function(data) {
        $('.modal-backdrop').remove();
        $("body").removeClass("modal-open")

        $('.subbody').html(data.subbody);
        $('.message').html(data.alert);

        setTimeout(function() {
          $('.alert-fade').fadeOut('fast');
        }, 2000);
      }
    });
  }

  function detail_iks(elem) {
    const id = $(elem).data('id')

    $.ajax({
      url: '<?= base_url('ajax/ajax_detail/')?>' + id,
      type: 'get',
      dataType: 'json',
      success: function(data) {
        if (data.jenis == 1) $('#jenis').html('STRATEGIS');
        else $('#jenis').html('TIDAK STRATEGIS');
        $('#pokok').html(data.pokok);
        if (data.id_sumber == 99) $('#sumber_isu').html(data.lainnya);
        else $('#sumber_isu').html(data.sumber);
        $('#kantor').html(data.kantor);
        $('#latar').html(data.latar);
        $('#dasar').html(data.dasar);
        $('#uraian').html(data.uraian);
        $('#analisis').html(data.analisis);
        $('#dampak').html(data.dampak);
        $('#usulan').html(data.usulan);
        $('#lampiran').html(data.lampiran);
        if (data.id_posisi < 0) {
          $('#posisi').html('<text class="text-danger">'+data.posisi+' (alasan: '+data.alasan+')</text>');
        } else {
          if (<?= $user['id_posisi']?> >= 4) {
            if (data.id_posisi > 3) {
              if (data.id_posisi == 4) {
                $('#posisi').html('Direktur PPS');
              } else if (data.id_posisi == 5) {
                $('#posisi').html('Kasubdit PSMT (catatan: '+data.alasan+')');
              } else if (data.id_posisi == 6) {
                $('#posisi').html('Kepala Seksi (catatan: '+data.alasan+')');
              } else if (data.id_posisi == 7) {
                $('#posisi').html('Pelaksana (catatan: '+data.alasan+')');
              } else if (data.id_posisi == 8) {
                $('#posisi').html('Draft PIAP Pelaksana');
              } else if (data.id_posisi == 9) {
                $('#posisi').html('Draft PIAP Kepala Seksi');
              } else if (data.id_posisi == 10) {
                $('#posisi').html('Draft PIAP Kasubdit PSMT');
              } else if (data.id_posisi == 11) {
                $('#posisi').html('Draft PIAP Direktur PPS');
              }
            } else {
              $('#posisi').html(data.posisi);
            }
          } else {
            $('#posisi').html(data.posisi);
          }
        }
      }
    });
  }

  function ajukan_iks_pre(elem) {
    const id = $(elem).data('id')
    $('.ajukan').attr('data-id', id);

    $.ajax({
      url: '<?= base_url('ajax/ajax_detail/')?>' + id,
      type: 'get',
      dataType: 'json',
      success: function(data) {
        if (data.id_posisi < 4) $('#ajukanIKSBodyLabel').html('Ajukan IKS '+data.pokok+'?');
      }
    });
  }

  function ajukan_iks(elem) {
    const id = $(elem).data('id')
    const catatan = $('#catatan').val()

    $.ajax({
      url: '<?= base_url('ajax/ajax_ajukan')?>',
      type: 'post',
      data: {id:id, catatan:catatan},
      dataType: 'json',
      success: function(data) {
        $('.modal-backdrop').remove();
        $("body").removeClass("modal-open")

        $('.subbody').html(data.subbody);
        $('.message').html(data.alert);

        setTimeout(function() {
          $('.alert-success').fadeOut('fast');
        }, 2000);
      }
    });
  }

  function tolak_iks_pre(elem) {
    const id = $(elem).data('id')
    $('.tolak').attr('data-id', id);

    $.ajax({
      url: '<?= base_url('ajax/ajax_detail/')?>' + id,
      type: 'get',
      dataType: 'json',
      success: function(data) {
        $('#tolakIKSBodyLabel').html('Tolak IKS '+data.pokok+'?');
      }
    });
  }

  function tolak_iks(elem) {
    const id = $(elem).data('id')
    const alasan = $('#alasan').val()

    $.ajax({
      url: '<?= base_url('ajax/ajax_tolak')?>',
      type: 'post',
      data: {id:id, alasan:alasan},
      dataType: 'json',
      success: function(data) {
        $('.modal-backdrop').remove();
        $("body").removeClass("modal-open")

        $('.subbody').html(data.subbody);
        $('.message').html(data.alert);

        setTimeout(function() {
          $('.alert-fade').fadeOut('fast');
        }, 2000);
      }
    });
  }

  function disposisi_iks_pre(elem) {
    const id = $(elem).data('id')
    $('#id_iks').val(id);

    $.ajax({
      url: '<?= base_url('ajax/ajax_detail/')?>' + id,
      type: 'get',
      dataType: 'json',
      success: function(data) {
        $('#disposisiIKSBodyLabel').html('Disposisi IKS '+data.pokok+'?');
      }
    });
  }

  function proses_iks(elem) {
    const id = $(elem).data('id')
    const e = elem

    $('[data-toggle=popover]').each(function () {
      if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
        $(this).popover('hide');
      }
    });

    $.ajax({
      url: '<?= base_url('ajax/ajax_page/proses')?>',
      type: 'get',
      dataType: 'json',
      success: function(data) {
        $('.subbody').html(data.subbody);

        $.ajax({
          url: '<?= base_url('ajax/ajax_detail/')?>' + id,
          type: 'get',
          dataType: 'json',
          success: function(data) {
            $('#id_iks').val(data.id_iks);
            $('#pokok').val(data.pokok);
            $('#latar').val(data.latar);
            $('#dasar').val(data.dasar);
            $('#analisis').val(data.analisis);
            $('#usulan').val(data.usulan);
          }
        });

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