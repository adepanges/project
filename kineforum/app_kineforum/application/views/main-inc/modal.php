            <style type="text/css">
              .modal table tr td{
                padding-top: 5px;
                padding-bottom: 5px;
              }
              #notif{
                z-index: 999999;
              }
            </style>
            <div class="modal" id="modal-ubah-password">
              <div class="modal-dialog" style="width: 400px !important;">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Ubah Password</h4>
                  </div>
                  <div class="modal-body">
                    <form method="post" id="form-ubah-password">
                      <div class="row" style="padding:10px;">
                        <table width="100%">
                          <tr>
                            <td>Password Lama</td>
                            <td><input type="password" name="passwordlama" id="passwordlama" class="form-control"></td>
                          </tr>
                          <tr>
                            <td>Password Baru</td>
                            <td><input type="password" name="password" id="passwordbaru" class="form-control"></td>
                          </tr>
                          <tr>
                            <td>Konfirmasi Password</td>
                            <td><input type="password" id="passwordbaru2" class="form-control"></td>
                          </tr>
                        </table>
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <div class="row">
                      <div class="col-md-6">
                        <button type="button" class="btn btn-primary form-control" id="button-ubah" disabled="">Ubah</button>
                      </div>
                      <div class="col-md-6">
                        <button type="button" class="btn btn-default form-control" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="modal" id="modal-warning" style="z-index:1060;">
              <div class="modal-dialog" style="width: 400px !important;">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Peringatan</h4>
                  </div>
                  <div class="modal-body">
                    Data tidak boleh ada yang kosong!
                  </div>
                  <div class="modal-footer">
                    <div class="row">
                      <div class="col-md-6">
                        
                      </div>
                      <div class="col-md-6">
                        <button type="button" class="btn btn-default form-control" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="modal" id="modal-notifikasi">
              <div class="modal-dialog" style="width: 400px !important;">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Informasi</h4>
                  </div>
                  <div class="modal-body">

                  </div>
                  <div class="modal-footer">
                    <div class="row">
                      <div class="col-md-6">
                        
                      </div>
                      <div class="col-md-6">
                        <button type="button" class="btn btn-default form-control" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="modal" id="modal-konfirmasi">
              <div class="modal-dialog" style="width: 400px !important;">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Konfirmasi</h4>
                  </div>
                  <div class="modal-body">
                   Apa anda yakin?
                  </div>
                  <div class="modal-footer">
                    <div class="row">
                      <div class="col-md-6">
                        <button type="button" class="btn btn-primary form-control" data-dismiss="modal" id="btn-ya">Ya</button>
                      </div>
                      <div class="col-md-6">
                        <button type="button" class="btn btn-default form-control" data-dismiss="modal">Tidak</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>