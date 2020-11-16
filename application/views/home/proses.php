<style>
  .form-control {
    font-size: 100%;
  }
</style>

<div class="container">
  <div class="message"></div>
  <div class="text-center"><b><i><u>POLICY ISSUE ANALYSIS PAPER (PIAP)</u></i></b></div>
  <div style="font-size: 90%">
    <div class="text-center">Nomor : PIAP - </div>
    <div class="text-center">Tanggal : <?= date('d F Y', time())?> </div>
  </div>
  <div class="row mt-4">
    <div class="col"></div>
    <div class="col-lg-10">
      <table class="table text-dark" style="font-size: 80%">
        <tbody>

          <input id="id_iks" value="0" hidden>

          <tr><td>1.</td><td>Isu Kebijakan</td><td><input type="text" class="form-control" id="pokok" name="pokok" maxlength="500" data-toggle="popover" data-html="true" data-placement="right" data-content="<div class='text-danger'>Pokok Isu harus diisi</div>" value="<?= set_value('pokok');?>"></td></tr>

          <tr>
            <td>2.</td>
            <td>Latar Belakang</td>
            <td>
              <textarea class="col form-control" row="3" id="latar" name="latar" maxlength="5000" data-toggle="popover" data-html="true" data-placement="right" data-content="<div class='text-danger'>Latar Belakang harus diisi</div>" value="<?= set_value('latar');?>"></textarea>
            </td>
          </tr>

          <tr><td>3.</td><td>Dasar Hukum</td><td><input type="text" class="form-control" id="dasar" name="dasar" maxlength="200" data-toggle="popover" data-html="true" data-placement="right" data-content="<div class='text-danger'>Dasar Hukum harus diisi</div>" value="<?= set_value('dasar');?>"></td></tr>

          <tr>
            <td>4. </td>
            <td>Objek Isu Kebijakan</td>
            <td>
              <select type="text" class="form-control" style="font-size: 100%" id="obyek_isu" name="obyek_isu" data-toggle="popover" data-html="true" data-placement="right" data-content="<div class='text-danger'>Sumber Isu harus diisi</div>" value="<?= set_value('obyek_isu');?>" onchange="lainnya()">
                <option value="FORMULASI">FORMULASI</option>
                <option value="IMPLEMENTASI">IMPLEMENTASI</option>
              </select>
            </td>
          </tr>

          <tr><td>5.</td><td>Analisis</td><td><textarea class="col form-control" row="3" id="analisis" name="analisis" maxlength="5000" data-toggle="popover" data-html="true" data-placement="right" data-content="<div class='text-danger'>Analisis Permasalahan harus diisi</div>" value="<?= set_value('analisis');?>"></textarea></td></tr>

          <tr><td></td><td>a. Legal</td><td><textarea class="col form-control" row="3" id="legal" name="legal" maxlength="5000" data-toggle="popover" data-html="true" data-placement="right" data-content="<div class='text-danger'>Legal harus diisi</div>" value="<?= set_value('legal');?>"></textarea></td></tr>

          <tr><td></td><td>b. Filosofi</td><td><textarea class="col form-control" row="3" id="filosofi" name="filosofi" maxlength="5000" data-toggle="popover" data-html="true" data-placement="right" data-content="<div class='text-danger'>Filosofi harus diisi</div>" value="<?= set_value('filosofi');?>"></textarea></td></tr>

          <tr><td></td><td>c. Operasional</td><td><textarea class="col form-control" row="3" id="operasional" name="operasional" maxlength="5000" data-toggle="popover" data-html="true" data-placement="right" data-content="<div class='text-danger'>Operasional harus diisi</div>" value="<?= set_value('operasional');?>"></textarea></td></tr>

          <tr><td></td><td>d. Sosial Ekonomi</td><td><textarea class="col form-control" row="3" id="sosek" name="sosek" maxlength="5000" data-toggle="popover" data-html="true" data-placement="right" data-content="<div class='text-danger'>Sosial Ekonomi harus diisi</div>" value="<?= set_value('sosek');?>"></textarea></td></tr>

          <tr><td></td><td>e. Lainnya</td><td><textarea class="col form-control" row="3" id="lainnya" name="lainnya" maxlength="5000" value="<?= set_value('lainnya');?>"></textarea></td></tr>

          <tr><td>6.</td><td>Dampak</td><td></td></tr>

          <tr><td></td><td>KINERJA</td><td><textarea class="col form-control" row="3" id="kinerja" name="kinerja" maxlength="5000" data-toggle="popover" data-html="true" data-placement="right" data-content="<div class='text-danger'>Kinerja harus diisi</div>" value="<?= set_value('kinerja');?>"></textarea></td></tr>

          <tr><td></td><td>a. Penerimaan</td><td><textarea class="col form-control" row="3" id="penerimaan" name="penerimaan" maxlength="5000" data-toggle="popover" data-html="true" data-placement="right" data-content="<div class='text-danger'>Penerimaan harus diisi</div>" value="<?= set_value('penerimaan');?>"></textarea></td></tr>

          <tr><td></td><td>b. Pelayanan</td><td><textarea class="col form-control" row="3" id="pelayanan" name="pelayanan" maxlength="5000" data-toggle="popover" data-html="true" data-placement="right" data-content="<div class='text-danger'>Pelayanan harus diisi</div>" value="<?= set_value('pelayanan');?>"></textarea></td></tr>

          <tr><td></td><td>c. Fasilitasi</td><td><textarea class="col form-control" row="3" id="fasilitasi" name="fasilitasi" maxlength="5000" data-toggle="popover" data-html="true" data-placement="right" data-content="<div class='text-danger'>Fasilitasi harus diisi</div>" value="<?= set_value('fasilitasi');?>"></textarea></td></tr>

          <tr><td></td><td>d. Pengawasan</td><td><textarea class="col form-control" row="3" id="pengawasan" name="pengawasan" maxlength="5000" data-toggle="popover" data-html="true" data-placement="right" data-content="<div class='text-danger'>Pengawasan harus diisi</div>" value="<?= set_value('pengawasan');?>"></textarea></td></tr>

          <tr><td></td><td>e. Kelembagaan</td><td><textarea class="col form-control" row="3" id="kelembagaan" name="kelembagaan" maxlength="5000" data-toggle="popover" data-html="true" data-placement="right" data-content="<div class='text-danger'>Kelembagaan harus diisi</div>" value="<?= set_value('kelembagaan');?>"></textarea></td></tr>

          <tr><td></td><td>CITRA</td><td><textarea class="col form-control" row="3" id="citra" name="citra" maxlength="5000" data-toggle="popover" data-html="true" data-placement="right" data-content="<div class='text-danger'>Citra harus diisi</div>" value="<?= set_value('citra');?>"></textarea></td></tr>

          <tr><td>7.</td><td>Rekomendasi dan Tindak Lanjut</td><td><div class="input-group"><textarea class="col form-control" row="3" id="usulan" name="usulan" maxlength="5000" data-toggle="popover" data-html="true" data-placement="right" data-content="<div class='text-danger'>Usulan harus diisi</div>" value="<?= set_value('usulan');?>"></textarea></div></td></tr>

          <tr>
            <td>8.</td>
            <td>Unit Terkait</td>
            <td>
              <input type="text" class="form-control" id="unit" name="unit" value="<?= set_value('unit');?>">
            </div></td>
          </tr>

          <tr><td></td><td></td><td><button href="#" class="btn btn-dark" onclick="proses()">Simpan</button></td></tr>

        </tbody>
      </table>
    </div>
    <div class="col"></div>
  </div>
</div>

</div>