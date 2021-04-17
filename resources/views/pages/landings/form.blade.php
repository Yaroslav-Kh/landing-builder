@extends('layouts.common')

@section('title', 'New landing')

@section('content')
    <style>
        .ck-editor__editable {
            min-height: 200px !important;
        }
    </style>
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h3 class="mt-3 mb-3">New landing</h3>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('landings.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="image" class="control-label">{{ __('Image') }} <span class="text-danger">*</span>  </label>
                        <small class="d-flex">Maximum width and height - 500px</small>
                        <br>
                        <x-input id="image"
                                 class="form-controll"
                                 type="file"
                                 name="image"
                                 :value="old('image')" accept="image/png,image/jpeg"  autofocus required />
                    </div>
                    <div class="form-group">
                        <label for="title" class="control-label">{{ __('Title') }} <span class="text-danger">*</span>  </label>
                        <small class="d-flex">Minimum number of characters  - 10</small>
                        <x-input id="title" class="form-control"
                                 type="text"
                                 name="title"
                                 :value="old('title')"
                                   />

                    </div>
                    <div class="form-group">
                        <label for="subtitle" class="control-label">{{ __('Subtitle') }} <span class="text-danger">*</span>  </label>
                        <small class="d-flex">Minimum number of characters  - 10</small>
                        <x-input id="subtitle" class="form-control"
                                 type="text"
                                 name="subtitle"
                                 :value="old('subtitle')"
                                  />
                    </div>
                    <div class="form-group">
                        <label for="content" class="control-label">{{ __('Content') }} <span class="text-danger">*</span>  </label>
                        <small class="d-flex">Minimum number of characters  - 10</small>
                        <textarea class="form-control" id="editor" rows="10" name="content"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="font_color" class="control-label">{{ __('Font color') }} <span class="text-danger">*</span>  </label>
                        <x-input id="font_color" class="form-control"
                                 type="hidden"
                                 name="font_color"
                                 :value="old('font_color')"
                                  />
                        <div id="fontColor"></div>
                    </div>
                    <div class="form-group">
                        <x-label for="template" class="control-label" :value="__('Template')" />
                        @if(!empty($templates))
                        <select class="form-control" id="template" name="template">
                            @foreach($templates as $template)
                                <option value="{{ $template }}">{{ $template }}</option>
                            @endforeach
                        </select>
                        @else
                            <p>Template not yet</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <x-label for="domain" class="control-label" :value="__('Domain')" />
                        @if(!empty($domains))
                            <select class="form-control" id="domain" name="domain">
                                @foreach($domains as $domain)
                                    <option value="{{ $domain['domain'] }}">{{ $domain['domain'] }}</option>
                                @endforeach
                            </select>
                        @else
                            <p>Domains not yet</p>
                        @endif
                    </div>
                    <button class="btn btn-primary" type="submit">Add</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/27.0.0/classic/ckeditor.js"></script>
    <script src="{{ asset('js/colorpicker/colorpalettepicker.js') }}"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ))
            .catch( error => {
                console.error( error );
            } );

        $('#fontColor').colorPalettePicker({
            lines:4,
            onSelected: function(color){
                $('#font_color').val(color)
            }
        });
    </script>
@endsection
