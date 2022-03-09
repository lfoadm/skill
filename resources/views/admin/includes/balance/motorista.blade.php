<div class="row">
    <div class="col-md-4 col-sm-6 col-12">
        <a href="#">
            <div class="info-box bg-gradient-success">
                <span class="info-box-icon"><i class="fas fa-hand-holding-usd"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Comissão atual</span>
                    <span class="info-box-number"><h1>R$ @if($comission) {{ number_format($comission, 2, ',', '.') }} @else 0,00 @endif</h1></span>
                    <div class="progress">
                        <div class="progress-bar" style="width: 100%"></div>
                    </div>
                    <span class="progress-description">App Skills</span>
                </div>
            </div>
        </a>
    </div>


    <div class="col-md-4 col-sm-6 col-12">
        <a href="#">
            <div class="info-box bg-gradient-info">
                <span class="info-box-icon"><i class="fas fa-truck-moving"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Faturamento</span>
                    <span class="info-box-number"><h1>R$ @if($totalPrice) {{ number_format($totalPrice, 2, ',', '.') }} @else 0,00 @endif</h1></span>
                    <div class="progress">
                        <div class="progress-bar" style="width: 100%"></div>
                    </div>
                    <span class="progress-description">App Skills</span>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-4 col-sm-6 col-12">
        <div class="info-box bg-gradient-danger">
            <span class="info-box-icon"><i class="fas fa-wrench"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Despesas Totais</span>
                <span class="info-box-number"><h2>R$ 0,00</h2></span>
                <div class="progress">
                    <div class="progress-bar" style="width: 100%"></div>
                </div>
                <span class="progress-description">App Skills</span>
            </div>
        </div>
    </div>

    <div class="col-md-12 col-sm-6 col-12">
        <h1>CAIXA</h1>
    </div>

    <div class="col-md-4 col-sm-6 col-12">
        <div class="info-box bg-gradient-primary">
            <span class="info-box-icon"><i class="fas fa-donate"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Total</span>
                <span class="info-box-number"><h1>R$ @if($balance) {{ number_format($balance->amount, 2, ',', '.') }} @else 0,00 @endif</h1></span>
                <div class="progress">
                    <div class="progress-bar" style="width: 100%"></div>
                </div>
                <span class="progress-description">App Skills</span>
            </div>
        </div>
    </div>

</div>