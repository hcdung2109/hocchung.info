@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
            <h2 class="page-title txt-color-blueDark"><i class="fa fa-desktop fa-fw "></i> Dashboard
                <span>/ {{__('admin.list_user')}}  </span>
            </h2>
        </div>
    </div>
    <section id="widget-grid" class="">
        <div class="row">
            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable float-none center-block">
                <a href="{{ route('admin.user.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> {{__('admin.add')}}</a>
                <a href="{{ route('admin.user.index') }}" class="btn btn-warning"><i class="fa fa-refresh"></i> {{__('admin.refresh')}}</a>
                <hr>
                <div class="jarviswidget jarviswidget-color-darken jarviswidget-sortable" id="wid-id-1" data-widget-editbutton="false" role="widget">
                    <header role="heading">
                        <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                        <h2>{{__('admin.list_user')}}</h2>
                    </header>

                    <!-- widget div-->
                    <div role="content">
                        <!-- widget content -->
                        <div class="widget-body no-padding">
                            <div class="table-responsive">

                                <table class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>{{__('admin.name')}}</th>
                                        <th>Email</th>
                                        <th>{{__('admin.status')}}</th>
                                        <th>{{__('admin.action')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr  role="row"  class="item-{{$user->id}}">
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>
                                                <select name="is_active" class="form-control">
                                                    <option value="1">{{__('admin.active')}}</option>
                                                    <option value="2">{{__('admin.pending')}}</option>
                                                </select>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{route('admin.user.edit',$user)}}" class="btn btn-info btn-sm">
                                                    <i class="fa fa-gear fa-spin"></i>
                                                    {{__('admin.edit')}}
                                                </a>
                                                <button class="btn btn-danger btn-sm" onclick="delUser({{$user->id}})">
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
            </article>
            <!-- WIDGET END -->
        </div>
    </section>
@endsection

@section('javascript')
    <script type="text/javascript">

        function delUser(id) {
            // call function delete category
            ajaxDeleteItemTable(id,'user');
        }

        function changeStatus(id) {
            var model = 'category/changeStatus';
            var message = 'Are you sure change status ?';

            // call function change status
            ajaxChangeStatus(id,model,message);
        }

    </script>
@endsection