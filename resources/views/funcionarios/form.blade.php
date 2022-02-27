<div class="col-12 mt-3">
    @include('components.feedback')
    <h2>
        Dados pessoais
    </h2>
</div>
<div class="form-group col-12 col-lg-6">
    <label for="">Nome completo</label>
    <input type="text" name="nome_completo" value="{{ old('nome_completo') }}" id="nome" maxlength="80" class="form-control" required>
</div>
<div class="form-group col-12 col-lg-3">
    <label for="">Login</label>
    <input type="text" name="login" id="login" value="{{ old('login') }}" maxlength="80" class="form-control" required>
</div>
<div class="form-group col-12 col-lg-3">
    <label for="">Senha</label>
    <input type="password" name="senha" id="senha" maxlength="80" class="form-control" required>
</div>
<div class="form-group col-12 col-lg-4">
    <label for="">Saldo</label>
    R$
    <input type="number" value="{{ old('saldo_atual')?old('saldo_atual'):0 }}" name="saldo_atual"  id="saldo" step="any" class="form-control" required>
</div>
<div class="col-12 text-center">
    <button type="submit" class="btn btn-primary">
        Cadastrar
    </button>
</div>
