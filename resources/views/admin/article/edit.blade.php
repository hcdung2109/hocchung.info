@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-padding">
            <ul class="breadcrumb no-padding bg-color-transparent">
                <li><a href="{{ route('admin.dashboard') }}"><i class="fa-fw fa fa-home"></i> Dashboard </a></li>
                <li><a href="{{ route('admin.article.index') }}"> Article </a></li>
                <li>{{ $article->title }}</li>
            </ul>
        </div>
    </div>

    <section id="widget-grid" class="">

        <!-- START ROW -->

        <div class="row">

            <!-- NEW COL START -->
            <article class="col-sm-12 col-md-10 col-lg-10 float-none center-block">

                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false">
                    <header>
                        <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                        <h2>{{__('admin.detail_article')}}</h2>

                    </header>

                    <!-- widget div-->
                    <div>

                        <!-- widget edit box -->
                        <div class="jarviswidget-editbox">
                            <!-- This area used as dropdown edit box -->

                        </div>
                        <!-- end widget edit box -->

                        <!-- widget content -->
                        <div class="widget-body">

                            <form class="smart-form" method="POST" action="{{route('admin.article.update',$article)}}" enctype="multipart/form-data">
                                <fieldset>
                                {{csrf_field()}}
                                {{method_field('PUT')}}
                                <div class="col-sm-12 col-md-6 col-lg-6 ">
                                    <section>
                                        <label class="label">Select {{__('admin.parent')}}</label>
                                        <label class="select">
                                            <select name="category_id">
                                                <option value="0">NO.</option>
                                                {{ App\Helpers\Helper::createHtmlListCategories($listCategory, $article->category_id) }}
                                            </select> <i></i>
                                        </label>
                                    </section>

                                    <section>
                                        <label class="label">Tutorial</label>
                                        <label class="select">
                                            <select name="tutorial_id">
                                                <option value="0">NO.</option>
                                                @foreach($tutorials as $tutorial)
                                                    <option {{ ($tutorial->id == $article->tutorial_id) ? 'selected' : '' }} value="{{ $tutorial->id }}">{{ $tutorial->name }}</option>
                                                @endforeach
                                            </select> <i></i>
                                        </label>
                                    </section>

                                    <section>
                                        <label class="label">{{__('admin.title')}}</label>
                                        <label class="input">
                                            <input type="text" name="title" value="{{$article->title}}">
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
                                                <input type="radio" name="is_published" {{$article->is_published == 1 ? 'checked' : ''}}  value="1">
                                                <i></i>Yes
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="is_published" {{$article->is_published == 0 ? 'checked' : ''}} value="0">
                                                <i></i>No
                                            </label>
                                        </div>
                                    </section>

                                </div>
                                <div class="col col-sm-12 col-md-6 col-lg-6 ">

                                    <section>
                                        <label class="label">{{__('admin.current_image')}}</label>
                                        <img style="width: 200px" class="width-200" src="{{asset('storage/app').'/'.$article->image}}" alt="">
                                    </section>

                                    <section>
                                        <label class="label">{{__('admin.change_image')}}</label>
                                        <div class="input input-file">
                                            <span class="button"><input type="file" id="other_image" name="other_image" onchange="this.parentNode.nextSibling.value = this.value">Browse</span><input name="other_image" type="text" placeholder="Include some files" readonly="">
                                        </div>
                                    </section>

                                    <section>
                                        <label class="label"></label>
                                        <div class="inline-group">
                                            <label class="checkbox">
                                                <input type="checkbox" name="is_available" >
                                                <i></i> Sử dụng ảnh có sẵn  ( của thể loại ).
                                            </label>
                                        </div>
                                    </section>
                                </div>
                                <div class="clear-both"></div>

                                <section>
                                    <label class="label">{{__('admin.summary')}}</label>
                                    <label class="textarea textarea-resizable">
                                        <textarea  name="summary" rows="5" class="custom-scroll">{{$article->summary}}</textarea>
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
                                        <textarea name="desc">{{$article->desc}}</textarea>
                                    </label>
                                    <div class="note">
                                        @if ($errors->has('desc'))
                                            <span class="help-inline block txt-red">{{__('admin.required')}}</span>
                                        @endif
                                    </div>
                                </section>

                                <section>
                                    <label class="label">Tag Cloud sẵn có</label>
                                    <div class="inline-group">
                                        @foreach($tags as $tag)
                                            <label class="checkbox">
                                                <input {{ (in_array($tag->id, $tagIds) ? 'checked' : '') }} type="checkbox" name="tag_id[]" value="{{ $tag->id }}">
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
                                    <button type="submit" class="btn btn-primary">{{__('admin.update')}}</button>
                                    <button type="button" class="btn btn-default" onclick="window.history.back();">{{__('admin.back')}}</button>
                                </footer>
                            </form>

                        </div>
                        <!-- end widget content -->

                    </div>
                    <!-- end widget div -->

                </div>

            </article>
            <!-- END COL -->
        </div>

        <!-- END ROW -->

    </section>
@endsection


