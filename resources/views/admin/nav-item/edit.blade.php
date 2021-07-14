@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.nav-item.actions.edit', ['name' => $navItem->name]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <nav-item-form
                :action="'{{ $navItem->resource_url }}'"
                :data="{{ $navItem->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.nav-item.actions.edit', ['name' => $navItem->name]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.nav-item.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </nav-item-form>

        </div>
    
</div>

@endsection