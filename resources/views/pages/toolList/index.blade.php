@extends('layouts.app', ['activePage' => 'tools', 'titlePage' => __('Tool List')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            {{--                        <div class="breakpoints">--}}
            {{--                            <div class="d-block d-sm-none">XS</div> <!--d-block: display block; d-none: display-none; melyiknél jelenjen meg és melyiknél nem, a kicsi felől a nagy felé-->--}}
            {{--                            <div class="d-none d-sm-block d-md-none">SM</div>--}}
            {{--                            <div class="d-none d-md-block d-lg-none">MD</div>--}}
            {{--                            <div class="d-none d-lg-block d-xl-none">LG</div>--}}
            {{--                            <div class="d-none d-xl-block">XL</div>--}}
            {{--                        </div>--}}
            <a href="{{ route('tools.create') }}" type="button" class="btn btn-primary">Add new tool</a>
            <div class="row justify-content-center">
                @forelse($tools as $tool)
                    <div class="card col-lg-3 col-md-4 col-sm-4 mr-3">
                        @if($tool->picture)
                            <img src="{{ 'storage/toolsImage/' . $tool->picture }}" class="card-img-top" alt="...">
                        @else
                            <img src="{{ asset('storage/toolsImage/defaultTools.jpg') }}" class="card-img-top"
                                 alt="...">
                        @endif
                        <div class="card-body">
                            <h3 class="card-title">{{ $tool->tool_name }}</h3>
                            <h5>Tool location: {{ $tool->location }}</h5>
                            <p class="card-text"></p>
                            @if ($authUser == $tool->user_id)
                                <span rel="tooltip" title="Törlés"
                                      class="btn btn-danger btn-link btn-sm"
                                      onclick="if(confirm('Biztosan törölni szeretné?')){
                                          document.getElementById('delete{{ $tool->id }}').submit()
                                          }">
                                                <button class="btn btn-primary">Delete this tool</button>
                                                <form
                                                    action="{{ route('tools.destroy', $tool->id) }}"
                                                    method="POST"
                                                    style="display: none"
                                                    id={{ 'delete'.$tool->id }}>
                                                    @csrf
                                                    @method('DELETE')
                                                    </form>
                                        </span>
                            @elseif($tool->availability == true)
                            <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#borrow">
                                    Borrow
                                </button>

                                <form action="{{ route('borrow', $tool->id) }}" method="POST">
                                    @csrf
                                        @method('PUT')
                                    <!-- Modal -->
                                    <div class="modal fade" id="borrow" tabindex="-1" aria-labelledby="borrowLabel"
                                         aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="borrowLabel">Borrow tool</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    I would borrow tool until:
                                                    <input type="date" id="date" name="date">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">Borrow</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            @elseif($tool->borrowed_user_id == $authUser)
                                <p>I borrowed this tools, until: {{ $tool->end_of_borrowed }}</p>
                                <a href="{{ route('endborrow', $tool->id) }}" class="btn btn-primary">End Borrow</a>
                            @else
                                <p>Someone borrowed this tools, until: {{ $tool->end_of_borrowed }}</p>
                                <button class="btn btn-primary disabled">Borrow</button>
                            @endif

                        </div>
                    </div>
                @empty
                    <div>There aren't any tools in database.</div>
                @endforelse
            </div>
        </div>
@endsection
