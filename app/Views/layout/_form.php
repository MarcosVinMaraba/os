
    <div class="form-group">
        <label class="form-control-label">Nome completo</label>
        <input type="text" placeholder="Insira o nome completo" class="form-control" name="none" value="<?php echo esc($usuario->nome)?>">
    </div>
    <div class="form-group">
        <label class="form-control-label">Email</label>
        <input type="email" placeholder="Email" class="form-control" name="email" value="<?php echo esc($usuario->email) ?>">
    </div>
    <div class="form-group">
        <label class="form-control-label">Senha</label>
        <input type="password" placeholder="Senha de acesso" class="form-control" name="password">
    </div>
    <div class="form-group">
        <label class="form-control-label">Confirma senha</label>
        <input type="password" placeholder="Confirmar senha de acesso" class="form-control" name="password_confirm">
    </div>

    <div class="custom-control custom-checkbox">
        <input type="hidden" name="ativo" value="0" />
        <input name="ativo" type="checkbox" class="custom-control-input" id="ativo" <?php if($usuario->ativo==true):?> checked <?php endif;?>>
        <label class="custom-control-label" for="ativo">Usuário ativo</label>

