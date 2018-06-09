@extends('adminlte::page')

@section('title', 'Cadastro do Opcionais')

@section('content_header')

<div class='col-sm-11'>
    @if ($acao == 1)
    <h2> Cadastro de Opcionais </h2>
    @else
    <h2> Alterar Opcionais </h2>
    @endif
</div>

<div class='col-sm-1'>
    <a href="{{route('opcionais.index')}}" class="btn btn-primary" 
       role="button">Voltar</a>
</div>

<div class='col-sm-12'>
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

    @endif        

    @if ($acao == 1)
    <div class="box box-primary"></div>
    <form method="post" action="{{route('opcionais.store')}}">
        @else
        <form method="post" action="{{route('opcionais.update', $reg->id)}}">
            {!! method_field('put') !!}
            @endif
            {{ csrf_field() }}
            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-info"></i>
                    </div>
                    <input type="text" class="form-control" id="descricao"
                           name="descricao" placeholder="Digite o nome do opcional"
                           value="{{$reg->descricao or old('descricao')}}"
                           required>
                </div>
                <div class="form-group">
                    <label for="valor">Valor:</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-usd"></i>
                        </div>
                        <input type="number" class="form-control" id="valor"
                               name="valor" placeholder="Digite a valor do opcional"
                               value="{{$reg->valor or old('valor')}}"
                               required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>        
                <button type="reset" class="btn btn-warning">Limpar</button>
            </div>
        </form>    
    </form>
</div>    
@stop