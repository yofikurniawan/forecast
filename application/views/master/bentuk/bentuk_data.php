<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
        <div class="x_title">
            <h2>Data Bentuk<small>obat</small></h2>
            <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
            <?php if($this->fungsi->user_login()-> level == 1 OR $this->fungsi->user_login()-> level == 2 ) { ?>
            <a href=<?=site_url('bentuk/add_bentuk') ?> class="btn btn-primary btn-sm" >
                <i class="glyphicon glyphicon-ok"></i> Create Bentuk obat
            </a> 
            <?php } ?>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <p class="text-muted font-13 m-b-30">
            </p>
            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <?php if($this->fungsi->user_login()-> level == 1 OR $this->fungsi->user_login()-> level == 2 ) { ?>
                    <th class="text-center">Actions</th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; foreach ($row->result() as $key => $data): ?>
                <tr>
                <td style="width:5%;"><?= $no++ ?></td>
                <td><?= $data->name ?></td>
                <?php if($this->fungsi->user_login()-> level == 1 OR $this->fungsi->user_login()-> level == 2 ) { ?>
                <td class="text-center" width="160px">
                <a href="<?=site_url('unit/edit_unit/'.$data->bentuk_id) ?>" class="btn btn-info btn-xs">
                        <i class="glyphicon glyphicon-edit"></i> Edit
                    </a> 
                    <a href="<?=site_url('unit/del/'.$data->bentuk_id) ?>" class="tombol-verifikasi btn btn-danger btn-xs">
                            <i class="glyphicon glyphicon-trash"></i> Delete
                    </a> 
                </td>
                <?php } ?>
                </tr>
                <?php endforeach ?>
            </tbody>
            </table>
             <div class="container-fluid mt-3">
                    <b>Pemberitahuan :</b>
                    <table>
                        <tr>
                            <td width="100px">
                                Status
                            </td>
                            <td>
                                Untuk menambahkan, mengubah dan menghapus bentuk data obat harap melaporkan dulu ke pemliki apotek (admin) atau Asisten
                                apotek.
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp</td>
                            <td></td>
                        </tr>
                    </table>
            </div>
        </div>
        </div>
    </div>
</div>  