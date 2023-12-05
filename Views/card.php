<div class="col-12 col-md-4 col-lg-3">
    <div class="card">
        <img src="<?= $image ?>" class="card-img-top my-ratio" alt="<?= $title ?>">
        <div class="card-body overflow-y-auto">
            <h5 class="card-title">
                <?= $title ?>
            </h5>
            <p class="card-text">
                <?= $content ?>
            </p>
            <div class="d-flex justify-content-between align-items-flex-start">
                <?= $custom ?>
                <div>
                    <?= $genere ?>
                </div>
                <div>
                    <?= "€" . $prezzo ?>
                </div>
                <div>
                    <span>Scorte : </span>
                    <?= $quantitá ?>
                </div>
                <div>
                    <span></span>
                    <?php if($sconto){
                        echo $sconto;
                    } ?>
                </div>
            </div>

        </div>
    </div>
</div>