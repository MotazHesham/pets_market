@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.setting.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.settings.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="site_name">{{ trans('cruds.setting.fields.site_name') }}</label>
                <input class="form-control {{ $errors->has('site_name') ? 'is-invalid' : '' }}" type="text" name="site_name" id="site_name" value="{{ old('site_name', '') }}">
                @if($errors->has('site_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('site_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.site_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="logo">{{ trans('cruds.setting.fields.logo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('logo') ? 'is-invalid' : '' }}" id="logo-dropzone">
                </div>
                @if($errors->has('logo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('logo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.logo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phone">{{ trans('cruds.setting.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', '') }}">
                @if($errors->has('phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('cruds.setting.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}">
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address">{{ trans('cruds.setting.fields.address') }}</label>
                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', '') }}">
                @if($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="twitter">{{ trans('cruds.setting.fields.twitter') }}</label>
                <input class="form-control {{ $errors->has('twitter') ? 'is-invalid' : '' }}" type="text" name="twitter" id="twitter" value="{{ old('twitter', '') }}">
                @if($errors->has('twitter'))
                    <div class="invalid-feedback">
                        {{ $errors->first('twitter') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.twitter_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="facebook">{{ trans('cruds.setting.fields.facebook') }}</label>
                <input class="form-control {{ $errors->has('facebook') ? 'is-invalid' : '' }}" type="text" name="facebook" id="facebook" value="{{ old('facebook', '') }}">
                @if($errors->has('facebook'))
                    <div class="invalid-feedback">
                        {{ $errors->first('facebook') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.facebook_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="googleplus">{{ trans('cruds.setting.fields.googleplus') }}</label>
                <input class="form-control {{ $errors->has('googleplus') ? 'is-invalid' : '' }}" type="text" name="googleplus" id="googleplus" value="{{ old('googleplus', '') }}">
                @if($errors->has('googleplus'))
                    <div class="invalid-feedback">
                        {{ $errors->first('googleplus') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.googleplus_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="instagram">{{ trans('cruds.setting.fields.instagram') }}</label>
                <input class="form-control {{ $errors->has('instagram') ? 'is-invalid' : '' }}" type="text" name="instagram" id="instagram" value="{{ old('instagram', '') }}">
                @if($errors->has('instagram'))
                    <div class="invalid-feedback">
                        {{ $errors->first('instagram') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.instagram_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.setting.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description') }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description_2">{{ trans('cruds.setting.fields.description_2') }}</label>
                <textarea class="form-control {{ $errors->has('description_2') ? 'is-invalid' : '' }}" name="description_2" id="description_2">{{ old('description_2') }}</textarea>
                @if($errors->has('description_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.description_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="keywords_seo">{{ trans('cruds.setting.fields.keywords_seo') }}</label>
                <textarea class="form-control {{ $errors->has('keywords_seo') ? 'is-invalid' : '' }}" name="keywords_seo" id="keywords_seo">{{ old('keywords_seo') }}</textarea>
                @if($errors->has('keywords_seo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('keywords_seo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.keywords_seo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="author_seo">{{ trans('cruds.setting.fields.author_seo') }}</label>
                <input class="form-control {{ $errors->has('author_seo') ? 'is-invalid' : '' }}" type="text" name="author_seo" id="author_seo" value="{{ old('author_seo', '') }}">
                @if($errors->has('author_seo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('author_seo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.author_seo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sitemap_link_seo">{{ trans('cruds.setting.fields.sitemap_link_seo') }}</label>
                <input class="form-control {{ $errors->has('sitemap_link_seo') ? 'is-invalid' : '' }}" type="text" name="sitemap_link_seo" id="sitemap_link_seo" value="{{ old('sitemap_link_seo', '') }}">
                @if($errors->has('sitemap_link_seo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sitemap_link_seo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.sitemap_link_seo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description_seo">{{ trans('cruds.setting.fields.description_seo') }}</label>
                <textarea class="form-control {{ $errors->has('description_seo') ? 'is-invalid' : '' }}" name="description_seo" id="description_seo">{{ old('description_seo') }}</textarea>
                @if($errors->has('description_seo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description_seo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.description_seo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="count_stores">{{ trans('cruds.setting.fields.count_stores') }}</label>
                <input class="form-control {{ $errors->has('count_stores') ? 'is-invalid' : '' }}" type="text" name="count_stores" id="count_stores" value="{{ old('count_stores', '') }}">
                @if($errors->has('count_stores'))
                    <div class="invalid-feedback">
                        {{ $errors->first('count_stores') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.count_stores_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="count_pets">{{ trans('cruds.setting.fields.count_pets') }}</label>
                <input class="form-control {{ $errors->has('count_pets') ? 'is-invalid' : '' }}" type="text" name="count_pets" id="count_pets" value="{{ old('count_pets', '') }}">
                @if($errors->has('count_pets'))
                    <div class="invalid-feedback">
                        {{ $errors->first('count_pets') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.count_pets_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="count_tweets">{{ trans('cruds.setting.fields.count_tweets') }}</label>
                <input class="form-control {{ $errors->has('count_tweets') ? 'is-invalid' : '' }}" type="text" name="count_tweets" id="count_tweets" value="{{ old('count_tweets', '') }}">
                @if($errors->has('count_tweets'))
                    <div class="invalid-feedback">
                        {{ $errors->first('count_tweets') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.count_tweets_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="count_products">{{ trans('cruds.setting.fields.count_products') }}</label>
                <input class="form-control {{ $errors->has('count_products') ? 'is-invalid' : '' }}" type="text" name="count_products" id="count_products" value="{{ old('count_products', '') }}">
                @if($errors->has('count_products'))
                    <div class="invalid-feedback">
                        {{ $errors->first('count_products') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.count_products_helper') }}</span>
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
    Dropzone.options.logoDropzone = {
    url: '{{ route('admin.settings.storeMedia') }}',
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
      $('form').find('input[name="logo"]').remove()
      $('form').append('<input type="hidden" name="logo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="logo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($setting) && $setting->logo)
      var file = {!! json_encode($setting->logo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="logo" value="' + file.file_name + '">')
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
@endsection