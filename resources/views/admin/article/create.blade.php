@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
            <h2 class="admin-title txt-color-blueDark"><i class="fa fa-desktop fa-fw "></i> Dashboard
                <a href="{{route('admin.article.index')}}"><span>/ {{__('admin.list_article')}}  </span></a>
            </h2>
        </div>
    </div>

    <div class="row">

        <!-- NEW COL START -->
        <article class="col-sm-12 col-md-10 col-lg-10  float-none center-block">

            <!-- Widget ID (each widget will need unique ID)-->
            <div class="jarviswidget jarviswidget-color-darken jarviswidget-sortable" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false" role="widget" data-widget-sortable="false">
                <header role="heading"><div class="jarviswidget-ctrls" role="menu">
                        <a href="javascript:void(0);" class="button-icon jarviswidget-toggle-btn" rel="tooltip" title="" data-placement="bottom" data-original-title="Collapse"><i class="fa fa-minus "></i></a> <a href="javascript:void(0);" class="button-icon jarviswidget-fullscreen-btn" rel="tooltip" title="" data-placement="bottom" data-original-title="Fullscreen"><i class="fa fa-expand "></i></a> <a href="javascript:void(0);" class="button-icon jarviswidget-delete-btn" rel="tooltip" title="" data-placement="bottom" data-original-title="Delete"><i class="fa fa-times"></i></a></div>
                    <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                    <h2>{{__('admin.add_article')}}</h2>
                </header>

                <!-- widget div-->
                <div role="content">
                    <!-- widget content -->
                    <div class="widget-body no-padding">

                        <form class="smart-form"  method="POST" action="{{route('admin.article.store')}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <fieldset>
                                <div class="col-sm-12 col-md-6 col-lg-6 ">
                                    <section>
                                        <label class="label">Thể loại</label>
                                        <label class="select">
                                            <select name="category_id" onchange="loadTutorials()">
                                                <option value="">NO.</option>
                                                {{ App\Helpers\Helper::createHtmlListCategories($listCategory) }}
                                            </select> <i></i>
                                        </label>
                                    </section>

                                    <section>
                                        <label class="label">Tutorial</label>
                                        <label class="select">
                                            <select name="tutorial_id">
                                                <option value="0">NO.</option>
                                            </select>
                                        </label>
                                    </section>

                                    <section>
                                        <label class="label">{{__('admin.title')}}</label>
                                        <label class="input">
                                            <input type="text" name="title">
                                        </label>
                                        <div class="note">
                                            @if ($errors->has('title'))
                                                <span class="help-inline block txt-red">{{__('admin.required')}}</span>
                                            @endif
                                        </div>
                                    </section>

                                    <section>
                                        <label class="label">Is Published</label>
                                        <div class="inline-group">
                                            <label class="radio">
                                                <input value="1" type="radio" name="is_published" checked="checked">
                                                <i></i>Yes</label>
                                            <label class="radio">
                                                <input value="0" type="radio" name="is_published">
                                                <i></i>No</label>
                                        </div>
                                    </section>

                                </div>
                                <div class="col col-sm-12 col-md-6 col-lg-6">
                                    <section>
                                        <label class="label">Chọn {{__('admin.image')}}</label>
                                        <div class="input input-file">
                                            <span class="button"><input type="file" id="image" name="image" onchange="this.parentNode.nextSibling.value = this.value">Browse</span><input type="text" placeholder="Include some files" readonly="">
                                        </div>
                                    </section>

                                    <section>
                                        <label class="label"></label>
                                        <div class="inline-group">
                                            <label class="checkbox">
                                                <input type="checkbox" name="is_available" checked="checked">
                                                <i></i> Sử dụng ảnh có sẵn  ( của thể loại ).
                                            </label>
                                        </div>
                                    </section>

                                </div>

                                <div class="clear-both"></div>

                                <section>
                                    <label class="label">{{__('admin.summary')}}</label>
                                    <label class="textarea textarea-resizable">
                                        <textarea name="summary" rows="5" class="custom-scroll"></textarea>
                                    </label>
                                    <div class="note">
                                        @if ($errors->has('summary'))
                                            <span class="help-inline block txt-red">{{__('admin.required')}}</span>
                                        @endif
                                    </div>
                                </section>

                                <section>
                                    <label class="label">{{__('admin.desc')}}</label>
                                    <label class="textarea textarea-resizable" style="border: 1px solid #BDBDBD;">
                                        <textarea name="desc" id="desc"></textarea>
                                    </label>
                                    <div class="note">
                                        @if ($errors->has('desc'))
                                            <span class="help-inline block txt-red">{{__('admin.required')}}</span>
                                        @endif
                                    </div>
                                </section>

                            </fieldset>

                            <fieldset>
                                <section>
                                    <label class="label">Tag Cloud sẵn có</label>
                                    <div class="inline-group">
                                        @foreach($tags as $tag)
                                            <label class="checkbox">
                                                <input type="checkbox" name="tag_id[]" value="{{ $tag->id }}">
                                                <i></i>{{ $tag->name }}
                                            </label>
                                        @endforeach
                                    </div>
                                </section>

                                <section>
                                    <label class="label">Nhập tag mới ( mỗi tag cách nhau bởi dấu ',')</label>
                                    <label class="textarea textarea-resizable">
                                        <textarea name="new_tag" rows="3" class="custom-scroll"></textarea>
                                    </label>
                                    <div class="note">
                                    </div>
                                </section>
                            </fieldset>

                            <footer>
                                <button type="submit" class="btn btn-primary">{{__('admin.save')}}</button>
                                <button type="reset" class="btn btn-default" >{{__('admin.back')}}</button>
                            </footer>
                        </form>
                    </div>
                </div>
            </div>
        </article>
    </div>
    
@endsection


