<div class="card bg-gradient-default">
    <!-- Card body -->
    <div class="card-body">
        <div class="row justify-content-between align-items-center">
            <div class="col">
                <img src="{{ asset("vendor/template-dashboard-argon/img/icons/cards/mastercard.png") }}" alt="Image placeholder">
            </div>
            <div class="col-auto">
                <div class="d-flex align-items-center">
                    <small class="text-white font-weight-bold mr-3">Tornar padrão</small>
                    <div>
                        <label class="custom-toggle  custom-toggle-white">
                            <input type="checkbox" checked="">
                            <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-4">
            <form role="form" class="form-primary">
                <div class="form-group">
                    <div class="input-group input-group-alternative mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                        </div>
                        <input class="form-control" placeholder="Name on card" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group input-group-alternative mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-credit-card"></i></span>
                        </div>
                        <input class="form-control" placeholder="Card number" type="text">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                </div>
                                <input class="form-control" placeholder="MM/YY" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                </div>
                                <input class="form-control" placeholder="CCV" type="text">
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-block btn-info">Save new card</button>
            </form>
        </div>
    </div>
</div>