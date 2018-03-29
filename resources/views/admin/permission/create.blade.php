@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
            <h2 class="page-title txt-color-blueDark"><i class="fa fa-desktop fa-fw "></i> Dashboard
                <a href="{{ route('admin.permission.index') }}"><span>/ {{__('admin.list_function')}}  </span></a>
            </h2>
        </div>
    </div>
    <section id="widget-grid" class="">
        <div class="row">
            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-8 col-lg-8 float-none center-block">
                <div class="jarviswidget jarviswidget-sortable" id="wid-id-6" data-widget-editbutton="false" data-widget-custombutton="false" role="widget">
                    <header role="heading"><div class="jarviswidget-ctrls" role="menu">   <a href="javascript:void(0);" class="button-icon jarviswidget-toggle-btn" rel="tooltip" title="" data-placement="bottom" data-original-title="Collapse"><i class="fa fa-minus "></i></a> <a href="javascript:void(0);" class="button-icon jarviswidget-fullscreen-btn" rel="tooltip" title="" data-placement="bottom" data-original-title="Fullscreen"><i class="fa fa-expand "></i></a> <a href="javascript:void(0);" class="button-icon jarviswidget-delete-btn" rel="tooltip" title="" data-placement="bottom" data-original-title="Delete"><i class="fa fa-times"></i></a></div><div class="widget-toolbar" role="menu"><a data-toggle="dropdown" class="dropdown-toggle color-box selector" href="javascript:void(0);"></a><ul class="dropdown-menu arrow-box-up-right color-select pull-right"><li><span class="bg-color-green" data-widget-setstyle="jarviswidget-color-green" rel="tooltip" data-placement="left" data-original-title="Green Grass"></span></li><li><span class="bg-color-greenDark" data-widget-setstyle="jarviswidget-color-greenDark" rel="tooltip" data-placement="top" data-original-title="Dark Green"></span></li><li><span class="bg-color-greenLight" data-widget-setstyle="jarviswidget-color-greenLight" rel="tooltip" data-placement="top" data-original-title="Light Green"></span></li><li><span class="bg-color-purple" data-widget-setstyle="jarviswidget-color-purple" rel="tooltip" data-placement="top" data-original-title="Purple"></span></li><li><span class="bg-color-magenta" data-widget-setstyle="jarviswidget-color-magenta" rel="tooltip" data-placement="top" data-original-title="Magenta"></span></li><li><span class="bg-color-pink" data-widget-setstyle="jarviswidget-color-pink" rel="tooltip" data-placement="right" data-original-title="Pink"></span></li><li><span class="bg-color-pinkDark" data-widget-setstyle="jarviswidget-color-pinkDark" rel="tooltip" data-placement="left" data-original-title="Fade Pink"></span></li><li><span class="bg-color-blueLight" data-widget-setstyle="jarviswidget-color-blueLight" rel="tooltip" data-placement="top" data-original-title="Light Blue"></span></li><li><span class="bg-color-teal" data-widget-setstyle="jarviswidget-color-teal" rel="tooltip" data-placement="top" data-original-title="Teal"></span></li><li><span class="bg-color-blue" data-widget-setstyle="jarviswidget-color-blue" rel="tooltip" data-placement="top" data-original-title="Ocean Blue"></span></li><li><span class="bg-color-blueDark" data-widget-setstyle="jarviswidget-color-blueDark" rel="tooltip" data-placement="top" data-original-title="Night Sky"></span></li><li><span class="bg-color-darken" data-widget-setstyle="jarviswidget-color-darken" rel="tooltip" data-placement="right" data-original-title="Night"></span></li><li><span class="bg-color-yellow" data-widget-setstyle="jarviswidget-color-yellow" rel="tooltip" data-placement="left" data-original-title="Day Light"></span></li><li><span class="bg-color-orange" data-widget-setstyle="jarviswidget-color-orange" rel="tooltip" data-placement="bottom" data-original-title="Orange"></span></li><li><span class="bg-color-orangeDark" data-widget-setstyle="jarviswidget-color-orangeDark" rel="tooltip" data-placement="bottom" data-original-title="Dark Orange"></span></li><li><span class="bg-color-red" data-widget-setstyle="jarviswidget-color-red" rel="tooltip" data-placement="bottom" data-original-title="Red Rose"></span></li><li><span class="bg-color-redLight" data-widget-setstyle="jarviswidget-color-redLight" rel="tooltip" data-placement="bottom" data-original-title="Light Red"></span></li><li><span class="bg-color-white" data-widget-setstyle="jarviswidget-color-white" rel="tooltip" data-placement="right" data-original-title="Purity"></span></li><li><a href="javascript:void(0);" class="jarviswidget-remove-colors" data-widget-setstyle="" rel="tooltip" data-placement="bottom" data-original-title="Reset widget color to default">Remove</a></li></ul></div>
                        <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                        <h2>{{__('admin.function')}}</h2>

                        <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>

                    <!-- widget div-->
                    <div role="content">

                        <!-- widget edit box -->
                        <div class="jarviswidget-editbox">
                            <!-- This area used as dropdown edit box -->

                        </div>
                        <!-- end widget edit box -->

                        <!-- widget content -->
                        <div class="widget-body no-padding">

                            <form action="{{ route('admin.permission.store') }}" method="post" id="comment-form" class="smart-form" novalidate="novalidate">
                                {{csrf_field()}}
                                <fieldset>
                                    <section class=" col-6">
                                        <label class="label">{{__('admin.table_name')}}</label>
                                        <label class="input">
                                            <input value="" type="text" name="table_name" placeholder="tên bảng dạng số nhiều vd : 'articles'">
                                        </label>
                                        <div class="note">
                                            @if ($errors->has('display_name'))
                                                <span class="help-inline block txt-red">{{ $errors->first('display_name') }}</span>
                                            @endif
                                        </div>
                                    </section>
                                    <section class=" col-6">
                                        <label class="label">&nbsp;</label>
                                        <div class="inline-group">
                                            <label class="checkbox">
                                                <input type="checkbox" name="is_crud" >
                                                <i></i>Chức năng CRUD
                                            </label>
                                        </div>
                                    </section>
                                </fieldset>

                                <fieldset>
                                    <div class="row">
                                        <section class="col col-6">
                                            <label class="label">Tên chức năng</label>
                                            <label class="input">
                                                <input type="text" name="display_name" placeholder="ví dụ 'Creat Post'">
                                            </label>
                                            <div class="note">
                                                @if ($errors->has('display_name'))
                                                    <span class="help-inline block txt-red">{{ $errors->first('display_name') }}</span>
                                                @endif
                                            </div>
                                        </section>
                                        <section class="col col-6">
                                            <label class="label">{{__('admin.description')}}</label>
                                            <label class="input">
                                                <input type="text" name="description" placeholder="nhập mô tả">
                                            </label>
                                        </section>
                                    </div>

                                </fieldset>

                                <footer>
                                    <button type="reset" class="btn btn-default">Reset</button>
                                    <button type="submit" name="submit" class="btn btn-primary">{{__('admin.add')}}</button>
                                </footer>
                            </form>

                        </div>
                        <!-- end widget content -->

                    </div>
                    <!-- end widget div -->

                </div>
            </article>
            <!-- WIDGET END -->
        </div>
    </section>
@endsection
