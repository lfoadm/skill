<div class="col-12 col-sm-4">
    <div class="info-box bg-light">
        <div class="info-box-content">
            <span class="info-box-number text-center text-muted mb-0">Caminhões</span>
            <div class="form-group">
                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                    <input type="checkbox" @if($truckindex) checked @endif class="custom-control-input" id="indexTrucks" name="indexTrucks">
                    <label class="custom-control-label" for="indexTrucks">Ver</label>
                </div>
                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                    <input type="checkbox" @if($truckcreate) checked @endif class="custom-control-input" id="createTrucks" name="createTrucks">
                    <label class="custom-control-label" for="createTrucks">Criar</label>
                </div>
                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                    <input type="checkbox" @if($truckedit) checked @endif class="custom-control-input" id="editTrucks" name="editTrucks">
                    <label class="custom-control-label" for="editTrucks">Editar</label>
                </div>
                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                    <input type="checkbox" @if($truckdestroy) checked @endif class="custom-control-input" id="destroyTrucks" name="destroyTrucks">
                    <label class="custom-control-label" for="destroyTrucks">Apagar</label>
                </div>
            </div>
        </div>
    </div>
</div>