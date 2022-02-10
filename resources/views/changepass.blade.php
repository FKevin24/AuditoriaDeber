@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                <form action="{{route('changepass',['id'=>Auth::user()->id])}}" method="POST">
                    @csrf
                    @method('PUT')
                        @if (Session::has('message'))
                            <div class="alert alert-danger text-center" role="alert">
                                {{Session::get('message')}}
                            </div>
                        @endif
                        <div class="form-group row">
                            
                            <label class="col-md-4 col-form-label text-md-right" for="password">Contraseña Antigua</label>
                            <div class="">
                            <input type="password" 
                            id="password" 
                            class="form-control @error('password') is-invalid @enderror" 
                            name="password" 
                            placeholder="****************">
                                @error('password')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="newpassword">Nueva Contraseña</label>
                            <div class="">
                                <input type="password" 
                                id="newpassword" 
                                class="form-control @error('newpassword') is-invalid @enderror" 
                                name="newpassword" 
                                placeholder="****************">
                                @error('newpassword')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="repassword">Confirmar Contraseña</label>
                            <div class="">
                                <input type="password" 
                                id="repassword" 
                                class="form-control" 
                                name="repassword" 
                                placeholder="****************">
                                @error('repassword')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                            <div class="m-0 row justify-content-center">
                                <button type="submit" class="btn btn-primary" value="Cambiar Contraseña">
                                    Cambiar Contraseña
                                </button>
                            </div> 
                    </form>
                    <br>
                    <div class="m-0 row justify-content-center">
                            <a href="{{route('home')}}" class="btn btn-secondary">Volver a Inicio</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection