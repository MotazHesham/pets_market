@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.product.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.products.update", [$product->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="category_id">{{ trans('cruds.product.fields.category') }}</label>
                <select class="form-control select2 {{ $errors->has('category') ? 'is-invalid' : '' }}" name="category_id" id="category_id">
                    @foreach($categories as $id => $entry)
                        <option value="{{ $id }}" {{ (old('category_id') ? old('category_id') : $product->category->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('category'))
                    <div class="invalid-feedback">
                        {{ $errors->first('category') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.category_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.product.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $product->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="main_photo">{{ trans('cruds.product.fields.main_photo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('main_photo') ? 'is-invalid' : '' }}" id="main_photo-dropzone">
                </div>
                @if($errors->has('main_photo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('main_photo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.main_photo_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="photos">{{ trans('cruds.product.fields.photos') }}</label>
                <div class="needsclick dropzone {{ $errors->has('photos') ? 'is-invalid' : '' }}" id="photos-dropzone">
                </div>
                @if($errors->has('photos'))
                    <div class="invalid-feedback">
                        {{ $errors->first('photos') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.photos_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.product.fields.description') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{!! old('description', $product->description) !!}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="details">{{ trans('cruds.product.fields.details') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('details') ? 'is-invalid' : '' }}" name="details" id="details">{!! old('details', $product->details) !!}</textarea>
                @if($errors->has('details'))
                    <div class="invalid-feedback">
                        {{ $errors->first('details') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.details_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="short_details">{{ trans('cruds.product.fields.short_details') }}</label>
                <textarea class="form-control {{ $errors->has('short_details') ? 'is-invalid' : '' }}" name="short_details" id="short_details" required>{{ old('short_details', $product->short_details) }}</textarea>
                @if($errors->has('short_details'))
                    <div class="invalid-feedback">
                        {{ $errors->first('short_details') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.short_details_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.product.fields.attributes') }}</label>
                <select class="form-control {{ $errors->has('attributes') ? 'is-invalid' : '' }}" name="attributes" id="attributes">
                    <option value disabled {{ old('attributes', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Product::ATTRIBUTES_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('attributes', $product->attributes) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('attributes'))
                    <div class="invalid-feedback">
                        {{ $errors->first('attributes') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.attributes_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="attribute_options">{{ trans('cruds.product.fields.attribute_options') }}</label>
                <textarea class="form-control {{ $errors->has('attribute_options') ? 'is-invalid' : '' }}" name="attribute_options" id="attribute_options">{{ old('attribute_options', $product->attribute_options) }}</textarea>
                @if($errors->has('attribute_options'))
                    <div class="invalid-feedback">
                        {{ $errors->first('attribute_options') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.attribute_options_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.product.fields.colors') }}</label>
                <select class="form-control {{ $errors->has('colors') ? 'is-invalid' : '' }}" name="colors" id="colors">
                    <option value disabled {{ old('colors', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Product::COLORS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('colors', $product->colors) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('colors'))
                    <div class="invalid-feedback">
                        {{ $errors->first('colors') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.colors_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tags">{{ trans('cruds.product.fields.tags') }}</label>
                <textarea class="form-control {{ $errors->has('tags') ? 'is-invalid' : '' }}" name="tags" id="tags">{{ old('tags', $product->tags) }}</textarea>
                @if($errors->has('tags'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tags') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.tags_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.product.fields.video_provider') }}</label>
                <select class="form-control {{ $errors->has('video_provider') ? 'is-invalid' : '' }}" name="video_provider" id="video_provider">
                    <option value disabled {{ old('video_provider', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Product::VIDEO_PROVIDER_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('video_provider', $product->video_provider) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('video_provider'))
                    <div class="invalid-feedback">
                        {{ $errors->first('video_provider') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.video_provider_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="video_link">{{ trans('cruds.product.fields.video_link') }}</label>
                <input class="form-control {{ $errors->has('video_link') ? 'is-invalid' : '' }}" type="text" name="video_link" id="video_link" value="{{ old('video_link', $product->video_link) }}">
                @if($errors->has('video_link'))
                    <div class="invalid-feedback">
                        {{ $errors->first('video_link') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.video_link_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.product.fields.discount_type') }}</label>
                @foreach(App\Models\Product::DISCOUNT_TYPE_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('discount_type') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="discount_type_{{ $key }}" name="discount_type" value="{{ $key }}" {{ old('discount_type', $product->discount_type) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="discount_type_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('discount_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('discount_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.discount_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="discount">{{ trans('cruds.product.fields.discount') }}</label>
                <input class="form-control {{ $errors->has('discount') ? 'is-invalid' : '' }}" type="number" name="discount" id="discount" value="{{ old('discount', $product->discount) }}" step="0.01">
                @if($errors->has('discount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('discount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.discount_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="meta_title">{{ trans('cruds.product.fields.meta_title') }}</label>
                <input class="form-control {{ $errors->has('meta_title') ? 'is-invalid' : '' }}" type="text" name="meta_title" id="meta_title" value="{{ old('meta_title', $product->meta_title) }}">
                @if($errors->has('meta_title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('meta_title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.meta_title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="meta_description">{{ trans('cruds.product.fields.meta_description') }}</label>
                <textarea class="form-control {{ $errors->has('meta_description') ? 'is-invalid' : '' }}" name="meta_description" id="meta_description">{{ old('meta_description', $product->meta_description) }}</textarea>
                @if($errors->has('meta_description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('meta_description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.meta_description_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('published') ? 'is-invalid' : '' }}">
                    <input class="form-check-input" type="checkbox" name="published" id="published" value="1" {{ $product->published || old('published', 0) === 1 ? 'checked' : '' }} required>
                    <label class="required form-check-label" for="published">{{ trans('cruds.product.fields.published') }}</label>
                </div>
                @if($errors->has('published'))
                    <div class="invalid-feedback">
                        {{ $errors->first('published') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.published_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('featured') ? 'is-invalid' : '' }}">
                    <input class="form-check-input" type="checkbox" name="featured" id="featured" value="1" {{ $product->featured || old('featured', 0) === 1 ? 'checked' : '' }} required>
                    <label class="required form-check-label" for="featured">{{ trans('cruds.product.fields.featured') }}</label>
                </div>
                @if($errors->has('featured'))
                    <div class="invalid-feedback">
                        {{ $errors->first('featured') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.featured_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="current_stock">{{ trans('cruds.product.fields.current_stock') }}</label>
                <input class="form-control {{ $errors->has('current_stock') ? 'is-invalid' : '' }}" type="number" name="current_stock" id="current_stock" value="{{ old('current_stock', $product->current_stock) }}" step="1" required>
                @if($errors->has('current_stock'))
                    <div class="invalid-feedback">
                        {{ $errors->first('current_stock') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.current_stock_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="brand_id">{{ trans('cruds.product.fields.brand') }}</label>
                <select class="form-control select2 {{ $errors->has('brand') ? 'is-invalid' : '' }}" name="brand_id" id="brand_id">
                    @foreach($brands as $id => $entry)
                        <option value="{{ $id }}" {{ (old('brand_id') ? old('brand_id') : $product->brand->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('brand'))
                    <div class="invalid-feedback">
                        {{ $errors->first('brand') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.brand_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
    Dropzone.options.mainPhotoDropzone = {
    url: '{{ route('admin.products.storeMedia') }}',
    maxFilesize: 5, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 5,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="main_photo"]').remove()
      $('form').append('<input type="hidden" name="main_photo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="main_photo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($product) && $product->main_photo)
      var file = {!! json_encode($product->main_photo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="main_photo" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}

</script>
<script>
    Dropzone.options.photosDropzone = {
    url: '{{ route('admin.products.storeMedia') }}',
    maxFilesize: 5, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 5,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="photos"]').remove()
      $('form').append('<input type="hidden" name="photos" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="photos"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($product) && $product->photos)
      var file = {!! json_encode($product->photos) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="photos" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}

</script>
<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.products.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $product->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

@endsection