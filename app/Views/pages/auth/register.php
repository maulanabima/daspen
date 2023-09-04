<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="card o-hidden border-0  my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row d-flex flex-align-row align-items-center justify-content-center">
                <div class="col-12 col-lg-6 shadow-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <form class="user" action="/saveregister" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" name="name"
                                    placeholder="Nama Lengkap" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user" name="email"
                                    placeholder="Alamat Email" required>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user" name="password"
                                       placeholder="Password" require>
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user" name="confpassword"
                                       placeholder="Ulangi Password" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                <span>REGISTER</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>