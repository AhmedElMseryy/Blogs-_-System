@extends('theme.master')
@section('hero-title', 'Add New Blog')
@section('title', 'Add New Blog')

@section('content')
    @include('theme.partials.hero')
    <!-- ================ contact section start ================= -->
    <section class="section-margin--small section-margin">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if (session('blogCreateStatus'))
                        <div class="alert alert-success">
                            {{ session('blogCreateStatus') }}
                        </div>
                    @endif
                    <form action="{{ route('blogs.store') }}" class="form-contact contact_form" action="contact_process.php"
                        method="post" novalidate="novalidate" enctype="multipart/form-data">
                        @csrf
                        <!-- Name -->
                        <div class="form-group">
                            <input class="form-control border" name="name" type="text" placeholder="Enter your name"
                                value="{{ old('name') }}">
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Image -->
                        <div class="form-group">
                            <input class="form-control border" name="image" type="file">
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                        </div>

                        <!-- Category_Id -->
                        <div class="form-group">
                            <select class="form-control border" name="category_id" value="{{ old('category_id') }}">
                                <option value="">Select Category</option>
                                @if (count($categories) > 0)
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                        </div>

                        <!-- Description -->
                        <div class="form-group">
                            <textarea class="w-100 border" rows="5" name="description" placeholder="Enter Your Blog Title">
                                {{ old('description') }}
                            </textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>



                        <div class="form-group text-center text-md-right mt-3">
                            <button type="submit" class="button button--active button-contactForm">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ contact section end ================= -->
@endsection
