
<!DOCTYPE html>
<html lang="en">
<link href="assets\img\favicon-32x32.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">


<head>
    <base href="/public">
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="assets/css/admin.css">
        <title> Admin Dashboard</title>
       
        <style>
    
    #search {
        width: 99.7%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        outline: none;
    }

    #search_list {
        max-height: 300px; 
        overflow-y: auto;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 10px;
        background-color: #fff;
        position: absolute;
        width: 82.3%;
        z-index: 1;
    }

    .user-row {
        cursor: pointer;
        padding: 5px;
        transition: background-color 0.3s;
    }

    .user-row:hover {
        background-color: #f5f5f5;
    }

</style>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">ACE GUARDIAN</div>
            <div class="list-group list-group-flush my-3">
            <iclass=""></i>➕ Address Book</a>
               
            </div>
        </div>
        <!-- /#sidebar-wrapper -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Admin's Dashboard</h2>
                </div>
                <br><br>
                

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </nav>
            <div class="form-group">
                    <h4>Search by ID, Name or Email!</h4>
                    <input type="text" name="search" id="search" placeholder="Search 🔍" class="form-control" onfocus="this.value=''">
                </div>
                <div id="search_list"></div>
            <form action="{{url('/uploadteam')}}" method="Post" enctype="multipart/form-data">

@csrf

            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script>
    $(document).ready(function(){
        $('#search').on('keyup',function(){
            var query= $(this).val(); 
            $.ajax({
                url:"admin/search",
                type:"GET",
                data:{'search':query},
                success:function(data){ 
                    $('#search_list').html(data);
                }
            });
             //end of ajax call
        });

        $(document).on('click', '.user-row', function () {
    var userId = $(this).data('user-id'); // Assuming you have a data attribute with the user's ID
    // Make an AJAX request to fetch the user's details view
    $.ajax({
        url: 'admin/users/' + userId, // Replace with your endpoint to fetch user details
        type: 'GET',
        success: function (data) {
            $('#user-details-container').html(data); // Inject the user details view into a container
        },
        error: function (xhr, status, error) {
            // Handle error if needed
        }
    });
});

    });
    


</script>

</body>

</html>