 @extends('frontend2')

 @section('content')
 <!--==============================
                                                                Breadcumb
                                                            ==============================-->
 @include('frontend.partials.breadcrumb', [
 'title' => $blogPage->breadcrumb_title ?? 'Blog Post',
 'bgImage' => !empty($blogPage?->breadcrumb_image)
 ? 'storage/' . $blogPage->breadcrumb_image
 : (!empty($pageSettings?->breadcrumb_image)
 ? 'storage/' . $pageSettings->breadcrumb_image
 : 'assets_frontend/assets/img/bg/breadcumb-bg.jpg'),
 'breadcrumb' => [['label' => $blogPage->breadcrumb_title ?? 'Blog Post']],
 ])

 <div class="container">
     <div class="breadcumb-content">
         <h1 class="breadcumb-title">{{ $blogPage->breadcrumb_title ?? 'Blog Post' }}</h1>
         <ul class="breadcumb-menu">
             <li><a href="{{ url('/') }}">Home</a></li>
             <li>{{ $blogPage->breadcrumb_title ?? 'Blog' }}</li>
         </ul>
     </div>
 </div>
 </div>

 <section class="py-5">
     <div class="container">
         <div class="row gx-5">
             <!-- Main Content -->
             <div class="col-lg-8">
                 @if($blogs->isEmpty())
                 <div class="alert alert-info">No blog posts found matching your search criteria.</div>
                 @endif
                 @foreach ($blogs as $index => $item)
                 <div class="card border-0 shadow-sm mb-3">
                     <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top img-fluid" alt="Blog Post">
                     <div class="card-body">
                         <div class="blog-meta mb-3">
                             <span><i class="far fa-user"></i> {{$item->author}}</span>
                             <span class="mx-3"><i class="far fa-calendar-alt"></i>{{ $item->created_at->format('y/m/d') }}</span>
                             <span><i class="far fa-comment"></i> {{$item->blogComments ? $item->blogComments->count() : 0}} Comments</span>
                         </div>
                         <h3 class="card-title mb-3">{{$item->title}}</h3>
                         <p class="card-text">{{ \Illuminate\Support\Str::limit(strip_tags($item->description), 100) }}</p>
                         <a href="#" class="btn btn-primary">Read More</a>
                     </div>
                 </div>
                 @endforeach

                 <!-- Pagination -->
                 <nav aria-label="Page navigation">
                     <div class="d-flex justify-content-between align-items-center mt-4">
                         <div>
                             Showing {{ $blogs->firstItem() }} to {{ $blogs->lastItem() }} of {{ $blogs->total() }} results
                         </div>
                         <div>
                             {{ $blogs->links('custom.pagination') }}
                         </div>
                     </div>
                 </nav>
             </div>

             <!-- Sidebar -->
             <div class="col-lg-4">
                 <!-- Search Widget -->
                 <div class="card border-0 p-4 shadow-sm mb-3" style="background-color:rgba(151, 150, 150, 0.18);">
                     <form action="{{ route('blog') }}" method="GET">
                         @csrf
                         <div class="input-group">
                             <input type="text" name="search" class="form-control bg-white" placeholder="Enter Keyword" value="{{request('search')}}">
                             <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                         </div>
                     </form>
                 </div>

                 <!-- Categories Widget -->
                 <div class="card border-0 p-4 shadow-sm mb-3" style="background-color:rgba(151, 150, 150, 0.18);">
                     <div class="row">
                         <h4 class="fs-4">Categories</h4>
                     </div>
                     <div class="row px-3">
                         @foreach ($blogCategories as $index => $item)
                         <div class="category-item rounded-1 p-3 shadow-sm mb-2"><a href="#" class="text-decoration-none d-flex justify-content-between align-items-center"><span>{{$item->text}}</span> <i class="fa-solid fa-arrow-right"></i></a></div>
                         @endforeach
                     </div>
                 </div>

                 <!-- Recent Posts Widget -->
                 <div class="card border-0 p-4 shadow-sm mb-3" style="background-color:rgba(151, 150, 150, 0.18);">
                     <div class="row">
                         <h4 class="fs-4">Recent Posts</h4>
                     </div>
                     <div class="row">
                         @foreach ($recentPosts as $index => $item)

                         <div class="d-flex mb-3">
                             <img src="https://images.unsplash.com/photo-1461749280684-dccba630e2f6?w=500&h=300&fit=crop" alt="Post" width="80" class="object-fit-cover rounded me-3">
                             <div>
                                 <h6 class="mb-1 lh-1"><a href="#" class="text-decoration-none fs-5">{{$item->title}}</a></h6>
                                 <span class="text-muted small"><i class="far fa-calendar-alt me-1"></i>{{$item->created_at->format('y/m/d')}}</span>
                             </div>
                         </div>
                         @endforeach
                     </div>
                 </div>

                 <!-- Tags Widget -->
                 <div class="card border-0 p-4 shadow-sm mb-3" style="background-color:rgba(151, 150, 150, 0.18);">
                     <div class="row">
                         <h4 class="fs-4">Popular Tags</h4>
                     </div>
                     <div class="row">
                         <div class="d-flex flex-wrap gap-2">
                             <span class="bg-white rounded-1 p-3 shadow-sm">
                                 <a href="#">Technology</a>
                             </span>
                             <span class="bg-white rounded-1 p-3 shadow-sm">
                                 <a href="#">IT</a>
                             </span>
                             <span class="bg-white rounded-1 p-3 shadow-sm">
                                 <a href="#">Business</a>
                             </span>
                             <span class="bg-white rounded-1 p-3 shadow-sm">
                                 <a href="#">Marketing</a>
                             </span>
                             <span class="bg-white rounded-1 p-3 shadow-sm">
                                 <a href="#">Web</a>
                             </span>
                             <span class="bg-white rounded-1 p-3 shadow-sm">
                                 <a href="#">Design</a>
                             </span>
                             <span class="bg-white rounded-1 p-3 shadow-sm">
                                 <a href="#">Development</a>
                             </span>
                             <span class="bg-white rounded-1 p-3 shadow-sm">
                                 <a href="#">Solutions</a>
                             </span>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
 @endsection

 <style>
     .category-item {
         background-color: white;
         transition: all 0.6s ease;
     }

     .category-item:hover {
         background-color: #3E66F3;
     }

     .category-item:hover a,
     .category-item:hover i {
         color: white;
     }

     .card-img-top {
         object-fit: cover;
         width: 100%;
         /* height: 200px; */
         aspect-ratio: 16/9;
     }
 </style>