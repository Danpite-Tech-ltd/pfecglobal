<div class="pb-3 sidebar pe-4">
    <nav class="navbar bg-secondary navbar-dark">
        <a href="{{ url('/admin/dashboard') }}" class="mx-4 mb-3 navbar-brand">
            <img src="{{ asset($basicinfo->logo) }}" alt=""
                style="width: 100%;background: white;border-radius: 6px;">
        </a>
        <div class="mb-4 d-flex align-items-center ms-4">
            <div class="position-relative">
                <img class="rounded-circle" src="{{ asset('public/backend/') }}/img/user.jpg" alt=""
                    style="width: 40px; height: 40px;">
                <div
                    class="bottom-0 p-1 border border-2 border-white bg-success rounded-circle position-absolute end-0">
                </div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">{{ Auth::guard('admin')->user()->name }}</h6>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="{{ url('/admin/dashboard') }}" class="nav-item nav-link active"><i
                    class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="fa fa-laptop me-2"></i>Admins</a>
                <div class="bg-transparent border-0 dropdown-menu">
                    <a href="{{ route('admin.roles.index') }}" class="dropdown-item">Roles & Permissions</a>
                    <a href="{{ route('admin.admins.index') }}" class="dropdown-item">Admins</a>
                </div>
            </div>

            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="fa fa-th me-2"></i>Banners</a>
                <div class="bg-transparent border-0 dropdown-menu">
                    <a href="{{ route('admin.sliders.index') }}" class="dropdown-item">Sliders</a>
                    {{-- <a href="{{ route('admin.bottominfos.index') }}" class="dropdown-item">Slider Bottom</a> --}}
                </div>
            </div>
            <a href="{{ route('admin.testimonials.index') }}" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Trusted Industry</a>
            <a href="{{ route('admin.aboutlists.index') }}" class="nav-item nav-link"><i class="fa fa-th me-2"></i>About Us</a>
            <a href="{{ route('admin.aboutinfos.index') }}" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Destination</a>
            <a href="{{ route('admin.register-members.index') }}" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Register Members</a>
            <a href="{{ route('admin.aboutinfos.index') }}" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Client Counter</a>

            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="fa fa-th me-2"></i>Products</a>
                <div class="bg-transparent border-0 dropdown-menu">
                    <a href="{{ route('admin.portfoliocategories.index') }}" class="dropdown-item">Category</a>
                    <a href="{{ route('admin.portfoliosubcategories.index') }}" class="dropdown-item">Subcategory</a>
                    <a href="{{ route('admin.portfolios.index') }}" class="dropdown-item">Items</a>
                </div>
            </div>

            <a href="{{ url('admin/chooseus-data') }}" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Choose Us</a>
            <a href="{{ url('admin/faqs') }}" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Faq's</a>

            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="fa fa-th me-2"></i>Certificate</a>
                <div class="bg-transparent border-0 dropdown-menu">
                    <a href="{{ route('admin.services.index') }}" class="dropdown-item">Certificate</a>
                </div>
            </div>


            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="fa fa-th me-2"></i>Team Members</a>
                <div class="bg-transparent border-0 dropdown-menu">
                    <a href="{{ route('admin.teams.index') }}" class="dropdown-item">Team Members</a>
                </div>
            </div>

            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="fa fa-th me-2"></i>Additional Text</a>
                <div class="bg-transparent border-0 dropdown-menu">
                    <a href="{{ url('admin/service-data') }}" class="dropdown-item">Service Text</a>
                    <a href="{{ url('admin/teams-data') }}" class="dropdown-item">Teams Text</a>
                    <a href="{{ url('admin/testimonial-data') }}" class="dropdown-item">Testimonial Text</a>
                    <a href="{{ url('admin/web/texts') }}" class="dropdown-item">Web Texts</a>
                    <a href="{{ url('admin/web/facts') }}" class="dropdown-item">Facts Info</a>
                </div>
            </div>

            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="fa fa-th me-2"></i>Pages</a>
                <div class="bg-transparent border-0 dropdown-menu">
                    <a href="{{ route('admin.clients.index') }}" class="dropdown-item">Page</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="fas fa-cog fa-spin me-2"></i>Web Settings</a>
                <div class="bg-transparent border-0 dropdown-menu">
                    <a href="{{ route('admin.basicinfos.index') }}" class="dropdown-item">Basic Info</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="fas fa-cog fa-spin me-2"></i>Factory </a>
                <div class="bg-transparent border-0 dropdown-menu">
                    <a href="{{ route('admin.factory.index') }}" class="dropdown-item">Factory Info</a>
                </div>
            </div>
        </div>
    </nav>
</div>

<style>
    ::-webkit-scrollbar {
        display: none;
    }
</style>








{{--
<div class="nav-item dropdown">
    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
            class="fa fa-laptop me-2"></i>Users</a>
    <div class="bg-transparent border-0 dropdown-menu">
        <a href="{{ route('admin.userroles.index') }}" class="dropdown-item">Roles & Permissions</a>
        <a href="{{ route('admin.users.index') }}" class="dropdown-item">Users</a>
    </div>
</div> --}}
