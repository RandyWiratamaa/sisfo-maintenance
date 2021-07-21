<?php foreach($detail_pengaduan as $detail) : ?>
<div class="invoice-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="invoice-wrap">
                    <div class="invoice-img">
                        <h3><strong><?php echo $title ?></strong></h3>
                    </div>
                    <div class="invoice-hds-pro">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="invoice-cmp-ds ivc-frm">
                                    <!-- <div class="invoice-frm">
                                        <span>Nama Pelanggan</span>
                                    </div> -->
                                    <div class="comp-tl">
                                        <h2><?php echo $detail->nama_pegawai ?></h2>
                                        <p><?php echo $detail->alamat ?></p>
                                    </div>
                                    <div class="cmp-ph-em">
                                        <span><?php echo $detail->telepon ?></span>
                                        <span><?php echo $detail->email ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <div class="invoice-hs">
                                <span>No Pengaduan#</span>
                                <h2><?php echo $detail->no_pengaduan ?></h2>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <div class="invoice-hs date-inv sm-res-mg-t-30 tb-res-mg-t-30 tb-res-mg-t-0">
                                <span>Tanggal Pengaduan</span>
                                <h2><?php echo $detail->tanggal_pengaduan ?></h2>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <div class="invoice-hs gdt-inv sm-res-mg-t-30 tb-res-mg-t-30 tb-res-mg-t-0">
                                <span class="text-center">Status Pengaduan</span>
                                <?php if($detail->status == '0') : ?>
                                <h2>Belum diproses</h2>
                                <?php elseif($detail->status == '1') : ?>
                                <h2>Sedang diproses</h2>
                                <?php elseif($detail->status == '2') : ?>
                                <h2 class="text-center">Selesai diproses</h2>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="invoice-ds-int">
                                <h2>Kendala</h2>

                                <!-- Looping Jenis Maintenance -->
                                <p> <?php echo $detail->jenis ?>
                                </p>
                                <hr>
                                <!-- <h2>Rincian Kendala</h2>
                                <p><?php echo $detail->rincian_kendala ?></p> -->
                            </div>                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="invoice-ds-int">
                                <!-- <h2>Catatan Perbaikan</h2>
                                <p><?php echo $detail->catatan ?></p> -->
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endforeach ?>