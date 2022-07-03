<div class="container">
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <?php if($this->session->flashdata('status')): ?>
                        <div class="alert alert-success">
                            <?php echo $this->session->flashdata('status') ?>
                        </div>
                    <?php endif; ?>
                    <h5>Fetch data from database in codeigniter</h5>
                    <a href="<?php echo base_url('employee/add'); ?>" class="btn btn-primary float-right">Add Employee</a>
                </div>
                <div class="card-body">
                    <table id="dataTable1" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Frist name</th>
                                <th>Last name</th>
                                <th>Phone number</th>
                                <th>Email ID</th>
                                <th>Edit</th>
                                <th>Delete</th>
                                <th>Confirm Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($employee as $row) :  ?>
                            <tr>
                                <td><?= $row->id ?></td>
                                <td><?= $row->first_name ?></td>
                                <td><?= $row->last_name ?></td>
                                <td><?= $row->phone?></td>
                                <td><?= $row->email ?></td>
                                <td>
                                    <a href="<?php echo base_url('employee/edit/'. $row->id) ?>" class="btn btn-warning btn-sm">Edit</a>
                                </td>
                                <td>
                                    <a href="<?php echo base_url('employee/delete/'. $row->id) ?>" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger confirm-delete" value="<?= $row->id ?>">Confirm Delete</button>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
