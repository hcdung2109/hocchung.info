@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h2 class="page-title txt-color-blueDark"><i class="fa fa-desktop fa-fw "></i> Dashboard
                <a href="{{ route('admin.dashboard') }}"><span>/ Tag Cloud</span></a>
            </h2>
        </div>
    </div>
    <section id="widget-grid" class="">
        <div class="row">
            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-6 col-lg-6 sortable-grid ui-sortable float-none center-block">
                <div class="jarviswidget jarviswidget-color-darken jarviswidget-sortable" id="wid-id-1" data-widget-editbutton="false" role="widget">
                    <header role="heading">
                        <span class="widget-icon"> <i class="fa fa-list"></i> </span>
                        <h2>Tag Cloud</h2>
                    </header>

                    <!-- widget div-->
                    <div role="content">

                        <!-- widget content -->
                        <div class="widget-body no-padding ">
                            <div class="table-responsive">
                                <table class="table table-bordered smart-form">
                                    <form method="POST" action="{{route('admin.tag.store')}}" id="smart-form-register">
                                    {{ csrf_field() }}
                                    <tr>
                                        <td><input value="" name="name" type="text"  class="form-control"></td>
                                        <td class="text-center">
                                            <input type="submit" class="btn btn-warning btn-sm" value="{{__('admin.save')}}">
                                        </td>
                                    </tr>
                                    </form>
                                    <tr>
                                        <th class="text-center">{{__('admin.name')}}</th>
                                        <th class="text-center wid-250">{{__('admin.action')}}</th>
                                    </tr>
                                    </tr>
                                    <tbody>

                                    @foreach($tags as $item)
                                        <tr class="item-{{$item->id}}">
                                            <td>{{$item->name}}</td>
                                            <td class="text-center">
                                                <button onclick="getTag({{$item}})" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">
                                                    {{__('admin.edit')}}
                                                </button>
                                                <button class="btn btn-danger btn-sm" onclick="clickDelete({{$item->id}})">
                                                    <i class="fa fa-trash-o"></i>
                                                    {{__('admin.delete')}}
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
            <!-- WIDGET END -->
        </div>
    </section>

    <form method="POST"  id="form-update-tag">
        {{ csrf_field() }}
        {{method_field('PUT')}}
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            &times;
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Chỉnh sửa Tag </h4>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input name="old_name" id="old_name" type="text" class="form-control" placeholder="Name" required />
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">
                            Cancel
                        </button>
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
    </form>

@endsection
