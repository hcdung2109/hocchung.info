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
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable float-none center-block">
                <a href="{{ route('admin.permission.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> {{__('admin.add')}}</a>
                <hr>
                <div class="jarviswidget jarviswidget-color-darken jarviswidget-sortable" id="wid-id-1" data-widget-editbutton="false" role="widget">
                    <header role="heading">
                        <span class="widget-icon"> <i class="fa fa-list"></i> </span>
                        <h2>{{__('admin.list_function')}}</h2>
                    </header>

                    <!-- widget div-->
                    <div role="content">

                        <!-- widget content -->
                        <div class="widget-body no-padding">
                            <div class="table-responsive">
                                <table class="table table-bordered smart-form has-tickbox">
                                    <thead>
                                    <tr>
                                        <td style="width: 25px !important;">
                                            <label class="checkbox">
                                                <input type="checkbox" id="permission-parent">
                                                <i></i>
                                            </label>
                                        </td>
                                        <td class="text-bold">{{__('admin.display_name')}}</td>
                                        <td class="text-bold">{{__('admin.name')}}</td>
                                        <td class="text-bold">{{__('admin.description')}}</td>
                                        <td class="text-bold text-center">Hành động</td>
                                    </tr>
                                    </thead>
                                    <tbody class="permissions">
                                    @foreach($permissions as $table => $collections)
                                        <tr class="table-permission">
                                            <td>
                                                <label class="checkbox">
                                                    <input type="checkbox" class="permission-group" id="{{$table}}">
                                                    <i></i>
                                                </label>
                                            </td>
                                            <td colspan="3" class="text-bold">
                                                <i class="fa fa-table"></i> {{__('admin.table')}} - {{ title_case(str_replace('_', ' ',$table)) }}
                                            </td>
                                        </tr>
                                        @foreach($collections as $perm)
                                            <tr class="item-{{$perm->id}}">
                                                <td>
                                                    <label class="checkbox">
                                                        <input type="checkbox" name="permissions[]" class="permission-item"  value="{{$perm->id}}">
                                                        <i></i>
                                                    </label>
                                                </td>
                                                <td>{{ $perm->display_name }}</td>
                                                <td>{{ $perm->name }}</td>
                                                <td>{{ $perm->description }}</td>
                                                <td class="text-center">

                                                    <a href="{{route('admin.permission.edit',$perm)}}" class="btn btn-info btn-sm">
                                                        <i class="fa fa-gear fa-spin"></i>
                                                        {{__('admin.edit')}}
                                                    </a>
                                                    <button class="btn btn-danger btn-sm" onclick="clickDelete({{$perm->id}})">
                                                        <i class="fa fa-trash-o"></i>
                                                        {{__('admin.delete')}}
                                                    </button>
                                                </td>
                                            </tr>

                                        @endforeach

                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
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

@section('javascript')
    <script type="text/javascript">

        function clickDelete(id) {
            // call function delete category
            ajaxDeleteItemTable(id,'permission');
        }

    </script>
@endsection
