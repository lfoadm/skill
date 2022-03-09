<div class="col-12 col-sm-4">
    <div class="info-box bg-light">
        <div class="info-box-content">
            <span class="info-box-number text-center text-muted mb-0">Permissões</span>
            <div class="form-group">
                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                    <input type="checkbox" @if($permissionindex) checked @endif class="custom-control-input" id="indexPermissions" name="indexPermissions">
                    <label class="custom-control-label" for="indexPermissions">Ver</label>
                </div>
                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                    <input type="checkbox" @if($permissioncreate) checked @endif class="custom-control-input" id="createPermissions" name="createPermissions">
                    <label class="custom-control-label" for="createPermissions">Criar</label>
                </div>
                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                    <input type="checkbox" @if($permissionedit) checked @endif class="custom-control-input" id="editPermissions" name="editPermissions">
                    <label class="custom-control-label" for="editPermissions">Editar</label>
                </div>
                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                    <input type="checkbox" @if($permissiondestroy) checked @endif class="custom-control-input" id="destroyPermissions" name="destroyPermissions">
                    <label class="custom-control-label" for="destroyPermissions">Apagar</label>
                </div>
            </div>
        </div>
    </div>
</div>