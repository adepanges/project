			<div class="row" id="daftar-program">
        <div class="col-sm-12">
          <div class="pull-left">
            <input id="filter-program" type="text" class="form-control input-md input-inline" placeholder="Program">
            <input id="filter-tanggalmulai" type="text" class="form-control input-md input-inline field-tanggal" placeholder="Tanggal Mulai" value="<?php echo date('01/m/Y') ?>">
            <input id="filter-tanggalselesai" type="text" class="form-control input-md input-inline field-tanggal" placeholder="Tanggal Mulai" value="<?php echo date('t/m/Y') ?>">
          </div>
        </div>
        <div class="col-md-12" style="margin-top: 5px;">
          <div class="pull-left">
            Urutkan berdasarkan &nbsp;&nbsp;
            <select id="urutkan-field" class="form-control input-md input-inline" style="width: 150px !important;">
              <option value="">Pilih</option>
              <option value="1">Nama Program</option>
              <option value="2">Tanggal Mulai</option>
              <option value="3">Tanggal Selesai</option>
              <option value="4">Status</option>
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
        <div class="col-sm-12" id="daftar" style="margin-top: 5px;">
          <div id="content-program"></div>
  				<table id="table-master-program" class="table-hidden">
  					<thead>
                <tr>
                  <th>FILM_ID</th>
                </tr>
            </thead>
  				</table>
        </div>
      </div>
      <div class="row" id="detail-program" style="display: none;">
        <div class="col-sm-12" style="border-bottom: 1px solid #000; padding-bottom: 4px;">
          <div class="pull-right">
            <button id="btn-kembali" class="btn btn-default input-md input-inline">Kembali</button>
          </div>
        </div>

        <div class="col-md-6">
          <div class="col-sm-12" style="margin-top: 5px;">
            <div class="pull-right">
              <button id="btn-tambah-slot" class="btn btn-default">Tambah</button>
              <button id="btn-ubah-slot" class="btn btn-default">Ubah</button>
              <button id="btn-hapus-slot" class="btn btn-default">Hapus</button>
            </div>
          </div>
          <table id="table-program-slot" class="table table-bordered">
            <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama Slot</th>
                  <th>Keterangan</th>
                </tr>
            </thead>
          </table>
        </div>

        <div class="col-md-6">
          <div class="col-sm-12" style="margin-top: 5px;">
            <div class="pull-right">
              <button id="btn-tambah-slot-film" class="btn btn-default">Tambah</button>
              <button id="btn-hapus-slot-film" class="btn btn-default">Hapus</button>
            </div>
          </div>
          <table id="table-program-slot-film" class="table table-bordered">
            <thead>
                <tr>
                  <th>No.</th>
                  <th>Judul Film</th>
                  <th>Sutradara</th>
                  <th>Durasi</th>
                </tr>
            </thead>
          </table>
        </div>
      </div>

      <?php $this->load->view('inc/master/program/modal_program') ?>
      <?php $this->load->view('inc/master/program/modal_slot') ?>
      <?php $this->load->view('inc/master/program/modal_film') ?>

      <?php $this->load->view('main-inc/jquery_validation') ?>

      <script type="text/javascript" src="<?php echo $this->config->item('url_plugins') ?>datatables/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="<?php echo $this->config->item('url_plugins') ?>datatables/dataTables.bootstrap.min.js"></script>
      <script type="text/javascript" src="<?php echo $this->config->item('url_plugins') ?>datatables/extensions/Select/js/dataTables.select.min.js"></script>

      <script type="text/javascript" src="<?php echo $this->config->item('url_plugins') ?>datepicker/bootstrap-datepicker.js"></script>
      <script type="text/javascript" src="<?php echo $this->config->item('url_plugins') ?>datepicker/locales/bootstrap-datepicker.id.js"></script>
      <link rel="stylesheet" href="<?php echo $this->config->item('url_plugins') ?>datepicker/datepicker3.css">

      <link rel="stylesheet" href="<?php echo $this->config->item('url_plugins') ?>datatables/css/jquery.dataTables.min.css">
      <link rel="stylesheet" href="<?php echo $this->config->item('url_plugins') ?>datatables/extensions/Select/css/select.dataTables.min.css">
      <link rel="stylesheet" href="<?php echo $this->config->item('url_plugins') ?>datatables/css/dataTables.bootstrap.css">

      <script type="text/javascript" src="<?php echo $this->config->item('url_app_kineforum') ?>js/modules/master/program/program.js"></script>
      <script type="text/javascript" src="<?php echo $this->config->item('url_app_kineforum') ?>js/modules/master/program/slot.js"></script>
      <script type="text/javascript" src="<?php echo $this->config->item('url_app_kineforum') ?>js/modules/master/program/slot_film.js"></script>
