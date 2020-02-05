@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Prendre contact</div>
                    <div class="card-body">
                        <form action="{{route('contact.post')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input name="email" type="email"
                                       class="form-control @error('email') is-invalid @enderror" id="email"
                                       placeholder="Entrer votre email"
                                       value="{{  old('email', "") }}"
                                >
                                @error('email')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="message">Votre message</label>
                                <textarea class="form-control @error('message') is-invalid @enderror" name="message"
                                          id="message" cols="30"
                                          rows="10">{{old('message')}}</textarea>
                                @error('message')
                                <div class="invalid-feedback">
                                    Votre message est vide
                                </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
