@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header font-weight-bold">User's Groups</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @foreach($groups as $group)
                            <div class="user-group">
                                <h5 class="card-title">{{ $group['name'] }}</h5>
                                <small class="text-muted">{{ $group['privacy'] ?? '' }}</small>
                                <p>
                                    <a href="#ex1" rel="modal:open"
                                       class="openGroupModal" data-name="{{ $group['name'] }}"
                                       data-id="{{ $group['id'] }}">
                                        Publishing Post
                                    </a>
                                </p>
                                <hr>
                            </div>
                        @endforeach
                        <div id="ex1" class="modal">
                            <p>Post to
                                <span class="font-weight-bold group-name"></span>
                            </p>
                            <div class="form-group col-6 mt-3">
                                <div class="row w-100">
                                    <textarea type="text"
                                              id="message"
                                              name="text"
                                              placeholder="Message ..."
                                              class="w-100 form-control group">
                                                </textarea>
                                    <button class="btn btn-success submit-group-post btn-sm float-right mt-2"
                                            type="button">Submit
                                    </button>
                                </div>
                            </div>
                            <a href="#" rel="modal:close">Close</a>
                        </div>
                    </div>
                </div>

                <div class="card mt-5">
                    <div class="card-header font-weight-bold">User's Pages</div>
                    <div class="card-body">
                        @foreach($pages as $page)
                            <div class="user-group">
                                <h5 class="card-title">{{ $page['name'] }}</h5>
                                <small class="text-muted">{{ $page['category'] ?? '' }}</small>
                                <p>
                                    <a href="#ex2"
                                       rel="modal:open"
                                       class="openPageModal" data-name="{{ $page['name'] }}"
                                       data-id="{{ $page['id'] }}">
                                        Publishing Post
                                    </a>
                                </p>
                                <hr>
                            </div>
                        @endforeach
                        <div id="ex2" class="modal">
                            <p>Post to
                                <span class="font-weight-bold page-name"></span>
                            </p>
                            <div class="form-group col-6 mt-3">
                                <div class="row w-100">
                                    <textarea type="text"
                                              id="page-message"
                                              name="page-text"
                                              placeholder="Message ..."
                                              class="w-100 form-control page">
                                    </textarea>
                                    <button class="btn btn-success submit-page-post btn-sm float-right mt-2"
                                            type="button" data-pageAccessToken="{{ $page['access_token'] }}">
                                        Submit
                                    </button>
                                </div>
                            </div>
                            <a href="#" rel="modal:close">Close</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom-scripts')
    <script type="text/javascript" src="{{ URL::asset ('js/fb.js') }}"></script>
@endpush
