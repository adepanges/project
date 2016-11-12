			<div class="row">
        <div class="col-sm-12">
          <div class="pull-right">
            <button id="btn-tambah" class="btn btn-default">Tambah</button>
            <button id="btn-ubah" class="btn btn-default">Ubah</button>
            <button id="btn-hapus" class="btn btn-default">Hapus</button>
          </div>
        </div>
        <div class="col-sm-12" id="daftar">
  				<table id="table-master-format" class="table table-bordered">
  					<thead>
                <tr>
                  <th>No.</th>
                  <th>Nama Format</th>
                  <th>Keterangan</th>
                </tr>
            </thead>
  				</table>
        </div>
			</div>

      <?php $this->load->view('inc/master/film/format_modal') ?>

      <script type="text/javascript" src="<?php echo $this->config->item('url_plugins') ?>datatables/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="<?php echo $this->config->item('url_plugins') ?>datatables/dataTables.bootstrap.min.js"></script>
      <script type="text/javascript" src="<?php echo $this->config->item('url_plugins') ?>datatables/extensions/Select/js/dataTables.select.min.js"></script>
      <script type="text/javascript" src="<?php echo $this->config->item('url_plugins') ?>select2/select2.min.js"></script>

      <link rel="stylesheet" href="<?php echo $this->config->item('url_plugins') ?>datatables/css/jquery.dataTables.min.css">
      <link rel="stylesheet" href="<?php echo $this->config->item('url_plugins') ?>datatables/extensions/Select/css/select.dataTables.min.css">
      <link rel="stylesheet" href="<?php echo $this->config->item('url_plugins') ?>datatables/css/dataTables.bootstrap.css">
      <script type="text/javascript" src="<?php echo $this->config->item('url_app_kineforum') ?>js/modules/master/film/format.js"></script>