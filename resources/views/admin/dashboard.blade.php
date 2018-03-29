@extends('admin.layouts.master')

@section('content')
    <div class="row">

        <div class="col-sm-12">

            <div class="well well-light">

                <h1 class="text-center" style="font-size: 20px !important;">Thống kê</h1>
                <div class="row">

                    <div class="col-xs-12 col-sm-4 col-md-2">
                        <div class="panel panel-orange">

                            <div class="panel-heading">
                                <h3 class="panel-title text-center">{{__('admin.user')}}</h3>
                            </div>
                            <div class="panel-body no-padding text-align-center">
                                <table class="table">
                                    <tbody>
                                    <tr class="active">
                                        <td>{{ $data['total_users'] }} / Tổng </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-2">
                        <div class="panel panel-purple">
                            <img src="img/ribbon.png" class="ribbon" alt="">
                            <div class="panel-heading">
                                <h3 class="panel-title text-center">{{__('admin.manage_roles')}}</h3>
                            </div>
                            <div class="panel-body no-padding text-align-center">
                                <table class="table">
                                    <tbody>
                                    <tr class="active">
                                        <td>{{ $data['total_roles'] }} / Tổng </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-2">
                        <div class="panel panel-greenLight">
                            <div class="panel-heading">
                                <h3 class="panel-title text-center">{{__('admin.manage_perms')}}</h3>
                            </div>
                            <div class="panel-body no-padding text-align-center">
                                <table class="table">
                                    <tbody>
                                    <tr class="active">
                                        <td>{{ $data['total_perms'] }} / Tổng </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-2">
                        <div class="panel panel-blue">
                            <div class="panel-heading">
                                <h3 class="panel-title text-center">{{__('admin.manage_categories')}}</h3>
                            </div>
                            <div class="panel-body no-padding text-align-center">
                                <table class="table">
                                    <tbody>
                                    <tr class="active">
                                        <td>{{ $data['total_categories'] }} / Tổng </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-2">
                        <div class="panel panel-redLight">
                            <div class="panel-heading">
                                <h3 class="panel-title text-center">{{__('admin.manage_articles')}}</h3>
                            </div>
                            <div class="panel-body no-padding text-align-center">
                                <table class="table">
                                    <tbody>
                                    <tr class="active">
                                        <td>{{ $data['total_articles'] }} / Tổng </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-2">
                        <div class="panel panel-pink">
                            <div class="panel-heading">
                                <h3 class="panel-title text-center">Tags</h3>
                            </div>
                            <div class="panel-body no-padding text-align-center">
                                <table class="table">
                                    <tbody>
                                    <tr class="active">
                                        <td>
                                            0 / Tổng
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection
