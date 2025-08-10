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
         <div class="row">
             <!-- Main Content -->
             <div class="col-lg-8">
                 <!-- Blog Post 1 -->
                 <div class="card shadow-sm mb-3">
                     <div class="position-relative">
                         <img src="https://images.unsplash.com/photo-1461749280684-dccba630e2f6?w=500&h=300&fit=crop" class="card-img-top" alt="Blog Post">
                     </div>
                     <div class="card-body">
                         <div class="blog-meta mb-3">
                             <span><i class="far fa-user"></i> By Admin</span>
                             <span class="mx-3"><i class="far fa-calendar-alt"></i> 10 June, 2023</span>
                             <span><i class="far fa-comment"></i> 3 Comments</span>
                         </div>
                         <h3 class="card-title mb-3">How Technology Can Help Small Business Owners</h3>
                         <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                         <a href="#" class="btn btn-primary">Read More</a>
                     </div>
                 </div>

                 <!-- Blog Post 2 -->
                 <div class="card shadow-sm">
                     <div class="position-relative">
                         <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?w=500&h=300&fit=crop" class="card-img-top" alt="Blog Post">
                     </div>
                     <div class="card-body">
                         <div class="blog-meta mb-3">
                             <span><i class="far fa-user"></i> By Admin</span>
                             <span class="mx-3"><i class="far fa-calendar-alt"></i> 15 June, 2023</span>
                             <span><i class="far fa-comment"></i> 5 Comments</span>
                         </div>
                         <h3 class="card-title mb-3">Digital Marketing Strategies for 2023</h3>
                         <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                         <a href="#" class="btn btn-primary">Read More</a>
                     </div>
                 </div>

                 <!-- Pagination -->
                 <nav aria-label="Page navigation">
                     <ul class="pagination justify-content-center mt-4">
                         <li class="page-item disabled">
                             <a class="page-link" href="#" tabindex="-1">Previous</a>
                         </li>
                         <li class="page-item active"><a class="page-link" href="#">1</a></li>
                         <li class="page-item"><a class="page-link" href="#">2</a></li>
                         <li class="page-item"><a class="page-link" href="#">3</a></li>
                         <li class="page-item">
                             <a class="page-link" href="#">Next</a>
                         </li>
                     </ul>
                 </nav>
             </div>

             <!-- Sidebar -->
             <div class="col-lg-4">
                 <!-- Search Widget -->
                 <div class="card border-0 p-4 shadow-sm mb-3" style="background-color:rgba(151, 150, 150, 0.18);">
                     <div class="input-group">
                         <input type="text" class="form-control bg-white" placeholder="Enter Keyword">
                         <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                     </div>
                 </div>

                 <!-- Categories Widget -->
                 <div class="card border-0 p-4 shadow-sm mb-3" style="background-color:rgba(151, 150, 150, 0.18);">
                     <div class="row px-3">
                         <h4>Categories</h4>
                     </div>
                     <div class="row px-4">
                         <div class="bg-white rounded-1 p-3 shadow-sm mb-2"><a href="#" class="text-decoration-none d-flex justify-content-between align-items-center"><span>Technology</span> <span>12</span></a></div>
                         <div class="bg-white rounded-1 p-3 shadow-sm mb-2"><a href="#" class="text-decoration-none d-flex justify-content-between align-items-center"><span>Web Development</span> <span>8</span></a></div>
                         <div class="bg-white rounded-1 p-3 shadow-sm mb-2"><a href="#" class="text-decoration-none d-flex justify-content-between align-items-center"><span>Digital Marketing</span> <span>15</span></a></div>
                         <div class="bg-white rounded-1 p-3 shadow-sm mb-2"><a href="#" class="text-decoration-none d-flex justify-content-between align-items-center"><span>IT Services</span> <span>10</span></a></div>
                         <div class="bg-white rounded-1 p-3 shadow-sm mb-2"><a href="#" class="text-decoration-none d-flex justify-content-between align-items-center"><span>Business</span> <span>5</span></a></div>
                     </div>
                 </div>

                 <!-- Recent Posts Widget -->
                 <div class="card border-0 p-4 shadow-sm mb-3" style="background-color:rgba(151, 150, 150, 0.18);">
                     <h4 class="fs-4">Recent Posts</h4>
                     <div class="d-flex mb-3">
                         <img src="https://images.unsplash.com/photo-1461749280684-dccba630e2f6?w=500&h=300&fit=crop" alt="Post" width="80" class="object-fit-cover rounded me-3">
                         <div>
                             <h6 class="mb-1 lh-1"><a href="#" class="text-decoration-none fs-5">How Technology Can Help Business</a></h6>
                             <span class="text-muted small"><i class="far fa-calendar-alt me-1"></i> 10 June, 2023</span>
                         </div>
                     </div>
                     <div class="d-flex mb-3">
                         <img src="https://images.unsplash.com/photo-1461749280684-dccba630e2f6?w=500&h=300&fit=crop" alt="Post" width="80" class="object-fit-cover rounded me-3">
                         <div>
                             <h6 class="mb-1 lh-1"><a href="#" class="text-decoration-none fs-5">Digital Marketing Strategies</a></h6>
                             <span class="text-muted small"><i class="far fa-calendar-alt me-1"></i> 15 June, 2023</span>
                         </div>
                     </div>
                     <div class="d-flex">
                         <img src="https://images.unsplash.com/photo-1461749280684-dccba630e2f6?w=500&h=300&fit=crop" alt="Post" width="80" class="object-fit-cover rounded me-3">
                         <div>
                             <h6 class="mb-1 lh-1"><a href="#" class="text-decoration-none fs-5">Best IT Solutions for Business</a></h6>
                             <span class="text-muted small"><i class="far fa-calendar-alt me-1"></i> 20 June, 2023</span>
                         </div>
                     </div>
                 </div>

                 <!-- Tags Widget -->
                 <div class="card border-0 p-4 shadow-sm mb-3" style="background-color:rgba(151, 150, 150, 0.18);">
                     <h4 class="">Popular Tags</h4>
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
 </section>




 @endsection