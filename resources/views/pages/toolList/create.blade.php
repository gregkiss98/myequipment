@extends('layouts.app', ['activePage' => 'tools', 'titlePage' => __('Add new tool')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-12">

                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">
                                Add new tool
                            </h4>
                        </div>
                        <div class="card-body text-center">

                            <form action="{{ route('tools.store') }}" method="POST"
                                  enctype="multipart/form-data">

                                <div id="toolImage">
                                    @csrf

                                    <div class="row">
                                        <label class="col-sm-4 col-form-label" for="tool_name">
                                            Tool name
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="tool_name"
                                                       id="tool_name" placeholder="Name" required
                                                       value="{{ old('tool_name') }}"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-4 col-form-label" for="location">
                                            Tool place
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="location"
                                                       id="location" placeholder="Tool place" required
                                                       value="{{ old('location') }}"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <label class="col-sm-4" for="image">
                                            Tool image
                                        </label>
                                        <div class="col-sm-8">
                                            <input type="file" id="image" name="image" accept="image/*"
                                                   @change="previewImage" value="{{ old('vehicle_image') }}">
                                            <img src="" alt="ToolImage" height="100" id="preview"
                                                 style="display: none;"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 text-danger">
                                        Fields marked with a star are required!
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <a href="{{ route('tools.index') }}">
                                            <button type="button" class="btn btn-danger mt-2 ml-2" rel="tooltip"
                                                    title="Visszalépéssel az adatok nem kerülnek mentésre!">Visszalépés
                                            </button>
                                        </a>
                                        <button type="submit" class="btn btn-warning">Mentés</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        new Vue({
            el: '#toolImage',
            methods: {
                previewImage: function (e) {
                    var file = e.target.files[0];
                    var imgURL = URL.createObjectURL(file);
                    document.getElementById("preview").src = imgURL;
                    document.getElementById("preview").style.display = "inline";
                }
            }
        })
    </script>
@endsection
