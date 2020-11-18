<style>
  .form-control {
    font-size: 100%;
  }
</style>

<div class="container">
  <div class="message"></div>
  <?php if (isset($_SESSION['message'])) echo $_SESSION['message'];?>
  <h2>CRITICAL ISSUE PAPER (CIP)</h2>

  <div class="row mt-4">
    <div class="col"></div>
    <div class="col-lg-10">
      <table class="table table-hover text-dark" style="font-size: 80%">
        <thead>
          <th>#</th>
          <th>Pokok Isu Kritis</th>
          <th>Posisi</th>
          <?php if ($user['id_posisi'] >= 4):?>
            <th>Dari</th>
          <?php endif;?>
          <th>Tanggal Input</th>
          <th></th>
        </thead>

        <tbody>
          <?php $i = 1;?>
          <?php foreach ($datas as $d):?>
            <tr <?php if ($d['id_posisi'] < 0) echo 'class="text-danger"'?>>
              <td><?= $i?></td>
              <td style="cursor:pointer" data-id="<?= $d['id_iks']?>" data-toggle="modal" data-target="#detailIKS" onclick="detail_iks(this)">
                <?= $d['pokok']?>
              </td>
              <td style="cursor:pointer" data-id="<?= $d['id_iks']?>" data-toggle="modal" data-target="#detailIKS" onclick="detail_iks(this)">
                <?php if ($user['id_posisi'] <= 3):?>
                  <?= $d['posisi']?>
                <?php else :?>
                  <?php 
                  if ($d['id_posisi'] == 4) echo 'Direktur PPS';
                  else if ($d['id_posisi'] == 5) echo 'Kasubdit PSMT';
                  else if ($d['id_posisi'] == 6) echo 'Kepala Seksi';
                  else if ($d['id_posisi'] == 7) echo 'Pelaksana';
                  else if ($d['id_posisi'] == 8) echo 'Draft PIAP Pelaksana';
                  ?>
                <?php endif;?>
              </td>
              <?php if ($user['id_posisi'] >= 4):?>
                <td style="cursor:pointer" data-id="<?= $d['id_iks']?>" data-toggle="modal" data-target="#detailIKS" onclick="detail_iks(this)">
                  <?= $d['kantor']?>
                </td>
              <?php endif;?>
              <td style="cursor:pointer" data-id="<?= $d['id_iks']?>" data-toggle="modal" data-target="#detailIKS" onclick="detail_iks(this)"><?= date('d F Y', $d['stamp'])?></td>
              <td>
                <a href="#" class="badge badge-dark" data-id="<?= $d['id_iks']?>" data-toggle="modal" data-target="#detailIKS" onclick="detail_iks(this)">detail</a>

                <a href="<?= base_url('home/detail/'.$d['id_iks'])?>" target="_blank" class="badge badge-primary" >print</a>

                <?php if($d['id_posisi'] == $user['id_posisi']) :?>
                  <?php if ($user['id_posisi'] > 0 && $user['id_posisi'] < 5):?>
                    <a href="#" data-id="<?= $d['id_iks']?>" class="badge badge-danger" data-toggle="modal" data-target="#tolakIKS" onclick="tolak_iks_pre(this)">tolak</a>
                  <?php endif;?>

                  <?php if ($user['id_posisi'] < 4):?>
                    <a href="#" data-id="<?= $d['id_iks']?>" class="badge badge-success" data-toggle="modal" data-target="#ajukanIKS" onclick="ajukan_iks_pre(this)">ajukan</a>

                  <?php elseif ($user['id_posisi'] >= 4 && $user['id_posisi'] < 7):?>
                    <a href="#" data-id="<?= $d['id_iks']?>" class="badge badge-success" data-toggle="modal" data-target="#disposisiIKS" onclick="disposisi_iks_pre(this)">
                      disposisi
                    </a>

                  <?php else:?>
                    <a href="#" data-id="<?= $d['id_iks']?>" class="badge badge-success" onclick="proses_iks(this)">
                      proses
                    </a>
                  <?php endif;?>
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

<div class="modal fade" id="ajukanIKS" tabindex="-1" role="dialog" aria-labelledby="ajukanIKSLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ajukanIKSLabel">Ajukan IKS</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <text id="ajukanIKSBodyLabel"></text>
        <?php if ($user['id_posisi'] >= 4):?>
          <br>
          <br>
          <div class="form-group">
            <h6>Catatan</h6>
            <textarea class="form-control" row="3" id="catatan"></textarea>
          </div>
        <?php else:?>
          <input hidden id="catatan" value="">
        <?php endif;?>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
        <a class="btn btn-success ajukan" data-id="" href="#" onclick="ajukan_iks(this)">Ajukan</a>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="detailIKS" tabindex="-1" role="dialog" aria-labelledby="detailIKSLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark" id="detailIKSLabel">Detail IKS</h5>
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
            <td>Jenis IKS</td>
            <td id="jenis"></td>
          </tr>

          <tr>
            <td>Pokok Isu Kritis</td>
            <td id="pokok"></td>
          </tr>

          <tr>
            <td>Sumber Isu</td>
            <td id="sumber_isu"></td>
          </tr>

          <tr>
            <td>LOKASI (Unit Kerja)</td>
            <td id="kantor"></td>
          </tr>

          <tr>
            <td>LATAR BELAKANG</td>
            <td id="latar"></td>
          </tr>

          <tr>
            <td>DASAR HUKUM</td>
            <td id="dasar"></td>
          </tr>

          <tr>
            <td>URAIAN MASALAH</td>
            <td id="uraian"></td>
          </tr>

          <tr>
            <td>ANALISIS PERMASALAHAN</td>
            <td id="analisis"></td>
          </tr>

          <tr>
            <td>DAMPAK/POTENSI</td>
            <td id="dampak"></td>
          </tr>

          <tr>
            <td>USULAN</td>
            <td id="usulan"></td>
          </tr>

          <tr>
            <td>LAMPIRAN</td>
            <td><text id="lampiran"></text> lembar</td>
          </tr>
        </table>

      </div>
    </div>
  </div>
</div>

</div>