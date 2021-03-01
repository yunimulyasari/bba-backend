<!-- sidebar left -->
<section class="products__sidebar__left">
    <div class="sidebar__left__box choose__by__price">
        <span class="sidebar__left__box--title collapse__link--price"><h4>Product</h4><span class="icon--collapse--price icon--collapse--min"></span></span>
        <form class="sidebar__left__box--form collapse__container--price" action="">
            <ul class="sidebar__left__box--ul">
                @if(isset($products))
                   @foreach($products as $product)
                <a href="{{ route('frontDetail', $product->id) }}">
                    <li class="sidebar__left__box--li"><label class="custom--label" for="price--4">{{ $product->name }}</label></li>
                </a>
                    @endforeach
                @endif
            </ul>
        </form>
    </div>

</section>