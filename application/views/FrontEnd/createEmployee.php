<div class="container">
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <h5>Insert employee into our database</h5>
                    <a href="<?php echo base_url('employee'); ?>" class="btn btn-danger float-right">Back</a>
                </div>
                <div class="card-body">
                    <form action="<?php echo base_url('employee/store') ?>" method="POST">
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" class="form-control" name="first_name">
                            <small><?php echo form_error('first_name') ?></small>
                        </div>
                        <!-- -->
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" class="form-control" name="last_name">
                            <small><?php echo form_error('last_name') ?></small>
                        </div>
                        <!-- -->
                        <div class="form-group">
                            <label for="phone">Phone number</label>
                            <input type="text" class="form-control" name="phone">
                            <small><?php echo form_error('phone') ?></small>
                        </div>
                        <!-- -->
                        <div class="form-group">
                            <label for="email">Email ID</label>
                            <input type="text" class="form-control" name="email">
                            <small><?php echo form_error('email') ?></small>
                        </div>
                        <!-- -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save new Employee</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>