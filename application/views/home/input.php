<style>
  .form-control {
    font-size: 100%;
  }
</style>

<div class="container">
  <div class="message"></div>
  <div class="text-center"><b><i><u>CRITICAL ISSUE PAPER (CIP)</u></i></b></div>
  <div style="font-size: 90%">
    <div class="text-center">Nomor : CIP - </div>
    <div class="text-center">Tanggal : <?= date('d F Y', time())?> </div>
  </div>
  <div class="row mt-4">
    <div class="col"></div>
    <div class="col-lg-8">
      <table class="table text-dark" style="font-size: 80%">
        <tbody>

          <tr>
            <td></td><td>Jenis IKS</td>
            <td>
              <select type="text" class="form-control" style="font-size: 100%" id="jenis" name="jenis" data-toggle="popover" data-html="true" data-placement="right" data-content="<div class='text-danger'>Jenis IKS harus diisi</div>" value="<?= set_value('jenis');?>">
                <option value="1">STRATEGIS</option>
                <option value="0">TIDAK STRATEGIS</option>
              </select>
          </tr>
          <tr><td>1.</td><td>ISU KEBIJAKAN</td><td></td></tr>
          <tr><td></td><td>a. Pokok Isu Kritis</td><td><input type="text" class="form-control" id="pokok" name="pokok" maxlength="500" data-toggle="popover" data-html="true" data-placement="right" data-content="<div class='text-danger'>Pokok Isu harus diisi</div>" value="<?= set_value('pokok');?>"></td></tr>

          <tr>
            <td></td>
            <td>b. Sumber Isu</td>
            <td>
              <select type="text" class="form-control" style="font-size: 100%" id="sumber_isu" name="sumber_isu" data-toggle="popover" data-html="true" data-placement="right" data-content="<div class='text-danger'>Sumber Isu harus diisi</div>" value="<?= set_value('sumber_isu');?>" onchange="lainnya()">
                <option></option>
                <?php foreach ($sumber as $s) :?>
                  <option value="<?= $s['id_sumber'];?>"><?= $s['sumber'];?></option>
                <?php endforeach;?>
              </select>
            </td>
          </tr>

          <tr id="lainnya" hidden><td></td><td>sumber lainnya</td><td><input id="lainnya_val" name="lainnya_val" type="text" class="form-control" maxlength="200" data-toggle="popover" data-html="true" data-placement="right" data-content="<div class='text-danger'>Isian ini harus diisi</div>" value="<?= set_value('lainnya_val');?>"></td></tr>

          <tr>
            <td>2.</td>
            <td>LOKASI (Unit Kerja)</td>
            <td>
              <input hidden id="kantor" name="kantor" value="<?= $user['id_kantor']?>">
              <input class="form-control" value="<?= $kantor?>" readonly>
            </td>
          </tr>
          <tr>
            <td>3.</td>
            <td>LATAR BELAKANG</td>
            <td>
              <textarea class="col form-control" row="3" id="latar" name="latar" maxlength="5000" data-toggle="popover" data-html="true" data-placement="right" data-content="<div class='text-danger'>Latar Belakang harus diisi</div>" value="<?= set_value('latar');?>"></textarea>
            </td>
          </tr>

          <tr><td>4.</td><td>DASAR HUKUM</td><td><input type="text" class="form-control" id="dasar" name="dasar" maxlength="200" data-toggle="popover" data-html="true" data-placement="right" data-content="<div class='text-danger'>Dasar Hukum harus diisi</div>" value="<?= set_value('dasar');?>"></td></tr>

          <tr><td>5.</td><td>URAIAN MASALAH</td><td><textarea class="col form-control" row="3" id="uraian" name="uraian" maxlength="5000" data-toggle="popover" data-html="true" data-placement="right" data-content="<div class='text-danger'>Uraian Masalah harus diisi</div>" value="<?= set_value('uraian');?>"></textarea></td></tr>

          <tr><td>6.</td><td>ANALISIS PERMASALAHAN</td><td><textarea class="col form-control" row="3" id="analisis" name="analisis" maxlength="5000" data-toggle="popover" data-html="true" data-placement="right" data-content="<div class='text-danger'>Analisis Permasalahan harus diisi</div>" value="<?= set_value('analisis');?>"></textarea></td></tr>

          <tr><td>7.</td><td>DAMPAK/POTENSI</td><td><textarea class="col form-control" row="3" id="dampak" name="dampak" maxlength="5000" data-toggle="popover" data-html="true" data-placement="right" data-content="<div class='text-danger'>Dampak harus diisi</div>" value="<?= set_value('dampak');?>"></textarea></td></tr>

          <tr><td>8.</td><td>USULAN</td><td><div class="input-group"><textarea class="col form-control" row="3" id="usulan" name="usulan" maxlength="5000" data-toggle="popover" data-html="true" data-placement="right" data-content="<div class='text-danger'>Usulan harus diisi</div>" value="<?= set_value('usulan');?>"></textarea></div></td></tr>

          <tr>
            <td>9.</td>
            <td>LAMPIRAN</td>
            <td>
              <div class="input-group">
                <input type="number" class="form-control" id="lampiran" name="lampiran" value="<?= set_value('lampiran');?>">
                <div class="input-group-prepend"><span class="input-group-text" id="validationTooltipUsernamePrepend" style="font-size: 100%">lembar</span></div>
            </div></td>
          </tr>

          <tr><td></td><td></td><td><button href="#" class="btn btn-dark" onclick="simpan()">Simpan</button></td></tr>

        </tbody>
      </table>
    </div>
    <div class="col"></div>
  </div>
</div>

</div>