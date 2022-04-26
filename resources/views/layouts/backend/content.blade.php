<div class="content-wrapper">
    <section class="content-header">
        <?php //if(@$this->title!=null) { ?>
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1><?php //@$this->title; ?></h1>
                </div>
            </div>
        </div>
        <?php //} ?>
    </section>

    <section class="content" id="content">
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @yield('content')
    </section>
</div>
