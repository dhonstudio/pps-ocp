<style>
  .form-control {
    font-size: 100%;
  }
</style>

<div class="container">
  <div class="message"></div>
  <?php if (isset($_SESSION['message'])) echo $_SESSION['message'];?>
  <h2>POLICY ISSUE ANALYSIS PAPER (PIAP)</h2>

  <div class="row mt-4">
    <div class="col"></div>
    <div class="col-lg-10">
      <table class="table table-hover text-dark" style="font-size: 80%">
        <thead>
          <th>#</th>
          <th>Pokok Isu Kritis</th>
          <th>Posisi</th>
          <th>Tanggal Input</th>
          <th></th>
        </thead>

        <tbody>
          <?php $i = 1;?>
          <?php foreach ($piaps as $d):?>
            <tr <?php if ($d['id_posisi'] < 0) echo 'class="text-danger"'?>>
              <td><?= $i?></td>
              <td style="cursor:pointer" data-id="<?= $d['id_piap']?>" data-toggle="modal" data-target="#detailPIAP" onclick="detail_piap(this)">
                <?= $d['pokok']?>
              </td>
              <td style="cursor:pointer" data-id="<?= $d['id_piap']?>" data-toggle="modal" data-target="#detailPIAP" onclick="detail_piap(this)">
                <?php 
                if ($d['id_posisi'] == 7) echo 'Draft PIAP Pelaksana';
                else if ($d['id_posisi'] == 8) echo 'Draft PIAP Kepala Seksi';
                ?>
              </td>
              <td style="cursor:pointer" data-id="<?= $d['id_piap']?>" data-toggle="modal" data-target="#detailPIAP" onclick="detail_piap(this)"><?= date('d F Y', $d['stamp'])?></td>
              <td>
                <a href="#" class="badge badge-dark" data-id="<?= $d['id_piap']?>" data-toggle="modal" data-target="#detailPIAP" onclick="detail_piap(this)">detail</a>

                <a href="<?= base_url('home/detail_piap/'.$d['id_piap'])?>" target="_blank" class="badge badge-primary" >print</a>

                <?php if($d['id_posisi'] == $user['id_posisi']) :?>
                  <?php if ($user['id_posisi'] > 0 && $user['id_posisi'] < 5):?>
                    <a href="#" data-id="<?= $d['id_piap']?>" class="badge badge-danger" data-toggle="modal" data-target="#tolakIKS" onclick="tolak_iks_pre(this)">tolak</a>
                  <?php endif;?>

                  <a href="#" data-id="<?= $d['id_piap']?>" class="badge badge-success" data-toggle="modal" data-target="#ajukanPIAP" onclick="ajukan_piap_pre(this)">ajukan</a>

                <?php endif;?>
              </td>
            </tr>
          <?php $i++?>
          <?php endforeach;?>
        </tbody>
      </table>
    </div>
    <div class="col"></div>
  </div>
</div>

