@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.site-image.actions.edit', ['name' => $siteImage->name]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <site-image-form
                :action="'{{ $siteImage->resource_url }}'"
                :data="{{ $siteImage->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.site-image.actions.edit', ['name' => $siteImage->name]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.site-image.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </site-image-form>

        </div>
    
</div>

@endsection