<!DOCTYPE html>
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
        
        <nav class="navbar navbar-expand-lg mt-3">
            <a class="navbar-brand" dissable href="/dashboard">Logo. </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-inline justify-content-center" id="navbarScroll">
                <ul class="navbar-nav navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home Page</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">How its work</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/tambahdata">Add List Course </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
            <form class="d-flex" role="search justify-content-end">
                <button class="btn btn-outline-none me-4" type="submit"><ion-icon name="search-outline"></ion-icon>
                    Search</button>
                <?php if(auth()->check()): ?>
                    <div class="dropdown ms-3">
                        <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <?php echo e(auth()->user()->name); ?>

                        </button>
                        <ul class="dropdown-menu">
                            <li><button class="dropdown-item" type="button"
                                    disabled><?php echo e(auth()->user()->name); ?></button></li>
                            <li><a href="/sesi/logout" class="dropdown-item" type="button">Log Out</a></li>
                        </ul>
                    </div>
                <?php else: ?>
                    <a href="/sesi" class="btn btn-light ms-3" data-bs-toggle="modal"
                        data-bs-target="#login">Login</a>
                <?php endif; ?>
            </form>
        </nav>

        
        <section class="mb-5 scroll-x">
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <h2 class="judulkelas mt-4"><?php echo e($category->name); ?></h2>
                <hr class="border border-danger border-2 opacity-50">
                <div class="course-container">
                    <?php $__currentLoopData = $category->kursus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kursus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="card border border-2 border-dark-subtle" style="width: 18rem;">
                            <img src="<?php echo e(asset('/cover_image/' . $kursus->cover)); ?>" class="card-img-top" alt="null!">
                            <div class="card-body">
                                <h5 class="card-title judulcourse d-flex justify-content-center"><?php echo e($kursus->judul); ?></h5>
                                <p class="card-text descript d-flex justify-content-center "><?php echo e($kursus->description); ?></p>
                                <div class="row">
                                    <div class="col d-flex justify-content-center">
                                        <a href="<?php echo e(url("/kursus/{$kursus->id}/users")); ?>" class="btn btn-secondary">View User</a>
                                    </div>
                                    <div class="col d-flex justify-content-center"> 
                                        <form method="POST" action="<?php echo e(route('join.kursus', ['kursusId' => $kursus->id])); ?>">
                                            <?php echo csrf_field(); ?>
                                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($user->role ==='admin'): ?>
                                                    <button type="submit" class="btn btn-success">Join</button>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </form>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </section>
    </div>

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
                                                <option value="1">Pria</option>
                                                <option value="2">Wanita</option>
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
<?php /**PATH C:\Users\reyna\OneDrive\Desktop\open this to make folder or file in desktop\online-course\resources\views/course.blade.php ENDPATH**/ ?>