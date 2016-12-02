            <div class="modal" id="modal-master-program-slot">
              <div class="modal-dialog" style="width: 500px !important;">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Form Data Slot</h4>
                  </div>
                  <div class="modal-body" style="overflow-y: scroll;">
                    <form method="post" id="form-master-program-slot" style="margin: 0px 6px 6px 6px;">
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

                    </form>
                  </div>
                  <div class="modal-footer">
                    <div class="row">
                      <div class="col-md-6">
                        <button type="button" class="btn btn-primary form-control" id="btn-simpan-slot">Simpan</button>
                      </div>
                      <div class="col-md-6">
                        <button type="button" class="btn btn-default form-control" data-dismiss="modal">Batal</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
