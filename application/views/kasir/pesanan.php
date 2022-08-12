    <!-- LEFT SIDEBAR -->
    <div id="sidebar-nav" class="sidebar">
        <div class="sidebar-scroll">
            <nav>
                <ul class="nav">
                    <li><a href="<?= base_url('index.php/kasir1')?>" class="'"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
                    <li><a href="<?= base_url('index.php/kasir1/pesanan')?>" class="active"><i class="lnr lnr-cog"></i> <span>Pesanan</span></a></li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- END LEFT SIDEBAR -->
    <!-- MAIN -->
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="overview-wrap">
                                <h2 class="title-1">Manajemen Pesanan</h2>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <select name="id_order" onchange="cek_data()">
                      <option value="">--- Pilih Meja ---</option>
                      <?php foreach ($pes->result() as $baris): ?>
                        <option value="<?php echo $baris->id_order; ?>"><?php echo $baris->no_meja; ?></option>
                    <?php endforeach; ?>
                </select>

                <div class="loading"></div>
                <div class="tampilkan_data"></div>
            </div>
        </div>
    </div>
</div>




<!-- END MAIN -->
<div class="clearfix">
    <footer>
        <div class="container-fluid">
            <p class="copyright">&copy; 10120901 - Mustapha Hadzi </p>
        </div>
    </footer>
</div>

<script type="text/javascript">
  function get(id) {
    $.ajax({
        url:"<?php echo base_url('index.php/kasir1/alldata');?>",
        type:"POST",
        data:{
            kode:id
        },
        dataType:"JSON",
        success:function(result){
            $("#data").html("");
            $.each(result,function(key,value){
              $('#data').append(`<tr>

                <td>${value.nama_masakan}</td>
                <td>${value.harga}</td>
                


                </tr>`);
              console.log(value.jumlah);
          })
        }
    });
}

function cek_data()
{
    sel_kota = $('[name="id_order"]');
    $.ajax({
      type : 'POST',
      data: "cari="+1+"&id_order="+sel_kota.val(),
      url  : "<?php echo base_url('index.php/kasir1/view_data');?>",
      cache: false,
      beforeSend: function() {
        sel_kota.attr('disabled', true);
        $('.loading').html('Loading...');
    },
    success: function(data){
        sel_kota.attr('disabled', false);
        $('.loading').html('');
        $('.tampilkan_data').html(data);
    }
});
    return false;
}
</script>

