<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <base href="/public">
    @include('admin.css')
    <style type="text/css">
        .center{
            text-align: center;
            padding-top: 40px;
        }
        .font_size
        {
            font-size: 40px;
            padding-bottom: 40px;
        }
        .text_color
        {
            color: black;
            padding-bottom: 20px;
        }
        label 
        {
            display: inline-block;
            width: 200px;
        }
        .div_design 
        {
            padding-bottom: 20px;
        }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
          @if (session()->has('message'))

            <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                {{ session()->get('message') }}  

            </div>


            @endif
                <div class="center">
                    <h1 class="font_size">Update Product</h1>
                    <form action="{{ url('update_product_confirm',$product->id)}}" method="POST" enctype="multipart/form-data">


                    @csrf 
                    
                    <div class="div_design">
                    <label for="">Product Title</label>
                    <input class="text_color" type="text" name="title" placeholder="Write a title"  required="" value="{{$product->title}}">
                    </div>
                    <div class="div_design">
                    <label for="">Product Description</label>
                    <input class="text_color" type="text" name="description" placeholder="Write a description" required="" value="{{$product->description}}">
                    </div>
                    <div class="div_design">
                    <label for="">Product Price</label>
                    <input class="text_color" type="number" name="price" placeholder="Write a Price" required="" value="{{$product->price}}">
                    </div>
                    <div class="div_design">
                    <label for="">Discounted Price</label>
                    <input class="text_color" type="number" name="dis_price" placeholder="Write discounted price if Apply" value="{{$product->discount_price}}">
                    </div>
                    <div class="div_design">
                    <label for="">Product Quantity</label>
                    <input class="text_color" type="number" min="0" name="quantity" placeholder="Write quantity" required="" value="{{$product->quantity}}">
                    </div>
                    <div class="div_design">
                    <label for="">Product Catagory</label>
                    <select name="catagory" class="text_color" required="">
                        <option value="{{$product->catagory}}" selected="">{{$product->catagory}}</option>
                        @foreach($category as $category)

                        <option value="{{$category->category_name}}">{{$category->category_name}}</option>

                        @endforeach
                       
                    </select>
                    </div>

                    <div class="div_design">
                    <label for="">Current Product Image</label>
                    <img style="margin:auto;" height="100" width="100" src="/product/{{$product->image}}" alt="">
                    </div>



                    <div class="div_design">
                    <label for="">Change Product Image</label>
                    <input type="file" name="image">
                    </div>
                    <div class="div_design">
                        <input type="submit" value="Update Product" class="btn btn-primary">
                    </div>
                    </form>
                </div>
          </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
   @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
