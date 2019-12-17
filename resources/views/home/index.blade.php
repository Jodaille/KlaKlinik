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

            <div class="c-divider__long__thin"></div>
		</div>

        <div class="o-layout">
        @foreach(@$species as $specy)

            <div class="o-layout__item u-1/2@tablet u-1/4@desktop u-margin-top-small">
                <a class="c-card__animal__link" href="{{route('animals.of.species',['slug' => $specy->slug])}}">
                    <span class="c-card__animal u-margin-bottom">
                        <span class="c-card__animal__text">
                            <span class="c-card__header__title-resume">
                                {{$specy->name}}
                            </span>
                        </span>
                        <span class="c-card__animal__arrow">
                            <img class="u-margin-right-tiny" src="{{ asset('/img/icons/arrowdown.svg') }}" width="16">
                        </span>
                    </span>
                </a>

            </div>

        @endforeach

        </div>
    </div>
@endsection
