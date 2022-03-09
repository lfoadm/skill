<div class="row">
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box bg-gradient-info">
            <span class="info-box-icon"><i class="fas fa-address-card"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Usuários Total</span>
                <span class="info-box-number"><h1>1.70{{ $userCount }}</h1></span>
                <div class="progress">
                    <div class="progress-bar" style="width: 100%"></div>
                </div>
                <span class="progress-description">
                    App Skills
                </span>
            </div>

        </div>

    </div>

    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box bg-gradient-secondary">
            <span class="info-box-icon"><i class="fas fa-shipping-fast"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Clientes Total</span>
                <span class="info-box-number"><h1>70{{ $tenantCount }}</h1></span>
                <div class="progress">
                    <div class="progress-bar" style="width: 100%"></div>
                </div>
                <span class="progress-description">
                    App Skills
                </span>
            </div>

        </div>

    </div>

    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box bg-gradient-warning">
            <span class="info-box-icon"><i class="fas fa-truck-moving"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Veículos</span>
                <span class="info-box-number"><h1>1.745</h1></span>
                <div class="progress">
                    <div class="progress-bar" style="width: 100%"></div>
                </div>
                <span class="progress-description">
                    App Skills
                </span>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box bg-gradient-danger">
            <span class="info-box-icon"><i class="fas fa-wrench"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Motoristas Pendentes</span>
                <span class="info-box-number"><h1>@if ($driverPre > 9) {{$driverPre}} @else 0{{$driverPre}} @endif</h1></span>
                <div class="progress">
                    <div class="progress-bar" style="width: 100%"></div>
                </div>
                <span class="progress-description">
                    App Skills
                </span>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box bg-gradient-success">
            <span class="info-box-icon"><i class="fas fa-hand-holding-usd"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Receita mês atual</span>
                <span class="info-box-number"><h3>R$ 436.250,00</h3></span>
                <div class="progress">
                    <div class="progress-bar" style="width: 100%"></div>
                </div>
                <span class="progress-description">
                    App Skills
                </span>
            </div>
        </div>
    </div>

</div>