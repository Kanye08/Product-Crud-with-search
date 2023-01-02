<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Products</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>

    <!-- navbar  -->
    <nav class="navbar bg-light">
        <div class="container-fluid">
            <a class="navbar-brand">Products</a>
            <form class="d-flex" role="search" action="{{route('products.search')}}">
                <input class="form-control me-2" name="search" type="search" placeholder="Search Products"
                    aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </nav>


    <section style="padding-top: 60px;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header">
                            Edit Product
                        </div>
                        <div class="card-body">
                            @if(Session::has('Product_updated'))
                            <div class="alert alert-success" role="alert">
                                {{Session::get('Product_updated')}}
                            </div>
                            @endif
                            <form action="{{ route('products.update', ['id' => $product->id]) }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{$product->id}}">
                                <div class="form-group">
                                    <label for="name">Product Name</label>
                                    <input type="text" name="name" class="form-control"
                                        placeholder="Enter New Poduct name" value="{{$product->name}}">
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="name">Description</label>
                                    <textarea type="text" rows="3" name="description" class="form-control"
                                        placeholder="Enter New Description">{{$product->description}}</textarea>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="name">Category</label>
                                    <input type="text" name="category" class="form-control"
                                        placeholder="Enter New Category" value="{{$product->category}}">
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="name">Price</label>
                                    <input type="text" name="price" class="form-control" placeholder="Enter New Price"
                                        value="{{$product->price}}">
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary">Update Product</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>









    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
</body>

</html>
