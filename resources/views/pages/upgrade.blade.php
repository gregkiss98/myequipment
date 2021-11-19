@extends('layouts.app', ['activePage' => 'upgrade', 'titlePage' => __('Upgrade to Premium')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8 ml-auto mr-auto">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Suppport US </h4>
            <p class="card-category">If you support Us, you can create events!</p>
          </div>
          <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <a class="btn btn-info" href="#" role="button">
                        Support US
                        <i class="material-icons text-white">favorites</i></a>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
