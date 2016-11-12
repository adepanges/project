$(document).ready(function() {
  var mata_diklat = {
    load: {
      css: [
        app.data.url_plugins + "datatables/css/jquery.dataTables.min.css",
        app.data.url_plugins + "datatables/extensions/Select/css/select.dataTables.min.css",
        app.data.url_plugins + "datatables/css/dataTables.bootstrap.css",
      ],
      success: function() {

        // simpan
        $('#btn-simpan').click(function() {
          var url = app.data.site_url + "/master/mata_diklat/simpan";
          var form = $('#form-master-mata-diklat').serializeArray();
          var formData = new FormData($('#form-master-mata-diklat')[0]);
          var params = app.convert_form(form);
          var kosong = false;

          app.body_mask();
          $.ajax({
              method: "POST",
              url: url,
              data: formData,
              async: false,
              cache: false,
              contentType: false,
              processData: false,
            })
            .done(function(data) {
              app.body_unmask();

              var obj = jQuery.parseJSON(data);

              if (obj.success == true) {
                document.getElementById("form-master-mata-diklat").reset();
                $('#table-daftar-mata-diklat').DataTable().ajax.reload();
                $('#modal-form-mata-diklat').modal('hide');
              } else {
                /* $('#notif .modal-body').html(obj.msg);
                 $('#notif').modal({
                   keyboard: false,
                   backdrop: 'static'
                 });*/
              }
            });
        });

        // membuat modal
        $('#btn-tambah').click(function() {
          $('#modal-form-mata-diklat').modal({
            keyboard: false,
            backdrop: 'static'
          });
        });

        // hapus
        $('#btn-hapus').click(function() {
          $('#modal-konfirmasi').modal({
            keyboard: false,
            backdrop: 'static'
          });

          $('#btn-ya').click(function() {
            $('#btn-ya').unbind('click');
            var url = app.data.site_url + "/master/mata_diklat/del";

            app.body_mask();
            $.ajax({
                method: "POST",
                url: url,
                data: {
                  MATADIKLATID: mata_diklat.selected.MATADIKLATID
                }
              })
              .done(function(data) {
                $('#table-daftar-mata-diklat').DataTable().ajax.reload();
                app.body_unmask();
              })
          });
        });

        // ubah
        $('#btn-ubah').click(function() {
          $('#modal-form-mata-diklat').modal({
            keyboard: false,
            backdrop: 'static'
          });

          app.set_form_value($('#form-master-mata-diklat'), mata_diklat.selected);
        });

        // membuat datatable
        var i = 1;
        var table = $('#table-daftar-mata-diklat').
        on('preXhr.dt', function(e, settings, data) {
            // data.cari = $('#cariPegawai').val();
            $('#btn-hapus').attr('disabled', 'disabled');
            $('#btn-ubah').attr('disabled', 'disabled');

            i = 1;
            if ($('#tablePegawai').DataTable().ajax.params()) {
              i = $('#tablePegawai').DataTable().ajax.params().start;
              i++;
            }
          })
          .DataTable({
            ordering: false,
            paging: true,
            bFilter: false,
            bInfo: false,
            processing: true,
            serverSide: true,
            ajax: {
              url: app.data.site_url + "/master/mata_diklat/get",
              dataSrc: 'data',
              type: 'POST'
            },
            columns: [{
              "data": "MATADIKLATID",
              "render": function(data, type, full, meta) {
                return i++;
              }
            }, {
              "data": "MATADIKLAT"
            }, {
              "data": "DESKRIPSI"
            }, {
              "data": "KOMPETENSIDASAR"
            }, {
              "data": "WAKTU"
            }, {
              "data": "FILEMATERI",
              /*"render": function(data, type, full, meta) {
                return '<span style="cursor: pointer !important;" class="fa fa-plus tambahPegawai cursor-pointer"><input class="nomor_pekerja" type="hidden" value="' + data + '"></span>';
              }*/
            }]
          });

        // tambah event selected
        $('#table-daftar-mata-diklat tbody').on('click', 'tr', function() {
          mata_diklat.selected = table.row(this).data();
          $('#btn-hapus').removeAttr('disabled');
          $('#btn-ubah').removeAttr('disabled');
          $('#table-daftar-mata-diklat tbody tr').removeClass('selected');

          $(this).find('tr.selected').removeClass('selected');
          $(this).addClass('selected');
        });
      }
    },
    selected: {},
    form_tambah: function() {
      $('#modal-form-mata-diklat').modal({
        keyboard: false,
        backdrop: 'static'
      });
    }
  };

  app.loader(mata_diklat);
});