<!-- untuk CKEDITOR -->

<script type="text/javascript">

  function showBarang(str) 
  {

      if (str == "") {
          $('#nama_produk').val('');
          $('#harga').val('');
          $('#jumlah').val('');
          $('#sub_total').val('');
          $('#reset').hide();
          return;
      } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
             xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
             if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("barang").innerHTML = 
                xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "<?= base_url(
          'admin/kasir/getbarang') ?>/"+str,true);
        xmlhttp.send();
      }
  }

  function subTotal(qty)
  {

    var harga = $('#harga').val().replace(".", "").replace(".", "");

    $('#sub_total').val(convertToRupiah(harga*qty));
  }

  function convertToRupiah(angka)
  {

      var rupiah = '';    
      var angkarev = angka.toString().split('').reverse().join('');
      
      for(var i = 0; i < angkarev.length; i++) 
        if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
      
      return rupiah.split('',rupiah.length-1).reverse().join('');
  
  }

  var table;
    $(document).ready(function() {

      showKembali($('#bayar').val());

      table = $('#table_transaksi').DataTable({ 
        paging: false,
        "info": false,
        "searching": false,
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' 
        // server-side processing mode.
        
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?= site_url('admin/kasir/ajax_list_transaksi')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
          "targets": [ 0,1,2,3,4,5,6 ], //last column
          "orderable": false, //set not orderable
        },
        ],

      });
    });

    function reload_table()
    {

      table.ajax.reload(null,false); //reload datatable ajax 
    
    }

    function addbarang()
    {
        kode_produk = $('#kode_produk').val();
        qstok = parseInt($('[name="qty"]').val());
        b = console.log(qstok)
        jumlah  = parseInt($('#jumlah').val());
        j = console.log(jumlah)
        if(qstok > jumlah){
              alert('Stok Melebihi Kapasitas Produk');
              return false
              }
        if (kode_produk == '') {
          $('#kode_produk').focus();

        }else{
       // ajax adding data to database
          $.ajax({
            url : "<?= site_url('admin/kasir/addbarang')?>",
            type: "POST",
            data: $('#form_transaksi').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //reload ajax table
               
               reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding data');
            }
        });

          showTotal();
          showKembali($('#bayar').val());
          //mereset semua value setelah btn tambah ditekan
          $('.reset').val('');
        };
    }

    function deletebarang(id,sub_total)
    {
        // ajax delete data to database
          $.ajax({
            url : "<?= site_url('admin/kasir/deletebarang')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
               reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });

          var ttl = $('#total').val().replace(".", "");

          $('#total').val(convertToRupiah(ttl-sub_total));

          showKembali($('#bayar').val());
    }

    function showTotal()
    {

      var total = $('#total').val().replace(".", "").replace(".", "");

      var sub_total = $('#sub_total').val().replace(".", "").replace(".", "");

      $('#total').val(convertToRupiah((Number(total)+Number(sub_total))));

    }

    //maskMoney
  $('.uang').maskMoney({
    thousands:'.', 
    decimal:',', 
    precision:0
  });

  function showKembali(str)
    {
      var total = $('#total').val().replace(".", "").replace(".", "");
      var bayar = str.replace(".", "").replace(".", "");
      var kembali = bayar-total;

      $('#kembali').val(convertToRupiah(kembali));

      if (kembali >= 0) {
        $('#selesai').removeAttr("disabled");
      }else{
        $('#selesai').attr("disabled","disabled");
      };

      if (total == '0') {
        $('#selesai').attr("disabled","disabled");
      };
    }

  initSample();
</script>

<div class="footer-copyright-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="footer-copy-right">
                    <p>Copyright © 2018 
. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                </div>
            </div>
        </div>
    </div>
