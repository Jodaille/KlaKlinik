<a class="c-card__animal__link" href="{{route('animal.show',['speciesslug' => $animal->species->slug, 'slug' => $animal->slug, 'id' =>$animal->id])}}" >
    <span class="c-card__animal u-margin-bottom">
        <span class="">
            <span class="c-card__species">
                <img class="u-margin-right-tiny" src="{{ asset('/img/icons/medal.svg') }}" width="16">
                {{$animal->species->name}}
            </span>
            <span class="c-card__header__title">
                {{$animal->name}}
            </span>
            <span class="c-card__header__image">
                @if($animal->image) <img src="{{asset($animal->image)}}" title="{{$animal->name}}" /> @endif
            </span>
            <span class="c-card__header__description">
                {!! $animal->description !!}
            </span>
        </span>
        <span class="c-card__animal__arrow">
            <img class="u-margin-right-tiny" src="{{ asset('/img/icons/arrowdown.svg') }}" width="16">
        </span>
    </span>
</a>
