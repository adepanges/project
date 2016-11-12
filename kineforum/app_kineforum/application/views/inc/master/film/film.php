			<div class="row">
        <div class="col-sm-12">
          <div class="pull-left">
            <input id="filter-judul" type="text" class="form-control input-md input-inline" placeholder="Judul Film">
            <input id="filter-sutradara" type="text" class="form-control input-md input-inline" placeholder="Sutradara">
            <select id="filter-format" class="form-control input-md input-inline" style="width: 150px !important;">
              <option value="" selected>Pilih</option>
              <?php foreach ($data_format as $key => $v) {
                echo '<option value="'.$v->FORMAT_ID.'">'.$v->NAMA.'</option>';
              } ?>
            </select>

            <select id="filter-jenisfilm" class="form-control input-md input-inline">
              <option value="">Pilih</option>
              <?php foreach ($data_jenis_film as $key => $v) {
                echo '<option value="'.$v->JENIS_FILM_ID.'">'.$v->NAMA.'</option>';
              } ?>
            </select>
          </div>
        </div>
        <div class="col-md-12" style="margin-top: 5px;">
          <div class="pull-left">
            Urutkan berdasarkan &nbsp;&nbsp;
            <select id="urutkan-field" class="form-control input-md input-inline" style="width: 150px !important;">
              <option value="">Pilih</option>
              <option value="1">Judul Film</option>
              <option value="2">Sutradara</option>
              <option value="3">Format Film</option>
              <option value="4">Jenis Film</option>
            </select>
            <select id="urutkan-type" class="form-control input-md input-inline" style="width: 180px !important;">
              <option value="">Pilih</option>
              <option value="1">Kecil ke besar (A - Z)</option>
              <option value="2">Besar ke kecil (Z - A)</option>
            </select>
          </div>
        </div>
        <div class="col-md-12" style="margin-top: 5px;">
          <div class="pull-left">
            <button id="filter" class="btn btn-primary input-md input-inline">Filter</button>
          </div>
        </div>
        <div class="col-sm-12" style="margin-top: 5px;">
          <div class="pull-right">
            <button id="btn-tambah" class="btn btn-default">Tambah</button>
            <button id="btn-ubah" class="btn btn-default">Ubah</button>
            <button id="btn-hapus" class="btn btn-default">Hapus</button>
          </div>
        </div>
        <div class="col-sm-12" id="daftar">
          <div id="content-film"></div>
  				<table id="table-master-film" class="table-hidden">
  					<thead>
                <tr>
                  <th>FILM_ID</th>
                </tr>
            </thead>
  				</table>
        </div>
      </div>

      <?php $this->load->view('inc/master/film/film_modal') ?>

      <?php $this->load->view('main-inc/jquery_validation') ?>

      <script type="text/javascript" src="<?php echo $this->config->item('url_plugins') ?>datatables/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="<?php echo $this->config->item('url_plugins') ?>datatables/dataTables.bootstrap.min.js"></script>
      <script type="text/javascript" src="<?php echo $this->config->item('url_plugins') ?>datatables/extensions/Select/js/dataTables.select.min.js"></script>
      <script type="text/javascript" src="<?php echo $this->config->item('url_plugins') ?>select2/select2.min.js"></script>

      <link rel="stylesheet" href="<?php echo $this->config->item('url_plugins') ?>datatables/css/jquery.dataTables.min.css">
      <link rel="stylesheet" href="<?php echo $this->config->item('url_plugins') ?>datatables/extensions/Select/css/select.dataTables.min.css">
      <link rel="stylesheet" href="<?php echo $this->config->item('url_plugins') ?>datatables/css/dataTables.bootstrap.css">

      <script type="text/javascript" src="<?php echo $this->config->item('url_app_kineforum') ?>js/modules/master/film/film.js"></script>
