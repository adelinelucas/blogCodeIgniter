<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <?php if($this->session->flashdata('status')) : ?>
                    <div class="alert alert-success">
                        <?= $this->session->flashdata('status'); ?>
                    </div>
                <?php endif; ?>

                <div class="card">
                    <div class="card-header">
                        <h5>Admin Page</h5>
                    </div>
                    <div class="card-body">
                        <h6>Your are in Admin -Dashboard </h6>
                        <h5>Frist name : <?= $this->session->userdata('auth_user')['first_name'] ?></h5>
                        <h5>Last name : <?= $this->session->userdata('auth_user')['last_name'] ?></h5>
                        <h5>Email : <?= $this->session->userdata('auth_user')['email'] ?></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>