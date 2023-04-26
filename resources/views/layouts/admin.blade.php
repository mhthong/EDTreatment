

    @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <section class="panel important" style="height: 90vh;">
       @include('admin.setting-page')
    </section>



