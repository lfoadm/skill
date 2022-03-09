<div class="col-12 col-sm-4">
    <div class="info-box bg-light">
        <div class="info-box-content">
            <span class="info-box-number text-center text-muted mb-0">Usuários</span>
            <div class="form-group">
                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                    <input type="checkbox" @if($userindex) checked @endif class="custom-control-input" id="indexUsers" name="indexUsers">
                    <label class="custom-control-label" for="indexUsers">Ver</label>
                </div>
                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                    <input type="checkbox" @if($usercreate) checked @endif class="custom-control-input" id="createUsers" name="createUsers">
                    <label class="custom-control-label" for="createUsers">Criar</label>
                </div>
                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                    <input type="checkbox" @if($useredit) checked @endif class="custom-control-input" id="editUsers" name="editUsers">
                    <label class="custom-control-label" for="editUsers">Editar</label>
                </div>
                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                    <input type="checkbox" @if($userdestroy) checked @endif class="custom-control-input" id="destroyUsers" name="destroyUsers">
                    <label class="custom-control-label" for="destroyUsers">Apagar</label>
                </div>
            </div>
        </div>
    </div>
</div>