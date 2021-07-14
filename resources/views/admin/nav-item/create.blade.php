@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.nav-item.actions.create'))

@section('body')

    <div class="container-xl">

                <div class="card">
        
        <nav-item-form
            :action="'{{ url('admin/nav-items') }}'"
            v-cloak
            inline-template>

            <form class="form-horizontal form-create" method="post" @submit.prevent="onSubmit" :action="action" novalidate>
                
                <div class="card-header">
                    <i class="fa fa-plus"></i> {{ trans('admin.nav-item.actions.create') }}
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