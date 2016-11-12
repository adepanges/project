$(document).ready(function() {
  film = {
    launch: function() {
      // membuat modal
      $('#btn-tambah').click(function() {
        $('#form-master-film')[0].reset();
        $('#form-master-film [name=FILM_ID]').val(0);

        $('#modal-master-film').modal({
          keyboard: false,
          backdrop: 'static'
        });
      });

      $('#form-master-film').validate();


      // simpan
      $('#btn-simpan').click(function() {
        var url = app.data.site_url + "/master/film/app/simpan";
        var form = $('#form-master-film').serializeArray();
        // var formData = new FormData($('#form-berkas-kalender-diklat')[0]);
        var params = helper.convert_form(form);
        var kosong = false;

        if (!$('#form-master-film').valid()) {
          return;
        }

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
              document.getElementById("form-master-film").reset();
              $('#table-master-film').DataTable().ajax.reload();
              $('#modal-master-film').modal('hide');
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
          var url = app.data.site_url + "/master/film/app/del";

          helper.body_mask();
          $.ajax({
              method: "POST",
              url: url,
              data: {
                FILM_ID: film.selected.FILM_ID
              }
            })
            .done(function(data) {
              $('#table-master-film').DataTable().ajax.reload();
              helper.body_unmask();
            })
        });
      });

      // ubah
      $('#btn-ubah').click(function() {
        $('#modal-master-film').modal({
          keyboard: false,
          backdrop: 'static'
        });

        helper.set_form_value($('#form-master-film'), film.selected);
      });

      $('#filter').click(function() {
        $('#table-master-film').DataTable().ajax.reload();
      });

      var i = 1;
      var table = $('#table-master-film').
      on('preXhr.dt', function(e, settings, data) {
        data.JUDUL = $('#filter-judul').val();
        data.SUTRADARA = $('#filter-sutradara').val();
        data.FORMAT_ID = $('#filter-format').val();
        data.JENIS_FILM_ID = $('#filter-jenisfilm').val();
        data.ORDER_FIELD = $('#urutkan-field').val();
        data.ORDER_TYPE = $('#urutkan-type').val();

        $('#btn-hapus').attr('disabled', 'disabled');
        $('#btn-ubah').attr('disabled', 'disabled');

        $('#content-film').html('');
        film.data = [];

        i = 1;
        if ($('#table-master-film').DataTable().ajax.params()) {
          i = $('#table-master-film').DataTable().ajax.params().start;
          i++;
        }
      }).
      on('draw.dt', function(e, settings, data) {
          
        })
        .DataTable({
          ordering: false,
          paging: true,
          bFilter: false,
          bInfo: false,
          processing: true,
          serverSide: true,
          ajax: {
            url: app.data.site_url + "/master/film/app/get",
            dataSrc: 'data',
            type: 'POST'
          },
          columns: [{
            data: "FILM_ID",
            render: function(data, type, full, meta) {
              if (meta.row == 0) {
                i = $('#table-master-film').DataTable().ajax.params().start;
                i++;
                $('#content-film').html('');
              }
              var str = film.generate_box(i, full);

              $('#content-film').append(str);
              i++;
              return data;
            }
          }]
        });

      // tambah event selected
      $('#content-film').on('click', '#box-film', function() {
        var no = parseInt($(this).find('.info-box-icon').html());
        film.selected = film.data[no];


        $('#btn-hapus').removeAttr('disabled');
        $('#btn-ubah').removeAttr('disabled');

        $('#content-film .info-box.selected').removeClass('selected');

        $(this).addClass('selected');
      });

    },
    data: [],
    selected: {},
    generate_box: function(no, data) {
      film.data[no] = data;
      var html = '' +
        '<div class="col-md-4 col-sm-6 col-xs-12">' +
        '  <div class="info-box" id="box-film">' +
        '    <span class="info-box-icon bg-aqua">' + no + '</span>' +
        '    <div class="info-box-content">' +
        '      <span class="info-box-info info-box-judul">' + data.JUDUL + '</span>' +
        '      <span class="info-box-info info-box-sutradara">' + data.SUTRADARA + '</span>' +
        '      <span class="info-box-info info-box-informasi"><i>' + data.JENIS_FILM + ' - ' + data.FORMAT + '</i></span>' +
        '    </div>' +
        '  </div>' +
        '</div>';
      return html;
    }
  };

  $('#content-film').html('');
  film.launch();
});