</div>

 
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<script src="<?php echo base_url() ?>assets/notika/notika/green-horizontal/js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="<?php echo base_url() ?>assets/notika/notika/green-horizontal/js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="<?php echo base_url() ?>assets/notika/notika/green-horizontal/js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="<?php echo base_url() ?>assets/notika/notika/green-horizontal/js/jquery-price-slider.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="<?php echo base_url() ?>assets/notika/notika/green-horizontal/js/owl.carousel.min.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="<?php echo base_url() ?>assets/notika/notika/green-horizontal/js/jquery.scrollUp.min.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="<?php echo base_url() ?>assets/notika/notika/green-horizontal/js/meanmenu/jquery.meanmenu.js"></script>
    <!-- counterup JS
		============================================ -->
    <script src="<?php echo base_url() ?>assets/notika/notika/green-horizontal/js/counterup/jquery.counterup.min.js"></script>
    <script src="<?php echo base_url() ?>assets/notika/notika/green-horizontal/js/counterup/waypoints.min.js"></script>
    <script src="<?php echo base_url() ?>assets/notika/notika/green-horizontal/js/counterup/counterup-active.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="<?php echo base_url() ?>assets/notika/notika/green-horizontal/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- jvectormap JS
		============================================ -->
    <script src="<?php echo base_url() ?>assets/notika/notika/green-horizontal/js/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="<?php echo base_url() ?>assets/notika/notika/green-horizontal/js/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="<?php echo base_url() ?>assets/notika/notika/green-horizontal/js/jvectormap/jvectormap-active.js"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="<?php echo base_url() ?>assets/notika/notika/green-horizontal/js/sparkline/jquery.sparkline.min.js"></script>
    <script src="<?php echo base_url() ?>assets/notika/notika/green-horizontal/js/sparkline/sparkline-active.js"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="<?php echo base_url() ?>assets/notika/notika/green-horizontal/js/flot/jquery.flot.js"></script>
    <script src="<?php echo base_url() ?>assets/notika/notika/green-horizontal/js/flot/jquery.flot.resize.js"></script>
    <script src="<?php echo base_url() ?>assets/notika/notika/green-horizontal/js/flot/curvedLines.js"></script>
    <script src="<?php echo base_url() ?>assets/notika/notika/green-horizontal/js/flot/flot-active.js"></script>
    <!-- knob JS
		============================================ -->
    <script src="<?php echo base_url() ?>assets/notika/notika/green-horizontal/js/knob/jquery.knob.js"></script>
    <script src="<?php echo base_url() ?>assets/notika/notika/green-horizontal/js/knob/jquery.appear.js"></script>
    <script src="<?php echo base_url() ?>assets/notika/notika/green-horizontal/js/knob/knob-active.js"></script>
    <!--  wave JS
		============================================ -->
    <script src="<?php echo base_url() ?>assets/notika/notika/green-horizontal/js/wave/waves.min.js"></script>
    <script src="<?php echo base_url() ?>assets/notika/notika/green-horizontal/js/wave/wave-active.js"></script>
    <!--  todo JS
		============================================ -->
    <script src="<?php echo base_url() ?>assets/notika/notika/green-horizontal/js/todo/jquery.todo.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="<?php echo base_url() ?>assets/notika/notika/green-horizontal/js/plugins.js"></script>
	<!--  Chat JS
		============================================ -->
    <script src="<?php echo base_url() ?>assets/notika/notika/green-horizontal/js/chat/moment.min.js"></script>
    <script src="<?php echo base_url() ?>assets/notika/notika/green-horizontal/js/chat/jquery.chat.js"></script>
    <!-- main JS
		============================================ -->
    <script src="<?php echo base_url() ?>assets/notika/notika/green-horizontal/js/main.js"></script>
	<!-- tawk chat JS
		============================================ -->
    <script src="<?php echo base_url() ?>assets/notika/notika/green-horizontal/js/tawk-chat.js"></script>

    <script src="<?php echo base_url() ?>assets/notika/notika/green-horizontal/js/data-table/data-table-act.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>