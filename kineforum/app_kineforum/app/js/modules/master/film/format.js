$(document).ready(function() {
  master_format = {
    launch: function() {
      // membuat modal
      $('#btn-tambah').click(function() {
        $('#modal-format-film').modal({
          keyboard: false,
          backdrop: 'static'
        });
      });


      // simpan
      $('#btn-simpan').click(function() {
        var url = app.data.site_url + "/master/film/format/simpan";
        var form = $('#form-master-format-film').serializeArray();
        // var formData = new FormData($('#form-berkas-kalender-diklat')[0]);
        var params = helper.convert_form(form);
        var kosong = false;

        helper.body_mask();
        $.ajax({
            method: "POST",
            url: url,
            data: params,
            // async: false,
            // cache: false,
            // contentType: false,
            // processData: false,
          })
          .done(function(data) {
            helper.body_unmask();

            var obj = jQuery.parseJSON(data);

            if (obj.success == true) {
              document.getElementById("form-master-format-film").reset();
              $('#table-master-format').DataTable().ajax.reload();
              $('#modal-format-film').modal('hide');
            } else {
                $('#modal-notifikasi .modal-body').html(obj.msg);
               $('#notif').modal({
                 keyboard: false,
                 backdrop: 'static'
               });
            }
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
          var url = app.data.site_url + "/master/film/format/del";

          helper.body_mask();
          $.ajax({
              method: "POST",
              url: url,
              data: {
                FORMAT_ID: master_format.selected.FORMAT_ID
              }
            })
            .done(function(data) {
              $('#table-master-format').DataTable().ajax.reload();
              helper.body_unmask();
            })
        });
      });

      // ubah
      $('#btn-ubah').click(function() {
        $('#modal-format-film').modal({
          keyboard: false,
          backdrop: 'static'
        });

        helper.set_form_value($('#form-master-format-film'), master_format.selected);
      });

      var i = 1;
      var table = $('#table-master-format').
      on('preXhr.dt', function(e, settings, data) {
          // data.cari = $('#cariPegawai').val();

          $('#btn-hapus').attr('disabled', 'disabled');
          $('#btn-ubah').attr('disabled', 'disabled');

          i = 1;
          if ($('#table-master-format').DataTable().ajax.params()) {
            i = $('#table-master-format').DataTable().ajax.params().start;
            i++;
          }
        })
        .DataTable({
          ordering: false,
          paging: false,
          bFilter: false,
          bInfo: false,
          processing: true,
          serverSide: true,
          ajax: {
            url: app.data.site_url + "/master/film/format/get",
            dataSrc: 'data',
            type: 'POST'
          },
          columns: [{
            "data": "FORMAT_ID",
            "render": function(data, type, full, meta) {
              return i++;
            }
          }, {
            "data": "NAMA"
          }, {
            "data": "KETERANGAN"
          }]
        });

      // tambah event selected
      $('#table-master-format tbody').on('click', 'tr', function() {
        master_format.selected = table.row(this).data();

        $('#btn-hapus').removeAttr('disabled');
        $('#btn-ubah').removeAttr('disabled');

        $('#table-master-format tbody tr').removeClass('selected');

        $(this).find('tr.selected').removeClass('selected');
        $(this).addClass('selected');
      });
    },
    selected: {}
  };

  master_format.launch();
});