@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
            <h2 class="backend-title txt-color-blueDark"><i class="fa fa-desktop fa-fw "></i> Dashboard
                <span>/ {{__('admin.list_article')}}  </span>
            </h2>
        </div>
    </div>
    <div class="row">
        <!-- NEW WIDGET START -->
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable float-none center-block">
            <a href="{{ route('admin.article.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> {{__('admin.add')}}</a>
            <a href="{{ route('admin.article.index') }}" class="btn btn-warning"><i class="fa fa-refresh"></i> {{__('admin.refresh')}}</a>
            <hr>
            <div class="jarviswidget jarviswidget-color-darken jarviswidget-sortable" id="wid-id-1" data-widget-editbutton="false" role="widget">
                <header role="heading">
                    <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                    <h2>{{__('admin.list_article')}}</h2>
                </header>

                <!-- widget div-->
                <div role="content">
                    <!-- widget content -->
                    <div class="widget-body">
                        <div class="table-responsive">

                            <table class="table table-bordered table-striped article">
                                <thead>
                                <tr>
                                    <th class="text-center wid-100">{{__('admin.image')}}</th>
                                    <th class="text-center">{{__('admin.category')}}</th>
                                    <th class="text-center">{{__('admin.title')}}</th>
                                    <th class="text-center width-20">{{__('admin.status')}}</th>
                                    <th class="text-center">{{__('admin.count_views')}}</th>
                                    <th class="text-center">{{__('admin.created_at')}}</th>
                                    <th class="text-center wid-250">{{__('admin.action')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($articles as $item)
                                    <tr class="item-{{$item->id}}">
                                        <td ><img src="{{asset('storage/app/'.$item->image)}}"></td>
                                        <td>{{$item->category['name']}}</td>
                                        <td>{{$item->title}}</td>
                                        <td class="text-center">
                                            <label class="toggle">
                                                <input onclick="clickChangeStatus({{$item->id}})" type="checkbox" name="checkbox-toggle" checked="checked" >
                                                <i data-swchon-text="ON" data-swchoff-text="OFF"></i>
                                            </label>
                                        </td>
                                        <td class="text-center">{{$item->count_views}}</td>
                                        <td class="text-center">{{$item->created_at}}</td>
                                        <td class="text-center">

                                            <a href="{{route('admin.article.edit',$item)}}" class="btn btn-info btn-sm">
                                                <i class="fa fa-gear fa-spin"></i>
                                                {{__('admin.edit')}}
                                            </a>
                                            <button class="btn btn-danger btn-sm" onclick="clickDelete({{$item->id}},'article')">
                                                <i class="fa fa-trash-o"></i>
                                                {{__('admin.delete')}}
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="dt-toolbar-footer">
                                <div class="col-sm-6 col-xs-12 hidden-xs">
                                    <div class="dataTables_info" id="datatable_fixed_column_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="dataTables_paginate paging_simple_numbers" id="datatable_fixed_column_paginate">
                                        <ul class="pagination">
                                            {{ $articles->links() }}
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- end widget content -->

                </div>
                <!-- end widget div -->
            </div>
        </article>
        <!-- WIDGET END -->
    </div>
@endsection
