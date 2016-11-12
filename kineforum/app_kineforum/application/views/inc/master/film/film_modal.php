            <div class="modal" id="modal-master-film">
              <div class="modal-dialog" style="width: 1100px !important;">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Form Data Film</h4>
                  </div>
                  <div class="modal-body" style="overflow-y: scroll;">
                    <form method="post" id="form-master-film" style="margin: 0px 6px 6px 6px;">
                      <input type="hidden" name="FILM_ID" value="0">
                      
                      <div class="col-md-6">
                        <div class="col-md-4">
                            <label>Judul Film</label>
                        </div>
                        <div class="col-md-8">
                          <div class="form-group">
                            <input type="text" class="form-control input-md" name="JUDUL" required>
                          </div>
                        </div>

                        <div class="col-md-4">
                            <label>Sutradara</label>
                        </div>
                        <div class="col-md-8">
                          <div class="form-group">
                            <input type="text" class="form-control input-md" name="SUTRADARA" required>
                          </div>
                        </div>

                        <div class="col-md-4">
                            <label>Produser</label>
                        </div>
                        <div class="col-md-8">
                          <div class="form-group">
                            <input type="text" class="form-control input-md" name="PRODUSER">
                          </div>
                        </div>

                        <div class="col-md-4">
                            <label>Rumah Produksi</label>
                        </div>
                        <div class="col-md-8">
                          <div class="form-group">
                            <input type="text" class="form-control input-md" name="RUMAH_PRODUKSI">
                          </div>
                        </div>

                        <div class="col-md-4">
                            <label>Durasi</label>
                        </div>
                        <div class="col-md-8">
                          <div class="form-group">
                            <input type="number" placeholder="Menit" class="form-control input-md" name="DURASI" required><br>
                            <i>Durasi dalam Menit</i>
                          </div>
                        </div>

                        <div class="col-md-4">
                            <label>Tahun</label>
                        </div>
                        <div class="col-md-8">
                          <div class="form-group">
                            <input type="text" class="form-control input-md" name="TAHUN">
                          </div>
                        </div>

                        <div class="col-md-4">
                            <label>Jenis Film</label>
                        </div>
                        <div class="col-md-8">
                          <div class="form-group">
                            <select class="form-control input-md" name="JENIS_FILM_ID" required>
                              <option value="">Pilih</option>
                            <?php foreach ($data_jenis_film as $key => $v) {
                              echo '<option value="'.$v->JENIS_FILM_ID.'">'.$v->NAMA.'</option>';
                            } ?>
                            </select>
                          </div>
                        </div>

                        <div class="col-md-4">
                            <label>Format Film</label>
                        </div>
                        <div class="col-md-8">
                          <div class="form-group">
                            <select class="form-control input-md" name="FORMAT_ID" required>
                              <option value="">Pilih</option>
                            <?php foreach ($data_format as $key => $v) {
                              echo '<option value="'.$v->FORMAT_ID.'">'.$v->NAMA.'</option>';
                            } ?>
                            </select>
                          </div>
                        </div>

                        <div class="col-md-4">
                            <label>Sinopsis</label>
                        </div>
                        <div class="col-md-8">
                          <div class="form-group">
                              <textarea class="form-control input-md" name="SINOPSIS"></textarea>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="col-md-4">
                            <label>Keterangan</label>
                        </div>
                        <div class="col-md-8">
                          <div class="form-group">
                              <textarea class="form-control input-md" name="KETERANGAN"></textarea>
                          </div>
                        </div>

                        <div class="col-md-4">
                            <label>Negara</label>
                        </div>
                        <div class="col-md-8">
                          <div class="form-group">
                            <input type="text" class="form-control input-md" name="NEGARA">
                          </div>
                        </div>

                        <div class="col-md-4">
                            <label>Bahasa</label>
                        </div>
                        <div class="col-md-8">
                          <div class="form-group">
                            <input type="text" class="form-control input-md" name="BAHASA">
                          </div>
                        </div>

                        <div class="col-md-4">
                            <label>Subteks</label>
                        </div>
                        <div class="col-md-8">
                          <div class="form-group">
                            <input type="text" class="form-control input-md" name="SUBTEKS">
                          </div>
                        </div>

                        <br>
                        <div class="col-md-12">
                          <label>Kontak Film:</label>
                        </div>

                        <div class="col-md-4">
                            <label>Email</label>
                        </div>
                        <div class="col-md-8">
                          <div class="form-group">
                            <input type="text" class="form-control input-md" name="KONTAK_EMAIL">
                          </div>
                        </div>

                        <div class="col-md-4">
                            <label>Handphone</label>
                        </div>
                        <div class="col-md-8">
                          <div class="form-group">
                            <input type="text" class="form-control input-md" name="KONTAK_HP">
                          </div>
                        </div>

                        <div class="col-md-4">
                            <label>Alamat</label>
                        </div>
                        <div class="col-md-8">
                          <div class="form-group">
                              <textarea class="form-control input-md" name="KONTAK_ALAMAT"></textarea>
                          </div>
                        </div>

                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <div class="row">
                      <div class="col-md-6">
                        <button type="button" class="btn btn-primary form-control" id="btn-simpan">Simpan</button>
                      </div>
                      <div class="col-md-6">
                        <button type="button" class="btn btn-default form-control" data-dismiss="modal">Batal</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
