@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.post-category.actions.edit', ['name' => $postCategory->name]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <post-category-form
                :action="'{{ $postCategory->resource_url }}'"
                :data="{{ $postCategory->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.post-category.actions.edit', ['name' => $postCategory->name]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.post-category.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </post-category-form>

        </div>
    
</div>

@endsection