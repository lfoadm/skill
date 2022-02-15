<div class="col-12 col-sm-4">
    <div class="info-box bg-light">
        <div class="info-box-content">
            <span class="info-box-number text-center text-muted mb-0">Grupos de Usuários</span>
            <div class="form-group">
                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                    <input type="checkbox" @if($roleindex) checked @endif class="custom-control-input" id="indexRoles" name="indexRoles">
                    <label class="custom-control-label" for="indexRoles">Ver</label>
                </div>
                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                    <input type="checkbox" @if($rolecreate) checked @endif class="custom-control-input" id="createRoles" name="createRoles">
                    <label class="custom-control-label" for="createRoles">Criar</label>
                </div>
                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                    <input type="checkbox" @if($roleedit) checked @endif class="custom-control-input" id="editRoles" name="editRoles">
                    <label class="custom-control-label" for="editRoles">Editar</label>
                </div>
                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                    <input type="checkbox" @if($roledestroy) checked @endif class="custom-control-input" id="destroyRoles" name="destroyRoles">
                    <label class="custom-control-label" for="destroyRoles">Apagar</label>
                </div>
            </div>
        </div>
    </div>
</div>