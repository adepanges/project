$(document).ready(function() {
  jenis_film = {
    launch: function() {
      // membuat modal
       $('#btn-tambah').click(function() {
         $('#modal-jenis-film').modal({
           keyboard: false,
           backdrop: 'static'
         });
       });


      // simpan
      $('#btn-simpan').click(function() {
        var url = app.data.site_url + "/master/film/jenis/simpan";
        var form = $('#form-master-jenis-film').serializeArray();
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
              document.getElementById("form-master-jenis-film").reset();
              $('#table-master-jenis-film').DataTable().ajax.reload();
              $('#modal-jenis-film').modal('hide');
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
          var url = app.data.site_url + "/master/film/jenis/del";

          helper.body_mask();
          $.ajax({
              method: "POST",
              url: url,
              data: {
                JENIS_FILM_ID: jenis_film.selected.JENIS_FILM_ID
              }
            })
            .done(function(data) {
              $('#table-master-jenis-film').DataTable().ajax.reload();
              helper.body_unmask();
            })
        });
      });

      // ubah
      $('#btn-ubah').click(function() {
        $('#modal-jenis-film').modal({
          keyboard: false,
          backdrop: 'static'
        });

        helper.set_form_value($('#form-master-jenis-film'), jenis_film.selected);
      });

      var i = 1;
      var table = $('#table-master-jenis-film').
      on('preXhr.dt', function(e, settings, data) {
          // data.cari = $('#cariPegawai').val();

          $('#btn-hapus').attr('disabled', 'disabled');
          $('#btn-ubah').attr('disabled', 'disabled');

          i = 1;
          if ($('#table-master-jenis-film').DataTable().ajax.params()) {
            i = $('#table-master-jenis-film').DataTable().ajax.params().start;
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
            url: app.data.site_url + "/master/film/jenis/get",
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
      $('#table-master-jenis-film tbody').on('click', 'tr', function() {
        jenis_film.selected = table.row(this).data();

        $('#btn-hapus').removeAttr('disabled');
        $('#btn-ubah').removeAttr('disabled');

        $('#table-master-jenis-film tbody tr').removeClass('selected');

        $(this).find('tr.selected').removeClass('selected');
        $(this).addClass('selected');
      });

    },
    selected: {}
  };

  jenis_film.launch();
});