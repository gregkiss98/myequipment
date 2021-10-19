@extends('layouts.app', ['activePage' => 'upgrade', 'titlePage' => __('Upgrade to Premium')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8 ml-auto mr-auto">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Equipment in my Street</h4>
            <p class="card-category">Are you looking for more? Please check our Premium Version of Equipment in my Street.</p>
          </div>
          <div class="card-body">
            <div class="table-responsive table-upgrade">
              <table class="table">
                <thead>
                  <tr>
                    <th></th>
                    <th class="text-center">Free</th>
                    <th class="text-center">Premium</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><h3 class="text-primary">Laravel</h3></td>
                    <td class="text-center"></td>
                    <td class="text-center"></td>
                  </tr>
                  <tr>
                    <td>Login, Register, Forgot password pages</td>
                    <td class="text-center"><i class="fa fa-check text-success"></i></td>
                    <td class="text-center"><i class="fa fa-check text-success"></i></td>
                  </tr>
                  <tr>
                    <td>User profile</td>
                    <td class="text-center"><i class="fa fa-check text-success"></i></td>
                    <td class="text-center"><i class="fa fa-check text-success"></i></td>
                  </tr>
                  <tr>
                    <td>Add equipment</td>
                    <td class="text-center"><i class="fa fa-check text-success"></i></td>
                    <td class="text-center"><i class="fa fa-check text-success"></i></td>
                  </tr>
                  <td>Delete equipment</td>
                    <td class="text-center"><i class="fa fa-check text-success"></i></td>
                    <td class="text-center"><i class="fa fa-check text-success"></i></td>
                  </tr>
                  <td>Edit equipment</td>
                    <td class="text-center"><i class="fa fa-check text-success"></i></td>
                    <td class="text-center"><i class="fa fa-check text-success"></i></td>
                  </tr>
                  <td>Book equipment</td>
                    <td class="text-center"><i class="fa fa-check text-success"></i></td>
                    <td class="text-center"><i class="fa fa-check text-success"></i></td>
                  </tr>
                  <td>Join event</td>
                    <td class="text-center"><i class="fa fa-check text-success"></i></td>
                    <td class="text-center"><i class="fa fa-check text-success"></i></td>
                  </tr>
                  <tr>
                    <td>Create event</td>
                    <td class="text-center"><i class="fa fa-times text-danger"></i></td>
                    <td class="text-center"><i class="fa fa-check text-success"></i></td>
                  </tr>
                  <tr>
                    <td>Edit event</td>
                    <td class="text-center"><i class="fa fa-times text-danger"></i></td>
                    <td class="text-center"><i class="fa fa-check text-success"></i></td>
                  </tr>
                  <tr>
                    <td>Delete event</td>
                    <td class="text-center"><i class="fa fa-times text-danger"></i></td>
                    <td class="text-center"><i class="fa fa-check text-success"></i></td>
                  </tr>
                  <tr>
                    <td><h3 class="text-primary">Premium Support</h3></td>
                    <td class="text-center"><i class="fa fa-times text-danger"></i></td>
                    <td class="text-center"><i class="fa fa-check text-success"></i></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td class="text-center">Free</td>
                    <td class="text-center">Just $10</td>
                  </tr>
                  <tr>
                    <td class="text-center"></td>
                    <td class="text-center">
                      <a href="#" class="btn btn-round btn-fill btn-default disabled">Current Version</a>
                    </td>
                    <td class="text-center">
                      <a href="#" aria-disabled="true" class="btn btn-round btn-fill btn-info">Upgrade to PRO</a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection