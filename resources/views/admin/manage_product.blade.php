<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Dashboard</title>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="{{url('assets\admin\css\manage_product.css')}}">
      <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
   </head>
   <body>
      <nav class="sidebar close">
         <header>
            <div class="image-text">
               <span class="image">
               </span>
               <div class="text logo-text">
                  <span class="name">Dashboard</span>
               </div>
            </div>
            <i class='bx bx-chevron-right toggle'></i>
         </header>
         <div class="menu-bar">
            <div class="menu">
               <ul class="menu-links">
                  <li class="nav-link">
                     <a href="{{route('dashboard')}}">
                     <i class='bx bx-table icon' ></i>
                     <span class="text nav-text">Dashboard</span>
                     </a>
                  </li>
                  <li class="nav-link">
                     <a href="{{url('admin/category')}}">
                     <i class='bx bx-save icon' ></i>
                     <span class="text nav-text">Category</span>
                     </a>
                  </li>
                  <li class="nav-link">
                     <a href="product.html">
                     <i class='bx bx-bell icon'></i>
                     <span class="text nav-text">Product</span>
                     </a>
                  </li>
                  <li class="nav-link">
                     <a href="product_details.html">
                     <i class='bx bx-bell icon'></i>
                     <span class="text nav-text">Product details</span>
                     </a>
                  </li>
               </ul>
            </div>
            <div class="bottom-content">
               <li class="">
                  <a href="{{url('admin')}}">
                  <i class='bx bx-log-out icon' ></i>
                  <span class="text nav-text">Logout</span>
                  </a>
               </li>
            </div>
         </div>
      </nav>
      <section class="home">
         <div class="text">Manage Product</div>
         <a href="{{url('/admin/product')}}">
         <button type="button" class="btn">Back</button>
         </a>
         {{session('message')}}<br><br>
         <div class="first-form">
         <form method="post" action="{{route('product.manage_product_process')}}" enctype="multipart/form-data">
            @csrf
            <label>Product Name:</label><br>
            <input type="text" value="{{$name}}" name="name"><br>
            @error('name')
            {{$message}}
            @enderror<br>
            <label>Slug:</label><br>
            <input type="text" value="{{$slug}}" name="slug"><br>
            @error('slug')
            {{$message}}
            @enderror<br>
            <label>Image:</label><br>
            <input type="file" name="image"><br>
            @error('image')
            {{$message}}
            @enderror<br>
            <label>Category-Id:</label><br>
            <select name="category_id" class="form-control" required>
               <option value="">Select Categories</option>
               @foreach($category as $list)
               @if($category_id==$list->id)
               <option selected value="{{$list->id}}">
                  @else
               <option value="{{$list->id}}">
                  @endif
                  {{$list->category_name}}
               </option>
               @endforeach
            </select>
            <br><br>
            <label>Brand:</label><br>
            <input type="text" value="{{$brand}}" name="brand"><br>
            @error('brand')
            {{$message}}
            @enderror<br>
            <label>Short Description:</label><br>
            <textarea name="short_desc" rows="4" cols="50">
            {{$short_desc}}</textarea>
            @error('short_desc')
            {{$message}}
            @enderror<br>
            <label>Description:</label><br>
            <textarea name="desc" rows="4" cols="50">
            {{$desc}}</textarea>
            @error('desc')
            {{$message}}
            @enderror<br>
            <label>Price:</label><br>
            <input type="text" value="{{$price}}" name="price"><br>
            @error('price')
            {{$message}}
            @enderror<br>
            <label>Quantity:</label><br>
            <input type="number" value="{{$qty}}" name="qty"><br>
            @error('qty')
            {{$message}}
            @enderror<br>
            <label>Keyword:</label><br>
            <input type="text" value="{{$keywords}}" name="keywords"><br><br>
            @error('keywords')
            {{$message}}
            @enderror<br>
        </div>
        
            <button class="submit">Submit</button>
         </form>
      </section>
      <script>
         const body = document.querySelector('body'),
         sidebar = body.querySelector('nav'),
         toggle = body.querySelector(".toggle"),
         searchBtn = body.querySelector(".search-box"),
         modeSwitch = body.querySelector(".toggle-switch"),
         modeText = body.querySelector(".mode-text");
         
         
         toggle.addEventListener("click" , () =>{
         sidebar.classList.toggle("close");
         })
         
         searchBtn.addEventListener("click" , () =>{
         sidebar.classList.remove("close");
         })
         
         // modeSwitch.addEventListener("click" , () =>{
         //     body.classList.toggle("dark");
         
         //     if(body.classList.contains("dark")){
         //         modeText.innerText = "Light mode";
         //     }else{
         //         modeText.innerText = "Dark mode";
         
         //     }
         // });
      </script>
   </body>
</html>