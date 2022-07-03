<nav class="navbar navbar-expand-lg navbar-dark bg-dark d-flex justify-content-between">
    <a class="navbar-brand" href="#">Employee App</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('/') ?>">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('userpage') ?>">UserPage</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('adminpage') ?>">Admin-Page</a>
            </li>
            <?php if(!$this->session->has_userdata('authenticated')) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('register') ?>">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('login') ?>">Login</a>
                </li>
            <?php endif; ?>
            <?php if($this->session->has_userdata('authenticated')) : ?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?= $this->session->userdata('auth_user')['first_name'] ?>
                    <?= $this->session->userdata('auth_user')['last_name'] ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="<?php echo base_url('logout') ?>" >
                        Logout
                    </a>
                </div>
            </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>