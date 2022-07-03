<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <?php if($this->session->flashdata('status')) : ?>
                    <div class="alert alert-danger">
                        <?= $this->session->flashdata('status'); ?>
                    </div>
                <?php endif; ?>
                <div class="card shadow">
                    <div class="card-header">
                        <h5>Register</h5>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo base_url('register') ?>" method='POST'>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">First Name</label>
                                        <input type="text" name="first_name" class="form-control" value="<?php echo set_value('first_name') ?>">
                                        <small><?php echo form_error('first_name'); ?></small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Last Name</label>
                                        <input type="text" name="last_name" class="form-control" value="<?php echo set_value('last_name') ?>">
                                        <small><?php echo form_error('last_name'); ?></small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Email adress</label>
                                        <input type="email" name="email" class="form-control" value="<?php echo set_value('email') ?>">
                                        <small><?php echo form_error('email'); ?></small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <input type="password" name="password" class="form-control">
                                        <small><?php echo form_error('password'); ?></small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Confirm password</label>
                                        <input type="password" name="cpassword" class="form-control">
                                        <small><?php echo form_error('cpassword'); ?></small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary px-5">Register Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>