<div class="modal fade" id="disposisiIKS" tabindex="-1" role="dialog" aria-labelledby="disposisiIKSLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark" id="disposisiIKSLabel">Disposisi IKS</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form method="post" action="<?= base_url('home/disposisi')?>">
        <div class="modal-body">
          <text id="disposisiIKSBodyLabel"></text>
          <br>
          <?php if ($user['id_posisi'] == 5):?>
            <?php 
            $disposisi = $this->db->get_where('users', ['id_kantor' => 11, 'id_seksi' => 11])->result_array();
            foreach($disposisi as $d):?>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="kasi<?= $d['id_user']?>" name="disposisi[]" value="<?= $d['id_user']?>">
                <label class="custom-control-label" for="kasi<?= $d['id_user']?>"><?= $d['fullName']?></label>
              </div>
            <?php endforeach;?>
          <?php elseif ($user['id_posisi'] == 6):?>
            <?php 
            $disposisi = $this->db->get_where('users', ['id_kantor' => 11, 'id_seksi' => $user['id_user']-2])->result_array();
            foreach($disposisi as $d):?>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="kasi<?= $d['id_user']?>" name="disposisi[]" value="<?= $d['id_user']?>">
                <label class="custom-control-label" for="kasi<?= $d['id_user']?>"><?= $d['fullName']?></label>
              </div>
            <?php endforeach;?>
          <?php endif;?>

          <br>
          <div class="form-group">
            <h6>Catatan</h6>
            <textarea class="form-control" row="3" id="catatan_disposisi" name="catatan_disposisi"></textarea>
          </div>
        </div>
          
        <input hidden id="id_iks" name="id_iks">

        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          <button class="btn btn-success" type="submit">Disposisi</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="tolakIKS" tabindex="-1" role="dialog" aria-labelledby="tolakIKSLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger" id="tolakIKSLabel">Tolak IKS</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <text id="tolakIKSBodyLabel"></text>
        <br>
        <br>
        <div class="form-group">
          <h6>Alasan penolakan</h6>
          <textarea class="form-control" row="3" id="alasan"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
        <a class="btn btn-danger tolak" data-id="" href="#" onclick="tolak_iks(this)">Tolak</a>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="ajukanPIAP" tabindex="-1" role="dialog" aria-labelledby="ajukanPIAPLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ajukanPIAPLabel">Ajukan PIAP</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <text id="ajukanPIAPBodyLabel"></text>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
        <a class="btn btn-success ajukan" data-id="" href="#" onclick="ajukan_piap(this)">Ajukan</a>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="detailPIAP" tabindex="-1" role="dialog" aria-labelledby="detailPIAPLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark" id="detailPIAPLabel">Detail PIAP</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">

        <table class="table">
          <tr>
            <th width="20%">Posisi</th>
            <td><b id="posisi"></b></td>
          </tr>

          <tr>
            <td>Isu Kebijakan</td>
            <td id="pokok"></td>
          </tr>

          <tr>
            <td>Latar Belakang</td>
            <td id="latar"></td>
          </tr>

          <tr>
            <td>Dasar Hukum</td>
            <td id="dasar"></td>
          </tr>

          <tr>
            <td>Obyek Isu Kebijakan</td>
            <td id="obyek_isu"></td>
          </tr>

          <tr>
            <td>Analisis</td>
            <td id="analisis"></td>
          </tr>

          <tr>
            <td>a. Legal</td>
            <td id="legal"></td>
          </tr>

          <tr>
            <td>b. Filosofi</td>
            <td id="filosofi"></td>
          </tr>

          <tr>
            <td>c. Operasional</td>
            <td id="operasional"></td>
          </tr>

          <tr>
            <td>d. Sosial Ekonomi</td>
            <td id="sosek"></td>
          </tr>

          <tr>
            <td>e. Lainnya</td>
            <td id="lainnya"></td>
          </tr>

          <tr>
            <td>KINERJA</td>
            <td id="kinerja"></td>
          </tr>

          <tr>
            <td>a. Penerimaan</td>
            <td id="penerimaan"></td>
          </tr>

          <tr>
            <td>b. Pelayanan</td>
            <td id="pelayanan"></td>
          </tr>

          <tr>
            <td>c. Fasilitasi</td>
            <td id="fasilitasi"></td>
          </tr>

          <tr>
            <td>d. Pengawasan</td>
            <td id="pengawasan"></td>
          </tr>

          <tr>
            <td>e. Kelembagaan</td>
            <td id="kelembagaan"></td>
          </tr>

          <tr>
            <td>CITRA</td>
            <td id="citra"></td>
          </tr>

          <tr>
            <td>USULAN</td>
            <td id="usulan"></td>
          </tr>

          <tr>
            <td>Unit Terkait</td>
            <td><text id="unit"></text></td>
          </tr>
        </table>

      </div>
    </div>
  </div>
</div>

</div>