<div class="col-12 col-sm-4">
    <div class="info-box bg-light">
        <div class="info-box-content">
            <span class="info-box-number text-center text-muted mb-0">Tenants (Inquilinos)</span>
            <div class="form-group">
                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                    <input type="checkbox" @if($tenantindex) checked @endif class="custom-control-input" id="indexTenants" name="indexTenants">
                    <label class="custom-control-label" for="indexTenants">Ver</label>
                </div>
                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                    <input type="checkbox" @if($tenantcreate) checked @endif class="custom-control-input" id="createTenants" name="createTenants">
                    <label class="custom-control-label" for="createTenants">Criar</label>
                </div>
                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                    <input type="checkbox" @if($tenantedit) checked @endif class="custom-control-input" id="editTenants" name="editTenants">
                    <label class="custom-control-label" for="editTenants">Editar</label>
                </div>
                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                    <input type="checkbox" @if($tenantdestroy) checked @endif class="custom-control-input" id="destroyTenants" name="destroyTenants">
                    <label class="custom-control-label" for="destroyTenants">Apagar</label>
                </div>
            </div>
        </div>
    </div>
</div>