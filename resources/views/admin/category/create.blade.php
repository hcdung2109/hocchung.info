@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
            <h2 class="page-title txt-color-blueDark"><i class="fa fa-desktop fa-fw "></i> Dashboard
                <a href="{{route('admin.category.index')}}"><span>/ {{__('admin.list_category')}}  </span></a>
            </h2>
        </div>
    </div>
    <section id="widget-grid" class="">
        <div class="row">

            <!-- NEW COL START -->
            <article class="col-sm-12 col-md-12 col-lg-6  float-none center-block">

                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-sortable" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false" role="widget" data-widget-sortable="false">
                    <header role="heading"><div class="jarviswidget-ctrls" role="menu">
                            <a href="javascript:void(0);" class="button-icon jarviswidget-toggle-btn" rel="tooltip" title="" data-placement="bottom" data-original-title="Collapse"><i class="fa fa-minus "></i></a> <a href="javascript:void(0);" class="button-icon jarviswidget-fullscreen-btn" rel="tooltip" title="" data-placement="bottom" data-original-title="Fullscreen"><i class="fa fa-expand "></i></a> <a href="javascript:void(0);" class="button-icon jarviswidget-delete-btn" rel="tooltip" title="" data-placement="bottom" data-original-title="Delete"><i class="fa fa-times"></i></a></div>
                        <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                        <h2>{{__('admin.add_category')}}</h2>
                    </header>

                    <!-- widget div-->
                    <div role="content">
                        <!-- widget content -->
                        <div class="widget-body no-padding">
                            <form method="POST" action="{{route('admin.category.store')}}" id="smart-form-register" class="smart-form client-form" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <fieldset>
                                    <section>
                                        <label class="label">{{__('admin.name')}}</label>
                                        <label class="input"> <i class="icon-append fa fa-user"></i>
                                            <input type="text" name="name">
                                            <b class="tooltip tooltip-bottom-right">Needed to enter the website</b>
                                        </label>
                                        <div class="note">
                                            @if ($errors->has('name'))
                                                <span class="help-inline block txt-red">{{$errors->first('name')}}</span>
                                            @endif
                                        </div>
                                    </section>

                                    <section>
                                        <label class="label">{{__('admin.image')}}</label>
                                        <div class="input input-file">
                                            <span class="button"><input type="file" id="image" name="image" onchange="this.parentNode.nextSibling.value = this.value">Browse</span><input type="text" placeholder="Include some files" readonly="">
                                        </div>
                                    </section>

                                    <section >
                                        <label class="label">{{__('admin.status')}}</label>
                                        <label class="select">
                                            <select name="is_active">
                                                <option value="{{ STATUS_ACTIVE }}">{{__('admin.active')}}</option>
                                                <option value="{{ STATUS_DEACTIVE }}">{{__('admin.pending')}}</option>
                                            </select> <i></i>
                                        </label>
                                        <div class="note">
                                            @if ($errors->has('is_active'))
                                                <span class="help-inline block txt-red">{{$errors->first('is_active')}}</span>
                                            @endif
                                        </div>
                                    </section>

                                    <section>
                                        <label class="label">Is parent</label>
                                        <label class="select">
                                            <select name="parent_id">
                                                <option value="0" selected="">-- {{__('admin.select')}} --</option>
                                                {{ App\Helpers\Helper::createHtmlListCategories($listCategory) }}
                                            </select>
                                        </label>
                                    </section>
                                </fieldset>
                                <footer>
                                    <button type="submit" class="btn btn-primary">
                                        {{__('admin.add')}}
                                    </button>
                                </footer>
                            </form>
                        </div>
                        <!-- end widget content -->

                    </div>
                    <!-- end widget div -->

                </div>
                <!-- end widget -->

            </article>
            <!-- END COL -->
        </div>
    </section>
@endsection
