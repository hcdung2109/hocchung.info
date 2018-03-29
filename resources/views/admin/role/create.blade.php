@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
            <h2 class="page-title txt-color-blueDark"><i class="fa fa-desktop fa-fw "></i> Dashboard
                <span>/ Thêm nhân viên </span>
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
                        <h2>{{__('admin.info_user')}}</h2>

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
                            <form method="POST" action="{{route('admin.role.store')}}" id="smart-form-register" class="smart-form client-form">
                                {{ csrf_field() }}
                                <fieldset>
                                    <section>
                                        <label class="input"> <i class="icon-append fa fa-user"></i>
                                            <input type="text" name="name" placeholder="{{__('admin.username')}}">
                                            <b class="tooltip tooltip-bottom-right">Needed to enter the website</b>
                                        </label>
                                        <div class="note">
                                            @if ($errors->has('name'))
                                                <span class="help-inline block txt-red">{{$errors->first('name')}}</span>
                                            @endif
                                        </div>
                                    </section>

                                    <section>
                                        <label class="input"> <i class="icon-append fa fa-envelope"></i>
                                            <input type="email" name="email" placeholder="Email address">
                                            <b class="tooltip tooltip-bottom-right">Needed to verify your account</b>
                                        </label>
                                        <div class="note">
                                            @if ($errors->has('email'))
                                                <span class="help-inline block txt-red">{{$errors->first('email')}}</span>
                                            @endif
                                        </div>
                                    </section>

                                    <section>
                                        <label class="input"> <i class="icon-append fa fa-lock"></i>
                                            <input type="password" name="password" placeholder="Password" id="password">
                                            <b class="tooltip tooltip-bottom-right">Don't forget your password</b>
                                        </label>
                                        <div class="note">
                                            @if ($errors->has('password'))
                                                <span class="help-inline block txt-red">{{$errors->first('password')}}</span>
                                            @endif
                                        </div>
                                    </section>

                                    <section>
                                        <label class="input"> <i class="icon-append fa fa-lock"></i>
                                            <input type="password" name="passwordConfirm" placeholder="Confirm password">
                                            <b class="tooltip tooltip-bottom-right">Don't forget your password</b>
                                        </label>
                                        <div class="note">
                                            @if ($errors->has('passwordConfirm'))
                                                <span class="help-inline block txt-red">{{$errors->first('passwordConfirm')}}</span>
                                            @endif
                                        </div>
                                    </section>
                                </fieldset>

                                <fieldset>
                                    <div class="row">
                                        <section class="col col-6">
                                            <label class="select">
                                                <select name="role_id">
                                                    <option value="" selected="" disabled="">{{__('admin.role_user')}}</option>
                                                    <option value="1">Admin</option>
                                                    <option value="2">Member</option>
                                                </select> <i></i>
                                            </label>
                                            <div class="note">
                                                @if ($errors->has('passwordConfirm'))
                                                    <span class="help-inline block txt-red">{{$errors->first('passwordConfirm')}}</span>
                                                @endif
                                            </div>
                                        </section>

                                        <section class="col col-6">
                                            <label class="select">
                                                <select name="is_active">
                                                    <option value="" selected="" disabled="">{{__('admin.status')}}</option>
                                                    <option value="1">{{__('admin.active')}}</option>
                                                    <option value="2">{{__('admin.pending')}}</option>
                                                </select> <i></i>
                                            </label>
                                            <div class="note">
                                                @if ($errors->has('is_active'))
                                                    <span class="help-inline block txt-red">{{$errors->first('passwordConfirm')}}</span>
                                                @endif
                                            </div>
                                        </section>
                                    </div>
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
