<div class="dropdown d-inline mg-r-5">
    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{__('common.filters')}}
    </button>
    <div class="dropdown-menu">
        <form id="filterForm" class="pd-20">
            <div class="form-group">
                <label for="exampleDropdownFormEmail1">{{__('common.sort_by')}}</label>
                <div class="custom-control custom-radio">
                    <input type="radio" id="orderBy1" name="orderBy" class="custom-control-input" value="updated_at" @if ($filter->orderBy == 'updated_at') checked @endif>
                    <label class="custom-control-label" for="orderBy1">{{__('common.date_modified')}}</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" id="orderBy2" name="orderBy" class="custom-control-input" value="name" @if ($filter->orderBy == 'name') checked @endif>
                    <label class="custom-control-label" for="orderBy2">{{__('common.title')}}</label>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleDropdownFormEmail1">{{__('common.sort_order')}}</label>
                <div class="custom-control custom-radio">
                    <input type="radio" id="sortByAsc" name="sortBy" class="custom-control-input" value="asc" @if ($filter->sortBy == 'asc') checked @endif>
                    <label class="custom-control-label" for="sortByAsc">{{__('common.ascending')}}</label>
                </div>

                <div class="custom-control custom-radio">
                    <input type="radio" id="sortByDesc" name="sortBy" class="custom-control-input" value="desc"  @if ($filter->sortBy == 'desc') checked @endif>
                    <label class="custom-control-label" for="sortByDesc">{{__('common.descending')}}</label>
                </div>
            </div>
            <div class="form-group">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" id="showDeleted" name="showDeleted" class="custom-control-input" @if ($filter->showDeleted) checked @endif>
                    <label class="custom-control-label" for="showDeleted">{{__('common.show_deleted')}}</label>
                </div>
            </div>
            <div class="form-group mg-b-40">
                <label class="d-block">{{__('common.item_displayed')}}</label>
                <input id="displaySize" type="text" class="js-range-slider" name="perPage" value="{{ $filter->perPage }}"/>
            </div>
            <button id="filter" type="button" class="btn btn-sm btn-primary">{{__('common.apply_filters')}}</button>
        </form>
    </div>
</div>