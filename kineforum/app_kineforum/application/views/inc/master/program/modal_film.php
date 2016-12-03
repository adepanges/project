            <div class="modal" id="modal-pilih-film-slot">
                <div class="modal-dialog" style="width: 100% !important; margin-left: 10px;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Film</h4>
                        </div>
                        <div class="modal-body" style="overflow-y: scroll;">
                            <div class="col-md-9 col-xs-12">
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
                                            <button id="filter-pilihan" class="btn btn-primary input-md input-inline">Filter</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 5px; border-top: 1px solid #000;">
                                    <div id="content-film"></div>
                                    <table id="table-pilih-film" class="table-hidden">
                                        <thead>
                                            <tr>
                                                <th>FILM_ID</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <button type="button" class="btn btn-primary form-control" id="btn-slot-film-tambah">Tambahkan</button>
                            </div>
                            <div class="col-md-3 col-xs-12" id="slot-film-temp" style="border-left: 1px solid #000">
                                Daftar Film Sementara:
                                <div class="row" id="film-droped">

                                </div>
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-primary form-control" id="btn-slot-film-simpan">Simpan</button>
                                </div>
                            </div>

                            <!-- <form method="post" id="form-pilih-film-slot" style="margin: 0px 6px 6px 6px;">

                                <input type="hidden" name="SLOT_ID" value="0">
                                <input type="hidden" name="PROGRAM_ID" value="0">

                                <div class="col-md-12">
                                    <div class="col-md-4">
                                        <label>Nama</label>
                                    </div>
                                    <div class="col-md-8">
                                      <div class="form-group">
                                        <textarea class="form-control input-md" name="NAMA" required></textarea>
                                      </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="col-md-4">
                                        <label>Keterangan</label>
                                    </div>
                                    <div class="col-md-8">
                                      <div class="form-group">
                                        <textarea class="form-control input-md" name="KETERANGAN"></textarea>
                                      </div>
                                    </div>
                                </div>
                            </form> -->

                        </div>
                        <div class="modal-footer">
                            <div class="row">
                                <div class="col-md-6">
                                    
                                </div>
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-default form-control" data-dismiss="modal">Batal</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>