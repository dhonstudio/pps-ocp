<script>
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
          if (data.id_posisi > 3) {
            if (data.id_posisi == 4) {
              $('#posisi').html('Direktur PPS');
            } else if (data.id_posisi == 5) {
              $('#posisi').html('Kasubdit PSMT (catatan: '+data.alasan+')');
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
</script>