<div class="col-12 col-sm-4">
    <div class="info-box bg-light">
        <div class="info-box-content">
            <span class="info-box-number text-center text-muted mb-0">Empresas</span>
            <div class="form-group">
                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                    <input type="checkbox" @if($companyindex) checked @endif class="custom-control-input" id="indexCompanies" name="indexCompanies">
                    <label class="custom-control-label" for="indexCompanies">Ver</label>
                </div>
                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                    <input type="checkbox" @if($companycreate) checked @endif class="custom-control-input" id="createCompanies" name="createCompanies">
                    <label class="custom-control-label" for="createCompanies">Criar</label>
                </div>
                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                    <input type="checkbox" @if($companyedit) checked @endif class="custom-control-input" id="editCompanies" name="editCompanies">
                    <label class="custom-control-label" for="editCompanies">Editar</label>
                </div>
                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                    <input type="checkbox" @if($companydestroy) checked @endif class="custom-control-input" id="destroyCompanies" name="destroyCompanies">
                    <label class="custom-control-label" for="destroyCompanies">Apagar</label>
                </div>
            </div>
        </div>
    </div>
</div>