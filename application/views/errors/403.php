<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>403 Acces Forbiden</h4>
                    </div>
                    <div class="card-body">
                    <?php if($this->session->flashdata('status')) : ?>
                        <div class="alert alert-danger">
                            <?= $this->session->flashdata('status'); ?>
                        </div>
                    <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>