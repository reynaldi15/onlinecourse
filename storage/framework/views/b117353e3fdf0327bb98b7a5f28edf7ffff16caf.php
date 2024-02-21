<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | Online Course</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo e(asset('css/dashboard.css')); ?>">
    <script src="https://unpkg.com/feather-icons"></script>
</head>

<body>
    <div class="container">
        <?php if(session('success')): ?>
            <div class="alert alert-success" id="myAlert">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>
        <?php if(session('error')): ?>
            <div class="alert alert-danger" id="myAlert">
                <?php echo e(session('error')); ?>

            </div>
        <?php endif; ?>
        
        <nav class="navbar navbar-expand-lg mt-3 mb-4">
            <a class="navbar-brand" dissable href="/dashboard">Logo. </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-inline justify-content-center" id="navbarScroll">
                <ul class="navbar-nav navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#course">Course</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/course">Master class</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/detail">How its work</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about">About</a>
                    </li>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard/kursus">manage List Course </a>
                        </li>
                    <?php endif; ?>

                </ul>
            </div>
            <form class="d-flex" role="search justify-content-end">
                
                <a class="btn btn-outline-dark" href="/course" type="submit">Join Our Course</a>
                

                <?php if(auth()->check()): ?>
                    <div class="dropdown ms-3">
                        <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <?php echo e(auth()->user()->name); ?>

                        </button>
                        <ul class="dropdown-menu">
                            <li><button class="dropdown-item" type="button"
                                    disabled><?php echo e(auth()->user()->role); ?></button></li>
                            <li><a href="/sesi/logout" class="dropdown-item" type="button">Log Out</a></li>
                        </ul>
                    </div>
                <?php else: ?>
                    <a href="/sesi" class="btn btn-light ms-3" data-bs-toggle="modal"
                        data-bs-target="#login">Login</a>
                <?php endif; ?>
            </form>
        </nav>
    </div>

    
    <section>
        <div class="container">
            <div class="row">
                <div class="deskripsi" style="background-image: url('<?php echo e(asset('/img/desc1.png')); ?>');">
                    <div class="card-ui card float-end me-2" style="width: 60px;">
                        <div class="card-body">
                            <ion-icon name="triangle-outline" class="triangle"></ion-icon> <br>
                            <ion-icon name="square-outline" class="square"></ion-icon> <br>
                            <p>UI/UX</p>
                        </div>
                    </div>
                    <div class="col-5 ms-5">
                        <h1>Best Digital <span class="o-style">O</span>nline Courses</h1>
                        <p>Digital online courses provide an accessible and flexible way for individual to acquire
                            new knowledge and skills in various field</p>
                    </div>
                    <a href="#course" class="btn hero-button ms-5" style="width:120px;">Get Started</a>
                    <div class="hero-detail d-flex float-end">
                        <div class="card card-lesson" style="width: 11rem heigt: 3rem;">
                            <div class="card-body">
                                <h5 class="card-title">UI Design Pattern</h5>
                                <div class="ui-detail">
                                    <img src="<?php echo e(asset('img/4.jpg')); ?>" class="img-detail rounded-circle float-start"
                                        alt="">
                                    <div class="detail float-end">
                                        <h5>Veronica</h5>
                                        <h6>Country</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-private" style="width: 13rem; height: 5rem ">
                            <div class="card-body">
                                <div class="ui-detail">
                                    <img src="<?php echo e(asset('img/8.jpeg')); ?>" class="img-detail rounded-circle float-start"
                                        alt="">
                                    <div class="detail float-end">
                                        <h5>Karen</h5>
                                        <h6>UI/UX Designer</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <section>
        <div class="container">
            <div class="customers">
                <div class="row">
                    <div class="col-5">
                        <div class="row">
                            <div class="col">
                                <div class="study">
                                    <div class="gambar-col">
                                        <div class="row">
                                            <div class="col-5">
                                                <img src="<?php echo e(asset('img/course1.jpeg')); ?>" class="img-col1 mt-2 ms-2"
                                                    style="border-radius: 10px" alt="">
                                            </div>
                                            <div class="col-7">
                                                <img src="<?php echo e(asset('img/course2.jpg')); ?>"
                                                    class="img-col2 ms-4 mt-1 me-1" style="border-radius:15px"
                                                    alt=""> <br>
                                                <img src="<?php echo e(asset('img/8.jpeg')); ?>" class="img-col3 mt-2 ms-4"
                                                    style="border-radius:15px" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="desc-study">
                                        <div class="row">
                                            <div class="col-8">
                                                <h6 class="mt-3 ms-2">Study at your own place</h6>
                                            </div>
                                        </div>
                                        <div class="icon-arrow">
                                            <button>
                                                <a href="#course" class=" btn icon-block"><ion-icon
                                                        name="arrow-forward-outline"></ion-icon></a>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="learning">
                                    <div class="icon-online">
                                        <div class="row">
                                            <div class="col">
                                                <div class="camera">
                                                    <ion-icon name="camera-outline"></ion-icon>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="online">
                                                    <p class="text-center">Online</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-9">
                                            <h5>The learning process is simple</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="user-all">
                            <div class="row">
                                <div class="col">
                                    <div class="user">
                                        <div class="row">
                                            <div class="col">
                                                <h2>231+</h2>
                                                <p>course & subjects</p>
                                            </div>
                                            <div class="col">
                                                <h2>319+</h2>
                                                <p>Instructors</p>
                                            </div>
                                            <div class="col">
                                                <h2>72K+</h2>
                                                <p>Using the app</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="img-flex d-flex">
                                        <img src="<?php echo e(asset('img/1.jpg')); ?>" alt=""
                                            class="flex-1 rounded-circle">
                                        <img src="<?php echo e(asset('img/1.jpg')); ?>" alt=""
                                            class="flex-2 rounded-circle">
                                        <img src="<?php echo e(asset('img/1.jpg')); ?>" alt=""
                                            class="flex-2 rounded-circle">
                                        <img src="<?php echo e(asset('img/1.jpg')); ?>" alt=""
                                            class="flex-2 rounded-circle">
                                        <img src="<?php echo e(asset('img/1.jpg')); ?>" alt=""
                                            class="flex-2 rounded-circle">
                                        <img src="<?php echo e(asset('img/1.jpg')); ?>" alt=""
                                            class="flex-2 rounded-circle">
                                        <p><span>72K+ </span>Happy Customers</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <section id="course">
        <div class="container">
            <div class="card-view mt-5 p-5">
                <div class="row">
                    <div class="col-4">
                        <h2>Most Popular Course</h2>
                        <p>start an incredible UI/UX Design Course with us. You can learn the most requested digital
                            courses.</p>
                            <div class="row">
                                <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <div class="col">
                                        <div class="online1">
                                            <p class="text-center"><?php echo e($cate->name); ?></p>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                    </div>
                    <div class="col-8">
                        <div class="course d-flex overflow-x-auto">
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="view-course d-flex">
                                    <div class="card card-image me-3"
                                        style="width: 15rem; height: 20rem; background-image: url('<?php echo e(asset('/cover_image/' . $row->cover)); ?>');">
                                    </div>
                                    <div class="card card-detail1" style="width: 15rem; height: 20rem;">
                                        <h5 class="card-title"><?php echo e($row->judul); ?></h5>
                                        <p class="card-text"><?php echo e($row->description); ?></p>
                                        <div class="card-button">
                                            <div class="row">
                                                <div class="col-7">
                                                    
                                                    
                                                    <form method="POST" action="<?php echo e(route('join.kursus', ['kursusId' => $row->id])); ?>">
                                                        <?php echo csrf_field(); ?>
                                                        <button type="submit" class="join-btn btn btn-primary rounded-pill">Join</button>
                                                    </form>
                                                </div>
                                                <div class="col-5">
                                                    <a href="<?php echo e(url("/kursus/{$row->id}/users")); ?>" class="a-link"><i data-feather="arrow-up-right"
                                                            class="icon"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <div class="view d-grid gap-2 d-md-block">
                                <button class="viewall btn btn-primary" type="button"><a class="text-light"
                                        href="/course">View All </a><ion-icon class="ardown"
                                        name="arrow-forward-circle-outline"></ion-icon></button>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    
    
    <div class="modal fade" id="login" tabindex="-1" aria-labelledby="login" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-body">
                        <h1 class="text-center mt-2">Login</h1>
                        <?php if(session('error')): ?>
                            <div class="alert alert-danger">
                                <?php echo e(session('error')); ?>

                            </div>
                        <?php endif; ?>
                        <div class="card" style="margin-top: 70px">
                            <form style="margin: 30px" action="/sesi/login" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input class="form-control" value="<?php echo e(Session::get('email')); ?>" type="email"
                                        id="email" name="email" autofocus>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input class="form-control" type="password" id="password" name="password">
                                </div>
                                <div class="nb-3 d-grid">
                                    <button name="submit" type="submit" class="btn btn-primary">Login</button>
                                </div>
                            </form>
                            <div class="register text-end mb-3 me-3">
                                <a href="/sesi/register" data-bs-toggle="modal" data-bs-target="#registrasi">don't
                                    have account? Create here!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    
    <div class="modal fade" id="registrasi" tabindex="-1" aria-labelledby="login" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-body">
                        <div class="container d-flex justify-content-center">
                            <div class="col-9">
                                <h1 class="text-center mt-2">Register</h1>
                                <?php if(session('error')): ?>
                                    <div class="alert alert-danger">
                                        <?php echo e(session('error')); ?>

                                    </div>
                                <?php endif; ?>
                                <div class="card" style="margin-top: 40px">
                                    <form style="margin: 30px" action="/sesi/create" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input class="form-control" value="<?php echo e(Session::get('name')); ?>"
                                                type="text" id="name" name="name" autofocus>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">No. telpon</label>
                                            <input type="number" name="notelp" class="form-control"
                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                placeholder="Masukkan No Telpon">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Jenis Kelamin</label>
                                            <select class="form-select" name="jeniskelamin" id="floatingSelectGrid">
                                                <option selected disabled>--</option>
                                                <option value="pria">Pria</option>
                                                <option value="wanita">Wanita</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input class="form-control" value="<?php echo e(Session::get('email')); ?>"
                                                type="email" id="email" name="email">
                                        </div>
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Password</label>
                                            <input class="form-control" type="password" id="password"
                                                name="password">
                                        </div>
                                        <div class="nb-3 d-grid">
                                            <button name="submit" type="submit"
                                                class="btn btn-primary">Register</button>
                                        </div>
                                    </form>
                                    <div class="register text-end mb-3 me-3">
                                        <a href="/sesi" data-bs-toggle="modal" data-bs-target="#login">have
                                            account? Login Here!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="joinkelas" tabindex="-1" aria-labelledby="login" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-body">
                        <div class="container">
                            <h1 class="text-center mt-3">Join Kelas</h1>
                            <div class="card" style="margin-top: 70px">
                                <form style="margin: 30px" action="/insertdatasiswa" method="POST"
                                    enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Nama</label>
                                        <input class="form-control" type="text" id="name" name="name"
                                            placeholder="Masukkan Nama Anda">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">No. telpon</label>
                                        <input type="number" name="notelp" class="form-control"
                                            id="exampleInputEmail1" aria-describedby="emailHelp"
                                            placeholder="Masukkan No Telpon">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Jenis Kelamin</label>
                                        <select class="form-select" name="jeniskelamin" id="floatingSelectGrid">
                                            <option selected disabled>--</option>
                                            <option value="1">Pria</option>
                                            <option value="2">Wanita</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    
    <script>
        feather.replace();
    </script>

    
    <script>
        document.addEventListener("DOMContentLoaded", function() {
        // Set a timeout to hide the alert after 3 seconds (3000 milliseconds)
        setTimeout(function() {
            // Get the alert element  
            var alertElement = document.getElementById('myAlert');
            // Add the 'd-none' class to hide the alert
            alertElement.classList.add('d-none');
        }, 3000); // 3 seconds in milliseconds
    });
    </script>
</body>

</html>
<?php /**PATH C:\Users\reyna\OneDrive\Desktop\open this to make folder or file in desktop\online-course\resources\views/dashboard.blade.php ENDPATH**/ ?>