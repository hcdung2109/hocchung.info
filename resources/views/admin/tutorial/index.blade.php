@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h2 class="page-title txt-color-blueDark"><i class="fa fa-desktop fa-fw "></i> Dashboard
                <a href="{{ route('admin.dashboard') }}"><span>/ DS Tutorial  </span></a>
            </h2>
        </div>
    </div>
    <section id="widget-grid" class="">
        <div class="row">
            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable float-none center-block">
                <a href="{{ route('admin.tutorial.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> {{__('admin.add')}}</a>
                <a href="{{ route('admin.tutorial.index') }}" class="btn btn-warning"><i class="fa fa-refresh"></i> {{__('admin.refresh')}}</a>
                <hr>
                <div class="jarviswidget jarviswidget-color-darken jarviswidget-sortable" id="wid-id-1" data-widget-editbutton="false" role="widget">
                    <header role="heading">
                        <span class="widget-icon"> <i class="fa fa-list"></i> </span>
                        <h2>Danh sách Tutorial</h2>
                    </header>

                    <!-- widget div-->
                    <div role="content no-padding">

                        <!-- widget content -->
                        <div class="widget-body ">
                            <div class="table-responsive">
                                <table class="table table-bordered smart-form has-tickbox">
                                    <tr>
                                        <th class="text-center">Thể loại</th>
                                        <th class="text-center">{{__('admin.name')}}</th>
                                        <th class="text-center">{{__('admin.created_at')}}</th>
                                        <th class="text-center width-20">{{__('admin.status')}}</th>
                                        <th class="text-center wid-250">{{__('admin.action')}}</th>
                                    </tr>
                                    <tbody class="smart-form table-category">
                                    @foreach($tutorials as $item)
                                        <tr class="item-{{$item->id}}">
                                            <td>{{$item->category['name']}}</td>
                                            <td>{{$item->name}}</td>
                                            <td class="text-center">
                                                <label class="toggle">{{ $item->created_at }}</label>
                                            </td>
                                            <td class="text-center">
                                                <label class="toggle">
                                                    <input onclick="clickChangeStatus({{$item->id}})" type="checkbox" name="checkbox-toggle" checked="checked" >
                                                    <i data-swchon-text="ON" data-swchoff-text="OFF"></i>
                                                </label>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{route('admin.tutorial.edit',$item)}}" class="btn btn-info btn-sm">
                                                    <i class="fa fa-gear fa-spin"></i>
                                                    {{__('admin.edit')}}
                                                </a>
                                                <button class="btn btn-danger btn-sm" onclick="clickDelete({{$item->id}}, 'tutorial')">
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

        <!-- end row -->

        <!-- end row -->

    </section>

@endsection
