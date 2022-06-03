<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="{{url('assets\admin\css\manage_category.css')}}">
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
        <div class="text">Insert Category</div>

        <a href="{{url('/admin/category')}}">
            <button type="button" class="btn">Back</button>
        </a>
    {{session('message')}}<br><br>
    <form method="post" action="{{route('category.manage_category_insert')}}">
        @csrf
    <label>Category name:</label><br>
    <input type="text" value="{{$category_name}}" name="category_name"><br><br>
    @error('category_name')
    {{$message}}
    @enderror
    <label>Category slug:</label><br>
    <input type="text" value="{{$category_slug}}" name="category_slug"><br><br>
    @error('category_slug')
    {{$message}}
    @enderror
    <button class="submit">Submit</button>
    <input type="hidden" name="id" value="{{$id}}"/>
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
