<div class="col-12 col-sm-4">
    <div class="info-box bg-light">
        <div class="info-box-content">
            <span class="info-box-number text-center text-muted mb-0">Motoristas</span>
            <div class="form-group">
                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                    <input type="checkbox" @if($driverindex) checked @endif class="custom-control-input" id="indexDrivers" name="indexDrivers">
                    <label class="custom-control-label" for="indexDrivers">Ver</label>
                </div>
                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                    <input type="checkbox" @if($drivercreate) checked @endif class="custom-control-input" id="createDrivers" name="createDrivers">
                    <label class="custom-control-label" for="createDrivers">Criar</label>
                </div>
                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                    <input type="checkbox" @if($driveredit) checked @endif class="custom-control-input" id="editDrivers" name="editDrivers">
                    <label class="custom-control-label" for="editDrivers">Editar</label>
                </div>
                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                    <input type="checkbox" @if($driverdestroy) checked @endif class="custom-control-input" id="destroyDrivers" name="destroyDrivers">
                    <label class="custom-control-label" for="destroyDrivers">Apagar</label>
                </div>
            </div>
        </div>
    </div>
</div>