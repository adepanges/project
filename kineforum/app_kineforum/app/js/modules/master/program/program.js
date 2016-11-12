$(document).ready(function() {
  program = {
    launch: function() {
      $('.field-tanggal').datepicker({
        format: 'dd/mm/yyyy',
        language: "id"
      });


      // membuat modal
      $('#btn-tambah').click(function() {
        $('#form-master-program')[0].reset();
        $('#form-master-program [name=PROGRAM_ID]').val(0);

        $('#modal-master-program').modal({
          keyboard: false,
          backdrop: 'static'
        });
      });

      $('#form-master-program').validate();


      // simpan
      $('#btn-simpan').click(function() {
        var url = app.data.site_url + "/master/program/app/simpan";
        var form = $('#form-master-program').serializeArray();
        // var formData = new FormData($('#form-berkas-kalender-diklat')[0]);
        var params = helper.convert_form(form);
        var kosong = false;

        if (!$('#form-master-program').valid()) {
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
              document.getElementById("form-master-program").reset();
              $('#table-master-program').DataTable().ajax.reload();
              $('#modal-master-program').modal('hide');
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
          var url = app.data.site_url + "/master/program/app/del";

          helper.body_mask();
          $.ajax({
              method: "POST",
              url: url,
              data: {
                PROGRAM_ID: program.selected.PROGRAM_ID
              }
            })
            .done(function(data) {
              $('#table-master-program').DataTable().ajax.reload();
              helper.body_unmask();
            })
        });
      });

      // ubah
      $('#btn-ubah').click(function() {
        $('#modal-master-program').modal({
          keyboard: false,
          backdrop: 'static'
        });

        helper.set_form_value($('#form-master-program'), program.selected);
      });

      $('#filter').click(function() {
        $('#table-master-program').DataTable().ajax.reload();
      });

      var i = 1;
      var table = $('#table-master-program').
      on('preXhr.dt', function(e, settings, data) {
        data.PROGRAM = $('#filter-program').val();
        data.DATE_MULAI = $('#filter-tanggalmulai').val();
        data.DATE_SELESAI = $('#filter-tanggalselesai').val();
        data.ORDER_FIELD = $('#urutkan-field').val();
        data.ORDER_TYPE = $('#urutkan-type').val();

        $('#btn-hapus').attr('disabled', 'disabled');
        $('#btn-ubah').attr('disabled', 'disabled');

        $('#content-program').html('');
        program.data = [];

        i = 1;
        if ($('#table-master-program').DataTable().ajax.params()) {
          i = $('#table-master-program').DataTable().ajax.params().start;
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
          lengthChange: false,
          ajax: {
            url: app.data.site_url + "/master/program/app/get",
            dataSrc: 'data',
            type: 'POST'
          },
          columns: [{
            data: "PROGRAM_ID",
            render: function(data, type, full, meta) {
              if (meta.row == 0) {
                i = $('#table-master-program').DataTable().ajax.params().start;
                i++;
                $('#content-program').html('');
              }
              var str = program.generate_box(i, full);

              $('#content-program').append(str);
              i++;
              return data;
            }
          }]
        });

      // tambah event selected
      $('#content-program').on('click', '#box-film', function() {
        var no = parseInt($(this).find('.info-box-icon').html());
        program.selected = program.data[no];


        $('#btn-hapus').removeAttr('disabled');
        $('#btn-ubah').removeAttr('disabled');

        $('#content-program .info-box.selected').removeClass('selected');

        $(this).addClass('selected');
      });

      $('#content-program').on('dblclick', '#box-film', function() {
        $('#daftar-program').hide();
        $('#detail-program').fadeIn(200);

        // $(this).addClass('selected');
      });

      $('#btn-kembali').click(function() {
        $('#detail-program').hide();
        $('#daftar-program').fadeIn(200);

        // $(this).addClass('selected');
      });

    },
    data: [],
    selected: {},
    generate_box: function(no, data) {
      program.data[no] = data;
      var html = '' +
        '<div class="col-md-4 col-sm-6 col-xs-12">' +
        '  <div class="info-box" id="box-film">' +
        '    <span class="info-box-icon bg-aqua">' + no + '</span>' +
        '    <div class="info-box-content">' +
        '      <span class="info-box-info info-box-judul">' + data.PROGRAM + '</span>' +
        '      <span class="info-box-info info-box-informasi"><i>' + data.TANGGAL_MULAI + ' - ' + data.TANGGAL_SELESAI + '</i></span>' +
        '    </div>' +
        '  </div>' +
        '</div>';
      return html;
    }
  };

  $('#content-program').html('');
  program.launch();
});