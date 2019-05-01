@push('prescripts')
{{ Html::script(mix('/assets/js/backend/modules/config.js')) }}
    <script>
        $(function () {
            window.flash_message = {!! session("flash_message") ?? '{}' !!};
            window.config.form();
        });
    </script>
@endpush

@push('prestyles')
{{ Html::style('assets/css/backend/config.css') }}
@endpush
@include('backend._partials.components.errors')
<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">{{ __('repositories.page.home') }}</a></li>
    <li><a data-toggle="tab" href="#blog">{{ __('repositories.page.blog') }}</a></li>
    <li><a data-toggle="tab" href="#about">{{ __('repositories.page.about') }}</a></li>
    <li><a data-toggle="tab" href="#contact">{{ __('repositories.page.contact') }}</a></li>
</ul>

<div class="tab-content">
  <div id="home" class="tab-pane fade in active">
    @include('backend.config._home')
  </div>
  <div id="blog" class="tab-pane fade">
    @include('backend.config._blog')
  </div>
  <div id="about" class="tab-pane fade">
    @include('backend.config._about')
  </div>
  <div id="contact" class="tab-pane fade">
    @include('backend.config._contact')
  </div>
</div>

<div class="row">
    </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success btn-sm"><i class="ion-checkmark-circled"></i> {{ __('repositories.title.edit') }}</button>
        </div>
    </div>
</div>
