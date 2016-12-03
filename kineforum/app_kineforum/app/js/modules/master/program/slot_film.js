$(document).ready(function() {
    slot_film = {
        launch: function() {
            // membuat modal
            $('#btn-tambah-slot-film').click(function() {
                $('#slot-film-temp #film-droped').html('');
                $('#table-pilih-film').DataTable().ajax.reload();

                $('#modal-pilih-film-slot').modal({
                    keyboard: false,
                    backdrop: 'static'
                });
            });

            $('#btn-slot-film-tambah').click(function() {
                var params = {
                    SLOT_ID: slot.selected.SLOT_ID,
                    FILM_ID: JSON.stringify([slot_film.selected_pilihan.FILM_ID]),
                };

                var length = $('#content-film .info-box.selected').length;
                if (length == 0) {
                    $('#modal-warning .modal-body').html('Pilih film terlebih dahulu');
                    $('#modal-warning').modal({
                        keyboard: false,
                        backdrop: 'static'
                    });
                } else {
                    slot_film.send_film(params);
                }
            });

            $('#btn-slot-film-simpan').click(function() {
                var FILM_ID = [],
                    el = $('#film-droped [name=FILM_ID]')

                var length = el.length;
                for (j = 0; j < length; j++) {
                    FILM_ID[j] = $(el[j]).val();
                }

                var params = {
                    SLOT_ID: slot.selected.SLOT_ID,
                    FILM_ID: JSON.stringify(FILM_ID),
                };

                if (length == 0) {
                    $('#modal-warning .modal-body').html('Pilih film terlebih dahulu');
                    $('#modal-warning').modal({
                        keyboard: false,
                        backdrop: 'static'
                    });
                } else {
                    slot_film.send_film(params);
                }
            });

            // hapus
            $('#btn-hapus-slot-film').click(function() {
                $('#modal-konfirmasi').modal({
                    keyboard: false,
                    backdrop: 'static'
                });

                $('#btn-ya').click(function() {
                    $('#btn-ya').unbind('click');
                    var url = app.data.site_url + "/master/program/film/del";

                    helper.body_mask();
                    $.ajax({
                            method: "POST",
                            url: url,
                            data: {
                                SLOT_FILM_ID: slot_film.selected.SLOT_FILM_ID
                            }
                        })
                        .done(function(data) {
                            $('#table-program-slot-film').DataTable().ajax.reload();
                            helper.body_unmask();
                        })
                });
            });


            var i = 1;
            var table_film = $('#table-program-slot-film').
            on('preXhr.dt', function(e, settings, data) {
                    data.SLOT_ID = slot.selected.SLOT_ID;

                    $('#btn-hapus-slot-film').attr('disabled', 'disabled');
                    slot_film.data = [];

                    i = 1;
                    if ($('#table-program-slot-film').DataTable().ajax.params()) {
                        i = $('#table-program-slot-film').DataTable().ajax.params().start;
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
                        url: app.data.site_url + "/master/program/film/get",
                        dataSrc: 'data',
                        type: 'POST'
                    },
                    columns: [{
                        "data": "SLOT_FILM_ID",
                        "render": function(data, type, full, meta) {
                            return i++;
                        }
                    }, {
                        "data": "JUDUL"
                    }, {
                        "data": "SUTRADARA"
                    }, {
                        "data": "DURASI"
                    }]
                });

            // tambah event selected
            $('#table-program-slot-film tbody').on('click', 'tr', function() {
                slot_film.selected = table_film.row(this).data();

                $('#btn-hapus-slot-film').removeAttr('disabled');

                $('#table-program-slot-film tbody tr').removeClass('selected');

                $(this).find('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            });

            // --------------------------------------------------

            $('#filter-pilihan').click(function() {
                $('#table-pilih-film').DataTable().ajax.reload();
            });

            var ii = 1;
            var table = $('#table-pilih-film').
            on('preXhr.dt', function(e, settings, data) {
                data.JUDUL = $('#filter-judul').val();
                data.SUTRADARA = $('#filter-sutradara').val();
                data.FORMAT_ID = $('#filter-format').val();
                data.JENIS_FILM_ID = $('#filter-jenisfilm').val();
                data.ORDER_FIELD = $('#urutkan-field').val();
                data.ORDER_TYPE = $('#urutkan-type').val();

                // $('#btn-hapus').attr('disabled', 'disabled');
                // $('#btn-ubah').attr('disabled', 'disabled');

                $('#content-film').html('');
                slot_film.selected_pilihan = [];

                ii = 1;
                if ($('#table-pilih-film').DataTable().ajax.params()) {
                    ii = $('#table-pilih-film').DataTable().ajax.params().start;
                    ii++;
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
                                ii = $('#table-pilih-film').DataTable().ajax.params().start;
                                ii++;
                                $('#content-film').html('');
                            }
                            var str = slot_film.generate_box(ii, full);

                            $('#content-film').append(str);
                            ii++;
                            return data;
                        }
                    }]
                });

            // tambah event selected
            $('#content-film').on('click', '#box-film', function() {
                var no = parseInt($(this).find('.info-box-icon').html());
                slot_film.selected_pilihan = slot_film.data[no];


                $('#btn-hapus').removeAttr('disabled');
                $('#btn-ubah').removeAttr('disabled');

                $('#content-film .info-box.selected').removeClass('selected');

                $(this).addClass('selected');
            });
        },
        send_film: function(params) {
            helper.body_mask();
            $.ajax({
                    method: "POST",
                    url: app.data.site_url + "/master/program/film/simpan",
                    data: params,
                })
                .done(function(data) {
                    helper.body_unmask();

                    var obj = jQuery.parseJSON(data);

                    if (obj.success == true) {
                        $('#table-program-slot-film').DataTable().ajax.reload();
                        $('#modal-pilih-film-slot').modal('hide');
                    } else {
                        $('#modal-notifikasi .modal-body').html(obj.msg);
                        $('#modal-notifikasi').modal({
                            keyboard: false,
                            backdrop: 'static'
                        });
                    }
                });
        },
        data: [],
        selected: {},
        selected_pilihan: {},
        el_drag: {},
        generate_box: function(no, data) {
            slot_film.data[no] = data;

            var html = '' +
                '<div class="col-md-4 col-sm-6 col-xs-12 box-film-drag film-' + no + '" draggable="true">' +
                '  <div class="info-box" id="box-film">' +
                '    <input type="hidden" name="FILM_ID" value="' + data.FILM_ID + '">' +
                '    <span class="info-box-icon bg-aqua">' + no + '</span>' +
                '    <div class="info-box-content">' +
                '      <span class="info-box-info info-box-judul" style="font-size: 13px;">' + data.JUDUL + '</span>' +
                '      <span class="info-box-info info-box-sutradara" style="font-size: 12px;">' + data.SUTRADARA + '</span>' +
                '      <span class="info-box-info info-box-informasi" style="font-size: 12px;"><i>' + data.JENIS_FILM + ' - ' + data.FORMAT + '</i></span>' +
                '    </div>' +
                '  </div>' +
                '</div>';
            return html;
        }
    };

    slot_film.launch();
});

$("#content-film").delegate(".box-film-drag", "dragstart", function(e) {
    e.originalEvent.dataTransfer.setData("selector", e.target.className);
});

$("#slot-film-temp").delegate("#film-droped", "dragover", function(e) {
    e.preventDefault();
});

$("#slot-film-temp").delegate("#film-droped", "drop", function(e) {
    e.preventDefault();
    var selector = e.originalEvent.dataTransfer.getData("selector");
    selector = selector.split(' ');
    selector = '.' + selector.join('.');

    el = $(selector);

    el.removeClass('col-md-4 col-sm-6 col-xs-12');
    el.addClass('col-md-12');

    if (el.length) {
        $(this).append(el[0]);
    }
});