 <div class="c-navbar">
    <div class="o-wrapper">
        <div class="c-navbar__wrapper">
            <div class="u-margin-top">
            <form action="{{route('search')}}" method="GET">
            <span ><input type="search" name="q" placeholder="" /></span>
            <span><button type="submit" name="rechercher" value="rechercher" placeholder="rechercher" ><i class="las la-question-circle"></i></button></span>
            @csrf
            </form>
            </div>
        </div>
    </div>
</div>

