<div class="col-12 mt-3">
    @include('components.feedback')
</div>
<div class="form-group col-12 col-lg-6">
    <label for="">Funcionário</label>
    <select class="form-control" name="funcionario_id" required>
        @foreach($funcionarios as $f)
        <option value="{{$f->id}}">
            <b>{{$f->nome_completo}} </b>(saldo: {{$f->saldo_formatado()}})
        </option>
        @endforeach
    </select>
</div>
<div class="form-group col-12 col-lg-2">
    <label for="">Tipo de movimentação</label>
    <select class="form-control" name="tipo_movimentacao" required>
        <option value="entrada">Entrada</option>
        <option value="saida">Saída</option>
    </select>
</div>
<div class="form-group col-12 col-lg-3">
  <label for="">Valor da movimentação</label>
  <input type="number" step="any" min="0" name="valor" id="valor" class="form-control" required>
</div>
<div class="form-group col-12 col-lg-6 offset-lg-3">
  <label for="">Observação</label>
  <input type="text" maxlength="80" name="observacao" id="observacao" class="form-control" required>
  <small  class="text-muted">Informe neste campo o motivo da movimentação. Ex: "Recarga de celular"</small>
</div>

<div class="col-12 text-center">
    <button type="submit" class="btn btn-primary">
        Salvar movimentação
    </button>
</div>
