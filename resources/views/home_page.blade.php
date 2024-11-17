<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel= "stylesheet"
        href= "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <title>{{ config('app.name') }}</title>
</head>

<body>
    <div class="container">
        <div class="row my-1">
            <h2 class="text-center my-2">أضف كتاب<i class="las la-book" style="color:brown; font-size:32px;"></i></h2>
            <div class="d-flex flex-row justify-content-end">
                <a href="{{route('add_book')}}" class="btn btn-outline-info">أضف كتاب+</a>
            </div>
        </div>
        <div class="row my-3 p-2" dir="rtl">
            <form method="get" action="/search">
                <div class="col-md-12">
                    <input type="text" name="search" dir="rtl" class="form-control my-1" id="exampleFormControlInput1"
                        placeholder="بحث.." value="{{isset($search) ? $search : ''}}">
                </div>
                <div class="col-md-12">
                  <button type="submit" class="btn btn-secondary my-1"><i class="las la-search"></i>بحث</button>
                </div>
            </form>
        </div>
        <h4 class="text-end mt-5">الكتب المضافة سابقاً<i class="las la-angle-double-down"></i></h4>

        <div class="row" dir="rtl">
            @foreach ($books as $book)
            <div class="col-sm-4 mb-3 mb-sm-0">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">عنوان الكتاب:{{$book->title}}</h5>
                        <p class="card-title text-center">تاريخ الاضافة:{{$book->created_at}}</p>
                        <img src="{{ asset('assets/images/book-image.JPG') }}" class="card-img-top" alt="">
                        <label class="badge text-bg-secondary">نبذة عن الكتاب</label>
                        <p class="card-text text-end">{{$book->description}}</p>
                        <div>
                            <a href="{{route('download',$book->file)}}" class="btn btn-warning d-block mx-auto" style="width:150px;">تحميل
                                الكتاب<i class="las la-download"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>


    <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
