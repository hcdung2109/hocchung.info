@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
            <h2 class="page-title txt-color-blueDark"><i class="fa fa-desktop fa-fw "></i> Dashboard
                <span>/ QL Vai trò  </span>
            </h2>
        </div>
    </div>
    <section id="widget-grid" class="">
        <div class="row">
            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable float-none center-block">

                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-1" data-widget-editbutton="false" role="widget" style="position: relative; opacity: 1; left: 0px; top: 0px;">
                    <header role="heading"><div class="jarviswidget-ctrls" role="menu">
                            <a href="javascript:void(0);" class="button-icon jarviswidget-toggle-btn" rel="tooltip" title="" data-placement="bottom" data-original-title="Collapse"><i class="fa fa-minus "></i></a> <a href="javascript:void(0);" class="button-icon jarviswidget-fullscreen-btn" rel="tooltip" title="" data-placement="bottom" data-original-title="Fullscreen"><i class="fa fa-expand "></i></a> <a href="javascript:void(0);" class="button-icon jarviswidget-delete-btn" rel="tooltip" title="" data-placement="bottom" data-original-title="Delete"><i class="fa fa-times"></i></a></div><div class="widget-toolbar" role="menu"><a data-toggle="dropdown" class="dropdown-toggle color-box selector" href="javascript:void(0);"></a><ul class="dropdown-menu arrow-box-up-right color-select pull-right"><li><span class="bg-color-green" data-widget-setstyle="jarviswidget-color-green" rel="tooltip" data-placement="left" data-original-title="Green Grass"></span></li><li><span class="bg-color-greenDark" data-widget-setstyle="jarviswidget-color-greenDark" rel="tooltip" data-placement="top" data-original-title="Dark Green"></span></li><li><span class="bg-color-greenLight" data-widget-setstyle="jarviswidget-color-greenLight" rel="tooltip" data-placement="top" data-original-title="Light Green"></span></li><li><span class="bg-color-purple" data-widget-setstyle="jarviswidget-color-purple" rel="tooltip" data-placement="top" data-original-title="Purple"></span></li><li><span class="bg-color-magenta" data-widget-setstyle="jarviswidget-color-magenta" rel="tooltip" data-placement="top" data-original-title="Magenta"></span></li><li><span class="bg-color-pink" data-widget-setstyle="jarviswidget-color-pink" rel="tooltip" data-placement="right" data-original-title="Pink"></span></li><li><span class="bg-color-pinkDark" data-widget-setstyle="jarviswidget-color-pinkDark" rel="tooltip" data-placement="left" data-original-title="Fade Pink"></span></li><li><span class="bg-color-blueLight" data-widget-setstyle="jarviswidget-color-blueLight" rel="tooltip" data-placement="top" data-original-title="Light Blue"></span></li><li><span class="bg-color-teal" data-widget-setstyle="jarviswidget-color-teal" rel="tooltip" data-placement="top" data-original-title="Teal"></span></li><li><span class="bg-color-blue" data-widget-setstyle="jarviswidget-color-blue" rel="tooltip" data-placement="top" data-original-title="Ocean Blue"></span></li><li><span class="bg-color-blueDark" data-widget-setstyle="jarviswidget-color-blueDark" rel="tooltip" data-placement="top" data-original-title="Night Sky"></span></li><li><span class="bg-color-darken" data-widget-setstyle="jarviswidget-color-darken" rel="tooltip" data-placement="right" data-original-title="Night"></span></li><li><span class="bg-color-yellow" data-widget-setstyle="jarviswidget-color-yellow" rel="tooltip" data-placement="left" data-original-title="Day Light"></span></li><li><span class="bg-color-orange" data-widget-setstyle="jarviswidget-color-orange" rel="tooltip" data-placement="bottom" data-original-title="Orange"></span></li><li><span class="bg-color-orangeDark" data-widget-setstyle="jarviswidget-color-orangeDark" rel="tooltip" data-placement="bottom" data-original-title="Dark Orange"></span></li><li><span class="bg-color-red" data-widget-setstyle="jarviswidget-color-red" rel="tooltip" data-placement="bottom" data-original-title="Red Rose"></span></li><li><span class="bg-color-redLight" data-widget-setstyle="jarviswidget-color-redLight" rel="tooltip" data-placement="bottom" data-original-title="Light Red"></span></li><li><span class="bg-color-white" data-widget-setstyle="jarviswidget-color-white" rel="tooltip" data-placement="right" data-original-title="Purity"></span></li><li><a href="javascript:void(0);" class="jarviswidget-remove-colors" data-widget-setstyle="" rel="tooltip" data-placement="bottom" data-original-title="Reset widget color to default">Remove</a></li></ul></div>
                        <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                        <h2>{{__('admin.role_user')}}</h2>

                        <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span>
                    </header>

                    <!-- widget div-->
                    <div role="content">
                        <div class="widget-body no-padding">
                            <div id="datatable_fixed_column_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                <table id="datatable_fixed_column" class="table table-striped table-bordered dataTable no-footer" width="100%" role="grid" aria-describedby="datatable_fixed_column_info" style="width: 100%;">
                                    <thead>
                                    <!-- Create new role -->
                                    <form method="POST" action="{{route('admin.role.store')}}" id="smart-form-register" class="smart-form client-form">
                                        {{ csrf_field() }}
                                        <tr role="row">
                                            <th class="hasinput" rowspan="1" colspan="1">
                                                <input name="name" type="text" class="form-control" placeholder="{{__('admin.name')}}">
                                            </th>
                                            <th class="hasinput"  rowspan="1" colspan="1">
                                                <input name="display_name" type="text" class="form-control" placeholder="{{__('admin.display_name')}}">
                                            </th>
                                            <th class="hasinput" rowspan="1" colspan="1">
                                                <input name="description" type="text" class="form-control" placeholder="{{__('admin.description')}}">
                                            </th>
                                            <th class="hasinput"  rowspan="1" colspan="1">
                                                <button type="submit" class="btn btn-primary" href="javascript:void(0);">{{__('admin.add')}}</button>
                                                <button type="reset" class="btn btn-default" href="javascript:void(0);">Reset</button>
                                            </th>
                                        </tr>
                                        <tr role="row">
                                            <th data-class="expand" class="expand sorting_asc" tabindex="0" aria-controls="datatable_fixed_column" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 181px;">{{__('admin.name')}}</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable_fixed_column" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 193px;">{{__('admin.display_name')}}</th>
                                            <th data-hide="phone" class="sorting" tabindex="0" aria-controls="datatable_fixed_column" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 181px;">{{__('admin.description')}}</th>
                                            <th data-hide="phone" class="sorting" tabindex="0" aria-controls="datatable_fixed_column" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 169px;">{{__('admin.action')}}</th>
                                        </tr>
                                    </form>

                                    </thead>
                                    <tbody>
                                    @foreach($roles as $role)
                                        <tr  role="row"  class="item-{{$role->id}}">
                                            <td>{{$role->name}}</td>
                                            <td>{{$role->display_name}}</td>
                                            <td>{{$role->description}}</td>
                                            <td class="text-center">
                                                <a href="{{route('admin.role.attachPerms',$role)}}" class="btn btn-warning btn-sm">
                                                    <i class="fa fa-gear fa-spin"></i>
                                                    {{__('admin.function')}}
                                                </a>
                                                <a href="{{route('admin.role.edit',$role)}}" class="btn btn-info btn-sm">
                                                    <i class="fa fa-pencil"></i>
                                                    {{__('admin.edit')}}
                                                </a>
                                                <button class="btn btn-danger btn-sm" onclick="delRole({{$role->id}})">
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
                                            <ul class="pagination"><li class="paginate_button previous disabled" id="datatable_fixed_column_previous"><a href="#" aria-controls="datatable_fixed_column" data-dt-idx="0" tabindex="0">Previous</a></li>
                                                <li class="paginate_button active"><a href="#" aria-controls="datatable_fixed_column" data-dt-idx="1" tabindex="0">1</a></li>
                                                <li class="paginate_button "><a href="#" aria-controls="datatable_fixed_column" data-dt-idx="2" tabindex="0">2</a></li>
                                                <li class="paginate_button "><a href="#" aria-controls="datatable_fixed_column" data-dt-idx="3" tabindex="0">3</a></li>
                                                <li class="paginate_button "><a href="#" aria-controls="datatable_fixed_column" data-dt-idx="4" tabindex="0">4</a></li>
                                                <li class="paginate_button "><a href="#" aria-controls="datatable_fixed_column" data-dt-idx="5" tabindex="0">5</a></li>
                                                <li class="paginate_button "><a href="#" aria-controls="datatable_fixed_column" data-dt-idx="6" tabindex="0">6</a></li>
                                                <li class="paginate_button next" id="datatable_fixed_column_next"><a href="#" aria-controls="datatable_fixed_column" data-dt-idx="7" tabindex="0">Next</a></li>
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
                <!-- end widget -->

            </article>
            <!-- WIDGET END -->
        </div>
    </section>
@endsection


@section('javascript')
    <script type="text/javascript">

        /**
         * Delete role and relationship user and permssion
         * @param id
         */
        function delRole(id) {
            // call function delete category
            ajaxDeleteItemTable(id,'role');
        }
    </script>
@endsection
