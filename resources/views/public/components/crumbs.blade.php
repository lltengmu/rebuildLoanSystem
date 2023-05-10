<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>歡迎回來！</h4>
            <p class="mb-0">{{ session('_user_info.full_name') }}</p>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">{{ $title }}</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ $currentPage }}</a></li>
        </ol>
    </div>
</div>