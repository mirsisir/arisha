@extends('layouts.admin.base')

@section('content')

    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link bg-aqua-active" href="#" id="english-link">EN</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" id="spanish-link">ES</a>
        </li>
    </ul>
    <form action="{{route('store.translate')}}" method="POST">
        @csrf
        <div class="card">
            <div class="card-body" id="english-form">
                <div class="form-group">
                    <label class="required" for="en_title">{{ trans('HEAD') }} (EN)</label>
                    <input class="form-control {{ $errors->has('en_name') ? 'is-invalid' : '' }}" type="text"
                           name="en_name" id="en_name" value="{{ old('en_name', '') }}" required>

                    @if($errors->has('en_name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('en_name') }}
                        </div>
                    @endif

                </div>
                <div class="form-group">
                    <label class="required" for="en_title">{{ trans('Title') }} (EN)</label>
                    <input class="form-control {{ $errors->has('en_title') ? 'is-invalid' : '' }}" type="text"
                           name="en_title" id="en_title" value="{{ old('en_title', '') }}" required>
                    @if($errors->has('en_title'))
                        <div class="invalid-feedback">
                            {{ $errors->first('en_title') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="en_full_text">{{ trans('Details') }} (EN)</label>
                    <textarea class="form-control ckeditor {{ $errors->has('en_full_text') ? 'is-invalid' : '' }}"
                              name="en_full_text" id="en_full_text">{{ old('en_full_text') }}</textarea>
                    @if($errors->has('en_full_text'))
                        <div class="invalid-feedback">
                            {{ $errors->first('en_full_text') }}
                        </div>
                    @endif

                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body d-none" id="spanish-form">
                <div class="form-group">
                    <div class="form-group">
                        <label class="required" for="en_title">{{ trans('HEAD') }} (DE)</label>
                        <input class="form-control {{ $errors->has('de_name') ? 'is-invalid' : '' }}" type="text"
                               name="en_title" id="de_title" value="{{ old('de_name', '') }}" required>

                        @if($errors->has('de_name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('de_name') }}
                            </div>
                        @endif
                    </div>

                    <label class="required" for="title">{{ trans('Title') }} (DE)</label>
                    <input class="form-control {{ $errors->has('de_title') ? 'is-invalid' : '' }}" type="text"
                           name="de_title" id="de_title" value="{{ old('de_title', '') }}" required>
                    @if($errors->has('de_title'))
                        <div class="invalid-feedback">
                            {{ $errors->first('de_title') }}
                        </div>
                    @endif

                </div>
                <div class="form-group">
                    <label for="de_full_text">{{ trans('Details') }} (DE)</label>
                    <textarea class="form-control ckeditor {{ $errors->has('de_full_text') ? 'is-invalid' : '' }}"
                              name="de_full_text" id="de_full_text">{{ old('de_full_text') }}</textarea>
                    @if($errors->has('de_full_text'))
                        <div class="invalid-feedback">
                            {{ $errors->first('de_full_text') }}
                        </div>
                    @endif

                </div>
            </div>

        </div>
        <input type="submit" value="Save">
    </form>


@endsection

@section('js')
    <script>
        var $englishForm = $('#english-form');
        var $spanishForm = $('#spanish-form');
        var $englishLink = $('#english-link');
        var $spanishLink = $('#spanish-link');

        $englishLink.click(function () {
            $englishLink.toggleClass('bg-aqua-active');
            $englishForm.toggleClass('d-none');
            $spanishLink.toggleClass('bg-aqua-active');
            $spanishForm.toggleClass('d-none');
        });

        $spanishLink.click(function () {
            $englishLink.toggleClass('bg-aqua-active');
            $englishForm.toggleClass('d-none');
            $spanishLink.toggleClass('bg-aqua-active');
            $spanishForm.toggleClass('d-none');
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.ckeditor').ckeditor();
        });

        $(document).ready(function() {
            $('.ckeditor1').ckeditor();
        });


    </script>

@endsection
