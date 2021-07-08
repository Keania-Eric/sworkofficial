<div class="form-group row align-items-center" :class="{'has-danger': errors.has('slug'), 'has-success': fields.slug && fields.slug.valid }">
    <label for="slug" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.tagging-tag.columns.slug') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.slug" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('slug'), 'form-control-success': fields.slug && fields.slug.valid}" id="slug" name="slug" placeholder="{{ trans('admin.tagging-tag.columns.slug') }}">
        <div v-if="errors.has('slug')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('slug') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('name'), 'has-success': fields.name && fields.name.valid }">
    <label for="name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.tagging-tag.columns.name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.name" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('name'), 'form-control-success': fields.name && fields.name.valid}" id="name" name="name" placeholder="{{ trans('admin.tagging-tag.columns.name') }}">
        <div v-if="errors.has('name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('name') }}</div>
    </div>
</div>

<!-- <div class="form-check row" :class="{'has-danger': errors.has('suggest'), 'has-success': fields.suggest && fields.suggest.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="suggest" type="checkbox" v-model="form.suggest" v-validate="''" data-vv-name="suggest"  name="suggest_fake_element">
        <label class="form-check-label" for="suggest">
            {{ trans('admin.tagging-tag.columns.suggest') }}
        </label>
        <input type="hidden" name="suggest" :value="form.suggest">
        <div v-if="errors.has('suggest')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('suggest') }}</div>
    </div>
</div> -->

<!-- <div class="form-group row align-items-center" :class="{'has-danger': errors.has('count'), 'has-success': fields.count && fields.count.valid }">
    <label for="count" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.tagging-tag.columns.count') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.count" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('count'), 'form-control-success': fields.count && fields.count.valid}" id="count" name="count" placeholder="{{ trans('admin.tagging-tag.columns.count') }}">
        <div v-if="errors.has('count')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('count') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('tag_group_id'), 'has-success': fields.tag_group_id && fields.tag_group_id.valid }">
    <label for="tag_group_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.tagging-tag.columns.tag_group_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.tag_group_id" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('tag_group_id'), 'form-control-success': fields.tag_group_id && fields.tag_group_id.valid}" id="tag_group_id" name="tag_group_id" placeholder="{{ trans('admin.tagging-tag.columns.tag_group_id') }}">
        <div v-if="errors.has('tag_group_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('tag_group_id') }}</div>
    </div>
</div> -->

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('description'), 'has-success': fields.description && fields.description.valid }">
    <label for="description" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.tagging-tag.columns.description') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <wysiwyg v-model="form.description" v-validate="''" id="description" name="description" :config="mediaWysiwygConfig"></wysiwyg>
        </div>
        <div v-if="errors.has('description')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('description') }}</div>
    </div>
</div>


