@extends('adminlte::page')

@section('title', 'Hora Marcada')

@section('content_header')
<div class="row" style="background-color: white; margin-inline-start: -15px; margin-inline-end: -20px; margin-top: -15px; height: 55px">
    <div class="bred">
        <p style="font-family: Arial; font-size: 20px; color: steelblue; margin-left: 20px; margin-top: 15px">Início</p> 
    </div>
</div>

<h2 style="text-align: center; color: steelblue">Software Hora Marcada</h2>
@stop

@section('content')
<h4 style="text-align: center; color: steelblue">Seja bem vindo ao Hora Marcada, aqui você gerencia sua quadra esportiva.</h4>&nbsp;

<div class="row">
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>{{$totalReservas}}</h3>
                <p>Total de reservas</p>
            </div>
            <div class="icon">
                <i class="fa fa-calendar"></i>
            </div>
            <a href='{{route('reservas.index')}}' class="small-box-footer">
                Mais Infomações
                <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>{{$totalClientes}}</h3>
                    <p>Total de clientes</p>
                </div>
                <div class="icon">
                    <i class="fa fa-user"></i>
                </div>
                <a href='{{route('clientes.index')}}' class="small-box-footer">
                    Mais Infomações
                    <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green">
            <div class="inner">
                <h3>{{$totalHorarios}}</h3>
                <p>Total de horários</p>
             </div>
            <div class="icon">
                <i class="fa fa-clock-o"></i>
            </div>
            <a href='{{route('horarios.index')}}' class="small-box-footer">
                Mais Infomações
                <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>{{$totalOpcionais}}</h3>
                <p>Total de opcionais</p>
            </div>
            <div class="icon">
                <i class="fa fa-list"></i>
            </div>
            <a href='{{route('opcionais.index')}}' class="small-box-footer">
                 Mais Infomações
                <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    
</div>
    <h2 style="font-size: 25px">Reservas do dia {{$data2}}</h2>
     <div class="row">
        <br>
        @forelse($dias as $dia)
        <article class="result col-lg-3 col-md-4 col-sm-6 col-12">
            <div class="well well-lg" style="background-color: white">
                <img src="{{url('imagens/quadra.png')}}" style="width: 100%">

                <div class="legend">
                    @if($dia->permanente == 'sim')
                        <p>Cliente: {{$dia->nome}}</p>
                        <p>Data da reserva: {{Carbon\Carbon::parse($dia->data)->format('d/m/Y')}}</p>
                        <p>Quadra:  {{$dia->tipo}}</p>
                        <p>Horário: {{$dia->horario}}</p>
                        <p>Valor: {{$dia->preco}}</p>                   
                    @else
                        <p>Cliente: {{$dia->nome}}</p>
                        <p>Data: {{Carbon\Carbon::parse($dia->data)->format('d/m/Y')}}</p>
                        <p>Quadra:  {{$dia->tipo}}</p>
                        <p>Horário: {{$dia->horario}}</p>
                        <p>Valor: {{$dia->preco}}</p>
                    @endif
                </div>
                <a href='{{route('detalhes.reserva', $dia->id)}}' class="btn btn-primary" style="width: 100%">
                        Detalhes
                    </a>
            </div>
        </article>
        @empty
          <h1 style="text-align: center; color: red"> <b><u>Não há horários reservados para o dia de hoje!</u></b></h1>
        @endforelse
    </div>
</div>
@stop