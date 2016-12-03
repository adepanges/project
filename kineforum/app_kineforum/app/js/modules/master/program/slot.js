$(document).ready(function() {
    slot = {
        launch: function() {
            // membuat modal
            $('#btn-tambah-slot').click(function() {
                $('#form-master-program-slot')[0].reset();
                $('#form-master-program-slot [name=SLOT_ID]').val(0);
                $('#form-master-program-slot [name=PROGRAM_ID]').val(program.selected.PROGRAM_ID);

                $('#modal-master-program-slot').modal({
                    keyboard: false,
                    backdrop: 'static'
                });
            });

            // ubah
            $('#btn-ubah-slot').click(function() {
                $('#modal-master-program-slot').modal({
                    keyboard: false,
                    backdrop: 'static'
                });

                helper.set_form_value($('#form-master-program-slot'), slot.selected);
            });

            // simpan
            $('#btn-simpan-slot').click(function() {
                var url = app.data.site_url + "/master/program/slot/simpan";
                var form = $('#form-master-program-slot').serializeArray();
                var params = helper.convert_form(form);

                helper.body_mask();
                $.ajax({
                        method: "POST",
                        url: url,
                        data: params,
                    })
                    .done(function(data) {
                        helper.body_unmask();

                        var obj = jQuery.parseJSON(data);

                        if (obj.success == true) {
                            document.getElementById("form-master-program-slot").reset();
                            $('#table-program-slot').DataTable().ajax.reload();
                            $('#modal-master-program-slot').modal('hide');
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
            $('#btn-hapus-slot').click(function() {
                $('#modal-konfirmasi').modal({
                    keyboard: false,
                    backdrop: 'static'
                });

                $('#btn-ya').click(function() {
                    $('#btn-ya').unbind('click');
                    var url = app.data.site_url + "/master/program/slot/del";

                    helper.body_mask();
                    $.ajax({
                            method: "POST",
                            url: url,
                            data: {
                                SLOT_ID: slot.selected.SLOT_ID
                            }
                        })
                        .done(function(data) {
                            $('#table-program-slot').DataTable().ajax.reload();
                            helper.body_unmask();
                        })
                });
            });


            var i = 1;
            var table = $('#table-program-slot').
            on('preXhr.dt', function(e, settings, data) {
                    data.PROGRAM_ID = program.selected.PROGRAM_ID;
                    slot.selected = {};

                    $('#btn-ubah-slot').attr('disabled', 'disabled');
                    $('#btn-hapus-slot').attr('disabled', 'disabled');
                    $('#btn-tambah-slot-film').attr('disabled', 'disabled');

                    if(settings.iDraw>1){
                        $('#table-program-slot-film').DataTable().clear().draw();
                    }

                    i = 1;
                    if ($('#table-program-slot').DataTable().ajax.params()) {
                        i = $('#table-program-slot').DataTable().ajax.params().start;
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
                        url: app.data.site_url + "/master/program/slot/get",
                        dataSrc: 'data',
                        type: 'POST'
                    },
                    columns: [{
                        "data": "SLOT_ID",
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
            $('#table-program-slot tbody').on('click', 'tr', function() {
                slot.selected = table.row(this).data();

                $('#btn-ubah-slot').removeAttr('disabled');
                $('#btn-hapus-slot').removeAttr('disabled');
                $('#btn-tambah-slot-film').removeAttr('disabled');

                $('#table-program-slot tbody tr').removeClass('selected');

                $(this).find('tr.selected').removeClass('selected');
                $(this).addClass('selected');

                $('#table-program-slot-film').DataTable().ajax.reload();
            });


        },
        selected: {},
    };

    // $('#content-program').html('');
    slot.launch();
});