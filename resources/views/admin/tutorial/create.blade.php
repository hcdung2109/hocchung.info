@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
            <h2 class="page-title txt-color-blueDark"><i class="fa fa-desktop fa-fw "></i> Dashboard
                <a href="{{route('admin.tutorial.index')}}"><span>/ DS Tutorial  </span></a>
            </h2>
        </div>
    </div>
    <section id="widget-grid" class="">
        <div class="row">

            <!-- NEW COL START -->
            <article class="col-sm-12 col-md-12 col-lg-6  float-none center-block">

                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-darken" >
                    <header role="heading">
                        <h2>Form thêm tutorials</h2>
                    </header>

                    <!-- widget div-->
                    <div role="content">
                        <!-- widget content -->
                        <div class="widget-body no-padding">
                            <form method="POST" action="{{route('admin.tutorial.store')}}" id="smart-form-register" class="smart-form client-form">
                                {{ csrf_field() }}
                                <fieldset>
                                    <section>
                                        <label class="label">Thể loại</label>
                                        <label class="select">
                                            <select name="category_id">
                                                <option value="">NO.</option>
                                                {{ App\Helpers\Helper::createHtmlListCategories($categories) }}
                                            </select> <i></i>
                                        </label>
                                    </section>

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

                                    <section >
                                        <label class="label">{{__('admin.status')}}</label>
                                        <label class="select">
                                            <select name="is_active" >
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
