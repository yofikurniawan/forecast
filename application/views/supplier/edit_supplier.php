<div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
            <h2>Edit Data Supplier</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
            </div>
            <div class="x_content">
            <br />
            <form action="" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name <span class="required text-danger">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="hidden" name="supplier_id" value="<?= $row->supplier_id ?>">
                    <input type="text" name="name" value="<?= $this->input->post('name') ?? $row->name ?>" id="first-name" class="form-control col-md-7 col-xs-12">
                    <?= form_error('name'); ?>
                </div>
                </div>
                <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Alamat <span class="required text-danger">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                <textarea class="form-control" name="alamat" rows="3"><?= $this->input->post('alamat') ?? $row->alamat ?> </textarea>
                <?= form_error('alamat'); ?>
                </div>
                </div>
                <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Email <span class="required text-danger">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="middle-name" class="form-control col-md-7 col-xs-12" type="email" name="email" value="<?= $this->input->post('email') ?? $row->email ?>">
                    <?= form_error('email'); ?>
                </div>
                </div>
                <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Phone <span class="required text-danger">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input name="phone" value="<?= $this->input->post('phone') ?? $row->phone ?>" class="date-picker form-control col-md-7 col-xs-12" type="number">
                    <?= form_error('phone'); ?>
                </div>
                </div>
                <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Deskripsi <span class="required text-danger"></span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                <textarea class="form-control" name="deskripsi" rows="3"><?= $this->input->post('deskripsi') ?? $row->deskripsi ?></textarea>
                </div>
                </div>

                <div class="ln_solid"></div>
                <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <a href=<?=site_url('supplier') ?> class="btn btn-primary btn-sm" ><i class="fa fa-backward"></i> Back</button> </a>
                <button class="btn btn-default" type="reset"><i class="fa fa-times-circle"></i>Reset</button>
                <button type="submit" class="btn btn-success"> <i class="fa fa-paper-plane"></i> Submit</button>
                </div>
                </div>

            </form>
            </div>
        </div>
        </div>
    </div>
