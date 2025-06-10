@extends('frontend2')

@section('content')
    @include('frontend.partials.breadcrumb', [
        'title' => 'All Projects',
        'bgImage' => !empty($pageSettings?->breadcrumb_image)
            ? 'storage/' . $pageSettings->breadcrumb_image
            : 'assets_frontend/assets/img/bg/breadcumb-bg.jpg',
        'breadcrumb' => [['label' => 'All Project']],
    ])

    <section class="space">
        <div class="container">
            <div class="row gy-4">
                @foreach ($projects as $project)
                    <div class="col-lg-4 col-md-6">
                        <div class="project-card">
                            <div class="project-img">
                                <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}">
                            </div>
                            <div class="project-content-wrap">
                                <div class="project-content">
                                    <div class="box-particle" id="project-p{{ $loop->iteration }}"></div>
                                    <h3 class="box-title"><a
                                            href="{{ route('project.details', $project->id) }}">{{ $project->title }}</a>
                                    </h3>
                                    <p class="project-subtitle">{{ $project->category }}</p>
                                    <a href="{{ asset('storage/' . $project->image) }}" class="icon-btn popup-image"><i
                                            class="far fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="shape-mockup" data-top="0%" data-right="0%">
            <img src="{{ asset('assets_frontend/assets/img/shape/tech_shape_1.png') }}" alt="shape">
        </div>
        <div class="shape-mockup" data-bottom="0%" data-left="0%">
            <img src="{{ asset('assets_frontend/assets/img/shape/tech_shape_2.png') }}" alt="shape">
        </div>
    </section>
@endsection
