@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">  
                    <div class="row">              
                        <div class="col-md-10">
                            <h1>ToDos</h1>
                        </div>
                        <div style="text-align:right" class="col-md-2">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formNew">
                            Novo
                        </button>

                            <div class="modal fade" id="formNew" tabindex="-1" role="dialog" aria-labelledby="modalInserir" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Novo ToDo</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="post" action="/todo">
                                        {{ csrf_field() }} 
                                    <div class="modal-body">                                        
                                        <input type="text" placeholder="descrição" name="description" class="form-control">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                        <button type="submmit" class="btn btn-primary">Salvar</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th class="column-title" scope="col" width="85%">Descrição</th>
                                <th class="column-title" scope="col" width="15%">Ação</th>                           
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($todos as $todo)
                            <tr>                            
                                <td>{{$todo->description}}</td>
                                <td>                                    
                                {{ Form::open(['method' => 'DELETE','route' => ['todo.destroy', $todo->id],'style'=>'display:inline']) }}
                                    
                                        {{ csrf_field() }} 
                                        <button type="submmit" class="btn btn-danger">                                        
                                            <i class="fas fa-trash-alt"></i>
                                        </button>

                                        <!-- 'class' => 'btn btn-danger','data-toggle'=>'confirmation','data-placement'=>'left', 'data-singleton'=>'true',
                                        'data-title'=>'Deseja Realmente Excluir ?',
                                        'data-btn-cancel-label'=>'Não', 'data-btn-ok-label'=>'Sim' ])  -->

                                    
                                {{ Form::close() }}
                                </td>                                
                            </tr>                            
                        @endforeach
                        </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
