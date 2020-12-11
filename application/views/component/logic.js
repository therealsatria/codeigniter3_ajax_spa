
    var tabledata = $('#example').DataTable({
      "ajax": "<?= base_url('MainController/dataJSON'); ?>",
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });

    //add data
    function getlastid() {
          $.ajax({
                url: "<?= base_url('MainController/lastid'); ?>",
                cache: "false",
                success: function (x) {
                    var i = 1;
                    var y = parseInt(x)+parseInt(i);
                    $("#id_barang").val(y);
                },
            })
    }

    function clear(){
      $("#id_barang").val('');
      $("#nama_barang").val('');
      $("#harga").val('');
      $("#stok").val('');
      $("#supplier").val('');
      getlastid()
    }

    $("#store").click(function(){
      simpandata();
    });

    function simpandata() {
      var v1 = $("#id_barang").val();
      var v2 = $("#nama_barang").val();
      var v3 = $("#harga").val();
      var v4 = $("#stok").val();
      var v5 = $("#supplier").val();

      //var vt64 = document.getElementById('ttd_pasien_f4');
      //var v48 = vt48.toDataURL('image/png');

      if (v1 == "" || v2 == "" || v3 == "" || v4 == "") {
         swal('Gagal', 'Ada Isian Yang Masih Kosong', 'error');
         return;
      }

      $.ajax({
         url: "<?= base_url('MainController/store'); ?>",
         method: "POST",
         data: {
            v1: v1,
            v2: v2,
            v3: v3,
            v4: v4,
            v5: v5,

         },
         cache: "false",
         success: function (x) {
            console.log(x);
            document.getElementById("home").click();
            if (x == 1) {
               swal('Berhasil', 'Data Berhasil di Simpan', 'success');
               return;
            } else {
               swal('Gagal', 'Data Gagal di Simpan', 'error');
               return;
            }
         }
      })
    }

    //edit data
    function get(id) {
            var no = id;
            if (no == "") {
                swal('Gagal', 'Data Gagal di cari', 'error');
                return;
            }
            $.ajax({
                url: "<?= base_url('MainController/filter'); ?>",
                method: "POST",
                data: {
                    no: no,
                },
                cache: "false",
                success: function (x) {
                    console.log(x);
                    if (x == 0) {
                        swal('gagal', 'data kosong', 'error');
                        return;
                    } else {
                        var tx = x.split("|");
                        $("#e_id_barang").val(tx[0]);
                        $("#e_nama_barang").val(tx[1]);
                        $("#e_harga").val(tx[2]);
                        $("#e_stok").val(tx[3]);
                        $("#e_supplier").val(tx[4]);
                        edit_page();
                    }
                },
                error: function () {
                }
            })
        }


    $("#update").click(function(){
      updatedata();
    });

    function updatedata() {
      var v1 = $("#e_id_barang").val();
      var v2 = $("#e_nama_barang").val();
      var v3 = $("#e_harga").val();
      var v4 = $("#e_stok").val();
      var v5 = $("#e_supplier").val();

      //var vt64 = document.getElementById('ttd_pasien_f4');
      //var v48 = vt48.toDataURL('image/png');

      if (v1 == "" || v2 == "" || v3 == "" || v4 == "") {
         swal('Gagal', 'Ada Isian Yang Masih Kosong', 'error');
         return;
      }

      $.ajax({
         url: "<?= base_url('MainController/update'); ?>",
         method: "POST",
         data: {
            v1: v1,
            v2: v2,
            v3: v3,
            v4: v4,
            v5: v5,

         },
         cache: "false",
         success: function (x) {
            console.log(x);
            document.getElementById("home").click();
            if (x == 1) {
               swal('Berhasil', 'Data Berhasil di Simpan', 'success');
               return;
            } else {
               swal('Gagal', 'Data Gagal di Simpan', 'error');
               return;
            }
         }
      })
    }

    function hapus(el){
            var kode = $(el).data("kode");
            if(kode == ""){
                swal({title: 'Gagal', text: 'Data yang akan dihapus Invalid', type: 'error'});
                return;
            }
            swal({
                title: 'Hapus',
                text: "Anda Yakin Ingin Menghapus Data Barang ?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonClass: 'btn btn-confirm mt-2',
                cancelButtonClass: 'btn btn-cancel ml-2 mt-2',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak'
            }).then(function () {
                $.ajax({
                    url: "<?= base_url('MainController/drop'); ?>",
                    method: "POST",
                    data: {kd: kode},
                    cache: "false",
                    success: function(x){
                        if(x == 1){
                            swal({title: 'Berhasil', text: 'Data Barang Berhasil di Hapus', type: 'success'});
                            tabledata.ajax.reload(null, false);
                        }else{
                            swal({title: 'Gagal', text: 'Ada Beberapa Masalah dengan Data yang Anda Isikan !', type: 'error'});
                        }
                    }

                })
            })
        }
