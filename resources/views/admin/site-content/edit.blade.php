@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.site-content.actions.edit', ['name' => $siteContent->title]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <site-content-form
                :action="'{{ $siteContent->resource_url }}'"
                :data="{{ $siteContent->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.site-content.actions.edit', ['name' => $siteContent->title]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.site-content.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </site-content-form>

        </div>
    
</div>

@endsection