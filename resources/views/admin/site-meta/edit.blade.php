@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.site-meta.actions.edit', ['name' => $siteMetum->name]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <site-meta-form
                :action="'{{ $siteMetum->resource_url }}'"
                :data="{{ $siteMetum->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.site-meta.actions.edit', ['name' => $siteMetum->name]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.site-meta.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </site-meta-form>

        </div>
    
</div>

@endsection