@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h2 class="page-title txt-color-blueDark"><i class="fa fa-desktop fa-fw "></i> Dashboard
                <a href="{{ route('admin.dashboard') }}"><span>/ {{__('admin.list_category')}}  </span></a>
            </h2>
        </div>
    </div>
    <section id="widget-grid" class="">
        <div class="row">
            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable float-none center-block">
                <a href="{{ route('admin.category.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> {{__('admin.add')}}</a>
                <a href="{{ route('admin.category.index') }}" class="btn btn-warning"><i class="fa fa-refresh"></i> {{__('admin.refresh')}}</a>
                <hr>
                <div class="jarviswidget jarviswidget-color-darken jarviswidget-sortable" id="wid-id-1" data-widget-editbutton="false" role="widget">
                    <header role="heading">
                        <span class="widget-icon"> <i class="fa fa-list"></i> </span>
                        <h2>{{__('admin.list_category')}}</h2>
                    </header>

                    <!-- widget div-->
                    <div role="content">

                        <!-- widget content -->
                        <div class="widget-body ">
                            <div class="table-responsive">
                                <table class="table table-bordered smart-form has-tickbox">
                                    <tr>
                                        <th class="text-center wid-150">{{__('admin.image')}}</th>
                                        <th class="text-center">{{__('admin.name')}}</th>
                                        <th class="text-center">{{__('admin.parent')}}</th>
                                        <th class="text-center">{{__('admin.created_at')}}</th>
                                        <th class="text-center width-20">{{__('admin.status')}}</th>
                                        <th class="text-center wid-250">{{__('admin.action')}}</th>
                                    </tr>
                                    <tbody class="smart-form table-category">
                                    @foreach($categories as $item)
                                        <tr class="item-{{$item->id}}">
                                            <td class="text-center"><img src="{{asset('storage/app/'.$item->image)}}"></td>
                                            <td>{{$item->name}}</td>
                                            <td>
                                                @if ($item->parent)
                                                    {{$item->parent->name}}
                                                @endif
                                            </td>
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
                                                <a href="{{route('admin.category.edit',$item)}}" class="btn btn-info btn-sm">
                                                    <i class="fa fa-gear fa-spin"></i>
                                                    {{__('admin.edit')}}
                                                </a>
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

        <!-- end row -->

        <!-- end row -->

    </section>

@endsection

@section('javascript')
    <script type="text/javascript">

        function clickDelete(id) {
            // call function delete category
            ajaxDeleteItemTable(id,'category');
        }

        function clickChangeStatus(id) {
            var model = 'category/changeStatus';
            var message = 'Are you sure change status ?';

            // call function change status
            ajaxChangeStatus(id,model,message);
        }

    </script>
@endsection