<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="card o-hidden border-0  my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row d-flex flex-align-row align-items-center justify-content-center">
                <div class="col-12 col-lg-6 shadow-lg">
                    <h2>Welcome Back, <?= $name ?></h2>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
