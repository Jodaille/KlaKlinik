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
            <a href="{{route('animals.of.species',['slug' => $animal->species->slug])}}">
			{{@$animal->species->name}}
            </a>
			<i class="la la-angle-right"></i>
			{{@$animal->name}}
            <div class="c-divider__long__thin"></div>
		</div>

        <div class="o-layout">
        <div class="o-layout__item">
            <span class="c-card__header__title">
                {{$animal->name}}
                {{$animal->idendity}}
            </span>
            <span class="c-card__header__image">
                @if($animal->image) <img src="{{asset($animal->image)}}" title="{{$animal->name}}" /> @endif
            </span>
            <span class="c-card__header__description">
                {!! $animal->description !!}
            </span>
            @if($animal->location)
            <span class="c-card__header__location">
            <u>Emplacement</u>:
                {{ $animal->location->name }}
            </span><br>
            @endif

            @if($animal->birthdate)
            <span class="c-card__header__birthdate">
            <u>Date de naissance</u>:
                {{ $animal->birthdate }}
            </span><br>
            @endif

            @if($animal->owner)
            <span class="c-card__header__owner">
            <u>Propriétaire</u>:
                {{ $animal->owner->firstname }}
                {{ $animal->owner->name }}
            </span>
            @endif
        </div>
        </div>
    </div>
@endsection
