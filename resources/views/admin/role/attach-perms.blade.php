@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
            <h2 class="page-title txt-color-blueDark"><i class="fa fa-desktop fa-fw "></i> Dashboard
                <a href="{{ route('admin.role.index') }}"><span>/ {{__('admin.role')}}  </span></a>
            </h2>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="well">
                <h1 class="txt-bold">{{__('admin.update_function')}}</h1>
                <h3>{{__('admin.name')}} : {{ $role->display_name }}</h3>
                <p>{{ __('admin.description') }} : {{ $role->description }}</p>
            </div>
        </div>
    </div>

    <section id="widget-grid" class="">
        <form action="{{ route('admin.role.postAttachPerms',$role) }}" method="POST">
            {{ csrf_field() }}
        <div class="row">
            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable float-none center-block">
                <div class="jarviswidget jarviswidget-color-darken jarviswidget-sortable" id="wid-id-1" data-widget-editbutton="false" role="widget">
                    <header role="heading">
                        <span class="widget-icon"> <i class="fa fa-list"></i> </span>
                        <h2>{{__('admin.select_function')}}</h2>
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
                                                <input type="checkbox" id="select-all">
                                                <i></i>
                                            </label>
                                        </td>
                                        <td class="text-bold">{{__('admin.display_name')}}</td>
                                        <td class="text-bold">{{__('admin.name')}}</td>
                                        <td class="text-bold">{{__('admin.description')}}</td>
                                    </tr>
                                    </thead>
                                    <tbody class="permissions">
                                    @foreach($permissions as $table => $collections)
                                        <tr>
                                            <td colspan="4" class="text-bold">
                                                <i class="fa fa-table"></i> {{__('admin.table')}} - {{ title_case(str_replace('_', ' ',$table)) }}
                                            </td>
                                        </tr>
                                        @foreach($collections as $perm)
                                            <tr>
                                                <td>
                                                    <label class="checkbox">
                                                        <input {{ $role->perms->contains($perm->id) ? 'checked' : ''}} type="checkbox" name="permissions[]" class="select-item"  value="{{$perm->id}}">
                                                        <i></i>
                                                    </label>
                                                </td>
                                                <td>{{ $perm->display_name }}</td>
                                                <td>{{ $perm->name }}</td>
                                                <td>{{ $perm->description }}</td>
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
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-danger"><i class="fa fa-save"></i> {{__('admin.update')}}</button>
            </div>
        </div>
        </form>
    </section>
@endsection

@section('javascript')
    <script type="text/javascript">
        $('document').ready(function () {

            // check OR uncheck all permission
            $('#select-all').click(function () {

                if ($('#select-all').is(":checked") ) {
                    // is not check
                    $('table').find("input[type='checkbox']").prop('checked', true);

                } else {
                    // is checked
                    $('table').find("input[type='checkbox']").attr('checked', false);
                }
             });

        });
    </script>
@endsection
