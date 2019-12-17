@extends('layout.app')

@section('title')
{{@$title}}
@endsection

@section('description')
{{@$description}}
@endsection


@section('content')
    <div class="o-wrapper u-margin-bottom-huge">
        <div class="c-breadcrumbs u-margin-top">
			<a href="{{ url('/') }}">Accueil</a>
			<i class="la la-angle-right"></i>
			{{@$species->name}}
            <div class="c-divider__long__thin"></div>
		</div>

        <div class="o-layout">
        @foreach(@$animals as $animal)

            <div class="o-layout__item u-1/2@tablet u-1/4@desktop u-margin-top-small">
                @include('components.card', ['animal' => $animal])

            </div>

        @endforeach
        </div>
    </div>
@endsection
