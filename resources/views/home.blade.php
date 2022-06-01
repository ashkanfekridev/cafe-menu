<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>منوی کافه</title>
    <link rel="stylesheet" href="css/fontiran.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/frontend.css">
</head>
<body>
<div id="app">
    <header id="header">
        <div class="container">
            <section id="top-header" class="section">
                <a href="{{route('home')}}">
                    <img src="images/logo.svg" width="150px" alt="logo">
                </a>
            </section>
            <nav id="nav-header">
                <ul class="nav-bar">
                    @foreach($categoryWithProduct as $category)
                        <li>
                            <a href="#category-{{$category->id}}">
                                <div class="nav-item p-15px">
                                    <img src="{{$category->image->link}}" width="45" alt="...">
                                    <p>{{$category->title}}</p>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </nav>
        </div>
    </header>

    <main id="main">
        <section class="container section">
            @foreach($categoryWithProduct as $category)
                <div id="category-{{$category->id}}">
                    <h2 class="categorry-title">{{$category->title}}</h2>
                    <section class="product-list">
                        @foreach($category->products as $product)

                            <div class="product-list_item">
                                @if(isset($product->image_id))
                                    <img src="{{asset($product->image->link)}}" class="product-list_item-image" alt="product">
                                @else
                                    <img src="{{asset("images/5.jpg")}}" class="product-list_item-image" alt="product">
                                @endif
                                <div class="product-list_item-content">
                                    <p class="product-list_item-content_name text-black mt:8px">{{$product->title}}</p>
                                    <p class="product-list_item-content_description text-medium">{{$product->description}}</p>
                                    <div class="flex justify-content:space-between align-items:center">
                                        <p class="product-list_item-content_price">{{number_format($product->price)}}
                                            <span>تومان</span></p>
                                        <a href="#" class="product-list_item-content_add_to_order">افزودن به سبد
                                            خرید</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </section>
                </div>
            @endforeach
        </section>
    </main>
</div>
</body>
</html>
