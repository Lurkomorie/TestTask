@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    @if(Auth::user() -> link == null)
                        You dont have unique link
                    @else
                    Your unique link: /magic/{{ Auth::user() -> link}}
                    @endif
                    @if(!Auth::user()->is_admin)
                    <a class="ml-5 btn btn-sm btn-outline-dark"  href="{{ action('LinkController@destroy') }}">
                        Deactivate
                    </a>
                    <a class="btn btn-outline-dark btn-sm"  href="{{ action('LinkController@edit') }}">
                        Refresh
                    </a>
                        @endif
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a class="btn btn-outline-dark"  href="{{ action('RandomNumberController@storeNumber') }}">
                        I'm feeling lucky
                    </a>
                    <a class="btn btn-outline-dark" href="{{ action('RandomNumberController@show') }}">
                        History
                    </a>
                </div>
                @if(session('randomNumber'))
                    <div class="m-2 alert alert-primary" role="alert">
                        Number:
                        {{session('randomNumber')->number}}
                        Result:
                        {{session('randomNumber')->result}}
                        Win:
                        {{session('randomNumber')->win}}
                    </div>
                @endif
                @if(session('randomNumbers'))
                @foreach (session('randomNumbers') as $number)
                        <div class="m-2 alert alert-primary" role="alert">
                            Number:
                            {{$number->number}}
                            Result:
                            {{$number->result}}
                            Win:
                            {{$number->win}}
                        </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
