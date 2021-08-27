<div class="col-md-pull-12">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Последние Товары</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            <ul class="products-list product-list-in-box">
              @foreach($last_products as $item)
                  <li class="item">
                      <div class="product-img">
                          @if(!empty($item->img))
                               <img src="{{asset('uploads/single/'.$item->img)}}" alt="image">
                          @else
                               <img src="{{asset('images/no_image.png')}}" alt="image">
                          @endif
                      </div>
                      <div class="product-info">
                          <a href="" class="product-title">
                              {{$item->title}}
                              <span class="label label-warning pull-right">{{$item->price}}</span>
                          </a>
                          <span class="product-description">{{$item->description}}</span>

                      </div>
                  </li>
                  @endforeach
            </ul>
        </div>
    </div>
</div>
