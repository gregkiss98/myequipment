@extends('layouts.app', ['activePage' => 'support', 'titlePage' => __('Support Us')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-12">

                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">
                                Support Us
                            </h4>
                        </div>
                        <div class="card-body text-center">

                                <div>
                                    @if (session()->has("message"))
                                        <div class="alert alert-success" role="alert">
                                            {{ session()->get('message') }}
                                        </div>
                                    @elseif (session()->has('error'))
                                        <div class="alert alert-danger" role="alert">
                                            {{ session()->get('error') }}
                                        </div>
                                    @endif

                                    @if($errors->any())
                                        <div class="alert alert-danger" role="alert">
                                            <ul>
                                                @foreach($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>

                                @if (!$super_user)
                                <form action="{{ route('support', $userId) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                <div class="row">
                                    <h5 class="col-12">
                                        You are a normal user. You can support Us, and after that you can create events.
                                    </h5>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-warning">
                                            <i class="material-icons text-white">favorites</i>
                                            Support
                                        </button>
                                    </div>
                                </div>
                            </form>
                            @else
                                <form action="{{ route('endsupport', $userId) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <h5 class="col-12">
                                            You are a super user. Thank you your support. You can create events.
                                        </h5>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-danger">
                                                Unsupport
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

